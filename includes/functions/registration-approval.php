<?php 
add_action('init', 'email_verification_request');

function email_verification_request() {
    if (isset($_POST['email_data'])) {
        $email = sanitize_email($_POST['email_data']);
        
        if (email_exists($email)) {
            wp_redirect(home_url("/partnerships?error_registration=true"));
            exit;
        } else {
            // Generate a unique token for the email verification
            $token = wp_generate_password(20, false);
            $verification_link = home_url("/signup?token=$token&email=" . urlencode($email));
            
            // Store the token temporarily
            set_transient("email_verification_$token", $email, 24 * HOUR_IN_SECONDS);

            // Send verification email
            $subject = "Verify Your Email Address";
            $message = "Please verify your email by clicking the link below:\n$verification_link";
            wp_mail($email, $subject, $message);

            wp_redirect(home_url("/check-email"));
            exit;
        }
    }
}

add_action('init', 'register_form');

function register_form() {
    if (isset($_POST['register_form_submitted']) && isset($_POST['username_value']) && isset($_POST['email_value']) && isset($_POST['password_value']) && isset($_POST['firstname_value']) && isset($_POST['lastname_value'])) {
        
        // Fetch the token and email from the URL
        $token = isset($_GET['token']) ? sanitize_text_field($_GET['token']) : '';
        $email = isset($_GET['email']) ? sanitize_email($_GET['email']) : '';
        
        // Validate the token and email
        if (empty($token) || empty($email) || !get_transient("email_verification_$token") || get_transient("email_verification_$token") !== $email) {
            echo '<div class="error">Invalid verification link.</div>';
            exit;
        }

        // Continue with the registration process if token is valid
        $firstname = sanitize_text_field($_POST['firstname_value']);
        $lastname = sanitize_text_field($_POST['lastname_value']);
        $username = sanitize_user($_POST['username_value']);
        $password = $_POST['password_value'];

        // Check if the username or email already exists
        if (username_exists($username) || email_exists($email)) {
            echo '<div>Username or Email already taken</div>';
        } else {
            // Create the user but mark them as pending approval
            $user_id = wp_create_user($username, $password, $email);

            if (!is_wp_error($user_id)) {
                // Add custom user meta for approval status
                update_user_meta($user_id, 'account_approval_status', 'pending');
                
                // Add additional user info (first name, last name)
                update_user_meta($user_id, 'first_name', $firstname);
                update_user_meta($user_id, 'last_name', $lastname);

                // Clean up the verification token
                delete_transient("email_verification_$token");

                // Notify the admin about the new pending user
                notify_admin_of_new_user_registration($user_id);

                // Redirect to a success page
                wp_redirect(home_url("/registration-success"));
                exit;
            } else {
                echo '<div class="login-error">An error occurred while creating the user.</div>';
            }
        }
    }
}

// Send email notification to admin when a new user registers with pending approval
function notify_admin_of_new_user_registration($user_id) {
    $user_info = get_userdata($user_id);
    $admin_email = get_option('admin_email'); // Admin's email address
    $subject = "New User Registration Pending Approval";
    $message = "A new user has registered and is awaiting approval.\n\n";
    $message .= "Username: " . $user_info->user_login . "\n";
    $message .= "Email: " . $user_info->user_email . "\n";
    $message .= "Please approve or reject the user from the WordPress admin dashboard.";

    wp_mail($admin_email, $subject, $message);
}

// Add admin notice for pending user approval
function admin_pending_user_notification() {
    // Get the count of users with "pending" status
    $pending_users = count_users_with_pending_status();

    if ($pending_users > 0) {
        echo '<div class="notice notice-warning is-dismissible">
            <p><strong>' . $pending_users . ' user(s) awaiting approval</strong>. Please check the user management section.</p>
        </div>';
    }
}

// Function to count users with "pending" approval status
function count_users_with_pending_status() {
    $args = array(
        'meta_key' => 'account_approval_status',
        'meta_value' => 'pending',
        'fields' => 'ID',
    );

    $pending_users = get_users($args);

    return count($pending_users);
}

// Hook the admin notification function to display the notice in the dashboard
add_action('admin_notices', 'admin_pending_user_notification');

// Add "Approve" button to the user's admin page
add_filter('user_row_actions', 'add_approve_user_button', 10, 2);

function add_approve_user_button($actions, $user) {
    // Only show the button to users who are pending approval
    if (get_user_meta($user->ID, 'account_approval_status', true) === 'pending') {
        $approve_url = add_query_arg(array(
            'approve_user' => $user->ID,
            'action' => 'approve'
        ), admin_url('users.php'));

        // Add the approve action link
        $actions['approve_user'] = '<a href="' . esc_url($approve_url) . '" class="approve-user">Approve</a>';
    }

    return $actions;
}

// Handle the approval process
add_action('admin_init', 'approve_user_action');

function approve_user_action() {
    if (isset($_GET['approve_user']) && isset($_GET['action']) && $_GET['action'] === 'approve') {
        $user_id = absint($_GET['approve_user']);

        // Check if the user exists and if the account is still pending approval
        if (get_user_meta($user_id, 'account_approval_status', true) === 'pending') {
            // Update the approval status to 'approved'
            update_user_meta($user_id, 'account_approval_status', 'approved');

            // Send email to the user notifying them of approval
            notify_user_of_approval($user_id);

            // Redirect back to the users page with success message
            wp_redirect(admin_url('users.php?message=approved'));
            exit;
        }
    }
}

// Send email notification to the user on registration approval
function notify_user_of_approval($user_id) {
    $user_info = get_userdata($user_id);
    $subject = "Your Account Has Been Approved";
    $message = "Hello " . $user_info->first_name . ",\n\n";
    $message .= "Your account has been approved. You can now log in to the site using your credentials.\n\n";
    $message .= "Thank you for registering!";

    wp_mail($user_info->user_email, $subject, $message);
}

// Restrict login for users with pending approval
add_filter('authenticate', 'restrict_pending_users_login', 30, 3);

function restrict_pending_users_login($user, $username, $password) {
    if (is_a($user, 'WP_User')) {
        // Check if the user is pending approval
        if (get_user_meta($user->ID, 'account_approval_status', true) === 'pending') {
            return new WP_Error('pending_approval', 'Your account is pending approval. Please wait for an admin to approve it.');
        }
    }
    return $user;
}
?>

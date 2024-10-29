<?php

    add_action("wp_enqueue_scripts", "tailwind_theme_style");

    function tailwind_theme_style() {
        // wp_enqueue_style("tailwind_output_css", get_template_directory_uri()."/tailwind_output.css", array());
        wp_enqueue_style("main_style", get_stylesheet_uri());
        wp_enqueue_style("tailwind_output_css", get_theme_file_uri("/tailwind_output.css"));
        wp_enqueue_style("inter", "//fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap");
        // wp_enqueue_style("cormorant-garamond", "//fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap");

        wp_enqueue_script("searca_scripts", get_template_directory_uri()."/build/index.js", array(), "1.0");
        wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
        wp_enqueue_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');
        // Enqueue Slick JS
        wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), null, true);
        // Enqueue custom JS to initialize the slider
        // wp_enqueue_script('custom-slick-init', get_template_directory_uri() . '/js/slick-init.js', array('jquery', 'slick-js'), null, true);
    }


    add_action('login_enqueue_scripts', 'loginStyle');

    function loginStyle() {
        wp_enqueue_style("main_style", get_stylesheet_uri()); 
        wp_enqueue_style("inter", "//fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap");

    }

    add_action("after_setup_theme", "searca_features");

    function searca_features() {
        // register_nav_menu("header_menu", "Header Menu");
        register_nav_menus(
            array(
                "header_menu" => "Header Menu",
                "footer_menu" => "Footer Menu",
            )
        );

        add_theme_support('tittle-tag');

        add_theme_support('post-thumbnails', array(
            'post',
            'page',
            'material-author',
            "thematic-area"
        ));

        add_theme_support('custom-logo', array(
            'height'               => 200,
            'width'                => 600,
            'flex-height'          => true,
            'flex-width'           => true,
            'header-text'          => array( 'site-title', 'site-description' ),
            'unlink-homepage-logo' => true,
        ));
    }

    add_action('init', 'handle_login');

    function handle_login() {
        if(isset($_POST['username']) && isset($_POST['password'])) {
            $user = wp_authenticate( $_POST['username'], $_POST['password'] );

            if(is_wp_error($user)) {
                echo '<div class="flex w-[100%] justify-center">';
                echo '<div class="relative font-600 text-[16px] z-[99] p-[20px] bg-[#ffffff] text-red-600">' . $user->get_error_message() . '</div>';
                echo '</div>';
            } else {
                wp_set_current_user($user->ID);
                wp_set_auth_cookie($user->ID);
                do_action('wp_login', $user->user_login, $user);

                wp_redirect(home_url("/"));

                exit;
            }
        }
    }

    add_action('init', 'email_verification_request');

    function email_verification_request() {
        if(isset($_POST['email_data'])) {
            $email = sanitize_email($_POST['email_data']);

            if(email_exists($email)) {
                echo '<div>Username or Email already taken</div>';
            } else {
                if (!is_wp_error($user_id)) {
                    // Generate a unique token
                    $token = wp_generate_password(20, false);
                    $verification_link = home_url("/signup?token=$token&email=" . urlencode($email));
            
                    // Save the token in a transient or option (temporary storage)
                    set_transient("email_verification_$token", $email, 24 * HOUR_IN_SECONDS);
            
                    // Send verification email
                    $subject = "Verify Your Email Address";
                    $message = "Please verify your email by clicking the link below:\n$verification_link";
                    wp_mail($email, $subject, $message);

                    wp_redirect(home_url("/check-email"));
                    exit;
                } else {
                    echo '<div>An error occurred while creating the user.</div>';
                }   
            }
        }
    }

    // add_action('init', 'verify_email_and_redirect_to_registration');

    // function verify_email_and_redirect_to_registration() {
    //     if (isset($_GET['token']) && isset($_GET['email'])) {
    //         $token = sanitize_text_field($_GET['token']);
    //         $email = sanitize_email($_GET['email']);

    //         $saved_email = get_transient("email_verification_$token");

    //         if ($saved_email === $email) {
    //             // Token is valid; remove the token and redirect to registration page with email pre-filled
    //             delete_transient("email_verification_$token");
    //             wp_redirect(home_url("/complete-registration?email=" . urlencode($email)));
    //             exit;
    //         } else {
    //             echo '<div class="error">Invalid or expired verification link.</div>';
    //         }
    //     }
    // }

    add_action('init', 'register_form');

    function register_form() {
        if (isset($_POST['register_form_submitted']) && isset($_POST['username_value']) && isset($_POST['email_value']) && isset($_POST['password_value']) && isset($_POST['firstname_value']) && isset($_POST['lastname_value']) ){
            
            $firstname = sanitize_text_field($_POST['firstname_value']);
            $lastname = sanitize_text_field($_POST['lastname_value']);
            $email = sanitize_email($_POST['email_value']);
            $username = sanitize_user($_POST['username_value']);
            $password = $_POST['password_value'];

            if(username_exists($username) || email_exists($email)) {
                echo '<div>Username or Email already taken</div>';
            } else {
                $user_id = wp_create_user( $username, $password, $email );

                if (!is_wp_error($user_id)) {
                    wp_redirect(home_url("/registration-success"));
                    exit;
                } else {
                    echo '<div class="login-error">An error occurred while creating the user.</div>';
                }   
            }

            exit;
        }
    }

    

    

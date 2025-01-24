<?php 
      add_action('init', 'email_verification_request');

      function email_verification_request() {
  
          if(isset($_POST['email_data'])) {
              $email = sanitize_email($_POST['email_data']);
  
              if(email_exists($email)) {
                  // echo '<div>Username or Email already taken</div>';
                  wp_redirect(home_url("/partnerships?error_registration=true"));
                  exit;
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

?>
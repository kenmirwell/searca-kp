<?php 
    add_action('init', 'handle_login');

    function handle_login() {
        if(isset($_POST['username']) && isset($_POST['password'])) {
            $user = wp_authenticate( $_POST['username'], $_POST['password'] );

            if(is_wp_error($user)) {
                // echo '<div class="flex w-[100%] justify-center">';
                // echo '<div class="relative font-600 text-[16px] z-[99] p-[20px] bg-[#ffffff] text-red-600">' . $user->get_error_message() . '</div>';
                // echo '</div>';

                wp_redirect(home_url("/login?error_login=true"));
            } else {
                wp_set_current_user($user->ID);
                wp_set_auth_cookie($user->ID);
                do_action('wp_login', $user->user_login, $user);

                wp_redirect(home_url("/"));

                exit;
            }
        }
    }
?>
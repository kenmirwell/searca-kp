<?php 
    add_action('init', function() {
        $post_type = 'country-profile';

        if (post_type_exists($post_type)) {
            global $wp_post_types;
            $wp_post_types[$post_type]->rewrite = array(
                'slug' => 'southeast-asia-profile/country-profile',
                'with_front' => false,
                'pages' => true,
                'feeds' => true
            );
        }
    }, 20);


?>

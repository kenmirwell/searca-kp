<?php

    add_action("wp_enqueue_scripts", "tailwind_theme_style");

    function tailwind_theme_style() {
        // wp_enqueue_style("tailwind_output_css", get_template_directory_uri()."/tailwind_output.css", array());
        wp_enqueue_style("main_style", get_stylesheet_uri(), [], time());
        wp_enqueue_style("tailwind_output_css", get_theme_file_uri("/tailwind_output.css"));
        wp_enqueue_style("raleway", "https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap");
        wp_enqueue_style("inter", "https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap");
        wp_enqueue_style("plus-jakarta-sans", "https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap", array(), null);
        wp_enqueue_style("cormorant-garamond", "https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap");
        wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css' );

        // wp_enqueue_script("searca_scripts", get_template_directory_uri()."/build/index.js", array(), "1.0"); //my Js
        wp_enqueue_style("swiper-css", "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css");
        wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
        wp_enqueue_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');
        // Enqueue Slick JS
        wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js');
        wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), null, true);
        
        // Custom Script (depends on jQuery and Slick)
        wp_enqueue_script("searca_scripts", get_template_directory_uri() . "/build/index.js", array("jquery", "slick-js"), "1.0", true);
        
        // Enqueue custom JS to initialize the slider
        // wp_enqueue_script('custom-slick-init', get_template_directory_uri() . '/js/slick-init.js', array('jquery', 'slick-js'), null, true);
        //Circular progress
        // wp_enqueue_script('circle-progress', 'https://cdn.jsdelivr.net/npm/js-circle-progress/dist/circle-progress.min.js', array(), null, true);
    }

    //includes
    include(get_stylesheet_directory() . '/includes/functions/registration-approval.php');
    include(get_stylesheet_directory() . '/includes/functions/handle-login.php');
    include get_template_directory() . '/includes/functions/button-template-func.php'; //this is the same with get_stylesheet_directory
    include(get_stylesheet_directory() . '/includes/functions/button-func.php');
    include(get_stylesheet_directory() . '/includes/functions/bullet-func.php');
    // include get_template_directory() . '/includes/functions/button-func.php';
    
    //gsap
    include(get_stylesheet_directory() . '/includes/functions/gsap.php');

    //shortcode
    include(get_stylesheet_directory() . '/includes/shortcodes/agpractices-shortcode.php');
    include(get_stylesheet_directory() . '/includes/shortcodes/cadre-components-shortcode.php');
    include(get_stylesheet_directory() . '/includes/shortcodes/cop-shortcode.php');
    include(get_stylesheet_directory() . '/includes/shortcodes/hero-banner-shortcode.php');
    include(get_stylesheet_directory() . '/includes/shortcodes/knowledge-management.php');

    //custom enpoint
    include(get_stylesheet_directory() . '/includes/custom-endpoints/home-search-endpoint.php');

     //custom search query
    include(get_stylesheet_directory() . '/includes/custom-search-query/custom-search-query.php');

    //acf styling
    include(get_stylesheet_directory() . '/includes/functions/acf-style.php');

    add_action('init', 'theme_set_options');

    function theme_set_options() {
        if( get_option('root_url') === false ) {
            update_option('root_url', 'https://bcsdevelopmentgator.site/wp-json/');
        }
    
        if( get_option('some_key') === false ) {
            update_option('some_key', 'your_key_here');
        }
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
                "header_menu"   => "Header Menu",
                "footer_menu"   => "Footer Menu",
                "quick_links"   => "Quick Links",
                "help"          => "Help"
            )
        );

        add_theme_support('tittle-tag');

        add_theme_support('post-thumbnails', array(
            'post',
            'page',
            'home-banner',
            'material-author',
            "component",
            'knowledge-management',
            'country-profile',
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


    add_action('init', 'add_custom_user_role');

    function add_custom_user_role() {
        add_role(
            'vip',
            'VIP', 
            [
                'read'=> true,
            ]
        );
    }
    
    add_filter('show_admin_bar', function($show) {
        // if (!current_user_can('administrator')) {
        //     return false; 
        // }
        // return $show;

        return false;
    });

    function add_module_attribute($tag, $handle, $src) {
        if ('gsap-custom' === $handle) { // Apply only to your script
            return '<script type="module" src="' . esc_url($src) . '"></script>';
        }
        return $tag;
    }
    
    add_filter('script_loader_tag', 'add_module_attribute', 10, 3);
    
    






    

    

    

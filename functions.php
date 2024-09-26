<?php

    add_action("wp_enqueue_scripts", "tailwind_theme_style");

    function tailwind_theme_style() {
        // wp_enqueue_style("tailwind_output_css", get_template_directory_uri()."/tailwind_output.css", array());
        wp_enqueue_style("main_style", get_stylesheet_uri());
        wp_enqueue_style("tailwind_output_css", get_theme_file_uri("/tailwind_output.css"));
        wp_enqueue_style("inter", "//fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap");

        wp_enqueue_script("searca_scripts", get_template_directory_uri()."/build/index.js", array(), "1.0");
        wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
        wp_enqueue_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');
        // Enqueue Slick JS
        wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), null, true);
        // Enqueue custom JS to initialize the slider
        // wp_enqueue_script('custom-slick-init', get_template_directory_uri() . '/js/slick-init.js', array('jquery', 'slick-js'), null, true);
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
    
    // add_action('init', 'bannerBlock');
    
    // function bannerBlock() {
    //     wp_register_script('bannerBlockScript', get_stylesheet_directory_uri() . '/build/centerAlignbanner.js', array('wp-blocks', 'wp-element', 'wp-editor'),
    //     filemtime(get_stylesheet_directory() . '/build/centerAlignbanner.js'), // Versioning for cache busting
    //     true);
    //     register_block_type('centerAlignBlockTheme/banner', array(
    //         'editor_script' => 'bannerBlockScript'
    //     ));
    // }

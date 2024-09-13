<?php
    function tailwind_theme_style() {
        // wp_enqueue_style("tailwind_output_css", get_template_directory_uri()."/tailwind_output.css", array());
        wp_enqueue_style("main_style", get_stylesheet_uri());
        wp_enqueue_style("tailwind_output_css", get_theme_file_uri("/tailwind_output.css"));
        wp_enqueue_style("inter", "//fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap");
    }

    add_action("wp_enqueue_scripts", "tailwind_theme_style");

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
    }

    add_action("after_setup_theme", "searca_features");



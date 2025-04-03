<?php
    function theme_gsap_script(){
        // Enqueue GSAP core
        wp_enqueue_script( 'gsap-js', 'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js', array(), null, true );

        // Enqueue ScrollTrigger
        wp_enqueue_script( 'gsap-st', 'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollTrigger.min.js', array('gsap-js'), null, true );

        // Enqueue your custom GSAP script
        wp_enqueue_script( 'gsap-custom', get_template_directory_uri() . '/js/app.js', array('gsap-js', 'gsap-st'), null, true );
    }
    add_action( 'wp_enqueue_scripts', 'theme_gsap_script' );

?>
<?php

    if (!function_exists('theme_get_page_by_title')) {
        function theme_get_page_by_title($title, $post_type = 'page') {
            $query = new WP_Query([
                'post_type'              => $post_type,
                'title'                  => $title,
                'post_status'            => 'publish',
                'posts_per_page'         => 1,
                'no_found_rows'          => true,
                'update_post_meta_cache' => false,
                'update_post_term_cache' => false,
            ]);

            return $query->have_posts() ? $query->posts[0] : null;
        }
    }

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

         // Enqueue Slick JS
        wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js');
        wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), null, true);
        // wp_enqueue_script("searca_scripts", get_template_directory_uri()."/build/index.js", array(), "1.0"); //my Js
        wp_enqueue_style("swiper-css", "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css");
        wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
        wp_enqueue_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');
       
        
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

    //conutry-pfile-slug modification
    include(get_stylesheet_directory() . '/includes/functions/country-profile-slug.php');

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
    include(get_stylesheet_directory() . '/includes/custom-search-query/knowledge-product-search-query.php');

    //acf styling
    include(get_stylesheet_directory() . '/includes/functions/acf-style.php');

    //custm title
    include(get_stylesheet_directory() . '/includes/functions/title-function.php');

    //register blocks
    require_once get_template_directory() . '/includes/register-block-functions/bulleted-text-group.php';
    require_once get_template_directory() . '/includes/register-block-functions/bulleted-text-group-II-fx.php';
    require_once get_template_directory() . '/includes/register-block-functions/initialed-text-block-fx.php';
    require_once get_template_directory() . '/includes/register-block-functions/full-width-image-block-fx.php';
    require_once get_template_directory() . '/includes/register-block-functions/section-name-block-fx.php';
    require_once get_template_directory() . '/includes/register-block-functions/card-section-block-fx.php';
    require_once get_template_directory() . '/includes/register-block-functions/horizontal-bar-block-fx.php';
    require_once get_template_directory() . '/includes/register-block-functions/references-block-fx.php';
    require_once get_template_directory() . '/includes/register-block-functions/quotes-block-fx.php';
    require_once get_template_directory() . '/includes/register-block-functions/bulleted-header-block-fx.php';
    require_once get_template_directory() . '/includes/register-block-functions/badge-header-split-block-fx.php';
    require_once get_template_directory() . '/includes/register-block-functions/bulleted-htag-block-fx.php';
    require_once get_template_directory() . '/includes/register-block-functions/key-note-block-fx.php';
    require_once get_template_directory() . '/includes/register-block-functions/card-block-fx.php';

    add_action('enqueue_block_editor_assets', function() {
        wp_register_style('group-block-editor-outline', false);
        wp_enqueue_style('group-block-editor-outline');
        wp_add_inline_style('group-block-editor-outline', '
            .wp-block-group {
                outline: 4px dashed #a9b3b0;
                outline-offset: 4px;
            }
        ');
    });


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
            "knowledge-watch",
            'country-profile',
            'news'
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
    


    // duplicate
    function custom_duplicate_post_link($actions, $post) {

        if (current_user_can('edit_posts')) {
            $actions['duplicate'] = sprintf(
                '<a href="%s">Duplicate</a>',
                wp_nonce_url(
                    admin_url('admin.php?action=duplicate_post&post=' . $post->ID),
                    'duplicate_post_' . $post->ID
                )
            );
        }

        return $actions;
    }

    add_filter('post_row_actions', 'custom_duplicate_post_link', 10, 2);
    add_filter('page_row_actions', 'custom_duplicate_post_link', 10, 2);

    function custom_duplicate_post() {

    if (
        empty($_GET['post']) ||
        !isset($_GET['_wpnonce']) ||
        !wp_verify_nonce($_GET['_wpnonce'], 'duplicate_post_' . $_GET['post'])
    ) {
        wp_die('Invalid request.');
    }

    $post_id = absint($_GET['post']);
    $post = get_post($post_id);

    if (!$post) {
        wp_die('Post not found.');
    }

    $new_post = array(
        'post_title'   => $post->post_title . ' (Copy)',
        'post_content' => $post->post_content,
        'post_excerpt' => $post->post_excerpt,
        'post_status'  => 'draft',
        'post_type'    => $post->post_type,
        'post_author'  => get_current_user_id(),
        'menu_order'   => $post->menu_order,
    );

    $new_post_id = wp_insert_post($new_post);

    // Copy all post meta (including ACF)
    $meta = get_post_meta($post_id);

    foreach ($meta as $key => $values) {
        foreach ($values as $value) {
            add_post_meta(
                $new_post_id,
                $key,
                maybe_unserialize($value)
            );
        }
    }

    // Copy featured image
    set_post_thumbnail(
        $new_post_id,
        get_post_thumbnail_id($post_id)
    );

    // Copy taxonomies
    $taxonomies = get_object_taxonomies($post->post_type);

    foreach ($taxonomies as $taxonomy) {
        $terms = wp_get_object_terms($post_id, $taxonomy, array(
            'fields' => 'ids'
        ));

        wp_set_object_terms($new_post_id, $terms, $taxonomy);
    }

        wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
        exit;
    }

    add_action('admin_action_duplicate_post', 'custom_duplicate_post');
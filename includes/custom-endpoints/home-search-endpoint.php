<?php 
    function register_custom_search_endpoint() {
    register_rest_route(
        'custom/v1', // Namespace and version
        '/search', // Endpoint
        array(
            'methods'  => 'GET',
            'callback' => 'custom_search_handler',
            'args'     => array( // Define accepted parameters
                'search_title' => array(
                    'required' => false,
                    'sanitize_callback' => 'sanitize_text_field',
                ),
                'km_category' => array(
                    'required' => false,
                    'sanitize_callback' => 'absint',
                ),
                'per_page' => array(
                    'required' => false,
                    'sanitize_callback' => 'absint',
                    'default' => 10,
                ),
            ),
        )
    );
}
add_action('rest_api_init', 'register_custom_search_endpoint');

function custom_search_handler($request) {
    $search_title = $request->get_param('search_title');
    $km_category  = $request->get_param('km_category');
    $per_page     = $request->get_param('per_page');

    $args = array(
        'post_type'      => 'knowledge-management',
        'posts_per_page' => $per_page,
    );

    // Filter by title if provided
    if (!empty($search_title)) {
        $args['s'] = $search_title;
    }

    // Filter by category if provided
    if (!empty($km_category)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'km_category',
                'field'    => 'id',
                'terms'    => $km_category,
            ),
        );
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $posts = array();

        while ($query->have_posts()) {
            $query->the_post();
            $posts[] = array(
                'id'    => get_the_ID(),
                'title' => get_the_title(),
                'link'  => get_permalink(),
            );
        }

        wp_reset_postdata();
        return rest_ensure_response($posts);
    }

    return new WP_Error('no_posts', 'No posts found', array('status' => 404));
}

    
?>
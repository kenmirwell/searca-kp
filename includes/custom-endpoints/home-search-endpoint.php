<?php 
    function add_title_only_search( $args, $request ) {
        if ( isset( $request['title_search'] ) ) {
            global $wpdb;
            $search_query = esc_sql( $request['title_search'] );
    
            $args['s'] = $search_query;
            $args['posts_per_page'] = -1; // Adjust as needed
    
            // Restrict search to post title
            $args['meta_query'] = array(
                array(
                    'key'     => 'post_title',
                    'value'   => $search_query,
                    'compare' => 'LIKE'
                )
            );
        }
        return $args;
    }
    
    add_filter( 'rest_knowledge-management_query', 'add_title_only_search', 10, 2 );
    
?>
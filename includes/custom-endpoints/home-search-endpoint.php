<?php 
  function custom_search_endpoint($query_args, $request) {
    global $wpdb;
    
    $title_search = $request->get_param('title_search'); // Get the title search parameter

    if (!empty($title_search)) {
        add_filter('posts_where', function ($where) use ($wpdb, $title_search) {
            return $where . $wpdb->prepare(" AND {$wpdb->posts}.post_title LIKE %s", '%' . $wpdb->esc_like($title_search) . '%');
        });
    }

    return $query_args;
}

add_filter('rest_knowledge-management_query', 'custom_search_endpoint', 10, 2);

?>
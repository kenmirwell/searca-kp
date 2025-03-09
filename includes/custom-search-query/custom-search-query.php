<?php 
  function custom_knowledge_resources_search($query) {
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('knowledge_resources')) {
        
        // Initialize meta query and tax query arrays
        $meta_query = array();
        $tax_query = array('relation' => 'AND');

        // Check if 'searchby-title' or 'searchby-keyword' exists in the query
        if (!empty($_GET['searchby-title'])) {
            $query->set('s', sanitize_text_field($_GET['searchby-title']));
            add_filter('posts_search', function ($search, $wp_query) {
                global $wpdb;
                if ($wp_query->is_search() && !empty($wp_query->get('s'))) {
                    $search = $wpdb->prepare(" AND {$wpdb->posts}.post_title LIKE %s ", '%' . $wpdb->esc_like($wp_query->get('s')) . '%');
                }
                return $search;
            }, 10, 2);
        } elseif (!empty($_GET['searchby-keyword'])) {
            $query->set('s', sanitize_text_field($_GET['searchby-keyword']));
        }

        // Filter by Taxonomies
        $taxonomies = array('km_category', 'research_author', 'country', 'published_date');
        foreach ($taxonomies as $taxonomy) {
            if (!empty($_GET[$taxonomy]) && is_array($_GET[$taxonomy])) {
                $tax_query[] = array(
                    'taxonomy' => $taxonomy,
                    'field'    => 'term_id',
                    'terms'    => array_map('intval', $_GET[$taxonomy]),
                );
            }
        }

        // Apply Tax Query if filters exist
        if (count($tax_query) > 1) {
            $query->set('tax_query', $tax_query);
        }
    }
}
add_action('pre_get_posts', 'custom_knowledge_resources_search');


?>
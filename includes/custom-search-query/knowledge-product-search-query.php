<?php

function register_knowledge_management_fields() {
    register_rest_field('knowledge-management', 'custom_fields', [
        'get_callback' => function ($post_arr) {
            $post_id = $post_arr['id'];

            // Get the first term name from 'research_author' taxonomy
            $terms = get_the_terms($post_id, 'research_author');
            $author_name = ($terms && !is_wp_error($terms)) ? $terms[0]->name : '';

            // Get featured image URL
            $image_url = get_the_post_thumbnail_url($post_id, 'full');

            // Get permalink
            $permalink = get_permalink($post_id);

            // Return data as an associative array (converted to object in JSON)
            return [
                'id'             => $post_id,
                'title'          => get_the_title($post_id),
                'content'        => apply_filters('the_content', get_post_field('post_content', $post_id)),
                'author_name'    => $author_name,
                'featured_image' => $image_url,
                'permalink'      => $permalink,
            ];
        },
        'schema' => null,
    ]);
}

add_action('rest_api_init', 'register_knowledge_management_fields');
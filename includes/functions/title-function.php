<?php
/**
 * Theme setup for SEARCA
 */
function searca_setup() {
    // Let WordPress handle the <title> tag
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'searca_setup' );

/**
 * Customize document titles
 */
function searca_custom_title( $title ) {
    $title['title'] = 'SEARCA AFNR - Knowledge Platform';
    // // Example: Modify homepage title
    // if ( is_home() || is_front_page() ) {
    //     $title['title'] = 'Welcome to SEARCA';
    // }

    // // Example: Modify single post/page title
    // if ( is_singular() ) {
    //     $title['title'] = get_the_title() . ' | SEARCA Official Site';
    // }

    // // Example: Modify category archive
    // if ( is_category() ) {
    //     $title['title'] = single_cat_title( '', false ) . ' Articles | SEARCA';
    // }

    // // Example: Modify tag archive
    // if ( is_tag() ) {
    //     $title['title'] = 'Topics on "' . single_tag_title( '', false ) . '" | SEARCA';
    // }

    // // Example: Search results
    // if ( is_search() ) {
    //     $title['title'] = 'Search results for "' . get_search_query() . '" | SEARCA';
    // }

    return $title;
}
add_filter( 'document_title_parts', 'searca_custom_title' );

<?php 
    get_header();

    while (have_posts()) {
        the_post();

    $page = get_page_by_title('Knowledge Resources Test'); // this is a child page
    
    set_query_var('page_id', $page->ID);

    ?>

    <?php get_template_part("includes/sections/knowledge-products-sections/hero-section"); ?>
    <?php get_template_part("includes/sections/knowledge-products-sections/featured-pubs"); ?>
<?php 
    }
    get_footer()
?>
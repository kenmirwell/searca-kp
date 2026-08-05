<?php 
    get_header();

    while (have_posts()) {
        the_post();

    // $page = get_page_by_title('Resources Test');
    
    // set_query_var('page_id', $page->ID);

    ?>

    <?php get_template_part("includes/components/common-hero"); ?>
    <?php get_template_part("includes/sections/insights-sections/all-insights"); ?>
<?php 
    }
    get_footer()
?>
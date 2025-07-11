<?php 
    get_header();

    while (have_posts()) {
        the_post();

    $page = get_page_by_title('Southeast Asia Agriculture Profile');
    
    set_query_var('page_id', $page->ID);

    ?>

    <?php get_template_part("includes/components/common-hero"); ?>
    <?php get_template_part("includes/sections/sea-sections/map-section"); ?>
    <?php get_template_part("includes/sections/sea-sections/quick-facts"); ?>
    <?php get_template_part("includes/sections/sea-sections/topics-section"); ?>
<?php 
    }
    get_footer()
?>

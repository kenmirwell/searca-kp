<?php 
    get_header();

    while (have_posts()) {
        the_post();

    $page = get_page_by_title('Data & Insights'); // this is a child page

    set_query_var('page_id', $page->ID);

?>
    
    <?php get_template_part("includes/components/common-hero"); ?>
    <?php get_template_part("includes/sections/data-insights/simple-split-section"); ?>
    <?php get_template_part("includes/sections/data-insights/card-trio"); ?>
    <?php get_template_part("includes/sections/data-insights/split-section-i"); ?>
    <?php get_template_part("includes/sections/data-insights/country-profile"); ?>
    <?php get_template_part("includes/sections/data-insights/progressing-section"); ?>
<?php 
    }
    get_footer()
?>
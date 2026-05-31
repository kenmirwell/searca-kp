<?php 
    get_header();

    while (have_posts()) {
        the_post();

    $page = get_page_by_title('Consortium-ii');
    
    set_query_var('page_id', $page->ID);

?>
    
    <?php get_template_part("includes/components/common-hero"); ?>
    <?php get_template_part("includes/sections/consortium/split-section"); ?>
    <?php get_template_part("includes/sections/consortium/split-section-ii"); ?>
    <?php get_template_part("includes/sections/consortium/card-trio"); ?>
    <?php //get_template_part("includes/sections/consortium/image-cards-trio"); ?>
    <?php get_template_part("includes/sections/consortium/interactive-section-ii"); ?>
    <?php get_template_part("includes/sections/consortium/split-section-iii"); ?>
    <?php get_template_part("includes/sections/consortium/text-trio"); ?>
    <?php get_template_part("includes/sections/consortium/split-section-iiv"); ?>
<?php 
    }
    get_footer()
?>
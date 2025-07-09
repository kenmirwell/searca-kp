<?php 
    get_header();

    while (have_posts()) {
        the_post();

    $page = get_page_by_title('Consortium');
    
    set_query_var('page_id', $page->ID);

?>
    
    <?php get_template_part("includes/components/common-hero"); ?>
    <?php get_template_part("includes/sections/consortium/split-section-i"); ?>
    <?php get_template_part("includes/sections/consortium/text-trio"); ?>
    <?php get_template_part("includes/sections/consortium/image-cards-trio"); ?>
    <?php get_template_part("includes/sections/consortium/interactive-section"); ?>
<?php 
    }
    get_footer()
?>
<?php 
    get_header();

    while (have_posts()) {
        the_post();

    $page = get_page_by_title('Knowledge Resources Test');
    
    set_query_var('page_id', $page->ID);

    ?>

    <?php get_template_part("includes/sections/knowledge-products-sections/hero-section"); ?>
    <?php //get_template_part("includes/sections/about-sections/agri-policy"); ?>
    <?php //get_template_part("includes/sections/about-sections/agri-food-impact"); ?>
    <?php //get_template_part("includes/sections/about-sections/agri-mission-vision"); ?>
    <?php //get_template_part("includes/sections/about-sections/agri-knowledge-products"); ?>
<?php 
    }
    get_footer()
?>
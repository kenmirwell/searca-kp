<?php 
    get_header();

    while (have_posts()) {
        the_post();

    // $page = get_page_by_title('Resources Test');
    
    // set_query_var('page_id', $page->ID);

    ?>
    <?php get_template_part("includes/sections/contacts-sections/hero-section"); ?>
    <?php get_template_part("includes/sections/contacts-sections/1st-section"); ?>
    <?php get_template_part("includes/sections/contacts-sections/2nd-section"); ?>
    <?php get_template_part("includes/sections/contacts-sections/3rd-section"); ?>
<?php 
    }
    get_footer()
?>
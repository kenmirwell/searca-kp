<?php 
    get_header();

    while (have_posts()) {
        the_post();
?>
    
    <?php get_template_part("includes/components/common-hero"); ?>
    
<?php 
    }
    get_footer();
?>

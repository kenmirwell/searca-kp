<?php 
    get_header();

    while (have_posts()) {
        the_post();
        
?>
    <div>
         <?php get_template_part("includes/components/common-hero"); ?>
        <?php get_template_part("includes/sections/news-sections/all-news"); ?>
    </div>
<?php 
    }
    get_footer()
?>
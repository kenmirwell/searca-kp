<?php 
get_header();

while (have_posts()) {
    the_post();
?>
    <?php get_template_part("includes/sections/single-event-sections/hero"); ?>
    <?php get_template_part("includes/sections/single-event-sections/content"); ?>
<?php 
}
get_footer();
?>

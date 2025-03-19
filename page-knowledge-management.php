<?php 
    get_header();

    while (have_posts()) {
        the_post();
        
        $hero_background = get_field('hero_background');
        $hero_description = get_field('hero_description');
        $page_identifier = get_field("page_identifier");
?>
    <div>
        <?php get_template_part("includes/section/common-hero"); ?>
        <?php get_template_part("includes/section/boxed-three-column"); ?>
        <?php get_template_part("includes/section/common-two-column"); ?>                 
    </div>
<?php 
    }
    get_footer()
?>
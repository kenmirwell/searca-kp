<?php 
    get_header();

    while (have_posts()) {
        the_post();

    $page = get_page_by_title('About Test');

    set_query_var('page', $page);
?>
<?php get_template_part("includes/components/common-hero"); ?>
<?php get_template_part("includes/about-sections/agri-policy"); ?>
<?php 
    }
    get_footer()
?>

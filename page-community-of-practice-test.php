<?php 
    get_header();

    while (have_posts()) {
        the_post();

    $page = get_page_by_title('Community of Practice Test');
    
    set_query_var('page_id', $page->ID);

    ?>

    <?php get_template_part("includes/components/common-hero"); ?>
    <?php get_template_part("includes/sections/community-practice-sections/simple-split-section"); ?>
    <?php get_template_part("includes/sections/community-practice-sections/split-section-i "); ?>
    <?php get_template_part("includes/sections/community-practice-sections/card-trio"); ?>
<?php 
    }
    get_footer()
?>
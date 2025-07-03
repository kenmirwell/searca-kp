<?php 
    get_header();

    while (have_posts()) {
        the_post();

        $cadre_in_action_banner = get_field("cadre_in_action_banner");
        $faq_list = get_field('faq_list');
        $root_url = get_option('root_url');

        $page = get_page_by_title('Home');

        set_query_var('page_id', $page->ID);
        set_query_var('root_url', $root_url);
        set_query_var('cadre_in_action_banner', $cadre_in_action_banner);
?>
    <div class="pt-[30px] md:pt-[70px]">
        <?php get_template_part("includes/frontpage-sections/hero-section"); ?>
    </div>
    <?php get_template_part("includes/frontpage-sections/key-pillars"); ?>
    <?php get_template_part("includes/frontpage-sections/country-profile");?>
    <?php get_template_part("includes/frontpage-sections/knowledge-resources"); ?>
    <?php get_template_part("includes/frontpage-sections/cadre-inaction"); ?>
    <?php get_template_part("includes/frontpage-sections/capri-section"); ?>
    <?php get_template_part("includes/frontpage-sections/communityof-practice"); ?> 
    <?php get_template_part("includes/frontpage-sections/faq-section"); ?>
<?php 
    }
    get_footer();
?>

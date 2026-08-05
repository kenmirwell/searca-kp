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
    <div class="pt-[30px] sm:pt-[70px]">
        <?php get_template_part("includes/sections/frontpage-sections/hero-section"); ?>
    </div>
    <?php get_template_part("includes/sections/frontpage-sections/our-platform-essentials");?>
    <?php get_template_part("includes/sections/frontpage-sections/knowledge-watch-section"); ?>
    <?php get_template_part("includes/sections/frontpage-sections/news-section"); ?>
    <?php get_template_part("includes/sections/frontpage-sections/insights-section"); ?>
    <?php get_template_part("includes/sections/frontpage-sections/country-profile");?>
    <div class="hidden lg:block">
        <?php get_template_part("includes/sections/frontpage-sections/events-section-desktop"); ?>
    </div>
    <div class="block lg:hidden">
        <?php get_template_part("includes/sections/frontpage-sections/events-section-mobile"); ?>
    </div>
    <?php get_template_part("includes/sections/frontpage-sections/knowledge-resources"); ?>
    <?php get_template_part("includes/sections/frontpage-sections/capri-section"); ?>
    <?php get_template_part("includes/sections/frontpage-sections/communityof-practice"); ?> 
<?php 
    }
    get_footer();
?>

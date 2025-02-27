<?php 
    get_header();

    while (have_posts()) {
        the_post();

        $agpractices_brief_description = get_field("agpractices_brief_description");
        $agpractices_image = get_field("agpractices_image");
        $link_to_agpractices = get_field("link_to_agpractices");
        $cop_image = get_field("cop_image");
        $cop_image_2 = get_field("cop_image_2");
        $cop_title = get_field("cop_title");
        $cop_description = get_field("cop_description");
        $cop_link = get_field("cop_link");
        $cadre_in_action_banner = get_field("cadre_in_action_banner");
        $faq_list = get_field('faq_list');

        $root_url = get_option('root_url');

        set_query_var('agpractices_image', $agpractices_image);
        set_query_var('agpractices_brief_description',  $agpractices_brief_description);
        set_query_var('cop_image', $cop_image);
        set_query_var('cop_image_2', $cop_image_2);
        set_query_var('root_url', $root_url);
        set_query_var('cadre_in_action_banner', $cadre_in_action_banner);
?>
    <div class="pt-[30px] md:pt-[70px]">
        <?php get_template_part("includes/frontpage-sections/hero-section"); ?>

        <div class="py-[100px] bg-[#fffeeb]">
            <?php get_template_part("includes/frontpage-sections/key-pillars"); ?>
            <?php get_template_part("includes/frontpage-sections/agpractice-section"); ?>
            <?php get_template_part("includes/frontpage-sections/sprouting-knowledge"); ?> 
            <?php get_template_part("includes/frontpage-sections/cadre-inaction"); ?>
            <?php get_template_part("includes/frontpage-sections/knowledge-resources"); ?>
            <?php get_template_part("includes/frontpage-sections/faq-section"); ?>
    </div>
<?php 
    }
    get_footer();
?>

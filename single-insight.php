<?php 
get_header();

while (have_posts()) {
    the_post();
?>
    <div class="pt-[30px] md:pt-[70px]">
        <?php get_template_part("includes/sections/single-insight-sections/hero"); ?>
        <div class="relative flex justify-between sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto gap-[100px]">
            <div class="w-[80%] mb-[100px] pt-[40px]">
                <div>
                    <?php get_template_part("includes/sections/single-insight-sections/bulleted-section"); ?>
                    <?php get_template_part("includes/sections/single-insight-sections/Initialed-paragraph-section"); ?>
                    <?php get_template_part("includes/sections/single-insight-sections/simple-text-section"); ?>
                    <?php get_template_part("includes/sections/single-insight-sections/key-findings"); ?>
                    <?php get_template_part("includes/sections/single-insight-sections/findings-meaning"); ?>
                    <?php get_template_part("includes/sections/single-insight-sections/policy-priorities"); ?>
                    <?php get_template_part("includes/sections/single-insight-sections/searca-contribute"); ?>
                    <?php get_template_part("includes/sections/single-insight-sections/conclusion"); ?>
                    <?php get_template_part("includes/sections/single-insight-sections/policy-insights"); ?>
                    <?php get_template_part("includes/sections/single-insight-sections/summary"); ?>
                    <?php get_template_part("includes/sections/single-insight-sections/references"); ?>
                </div>
            </div>
            <div class="w-[20%] sticky h-fit top-0 pt-[40px] pb-[40px]">
                <?php get_template_part("includes/sections/single-insight-sections/right-side-bar"); ?>
            </div>
        </div>
    </div>
<?php 
}
get_footer();
?>

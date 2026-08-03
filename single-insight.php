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
                    <div id="key-policy-messages">
                        <?php get_template_part("includes/sections/single-insight-sections/bulleted-section"); ?>
                    </div>
                    <div id="introduction">
                        <?php get_template_part("includes/sections/single-insight-sections/Initialed-paragraph-section"); ?>
                    </div>
                    <div id="executive-summary">
                        <?php get_template_part("includes/sections/single-insight-sections/simple-text-section"); ?>
                    </div>
                    <div id="key-findings">
                        <?php get_template_part("includes/sections/single-insight-sections/key-findings"); ?>
                    </div>
                    <div id="what-it-means">
                        <?php get_template_part("includes/sections/single-insight-sections/findings-meaning"); ?>
                    </div>
                    <div id="policy-priorities">
                        <?php get_template_part("includes/sections/single-insight-sections/policy-priorities"); ?>
                    </div>
                    <div id="searca-contribution">
                        <?php get_template_part("includes/sections/single-insight-sections/searca-contribute"); ?>
                    </div>
                    <div id="conclusion">
                        <?php get_template_part("includes/sections/single-insight-sections/conclusion"); ?>
                    </div>
                    <div id="decision-maker-insights">
                        <?php get_template_part("includes/sections/single-insight-sections/policy-insights"); ?>
                    </div>
                    <div id="summary">
                        <?php get_template_part("includes/sections/single-insight-sections/summary"); ?>
                    </div>
                    <div id="references">
                        <?php get_template_part("includes/sections/single-insight-sections/references"); ?>
                    </div>
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

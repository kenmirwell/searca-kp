<div class="py-[80px]">
    <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
        <div class="simple-header flex flex-col gap-[5px] items-baseline text-center w-[100%] mx-auto pb-[20px] md:pb-[40px]">
            <div class="text-left w-[100%] lg:w-[50%]">
                <h6 class="text-display-24 md:text-display-42 text-[#1f1f1f] pb-[10px] font-bold">Our Platform Essentials</h6>
                <p class="text-display-12 md:text-display-16">Driving agricultural transformation and evidence-based policymaking through knowledge, data-driven research, and colloboration across Southeast Asia.</p>
            </div>
        </div>
        <div class="flex flex-wrap xl:flex-nowrap flex-col sm:flex-row justify-start xl:justify-between items-start gap-[5px] lg:gap-[10px] xl:gap-[20px]">
            <?php if (have_rows('component_container')): ?>
                <!-- <div class="flex flex-col gap-[50px] lg:flex-row justify-between flex-wrap"> -->
                    <?php while (have_rows('component_container')): the_row(); ?>
                    <?php
                            // Get the sub fields
                            $title = get_sub_field('component_title');
                            $sub1 = get_sub_field('component_1st_sub');
                            $sub2 = get_sub_field('component_2nd_sub');
                            $link = get_sub_field('component_button_link');
                            $image = get_sub_field('component_image');

                            // Set for template part
                            set_query_var('component_title', $title);
                            set_query_var('component_1st_sub', $sub1);
                            set_query_var('component_2nd_sub', $sub2);
                            set_query_var('component_button_link', $link);
                            set_query_var('component_image', $image['url']);
                    ?>
                    <div class="flex flex-col items-center gap-[20px]">
                        <?php get_template_part("includes/components/component"); ?>
                    </div>
                    <?php endwhile; ?>
                <!-- </div> -->
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="platform-essentials py-[80px]">
    <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
        <div class="simple-header flex flex-col gap-[5px] items-baseline text-center w-[100%] mx-auto pb-[20px] md:pb-[40px]">
            <div class="flex flex-col items-center justify-center text-center w-[100%]">
                <h6 class="text-display-24 md:text-display-42 text-[#1f1f1f] pb-[10px] font-semibold">Our Platform Essentials</h6>
                <p class="text-display-12 md:text-display-16">Explore the three main pillars that power evidence-based agricultural policy and innovation.</p>
            </div>
        </div>
        <div class="flex flex-wrap xl:flex-nowrap flex-col md:flex-row justify-start xl:justify-between items-start gap-[5px] lg:gap-[10px] xl:gap-[20px]">
            <?php if (have_rows('component_container')): ?>
                <!-- <div class="flex flex-col gap-[50px] lg:flex-row justify-between flex-wrap"> -->
                    <?php while (have_rows('component_container')): the_row(); ?>
                    <?php
                        $title = get_sub_field('component_title');
                        $sub1 = get_sub_field('component_1st_sub');
                        $sub2 = get_sub_field('component_2nd_sub');
                        $link = get_sub_field('component_button_link');
                        $image = get_sub_field('component_image');
                    ?>

                        <div class="flex flex-col gap-[20px]">
                            <div class="component-item-element block w-[100%] h-[355px] rounded-[20px] group w-full md:w-[250px] xl:w-[400px] rounded-3xl overflow-hidden border-[1px] border-[#CFCFCF]">
                                <div class="relative w-full h-[175px]">
                                    <img class="absolute w-full h-full object-cover scale-[1] group-hover:scale-[1.1] transition-all duration-700 ease" 
                                        src="<?php echo esc_url($image['url']); ?>" 
                                        alt="<?php echo esc_attr($title); ?>"
                                    >
                                </div>
                                <div class="p-[20px] z-[2] w-full bg-[#ffffff] bottom-0">
                                    <div class="mb-[10px]">
                                        <div class="text-display-16 xl:text-display-18 font-bold text-[#2C2C2C]">
                                            <h4><?php echo esc_html($title); ?></h4>
                                        </div>
                                        <!-- <div class="component-text pt-[10px] font-extralight text-[10px] md:text-[12px] xl:text-[14px] text-[#2C2C2C] pb-[10px] border-b border-[#D7D7D7]">
                                            <?php //echo esc_html($sub1); ?>
                                        </div> -->
                                    </div>

                                    <div class="flex flex-col gap-[10px]">
                                        <p class="font-extralight text-[10px] xl:text-[14px] text-[#2C2C2C]"><?php echo esc_html($sub2); ?></p>

                                        <a class="pt-[5px]" href="<?php echo esc_url($link); ?>">
                                            Learn More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <!-- </div> -->
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="py-[80px]">
    <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
        <div class="simple-header flex flex-col gap-[5px] items-baseline text-center w-[100%] mx-auto pb-[20px] md:pb-[40px]">
            <div class="text-left w-[100%] lg:w-[50%]">
                <h6 class="text-display-24 md:text-display-42 text-[#1f1f1f] pb-[10px] font-bold">Our Research Agenda</h6>
                <p class="text-display-12 md:text-display-16">CAPRI focuses on strategic research areas that address the most pressing challenges in Southeast Asia’s agricultural landscape.</p>
            </div>
        </div>
        <div class="flex flex-wrap xl:flex-nowrap flex-col sm:flex-row justify-start xl:justify-between items-start gap-[5px] lg:gap-[10px] xl:gap-[20px]">
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

                        <div class="flex flex-col items-center gap-[20px]">
                            <div class="component-item-element block w-[100%] md:w-auto h-[370px] xl:h-[435px] rounded-[20px] group">
                                <div class="flex items-end relative h-full w-full md:w-[250px] xl:w-[400px] rounded-3xl overflow-hidden">
                                    <div class="relative p-[20px] z-[2] w-full">
                                        <div class="mb-[10px]">
                                            <div class="text-display-16 xl:text-display-18 font-bold pt-[10px] text-white">
                                                <h4><?php echo esc_html($title); ?></h4>
                                            </div>
                                            <div class="component-text pt-[10px] font-extralight text-[10px] md:text-[12px] xl:text-[14px] text-white pb-[10px] border-b border-[#D7D7D7]">
                                                <?php echo esc_html($sub1); ?>
                                            </div>
                                        </div>

                                        <p class="font-extralight text-[10px] xl:text-[14px] text-white"><?php echo esc_html($sub2); ?></p>

                                        <?php if ($link): ?>
                                            <a class="block w-auto max-h-0 group-hover:max-h-[300px] overflow-hidden transition-all duration-300 ease-in-out delay-150 pt-[10px]" 
                                            href="<?php echo esc_url($link); ?>">
                                                <div class="flex justify-between items-center gap-[20px] py-[5px] pl-[20px] pr-[5px] bg-[#096936] hover:bg-[#B59637] transition-all duration-200 ease rounded-full">
                                                    <p class="hover:text-black text-white">Learn More</p>
                                                    <div class="bg-[#B59637] hover:bg-[#096936] rounded-full p-[15px] transition-all duration-200 ease">
                                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M2.10042 21.8995L21.8994 2.10051M21.8994 2.10051H2.10042M21.8994 2.10051V21.8995" 
                                                                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </a>
                                        <?php endif; ?>
                                    </div>

                                    <div class="bg-gradient-to-t from-black to-transparent w-full h-full absolute top-0 left-0 z-[1]"></div>
                                    <img class="absolute w-full h-full object-cover scale-[1] group-hover:scale-[1.1] transition-all duration-700 ease" 
                                        src="<?php echo esc_url($image['url']); ?>" 
                                        alt="<?php echo esc_attr($title); ?>">
                                </div>
                            </div>
                        </div>

                    <?php endwhile; ?>
                <!-- </div> -->
            <?php endif; ?>
        </div>
    </div>
</div>
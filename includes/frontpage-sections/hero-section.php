<div class="bg-[#196129] h-[500px] lg:h-[650px]">
    <div class="banner-slider h-full">
        <?php if (have_rows('hero_banner')): ?>
            <?php while (have_rows('hero_banner')): the_row(); ?>
                <div class="slide-container">
                    <div class="flex space-between gap-[30px] items-end slide-content h-full w-full relative y-thumbnail">
                        <div class="w-[80%] mb-[100px] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto z-[2]">
                            <div class="flex flex-col items-left gap-[20px] text-container ml-[0px] mr-auto w-[768px]">
                                <div class="items-end">
                                    <h1 class="text-display-48"><?php echo get_sub_field('hero_banner_title'); ?></h1>
                                </div>
                                <div class="items-end tracking-wide leading-relaxed">
                                    <?php echo get_sub_field('hero_banner_sub'); ?>
                                </div>
                                <a id="slider-banner-button" href="<?php echo esc_url(get_sub_field('hero_banner_button_link')); ?>" class="w-auto cursor-pointer">
                                    <div class="items-center w-max flex gap-[20px] py-[5px] pl-[20px] pr-[5px] bg-[#096936] group-hover:bg-[#B59637] transition-all duration-200 ease rounded-full">
                                        <p class="w-max p-[0px]"><?php echo get_sub_field('hero_banner_button_name'); ?></p>
                                        <div class="h-max bg-[#ceab23] group-hover:bg-[#2a7f3d] rounded-full p-[15px] transition-all duration-200 ease">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.10042 21.8995L21.8994 2.10051M21.8994 2.10051H2.10042M21.8994 2.10051V21.8995" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="bg-gradient-to-l from-[rgba(0,0,0,0.2)] to-[rgba(0,0,0,0.7)] w-full h-full absolute top-0 left-0 z-[1]"></div>
                        <img class="absolute w-full h-full object-cover" src="<?php echo get_sub_field('hero_banner_image'); ?>" alt="<?php echo get_sub_field('hero_banner_title'); ?>">
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>



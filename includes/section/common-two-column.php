<?php if (have_rows('inner_content')): ?>
    <?php while (have_rows('inner_content')): the_row(); ?>
        <?php if (!get_sub_field("has_white_background")): ?>
        <div class="bg-[#096936] text-[#ffffff]">
        <?php else: ?>  
        <div>
        <?php endif; ?>
            <div>
                <div class="common-two-column w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto py-[60px]">
                    <div class="flex flex-col gap-[10px]">
                        <?php $is_text_right = get_sub_field("is_text_right"); ?>
                        <div class="flex flex-col <?php echo $is_text_right ? 'lg:flex-row' : 'lg:flex-row-reverse'?> justify-between gap-[10px] lg:gap-[100px] items-center">
                            <div class="relative w-[100%] lg:w-[50%]">
                                <img class="w-full z-[0]" src="<?php echo esc_url(get_sub_field("section_image")); ?>" alt="<?php the_title(); ?>">
                            </div>
                            <div class="flex flex-col gap-[10px] w-[100%] lg:w-[50%]">
                                <h6 class="text-display-28 lg:text-display-42 font-bold pb-[10px]"><?php the_sub_field('section_title'); ?></h6>
                                <div class="inner-content-text-area text-display-14 text-display-16 flex flex-col gap-[15px]">
                                    <?php the_sub_field('text_area'); ?>
                                </div>
                                <?php if (get_sub_field("button_name")): ?>
                                    <?php $button_link = get_sub_field('button_link'); ?>
                                    <?php $button_name = get_sub_field('button_name'); ?>
                                    <?php $is_button_gold = get_sub_field("is_button_gold"); ?>
                                    <?php $is_text_right = get_sub_field("is_text_right"); ?>

                                    <div class="flex mt-[12px]">
                                        <a href="<?php echo esc_url($button_link); ?>" class="w-auto group cursor-pointer">
                                            <div class="flex items-center gap-[20px] py-[5px] pl-[20px] pr-[5px] 
                                                <?php echo $is_button_gold ? 'bg-[#2a7f3d] group-hover:bg-[#ceab23]' : 'bg-[#ceab23] group-hover:bg-[#2a7f3d]'; ?> transition-all duration-200 ease rounded-full">
                                                
                                                <p class="text-[#ffffff]"><?php echo esc_html($button_name); ?></p>
                                                
                                                <div class="rounded-full p-[15px] transition-all duration-200 ease 
                                                    <?php echo $is_button_gold ? 'bg-[#ceab23] group-hover:bg-[#2a7f3d]' : 'bg-[#2a7f3d] group-hover:bg-[#ceab23]'; ?>">
                                                    
                                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2.10042 21.8995L21.8994 2.10051M21.8994 2.10051H2.10042M21.8994 2.10051V21.8995" 
                                                            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
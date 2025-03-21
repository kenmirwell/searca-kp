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
                            <h6 class='text-display-28 lg:text-display-42 font-bold pb-[10px] <?php echo (!get_sub_field("has_white_background")) ? "text-[#ffffff]" : "text-[#1f1f1f]"; ?>'>
                                <?php the_sub_field('section_title'); ?>
                            </h6>
                                <div class="inner-content-text-area text-display-14 text-display-16 flex flex-col gap-[15px]">
                                    <?php the_sub_field('text_area'); ?>
                                </div>
                                <?php if (get_sub_field("button_name")): ?>
                                    <?php $button_link = get_sub_field('button_link'); ?>
                                    <?php $button_name = get_sub_field('button_name'); ?>
                                    <?php $button_color_transition = get_sub_field("button_color_transition"); ?>
                                    <?php $button_color_setup = strtolower(str_replace(' ', '_', $button_color_transition)); ?>
                                    <?php $is_text_right = get_sub_field("is_text_right"); ?>
                                    <?php $has_white_background = get_sub_field("ihas_white_background"); ?>

                                    <div class="flex mt-[12px]">
                                        <?php
                                            button_template('common-button', array(
                                                'title' => "Explore the platform",
                                                'url' => $button_link,
                                                'color' => $button_color_setup
                                            ))
                                        ?>
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
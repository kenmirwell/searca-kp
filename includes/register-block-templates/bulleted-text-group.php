<?php
    $bg_color = get_field('background_color');
    $radius   = get_field('border_radius');
    $padding  = $radius ? '60px 40px' : '0px';

    $style = sprintf(
        'background-color: %s; border-radius: %spx; padding: %s;',
        esc_attr($bg_color),
        esc_attr($radius),
        esc_attr($padding)
    );
?>

<div class="" style="<?php echo $style; ?>">
    <?php if (get_field("title")) : ?> 
        <div class="text-[#000000] w-[100%] text-display-24 font-semibold pb-[20px]">
            <h2><?php echo get_field("title"); ?></h2>
        </div>
    <?php endif; ?>    

    <?php if (have_rows('list_repeater')) : ?>
        <div class="flex flex-col gap-[30px]">
            <?php while (have_rows('list_repeater')) : the_row(); ?>
                <div class="flex flex-col">
                    <div class="flex gap-[20px] w-[100%]">
                        <?php if (get_sub_field('bullet_icon')) : ?>
                            <div class="relative w-[100%]">
                                <img class="w-full h-full" src="<?php echo esc_url(get_sub_field('bullet_icon')); ?>" alt="">
                            </div>
                        <?php else : ?>
                            <div class="flex items-center justify-center relative min-w-[30px] h-[30px]" 
                                style="background-color: <?php echo esc_html(get_sub_field('bullet_background_color')); ?>; 
                                border-radius: <?php echo esc_html(get_sub_field('bullet_border_radius')); ?>px">
                                <p class="absolute text-left text-[14px] md:text-[16px]" style="color: <?php echo esc_html(get_sub_field('bullet_label_color')); ?>"><?php echo esc_html(get_sub_field('bullet_label')); ?></p>
                            </div>
                        <?php endif; ?>
                        <div>
                            <h3 class="font-semibold text-display-20 pb-[10px]"><?php echo esc_html(get_sub_field('list_title')); ?></h3>
                            <p class="text-display-18"><?php echo wp_kses_post(get_sub_field('list_description')); ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?> 
</div>
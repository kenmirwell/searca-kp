

<div class="flex gap-[10px] items-center pb-[20px]">
    <?php if (get_field('bullet_icon')) : ?>
        <div class="relative w-[100px]">
            <img class="w-full h-full" src="<?php echo esc_url(get_field('bullet_icon')); ?>" alt="">
        </div>
    <?php else : ?>
        <div class="flex items-center justify-center relative w-[50px] min-w-[50px] h-[50px] min-h-[50px]" 
            style="background-color: <?php echo esc_html(get_field('bullet_background_color')); ?>; 
            border-radius: <?php echo esc_html(get_field('border_radius')); ?>px">
            
            <p class="absolute text-left text-[14px] md:text-[16px]" 
            style="color: <?php echo esc_html(get_field('bullet_label_color')); ?>">
              <?php echo esc_html(get_field('bullet_label')); ?>
            </p>
        </div>
    <?php endif; ?>
    <?php if (get_field("text")) : ?> 
        <div class="text-[#000000] w-[100%] text-display-32 font-semibold">
            <h2><?php echo get_field("text"); ?></h2>
        </div>
    <?php endif; ?>    

</div>
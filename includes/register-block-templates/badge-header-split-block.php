<?php
    $bg_color = get_field('background_color');
    $radius   = get_field('background_radius');
    $padding  = $radius ? '50px 40px' : '0px';

    $style = sprintf(
        'background-color: %s; border-radius: %spx; padding: %s;',
        esc_attr($bg_color),
        esc_attr($radius),
        esc_attr($padding)
    );
?>

<div class="flex flex-col gap-[30px] mb-[20px]" style="<?php echo $style; ?>">
    <div class="flex gap-[10px] w-[100%] items-center">
      <?php if (get_field('bullet_icon')) : ?>
          <div class="relative w-[100px]">
              <img class="w-full h-full" src="<?php echo esc_url(get_field('bullet_icon')); ?>" alt="">
          </div>
      <?php else : ?>
          <div class="flex items-center justify-center relative min-w-[30px] h-[30px]" 
              style="background-color: <?php echo esc_html(get_field('bullet_background_color')); ?>; 
              border-radius: <?php echo esc_html(get_field('bullet_border_radius')); ?>px">
              <p class="absolute text-left text-[14px] md:text-[16px]" style="color: <?php echo esc_html(get_field('bullet_label_color')); ?>"><?php echo esc_html(get_field('bullet_label')); ?></p>
          </div>
      <?php endif; ?>
      <div>
          <h3 class="font-semibold text-display-24"><?php echo esc_html(get_field('title')); ?></h3>
      </div>
    </div>
    <?php if (have_rows('content_repeater')) : ?>
        <div class="flex gap-[10px]">
            <?php while (have_rows('content_repeater')) : the_row(); ?>
                <div class="flex flex-col gap-[10px] w-[100%] items-start">
                    <?php if (get_sub_field('title')) : ?>
                        <h3 class="font-semibold text-display-18 text-[#008C67]"><?php echo esc_html(get_sub_field('title')); ?></h3>
                    <?php endif; ?>
                    <?php if (get_sub_field('content')) : ?>
                      <div>
                          <p class="text-display-18"><?php echo wp_kses_post(get_sub_field('content')); ?></p>
                      </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?> 
</div>
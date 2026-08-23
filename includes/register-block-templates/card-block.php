<?php
    $bg_color = get_field('background_color');
    $radius   = get_field('background_radius');
    $padding  = $radius ? '20px' : '0px';

    $style = sprintf(
        'background-color: %s; border-radius: %spx; padding: %s;',
        esc_attr($bg_color),
        esc_attr($radius),
        esc_attr($padding)
    );
?>

<div class="mb-[20px]" style="<?php echo $style; ?>">
   <?php if (have_rows('content_repeater')) : ?>
          <div class="break-inside-avoid gap-[20px] w-[100%]">
              <?php while (have_rows('content_repeater')) : the_row(); ?>
                    <?php
                        $label_color = get_sub_field('label_color') ?: "#000000";
                        $label_size  = get_sub_field('label_size') ?: "16";
                        $title_color = get_sub_field('title_color') ?: "#000000";
                        $title_size  = get_sub_field('title_size') ?: "16";

                        $title_style = sprintf(
                            'color: %s; font-size: %spx;',
                            esc_attr($title_color),
                            esc_attr($title_size)
                        );

                        $label_style = sprintf(
                            'color: %s; font-size: %spx;',
                            esc_attr($label_color),
                            esc_attr($label_size)
                        );
                    ?>
                    <div class="flex flex-col gap-[10px] w-[100%] items-start pb-[20px]">
                      <?php if (get_sub_field('label')) : ?>
                          <h3 class="font-semibold"
                            style="<?php echo $label_style; ?>"
                          ><?php echo esc_html(get_sub_field('label')); ?></h3>
                      <?php endif; ?>
                      <?php if (get_sub_field('title')) : ?>
                          <h3 class="font-semibold" style="<?php echo $title_style; ?>"><?php echo esc_html(get_sub_field('title')); ?></h3>
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

<?php if (have_rows('card_repeater')) : ?>
    <div class="flex flex-wrap gap-[30px] mb-[20px]">
        <?php while (have_rows('card_repeater')) : the_row(); 

            $bg_color      = get_sub_field('background_color'); 
            $border_color  = get_field('border_color');  
            $alignment     = get_field('alignment');  
            $radius        = get_field('border_radius');          
            $title_color   = get_sub_field('title_color');
            $title_size   = get_sub_field('title_font_size');
            $content_color = get_sub_field('content_color');
            $desc_color    = get_sub_field('description_color');

            $style = sprintf(
                'background-color: %s; border-radius: %spx; border: 1px solid %s;',
                esc_attr($bg_color),
                esc_attr($radius),
                esc_attr($border_color)
            );

            $title_style = sprintf(
                'color: %s;',
                esc_attr($title_color),
            );

            $content_style = sprintf(
                'color: %s; text-align: %s',
                esc_attr($content_color),
                esc_attr($alignment),
            );

            $desc_style = sprintf(
                'color: %s;',
                esc_attr($desc_color),
            );
        ?>
            <div class="flex flex-col md:w-[290px] p-[20px]" style="<?php echo $style; ?>">
                <div class="flex flex-col gap-[20px] w-[100%]" style="align-items: <?php echo $alignment; ?>">
                    <?php if (get_sub_field('icon')) : ?>
                        <div class="relative w-[50px]">
                            <img class="w-full h-full" src="<?php echo esc_url(get_sub_field('icon')); ?>" alt="">
                        </div>
                    <?php endif; ?>
                    <?php if (get_sub_field('label')) : ?>
                      <span class="font-bold text-display-42 float-left pr-3">
                        <?php echo esc_html(get_sub_field('label')); ?>
                      </span>
                    <?php endif; ?>
                    <?php if (get_sub_field('title')) : ?>
                      <h3 class="font-semibold float-left pr-3" style="<?php echo esc_attr( $title_style . '; text-align: ' . $alignment . '; font-size: ' . $title_size . 'px;' ); ?>">
                        <?php echo esc_html(get_sub_field('title')); ?>
                      </h3>
                    <?php endif; ?>
                    <?php if (get_sub_field('content')) : ?>
                        <div class="[&_p]:mb-4 font-light" style="<?php echo $content_style; ?>">
                            <?php echo wp_kses_post(get_sub_field('content')); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>
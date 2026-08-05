<?php if (get_sub_field('section_class') === '2nd-main-topic') : ?>
  <?php if (have_rows('flexicon_repeater')) : ?>
    <?php while (have_rows('flexicon_repeater')) : the_row(); ?>
      <?php if (get_sub_field('class_name') === 'main-topic-title') : ?>
        <?php if (have_rows('inner_section_repeater')) : ?>
          <div class="flex flex-col">
            <?php while (have_rows('inner_section_repeater')) : the_row(); ?>
              <div class="pb-[20px] md:pb-[40px]">
                <?php while (have_rows('flexicon')): the_row(); 
                    $layout = get_row_layout();
                ?>
                  <?php if ($layout === 'title_layout') : ?>
                    <h3 class="font-bold text-display-24 md:text-display-32">
                      <?php echo esc_html(get_sub_field('title')); ?>
                    </h3>
                  <?php endif; ?>

                  <?php if ($layout === 'description_layout') : ?>
                    <div class="flex flex-col gap-[20px] pt-[20px]"> 
                      <?php while (have_rows('description_repeater')) : the_row(); ?>
                        <?php if (get_sub_field('description')) : ?>
                          <p><?php echo esc_html(get_sub_field('description')); ?></p>
                        <?php endif; ?>
                      <?php endwhile; ?>
                    </div>
                  <?php endif; ?>
                  
                <?php endwhile; ?>
              </div>
            <?php endwhile; ?>
          </div>
        <?php endif; ?>
      <?php endif; ?>  
      
    <?php endwhile; ?>
  <?php endif; ?>
<?php endif; ?>
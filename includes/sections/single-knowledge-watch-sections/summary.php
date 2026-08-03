<?php if (get_sub_field('section_class') === 'summary') : ?>
  <?php if (have_rows('flexicon_repeater')) : ?>
    <?php while (have_rows('flexicon_repeater')) : the_row(); ?>
      <?php if (get_sub_field('class_name') === 'summary') : ?>
        <?php if (have_rows('inner_section_repeater')) : ?>
          <div class="flex flex-col relative rounded-2xl overflow-hidden h-[275px] p-[40px]">
            <?php while (have_rows('inner_section_repeater')) : the_row(); ?>
              <div class="pb-[40px]">
                <?php while (have_rows('flexicon')): the_row(); 
                    $layout = get_row_layout();
                ?>
                  <?php if ($layout === 'title_layout') : ?>
                    <h3 class="relative font-bold text-display-16 z-[1] text-[#ffffff]">
                      <?php echo esc_html(get_sub_field('title')); ?>
                    </h3>
                  <?php endif; ?>

                  <?php if ($layout === 'description_layout') : ?>
                    <div class="relative flex flex-col gap-[20px] pt-[20px] z-[1] text-[#ffffff]"> 
                      <?php while (have_rows('description_repeater')) : the_row(); ?>
                        <?php if (get_sub_field('description')) : ?>
                          <p class="text-display-24"><?php echo esc_html(get_sub_field('description')); ?></p>
                        <?php endif; ?>
                      <?php endwhile; ?>
                    </div>
                  <?php endif; ?>

                  <?php if ($layout === 'image_layout') : ?>
                      <?php if (get_sub_field('image')) : ?>
                          <img class="absolute w-full h-full object-cover z-0 top-0 left-0" src="<?php echo get_sub_field('image'); ?>" alt="hero image">
                      <?php endif; ?>
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
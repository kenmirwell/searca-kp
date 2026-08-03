<?php if (get_sub_field('section_class') === '3rd-main-topic') : ?>
  <?php if (have_rows('flexicon_repeater')) : ?>
    <?php while (have_rows('flexicon_repeater')) : the_row(); ?>
      <?php if (get_sub_field('class_name') === 'main-topic-title') : ?>
        <?php if (have_rows('inner_section_repeater')) : ?>
          <div class="flex flex-col">
            <?php while (have_rows('inner_section_repeater')) : the_row(); ?>
              <div class="pb-[40px]">
                <?php while (have_rows('flexicon')): the_row(); 
                    $layout = get_row_layout();
                ?>
                  <?php if ($layout === 'title_layout') : ?>
                    <h3 class="font-bold text-display-32">
                      <?php echo esc_html(get_sub_field('title')); ?>
                    </h3>
                  <?php endif; ?>

                  <?php if ($layout === 'description_layout') : ?>
                    <div class="flex flex-col gap-[20px]"> 
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
      
      <?php if (get_sub_field('class_name') === 'cards-group') : ?>
        <?php if (have_rows('inner_section_repeater')) : ?>
          <div class="grid grid-cols-2 md:grid-cols-1 gap-[20px] w-full items-start">
            <?php while (have_rows('inner_section_repeater')) : the_row(); ?>
              <div class="rounded-2xl p-[40px] bg-[#EBF2EC] border border-[#D3DBD5]">
                <?php while (have_rows('flexicon')): the_row(); 
                    $layout = get_row_layout();
                ?>
                  <?php if ($layout === 'title_layout') : ?>
                    <h3 class="font-bold text-[15px] uppercase tracking-[0.5px] pb-[20px]">
                      <?php echo esc_html(get_sub_field('title')); ?>
                    </h3>
                  <?php endif; ?>

                  <?php if ($layout === 'description_layout') : ?>
                    <ul class="flex flex-col gap-[16px]"> 
                      <?php while (have_rows('description_repeater')) : the_row(); ?>
                        <?php if (get_sub_field('description')) : ?>
                          <li class="pl-[16px] relative before:content-['·'] before:absolute before:left-0 before:top-0 before:text-[20px] before:leading-[1.2]">
                            <?php echo esc_html(get_sub_field('description')); ?>
                          </li>
                        <?php endif; ?>
                      <?php endwhile; ?>
                    </ul>
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
<?php if (get_sub_field('section_class') === '4th-main-topic') : ?>
  <?php if (have_rows('flexicon_repeater')) : ?>
    <?php while (have_rows('flexicon_repeater')) : the_row(); ?>
      <?php if (get_sub_field('class_name') === 'main-topic-title') : ?>
        <?php if (have_rows('inner_section_repeater')) : ?>
          <div class="flex flex-col">
            <?php while (have_rows('inner_section_repeater')) : the_row(); ?>
              <div class="pb-[20px]">
                <?php while (have_rows('flexicon')): the_row(); 
                    $layout = get_row_layout();
                ?>
                  <?php if ($layout === 'title_layout') : ?>
                    <h3 class="font-bold text-display-24 md:text-display-32">
                      <?php echo esc_html(get_sub_field('title')); ?>
                    </h3>
                  <?php endif; ?>

                  <?php if ($layout === 'description_layout') : ?>
                    <div class="pt-[20px]"> 
                        <ul class="list-disc list-inside flex flex-col gap-[20px]">
                            <?php while (have_rows('description_repeater')) : the_row(); ?>
                                <?php if (get_sub_field('description')) : ?>
                                    <?php if (get_sub_field('class_name') === 'dot-bullet') : ?>
                                        <li class=""><?php echo esc_html(get_sub_field('description')); ?></li>
                                    <?php else : ?>
                                        <p><?php echo esc_html(get_sub_field('description')); ?></p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                  <?php endif; ?>
                  
                <?php endwhile; ?>
              </div>
            <?php endwhile; ?>
          </div>
        <?php endif; ?>
      <?php endif; ?>  
      
      <?php if (get_sub_field('class_name') === 'bullet-group') : ?>
        <?php if (have_rows('inner_section_repeater')) : ?>
          <div class="gap-[20px] w-full items-start">
            <?php while (have_rows('inner_section_repeater')) : the_row(); ?>
              <div class="">
                <?php while (have_rows('flexicon')): the_row(); 
                    $layout = get_row_layout();
                ?><?php if ($layout === 'description_layout') : ?>
                    
                    <ul class="flex flex-col gap-[16px] pl-[20px]"> 
                      <?php while (have_rows('description_repeater')) : the_row(); ?>
                        <?php if (get_sub_field('description')) : ?>
                          <li class="list-disc">
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
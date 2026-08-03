<?php if (get_sub_field('section_class') === '5th-main-topic') : ?>
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
                    <h3 class="font-bold text-display-32">
                      <?php echo esc_html(get_sub_field('title')); ?>
                    </h3>
                  <?php endif; ?>

                  <?php if ($layout === 'description_layout') : ?>
                    <div class="flex flex-col gap-[20px] pt-[10px]"> 
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
      <!-- Bulleted -->
      <?php if (get_sub_field('class_name') === 'bullet-group') : ?>
        <?php if (have_rows('inner_section_repeater')) : ?>
          <div class="grid grid-cols-2 md:grid-cols-1 gap-[20px] w-full items-start">
            <?php while (have_rows('inner_section_repeater')) : the_row(); ?>
              <div class="">
                <?php while (have_rows('flexicon')): the_row(); 
                    $layout = get_row_layout();
                ?>
                  <?php if ($layout === 'bulleted_text_layout') : ?>
                    <div class="flex gap-[20px] pb-[20px]">
                      <?php $icon = get_sub_field('icon'); ?>
                      <?php if ($icon) : ?>
                          <div class="">
                              <img src="<?php echo esc_url(is_array($icon) ? $icon['url'] : $icon); ?>"
                                  alt="<?php echo esc_attr(is_array($icon) ? $icon['alt'] : ''); ?>">
                          </div>
                      <?php endif; ?>
                      
                      <?php if (get_sub_field('bullet')) : ?>
                          <div class="flex justify-center items-center w-[30px] h-[30px] bg-[#EBF2EC] rounded-xl">
                              <span class=""><?php echo esc_html(get_sub_field('bullet')); ?></span>
                          </div>
                      <?php endif; ?>

                      <div class="flex flex-col gap-[10px]">
                        <?php if (get_sub_field('text')) : ?>
                            <div class="">
                                <h4 class="text-display-24 font-bold"><?php echo esc_html(get_sub_field('text')); ?></h4>
                            </div>
                        <?php endif; ?>

                        <?php while (have_rows('description_repeater')) : the_row(); ?>
                          <?php if (get_sub_field('description')) : ?>
                            <p><?php echo esc_html(get_sub_field('description')); ?></p>
                          <?php endif; ?>
                        <?php endwhile; ?>
                      </div>
                    </div>
                  <?php endif; ?>
                  
                <?php endwhile; ?>
              </div>
            <?php endwhile; ?>
          </div>
        <?php endif; ?>
      <?php endif; ?>   

      <?php if (get_sub_field('class_name') === 'simple-text') : ?>
        <?php if (have_rows('inner_section_repeater')) : ?>
          <div class="grid grid-cols-2 md:grid-cols-1 gap-[20px] w-full items-start">
            <?php while (have_rows('inner_section_repeater')) : the_row(); ?>
              <div class="">
                <?php while (have_rows('flexicon')): the_row(); 
                    $layout = get_row_layout();
                ?>
                  <?php if ($layout === 'title_layout') : ?>
                      <p class="">
                        <?php echo esc_html(get_sub_field('title')); ?>
                      </p>
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
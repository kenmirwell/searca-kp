<?php if (get_sub_field('section_class') === '3rd-main-topic') : ?>
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
          <div class="grid grid-cols-1 md:grid-cols-2 gap-[20px] w-full items-start">
            <?php while (have_rows('inner_section_repeater')) : the_row(); ?>
              <div class="rounded-2xl p-[40px] bg-[#EBF2EC] border border-[#D3DBD5]">

                <?php
                  // Pre-scan: check if this card's flexicon rows include a text_layout
                  $has_text_layout = false;
                  if (have_rows('flexicon')) {
                      while (have_rows('flexicon')) : the_row();
                          if (get_row_layout() === 'text_layout') {
                              $has_text_layout = true;
                          }
                      endwhile;
                  }
                ?>

                <?php while (have_rows('flexicon')): the_row(); 
                    $layout = get_row_layout();
                ?>
                 <?php if ($layout === 'title_layout') : ?>
                    <?php if ($has_text_layout) : ?>
                        <h3 class="font-normal text-[#1F1F1F] text-[14px] uppercase tracking-[0.5px] pb-[10px] text-gray-500">
                            <?php echo esc_html(get_sub_field('title')); ?>
                        </h3>
                    <?php else : ?>
                        <h3 class="font-bold text-[15px] uppercase tracking-[0.5px] pb-[20px]">
                            <?php echo esc_html(get_sub_field('title')); ?>
                        </h3>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if ($layout === 'text_layout') : ?>
                    <h3 class="font-bold text-[15px] uppercase tracking-[0.5px] pb-[20px]">
                        <?php echo esc_html(get_sub_field('text')); ?>
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

      <?php if (get_sub_field('class_name') === '3rd-subtopic') : ?>
        <?php if (have_rows('inner_section_repeater')) : ?>
          <div class="flex flex-col pt-[20px]">
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
      
    <?php endwhile; ?>
  <?php endif; ?>
<?php endif; ?>
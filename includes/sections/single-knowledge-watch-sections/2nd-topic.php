<?php if (get_sub_field('section_class') === '2nd-main-topic') : ?>
  <?php if (have_rows('flexicon_repeater')) : ?>
    <?php while (have_rows('flexicon_repeater')) : the_row(); ?>
      <?php if (get_sub_field('title') === "2nd Main Topic") : ?>
        
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
                          <div class="flex justify-center items-center min-w-[30px] w-[30px] h-[30px] bg-[#BE9D38] rounded-full">
                              <span class="text-[#ffffff]"><?php echo esc_html(get_sub_field('bullet')); ?></span>
                          </div>
                      <?php endif; ?>

                      <?php if (get_sub_field('text')) : ?>
                          <div class="">
                              <h4 class="text-display-18 md:text-display-24 font-bold"><?php echo esc_html(get_sub_field('text')); ?></h4>
                          </div>
                      <?php endif; ?>
                    </div>
                  <?php endif; ?>

                  <?php if ($layout === 'text_layout') : ?>
                    <p class="text-display-16 pt-[20px]">
                      <?php echo esc_html(get_sub_field('text')); ?>
                    </p>
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

                  <?php if ($layout === 'image_layout') : ?>
                      <div class="rounded-2xl overflow-hidden">
                          <?php if (get_sub_field('image')) : ?>
                              <img src="<?php echo esc_url(get_sub_field('image')); ?>" alt="image" class="w-full h-[200px] md:h-[475px] object-cover">
                          <?php endif; ?>
                      </div>
                  <?php endif; ?>

                <?php if ($layout === 'inner_group_layout') : ?>
                      <div class="p-[40px] rounded-lg border-l border-[#B39354] bg-gradient-to-r from-[#B39354]/[0.24] to-[#B39354]/0 my-[30px]">
                          <?php if (have_rows('text')) : ?>
                              <?php while (have_rows('text')): the_row();
                                  $inner_most_layout = get_row_layout();
                              ?>
                                  <?php if ($inner_most_layout === 'text_layout') : ?>
                                      <div class="rounded-2xl overflow-hidden pb-[5px]">
                                          <?php if (get_sub_field('text') && get_sub_field('class_name') === "key-question") : ?>
                                              <p class="text-[#B39354]"><?php echo esc_html(get_sub_field('text')); ?></p>
                                          <?php endif; ?>
                                      </div>
                                      <div class="rounded-2xl overflow-hidden">
                                          <?php if (get_sub_field('text') && get_sub_field('class_name') !== "key-question") : ?>
                                              <p class=""><?php echo esc_html(get_sub_field('text')); ?></p>
                                          <?php endif; ?>
                                      </div>
                                  <?php endif; ?>
                              <?php endwhile; ?>
                          <?php endif; ?>
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
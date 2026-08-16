<?php if (get_sub_field('section_class') === 'from-tech-availability') : ?>
  <?php if (have_rows('flexicon_repeater')) : ?>
    <?php while (have_rows('flexicon_repeater')) : the_row(); ?>
      <?php if (have_rows('inner_section_repeater')) : ?>
        <?php while (have_rows('inner_section_repeater')) : the_row(); ?>
          <?php while (have_rows('flexicon')): the_row(); 
            $layout = get_row_layout();
          ?>
            <?php if ($layout === 'title_layout') : ?>
              <h3 class="font-semibold text-display-24 md:text-display-32">
                <?php echo esc_html(get_sub_field('title')); ?>
              </h3>
            <?php endif; ?>
            <?php if ($layout === 'text_layout') : ?>
              <p class="font-light text-display-16">
                <?php echo esc_html(get_sub_field('text')); ?>
              </p>
            <?php endif; ?>
            <?php if ($layout === 'bulleted_text_repeater') : ?>
              <?php if (have_rows('bullet_repeater')) : ?>
                  <div class="flex flex-col gap-[20px] pt-[50px]">
                      <?php while (have_rows('bullet_repeater')) : the_row(); ?>
                          <div class="flex flex-col gap-[5px] pb-[20px]">
                              <div class="flex gap-[10px] items-start">
                                  <div class="pt-[5px]">
                                      <?php if (get_sub_field('icon')) : ?>
                                          <img src="<?php echo esc_url(get_sub_field('icon')); ?>" alt="hero background" class="w-full h-full object-cover">
                                      <?php endif; ?>
                                      <?php if (get_sub_field('bullet')) : ?>
                                          <div class="h-[30px] w-[30px] bg-[#EBF2EC] rounded-lg flex justify-center items-center">
                                              <span class="text-[#008C67] font-semibold"><?php echo esc_html(get_sub_field('bullet')); ?></span>
                                          </div>
                                      <?php endif; ?>
                                  </div>
                                  <div>
                                    <?php if (get_sub_field('title')) : ?>
                                      <h6 class="font-semibold text-display-20"><?php echo esc_html(get_sub_field('title')); ?></h6>
                                    <?php endif; ?>
                                    <?php if (get_sub_field('description')) : ?>
                                      <div class="[&_p]:mb-4 font-light">
                                          <?php echo wp_kses_post(get_sub_field('description')); ?>
                                      </div>
                                    <?php endif; ?>
                                  </div>
                              </div>
                          </div>
                      <?php endwhile; ?>
                  </div>
              <?php endif; ?>
          <?php endif; ?>
          <?php endwhile; ?>
        <?php endwhile; ?>
      <?php endif; ?>
    <?php endwhile; ?>
  <?php endif; ?>
<?php endif; ?>

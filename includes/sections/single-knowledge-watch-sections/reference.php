<?php if (get_sub_field('section_class') === 'reference') : ?>
  <?php if (have_rows('flexicon_repeater')) : ?>
    <?php while (have_rows('flexicon_repeater')) : the_row(); ?>
      <?php if (get_sub_field('class_name') === 'reference') : ?>
        <?php if (have_rows('inner_section_repeater')) : ?>
          <div class="flex flex-col">
            <?php while (have_rows('inner_section_repeater')) : the_row(); ?>
              <div class="pb-[40px]">
                <?php while (have_rows('flexicon')): the_row(); 
                    $layout = get_row_layout();
                ?>
                  <?php if ($layout === 'title_layout') : ?>
                    <div class="flex justify-items items-center gap-[10px] pt-[40px] pb-[20px]">
                      <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.0207 10.9325L14.3919 4.97125C14.7329 4.50565 14.9382 3.95472 14.9852 3.37954C15.0322 2.80437 14.919 2.22741 14.6582 1.71262C14.3974 1.19783 13.9991 0.765321 13.5075 0.46303C13.0159 0.160739 12.4503 0.000475719 11.8732 3.77118e-06H3.12628C2.54863 -0.000894038 1.98205 0.158532 1.48963 0.460535C0.9972 0.762538 0.598243 1.19527 0.337163 1.71056C0.0760832 2.22585 -0.0368767 2.80349 0.0108585 3.37917C0.0585928 3.95486 0.265149 4.506 0.607534 4.97125L4.97878 10.9325C5.26907 11.3281 5.6484 11.6497 6.08609 11.8714C6.52378 12.0931 7.00752 12.2086 7.49816 12.2086C7.98879 12.2086 8.47254 12.0931 8.91023 11.8714C9.34792 11.6497 9.72725 11.3281 10.0175 10.9325H10.0207Z" fill="black"/>
                      </svg>

                      <h3 class="font-bold text-display-18">
                        <?php echo esc_html(get_sub_field('title')); ?>
                      </h3>
                    </div>
                  <?php endif; ?>

                  <?php if ($layout === 'multiple_text_in_paragraph') : ?>
                    <div class="flex flex-col gap-[20px]">
                      <?php while (have_rows('repeater_field')) : the_row(); ?>
                        <?php $text_1 = get_sub_field('text_1'); ?>
                        <?php $text_2 = get_sub_field('text_2'); ?>
                        <?php if ($text_1 || $text_2) : ?>
                          <p class="font-light">
                            <?php if ($text_1) : ?>
                              <?php echo esc_html($text_1); ?>
                            <?php endif; ?>
                            <?php if ($text_2) : ?>
                              <a class="text-[#008C67]" href="<?php echo esc_url($text_2); ?>" target="_blank" rel="noopener">
                                <?php echo esc_html($text_2); ?>
                              </a>
                            <?php endif; ?>
                          </p>
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
<?php if (get_sub_field('id') === 'introduction') : ?>
  <?php if (get_sub_field('section_name') === 'At A Glance') : ?>
    <h3 class="font-bold text-display-42 pb-[20px]">
      <?php echo esc_html(get_sub_field('section_name')); ?>
    </h3>
  <?php endif; ?>
  <?php if (have_rows('flexicon_repeater')) : ?>
    <?php while (have_rows('flexicon_repeater')) : the_row(); ?>
      <?php if (have_rows('inner_section_repeater')) : ?>
          <?php while (have_rows('inner_section_repeater')) : the_row(); ?>
            <div class="flow-root pb-[40px]">
              <?php while (have_rows('flexicon')): the_row(); 
                  $layout = get_row_layout();
              ?>
                <?php if ($layout === 'title_layout') : ?>
                  <?php if (get_sub_field('class_name') === 'Initial') : ?>
                    <h3 class="font-bold text-display-42 float-left pr-3">
                      <?php echo esc_html(get_sub_field('title')); ?>
                    </h3>
                  <?php endif; ?>
                <?php endif; ?>

                <?php if ($layout === 'wysiwyg_layout') : ?>
                  <?php if (get_sub_field('wysiwyg')) : ?>
                      <div class="[&_p]:mb-4 font-light">
                          <?php echo wp_kses_post(get_sub_field('wysiwyg')); ?>
                      </div>
                  <?php endif; ?>
                <?php endif; ?>
              <?php endwhile; ?>
            </div>
        <?php endwhile; ?>
      <?php endif; ?>
    <?php endwhile; ?>
  <?php endif; ?>
<?php endif; ?>

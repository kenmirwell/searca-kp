<?php if (have_rows('reference_repeater')) : ?>
    <div class="flex flex-wrap gap-[30px] mb-[20px]">
        <?php while (have_rows('reference_repeater')) : the_row();  ?>
          <div class="flex gap-[10px]">
              <?php if (get_sub_field('text')) : ?>
                <span class="font-light text-display-16">
                  <?php echo esc_html(get_sub_field('text')); ?>
                  <a class="font-semibold text-[#008C67] border-b-[1px] border-[#008C67]" href="<?php echo esc_html(get_sub_field('link')); ?>" class="font-light text-display-16">
                    <?php echo esc_html(get_sub_field('link')); ?>
                  </a>
                </span>
              <?php endif; ?>
          </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>
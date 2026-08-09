<style>
  .contact-reasons-item {
    border-right: solid 1px;
    border-color: #D7D7D7;
    padding-right: 50px;
  }

  @media (max-width: 767px) {
      .contact-reasons-item {
          border-right: 0;
          padding-right: 0;
          border-bottom: solid 1px;
          padding-bottom: 50px;
      }
  }
</style>
<div class="bg-[#EBF3EF]">
  <div class="flex items-center w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto z-[2]">
      <?php if (have_rows('contact_reasons_repeater')): ?>
        <div class="flex flex-col justify-between md:flex-row gap-[10px] md:gap-[40px]">
            <?php
                $total_rows = count(get_field('contact_reasons_repeater'));
            ?>
            <?php while (have_rows('contact_reasons_repeater')): the_row(); ?>
                <?php
                    $current_index = get_row_index(); // 1-based position
                    $is_last = ($current_index === $total_rows);
                ?>
                <div class="repeater-item flex flex-col gap-[20px] py-[40px] <?php echo $is_last ? '' : 'contact-reasons-item'; ?>">
                    <?php if (get_sub_field('title')) : ?>
                        <h6 class="font-semibold text-display-20"><?php echo esc_html(get_sub_field('title')); ?></h6>
                    <?php endif; ?>
                    <?php if (get_sub_field('description')) : ?>
                        <p class="font-normal text-display-14"><?php echo esc_html(get_sub_field('description')); ?></p>
                    <?php endif; ?>
                    <?php if (get_sub_field('button_name')) : ?>
                        <a class="font-semibold border-b-[1px] text-display-18" href="<?php echo esc_url(get_sub_field('button_link')); ?>" target="_blank" rel="noopener">
                            <?php echo esc_html(get_sub_field('button_name')); ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
      <?php endif; ?>
  </div>
</div>

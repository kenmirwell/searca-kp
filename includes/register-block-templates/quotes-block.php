<div class="mb-[40px]">
    <?php if (get_field('image')) : ?>
    <div class="relative p-[40px] rounded-2xl overflow-hidden">
        <div class="relative z-[1] font-light">
            <?php if (get_field('title')) : ?>
              <div class="flex gap-[10px] items-center pb-[20px]" style="color: <?php echo esc_html(get_field('title_color')); ?>; ">
                  <div class="w-[70px] h-[1px] bg-[#ffffff]"></div>
                  <span class="text-[12px]"><?php echo esc_html(get_field('title')); ?></span>
              </div>
            <?php endif; ?>
            <?php if (get_field('content')) : ?>
                <div class="font-light" style="color: <?php echo esc_html(get_field('content_color')); ?>; ">
                    <?php echo wp_kses_post(get_field('content')); ?>
                </div>
            <?php endif; ?>
        </div>
        <img class="absolute w-full h-full object-cover top-0 z-0 left-0" src="<?php echo esc_url(get_field('image')); ?>" alt="background image">
    </div>
    <?php else : ?>
    <div class="relative px-[40px] rounded-2xl overflow-hidden">
        <div class="relative z-[1] font-light">
            <?php if (get_field('title')) : ?>
              <div class="flex gap-[10px] items-center pb-[20px]" style="color: <?php echo esc_html(get_field('title_color')); ?>; ">
                  <div class="w-[70px] h-[1px] bg-[#ffffff]"></div>
                  <span class="text-[12px]"><?php echo esc_html(get_field('title')); ?></span>
              </div>
            <?php endif; ?>
            <?php if (get_field('content')) : ?>
                <div class="font-light" style="color: <?php echo esc_html(get_field('content_color')); ?>; ">
                    <?php echo wp_kses_post(get_field('content')); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
      <?php endif; ?>
</div>
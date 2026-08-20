<div class="mb-[40px]">
    <div class="relative p-[40px] rounded-2xl overflow-hidden">
        <div class="relative z-[1] text-white font-light">
            <?php if (get_field('title')) : ?>
              <div class="flex gap-[10px] items-center pb-[20px]">
                  <div class="w-[70px] h-[1px] bg-[#ffffff]"></div>
                  <span class="text-[12px]"><?php echo esc_html(get_field('title')); ?></span>
              </div>
            <?php endif; ?>
            <?php if (get_field('content')) : ?>
                <div class="[&_p]:mb-4 font-light">
                    <?php echo wp_kses_post(get_field('content')); ?>
                </div>
            <?php endif; ?>
        </div>
        <?php if (get_field('image')) : ?>
          <img class="absolute w-full h-full object-cover top-0 z-0 left-0" src="<?php echo esc_url(get_field('image')); ?>" alt="background image">
        <?php endif; ?>
      </div>
</div>
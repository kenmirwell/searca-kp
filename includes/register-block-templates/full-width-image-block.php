<div class="pt-[20px]">
    <?php if (get_field('image')) : ?>
      <div class="rounded-2xl overflow-hidden">
        <img src="<?php echo esc_url(get_field('image')); ?>" alt="image" class="w-full h-[200] md:h-[475px] object-cover">
      </div>
    <?php endif; ?>
</div>

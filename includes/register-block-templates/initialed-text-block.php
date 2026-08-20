<div class="pb-[20px]"> 
    <?php if (get_field('initial')) : ?>
      <h3 class="font-bold text-display-42 float-left pr-3">
        <?php echo esc_html(get_field('initial')); ?>
      </h3>
    <?php endif; ?>

      <?php if (get_field('content')) : ?>
        <div class="[&_p]:mb-4 font-light">
            <?php echo wp_kses_post(get_field('content')); ?>
        </div>
    <?php endif; ?>
</div>

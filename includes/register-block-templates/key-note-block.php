<?php
    $bg_color = get_field('background_color'); // e.g. "#B39354"

    // Convert hex to RGB
    $hex = ltrim($bg_color, '#');
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));

    $style = "background-image: linear-gradient(to right, rgba({$r}, {$g}, {$b}, 0.24), rgba({$r}, {$g}, {$b}, 0));";
?>

<div class="mb-[20px] p-[40px] rounded-lg border-l border-[#B39354]" style="<?php echo $style; ?>">
    <div class="flex flex-col gap-[10px]">
      <?php if (get_field('bullet_icon')) : ?>
          <div class="relative w-[100%]">
              <img class="w-full h-full" src="<?php echo esc_url(get_field('bullet_icon')); ?>" alt="">
          </div>
      <?php else : ?>
        <?php if (get_field('bullet_label')) : ?>
          <div class="flex items-center justify-center relative w-[30px] h-[30px]" 
              style="background-color: <?php echo esc_html(get_field('bullet_background_color')); ?>; 
              border-radius: <?php echo esc_html(get_field('bullet_border_radius')); ?>px">
              <p class="font-bold absolute text-left text-[24px]" style="color: <?php echo esc_html(get_field('bullet_label_color')); ?>"><?php echo esc_html(get_sub_field('bullet_label')); ?></p>
          </div>
        <?php endif; ?>
      <?php endif; ?>
      
      <?php if (get_field('label')) : ?>
      <div>
        <p class="text-display-14"><?php echo esc_html(get_field('label')); ?></p>
      </div>
      <?php endif; ?>

      <?php if (get_field('title')) : ?>
      <div>
          <h3 class="font-semibold text-display-14" style="color: <?php echo esc_html(get_field('title_color')); ?>"><?php echo esc_html(get_field('title')); ?></h3>
      </div>
      <?php endif; ?>

      <?php if (get_field('content')) : ?>
      <div>
        <?php echo wp_kses_post(get_field('content')); ?>
      </div>
      <?php endif; ?>
  </div>
</div>
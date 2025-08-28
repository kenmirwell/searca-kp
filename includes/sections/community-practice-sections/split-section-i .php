<?php 
$page_id = get_query_var('page_id');
$group = get_field('split_section_group_i', $page_id) ?? [];

if ($group) :
    $alignment_group = $group['alignment_color_and_image'] ?? [];
    $image_alignment = $alignment_group['split_section_image_alignment'] ?? 'left';
    $bg_color = strtolower($alignment_group['split_section_background_color'] ?? '#ffffff');
    $section_image = $alignment_group['split_section_image'] ?? '';

    $title_desc_group = $group['split_section_title_description'] ?? [];
    $section_title = $title_desc_group['split_section_title'] ?? '';
    $descriptions = $title_desc_group['split_section_descriptions'] ?? [];
    $points = $title_desc_group['split_section_points'] ?? [];



    ob_start(); 
?>
  <div class="w-[100%] md:w-[50%] flex items-center">
    <div class="">
        <div class="<?php echo $bg_color === '#096936' ? 'text-white' : ''; ?>">
            <h2 class="text-display-18 md:text-display-24 lg:text-display-42 font-bold"><?php echo esc_html($section_title); ?></h2>
        </div>
        <div class="<?php echo $bg_color === '#096936' ? 'text-white' : ''; ?> pt-[10px] text-display-14 md:text-display-16"><?php echo wp_kses_post($descriptions); ?></div>


        <?php if (!empty($points)) : ?>
            <?php
                // Split points into two chunks: first 3, then the rest
                $chunks = [
                    array_slice($points, 0, 3),
                    array_slice($points, 3)
                ];
            ?>

            <div class="flex flex-col lg:flex-row  justify-between pb-[20px] lg:pb-[0px] pt-[30px] border-t-[1px] border-[#D4D4D4]">
                <?php foreach ($chunks as $chunk) : ?>
                    <ul class="flex flex-col w-full gap-[5px] lg:gap-[20px] lg:py-[20px] lg:pt-[30px] agpractices-list">
                        <?php foreach ($chunk as $point) :
                            $type = $point['bullet_type'] ?? 'check';
                            $color = $point['bullet_color'] ?? '#096936';
                        ?>
                            <li class="flex flex-col items-start gap-[10px]">
                                <?php if (!empty($point['point_title'])) : ?>
                                    <div class="flex gap-[10px] items-center">
                                        <?php bullet_template('bullet-template', compact('type', 'color')); ?>
                                        <h6 class="<?php echo $bg_color === '#096936' ? 'text-white' : ''; ?> font-[700] text-display-14 md:text-display-16">
                                            <?php echo wp_kses_post($point['point_title']); ?>
                                        </h6>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($point['point_description'])) : ?>
                                    <div class="flex gap-[10px]">
                                        <div class="<?php echo $bg_color === '#096936' ? 'text-white' : ''; ?> text-display-14 md:text-display-16">
                                            <?php echo wp_kses_post($point['point_description']); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>


        <div class="flex">
            <?php
                button_template('common-button', array(
                    'title' => "Download brochure",
                    'url' => "#",
                    'color' => 'green_to_gold'
                ))
            ?>
        </div>
    </div>
  </div>
<?php $text_content = ob_get_clean(); ?>

<?php ob_start(); ?>
  <div class="w-[100%] md:w-[50%] rounded-[20px] overflow-hidden h-max">
      <?php if (!empty($section_image)) : ?>
          <img class="w-full h-full object-cover h-max" src="<?php echo esc_url($section_image); ?>" alt="split image">
      <?php endif; ?>
  </div>
<?php $image_content = ob_get_clean(); ?>

<div style="background-color: <?php echo esc_attr($bg_color); ?>;" class="overflow-hidden">
  <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto py-[40px]">
      <div class="hidden md:flex flex-col md:flex-row gap-[10px] md:gap-[50px] justify-between">
          <?php echo $image_alignment === 'right' ? $text_content . $image_content : $image_content . $text_content; ?>
      </div>
      <div class="flex md:hidden flex-col md:flex-row gap-[10px] md:gap-[50px] justify-between">
          <?php echo $image_alignment === 'right' ? $image_content . $text_content : $image_content . $text_content; ?>
      </div>
  </div>
</div>
<?php endif; ?>

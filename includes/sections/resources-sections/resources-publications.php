<?php 
$page_id = get_query_var('page_id');

if (have_rows('split_section', $page_id)) : ?>
    <div class="relative">
        <?php while (have_rows('split_section', $page_id)) : the_row();

            $group = get_sub_field('alignment_color_and_image') ?? [];
            $image_alignment = $group['split_section_image_alignment'] ?? 'left';
            $bg_color = strtolower($group['split_section_background_color'] ?? '#ffffff');
            $section_image = $group['split_section_image'] ?? '';

            $title_desc_group = get_sub_field('split_section_title_description') ?? [];
            $section_title = $title_desc_group['split_section_title'] ?? '';
            $descriptions = $title_desc_group['split_section_descriptions'] ?? [];
            $points = $title_desc_group['split_section_points'] ?? [];

            ob_start(); ?>
                <div class="w-[50%] flex items-center">
                    <div class="">
                        <div class="<?php echo $bg_color === '#096936' ? 'text-white' : ''; ?>">
                            <h2 class="text-display-24 lg:text-display-42 font-bold"><?php echo esc_html($section_title); ?></h2>
                        </div>
                        <?php foreach ($descriptions as $desc) : ?>
                            <p class="<?php echo $bg_color === '#096936' ? 'text-white' : ''; ?> pt-[10px]"><?php echo esc_html($desc['split_section_description']); ?></p>
                        <?php endforeach; ?>

                        <?php if (!empty($points)) : ?>
                            <ul class="flex flex-col w-full gap-[5px] lg:gap-[20px] py-[20px] lg:pt-[30px] agpractices-list">
                                <?php foreach ($points as $point) : 
                                    $type = $point['bullet_type'] ?? 'check';
                                    $color = $point['bullet_color'] ?? '#096936';
                                ?>
                                    <li class="flex flex-col items-start gap-[10px]">
                                        <?php if (!empty($point['point_title'])) : ?>
                                            <div class="flex gap-[10px] items-center">
                                                <?php bullet_template('bullet-template', compact('type', 'color')); ?>
                                                <h6 class="<?php echo $bg_color === '#096936' ? 'text-white' : ''; ?> font-[700]"><?php echo wp_kses_post($point['point_title']); ?></h6>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($point['point_description'])) : ?>
                                            <div class="flex gap-[10px]">
                                                <?php
                                                    $type = $point['bullet_type'] ?? 'check';
                                                    $color = $point['bullet_color'] ?? '#096936';

                                                    bullet_template('bullet-template', array(
                                                        'type' => $type,
                                                        'color' => $color
                                                    ));
                                                ?>
                                                <div class="<?php echo $bg_color === '#096936' ? 'text-white' : ''; ?>">
                                                    <?php echo wp_kses_post($point['point_description']); ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            <?php $text_content = ob_get_clean(); ?>

            <?php ob_start(); ?>
                <div class="w-[50%] rounded-[20px] overflow-hidden">
                    <?php if (!empty($section_image)) : ?>
                        <img class="w-full h-full object-cover" src="<?php echo esc_url($section_image); ?>" alt="split image">
                    <?php endif; ?>
                </div>
            <?php $image_content = ob_get_clean(); ?>

            <div style="background-color: <?php echo esc_attr($bg_color); ?>;" class="overflow-hidden">
                <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto py-[40px]">
                    <div class="flex flex-col lg:flex-row gap-[50px] justify-between">
                        <?php echo $image_alignment === 'right' ? $text_content . $image_content : $image_content . $text_content; ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>

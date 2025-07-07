<?php 
    $page_id = get_query_var('page_id');
    $group = get_field('split_section', $page_id);

    $inner_group = $group['split_section_title_description'] ?? null;
?>

<div class="relative">
    <div class="bg-[#ffffff] overflow-hidden">
        <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
            <div class="flex flex-col-reverse md:flex-row relative py-[100px] justify-start gap-[50px] items-start">

                <!-- LEFT IMAGE COLUMN -->
                <div class="w-[100%] md:w-[90%] lg:w-[50%]">
                    <?php if ($page_id && !empty($group['split_section_image'])) : ?>
                        <div class="w-full">
                            <img 
                                class="w-full h-full object-cover rounded-lg" 
                                src="<?php echo esc_url($group['split_section_image']); ?>" 
                                alt="split image"
                            >
                        </div>
                    <?php endif; ?>
                </div>

                <!-- RIGHT TEXT COLUMN -->
                <div class="w-[100%] md:w-[90%] lg:w-[50%] flex flex-col gap-[20px] text-left items-left mx-auto z-[2]">
                    <div class="w-full">
                        <?php if (!empty($inner_group['split_section_title'])) : ?>
                            <div class="text-[#1f1f1f] text-display-24 lg:text-display-42 font-bold">
                                <h2><?php echo esc_html($inner_group['split_section_title']); ?></h2>
                            </div>
                        <?php endif; ?>

                        <div class="flex flex-col gap-[20px] pt-[20px] text-[#2f2f2f] text-display-12 md:text-display-16">

                            <!-- DESCRIPTION -->
                            <?php if (!empty($inner_group['split_section_descriptions'])) : ?>
                                <?php foreach ($inner_group['split_section_descriptions'] as $desc) : ?>
                                    <p><?php echo esc_html($desc['split_section_description']); ?></p>
                                <?php endforeach; ?>
                            <?php endif; ?>

                            <!-- BULLET POINTS -->
                            <ul class="flex flex-col w-full gap-[5px] lg:gap-[20px] py-[20px] lg:pt-[30px] agpractices-list">
                                <?php if (!empty($inner_group['split_section_points'])) : ?>
                                    <?php foreach ($inner_group['split_section_points'] as $point) : ?>
                                        <li class="flex flex-col items-start gap-[10px]">
                                            <div class="flex gap-[10px] items-center">
                                                  <?php
                                                    $type = $point['bullet_type'] ?? 'check';
                                                    $color = $point['bullet_color'] ?? '#096936';

                                                    bullet_template('bullet-template', array(
                                                        'type' => $type,
                                                        'color' => $color
                                                    ));
                                                  ?>
                                                <h6 class="font-[700]"><?php echo esc_html($point['point_title']); ?></h6>
                                            </div>
                                            <p><?php echo esc_html($point['point_description']); ?></p>
                                        </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <!-- BUTTON -->
                        <div class="flex">
                            <?php
                                button_template('common-button', array(
                                    'title' => "Learn More About CAPRI",
                                    'url' => "/agricultural-digital-tools",
                                    'color' => 'gold_to_green'
                                ));
                            ?>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

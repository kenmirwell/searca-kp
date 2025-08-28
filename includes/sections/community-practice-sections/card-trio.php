<?php 
    $page_id = get_query_var('page_id');
    $group = get_field('image_cards_trio_group', $page_id);
?>

<div class="py-[50px] lg:py-[100px]">
    <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">

        <!-- Header -->
        <div class="flex flex-col lg:flex-row justify-center pb-[50px]">
            <div class="flex flex-col lg:gap-[20px]">
                <?php if (!empty($group['image_cards_container_title'])) : ?>
                    <div class="font-bold">
                        <h2 class="w-[100%] lg:w-[500px] text-display-24 lg:text-display-42 text-[#1f1f1f] pb-[10px]">
                            <?php echo esc_html($group['image_cards_container_title']); ?>
                        </h2>
                    </div>
                <?php endif; ?>

                <?php if (!empty($group['image_cards_container_description'])) : ?>
                    <div>
                        <p class="text-display-14 lg:text-display-16 text-[#1f1f1f]">
                            <?php echo esc_html($group['image_cards_container_description']); ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Button -->
            <div class="flex pt-[30px] lg:pt-[0px]">
                <?php
                    button_template('common-button', array(
                        'title' => "Register for Free",
                        'url' => "/agricultural-digital-tools",
                        'color' => 'green_to_gold'
                    ));
                ?>
            </div>
        </div>      

        <!-- Image Cards -->
        <div class="flex flex-col lg:flex-row gap-[50px] justify-between">
            <?php if (!empty($group['image_cards'])) : ?>
                <?php foreach ($group['image_cards'] as $card) : ?>
                    <div class="flex flex-col gap-[10px] w-[100%] lg:w-[33.33%] text-left border-t-[1px] border-[#C2C2C2] pt-[20px] lg:pt-[50px]">
                        <?php if (!empty($card['image_card_icon'])) : ?>
                            <img class="w-[30px] md:w-[50px]" src="<?php echo esc_url($card['image_card_icon']); ?>" alt="">
                        <?php endif; ?>

                        <div class="text-left">
                            <?php if (!empty($card['image_card_title'])) : ?>
                                <h6 class="font-bold ttext-display-18 md:text-display-24 text-[#1f1f1f]">
                                    <?php echo esc_html($card['image_card_title']); ?>
                                </h6>
                            <?php endif; ?>
                            
                            <?php if (!empty($card['image_card_description'])) : ?>
                                <p class="text-display-14 md:text-display-16 text-[#1f1f1f]">
                                    <?php echo esc_html($card['image_card_description']); ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <?php if (!empty($card['image_card_image'])) : ?>
                            <div class="h-[200px] md:h-[320px] lg:h-[450px] rounded-xl overflow-hidden">
                                <img class="w-full h-full object-cover" src="<?php echo esc_url($card['image_card_image']); ?>" alt="<?php the_title(); ?>">
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?> 
        </div>

    </div>
</div>

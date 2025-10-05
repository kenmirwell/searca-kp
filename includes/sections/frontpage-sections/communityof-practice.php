<?php 
    $page_id = get_query_var('page_id');
?>

<div class="py-[50px] lg:py-[100px]">
    <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
        <div class="flex flex-col lg:flex-row justify-center pb-[50px]">
            <div class="flex flex-col gap-[20px]">
                <?php if($page_id) : ?>
                    <?php if (get_field("image_cards_container_title", $page_id)) : ?>
                        <div class="font-bold">
                            <h2 class="w-[100%] lg:w-[500px] text-display-24 lg:text-display-42 text-[#1f1f1f] pb-[10px]"><?php echo get_field("image_cards_container_title", $page->ID); ?></h2>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if($page_id) : ?>
                    <?php if (get_field("image_cards_container_description", $page_id)) : ?>
                        <div class="">
                            <p class="text-[#1f1f1f]"><?php echo get_field("image_cards_container_description", $page_id); ?></p>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="flex">
                <?php
                    button_template('common-button', array(
                        'title' => "Learn More About COP",
                        'url' => "/community-of-practice",
                        'color' => 'green_to_gold'
                    ))
                ?>
            </div>
        </div>      
        <div class="flex flex-col lg:flex-row gap-[50px] justify-between">
            <?php if (have_rows('image_cards', $page_id)) : ?>
                <?php while (have_rows('image_cards', $page_id)) : the_row(); ?>
                    <!-- Loop through each row in the 'about_description' repeater -->
                    <div class="flex flex-col gap-[10px] w-[100%] md:w-[33.33%] text-left border-t-[1px] border-[#C2C2C2] pt-[50px]">
                        <div class="p-[10px] bg-[#E1EDE6] rounded-[8px] w-fit">
                            <img class="w-[30px]" src="<?php echo esc_url(get_sub_field('image_card_icon')); ?>" alt="">
                        </div>
                        <div class="text-left">
                            <h6 class="font-bold text-display-24 text-[#1f1f1f]"><?php echo esc_html(get_sub_field('image_card_title')); ?></h6>
                            <p class="text-[#1f1f1f]"><?php echo esc_html(get_sub_field('image_card_description')); ?></p>
                        </div>
                        <div class="h-[200px] md:h-[320px] lg:h-[450px] rounded-xl overflow-hidden">
                            <img class="w-full h-full object-cover" src="<?php echo esc_url(get_sub_field('image_card_image')); ?>" alt="<?php the_title(); ?>">
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?> 
        </div>
    </div>
</div>
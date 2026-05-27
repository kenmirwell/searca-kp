<?php 
    $page_id = get_query_var('page_id');
?>

<div class="py-[50px] lg:py-[100px]">
    <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto"> 
        <?php if($page_id) : ?>
            <?php if (get_field("image_cards_container_title", $page_id)) : ?>
                <div class="flex flex-col lg:flex-row justify-center pb-[50px]">
                    <div class="flex flex-col gap-[20px]">
                        <div class="font-bold">
                            <h2 class="w-[100%] lg:w-[500px] text-display-24 lg:text-display-42 text-[#1f1f1f] pb-[10px]"><?php echo get_field("image_cards_container_title", $page->ID); ?></h2>
                        </div>
                    </div>
                </div>    
            <?php endif; ?>
        <?php endif; ?>

        <?php if($page_id) : ?>
            <?php if (get_field("image_cards_container_description", $page_id)) : ?>
                <div class="flex flex-col lg:flex-row justify-center pb-[50px]">
                    <div class="flex flex-col gap-[20px]">
                        <div class="">
                            <p class="text-[#1f1f1f]"><?php echo get_field("image_cards_container_description", $page_id); ?></p>
                        </div>
                    </div>
                </div>     
            <?php endif; ?>
        <?php endif; ?>     
        <div class="flex flex-col md:flex-row gap-[50px] justify-between">
            <?php if (have_rows('image_cards', $page_id)) : ?>
                <?php while (have_rows('image_cards', $page_id)) : the_row(); ?>
                    <!-- Loop through each row in the 'about_description' repeater -->
                    <div class="flex flex-col gap-[20px] w-[100%] md:w-[33.33%] text-left pt-[0px] md:pt-[50px] justify-between">
                        <div class="flex flex-col gap-[10px]">
                            <img class="w-[50px] rounded-[5px]" src="<?php echo esc_url(get_sub_field('image_card_icon')); ?>" alt="">
                            <div class="text-left">
                                <h6 class="font-bold text-display-18 md:text-display-24 text-[#1f1f1f]"><?php echo esc_html(get_sub_field('image_card_title')); ?></h6>
                                <p class="text-display-14 md:text-display-16 text-[#1f1f1f]"><?php echo esc_html(get_sub_field('image_card_description')); ?></p>
                            </div>
                        </div>
                        <div class="h-[200px] md:h-[300px] lg:h-[350px] rounded-xl overflow-hidden">
                            <img class="w-full h-full object-cover" src="<?php echo esc_url(get_sub_field('image_card_image')); ?>" alt="<?php the_title(); ?>">
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?> 
        </div>
    </div>
</div>
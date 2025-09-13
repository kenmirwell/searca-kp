<?php 
    $page_id = get_query_var('page_id');
?>

<div class="capri-aims-to-achieve py-[50px] lg:py-[100px] bg-[#008c67]">
    <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
        <div class="flex flex-col w-[80%] lg:flex-row justify-start pb-[60px]">
            <div class="flex flex-col">
                <?php if($page_id) : ?>
                    <?php if (get_field("text_trio_container_title", $page_id)) : ?>
                        <div class="font-bold">
                            <h2 class="w-[100%] text-display-24 lg:text-display-42 text-[#ffffff] pb-[10px]"><?php echo get_field("text_trio_container_title", $page->ID); ?></h2>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if($page_id) : ?>
                    <?php if (get_field("text_trio_container_description", $page_id)) : ?>
                        <div class="">
                            <p class="text-[#ffffff]"><?php echo get_field("text_trio_container_description", $page_id); ?></p>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>      
        <div class="flex flex-col md:flex-row gap-[50px] justify-between">
            <?php if (have_rows('text_trio_content', $page_id)) : ?>
                <?php while (have_rows('text_trio_content', $page_id)) : the_row(); ?>
                    <!-- Loop through each row in the 'about_description' repeater -->
                    <div class="flex flex-col gap-[20px] w-[100%] md:w-[33.33%] text-left justify-between">
                        <div class="flex flex-col gap-[10px] justify-between lg:h-[240px]">
                            <img class="w-[50px] rounded-[5px]" src="<?php echo esc_url(get_sub_field('text_trio_icon')); ?>" alt="">
                            <div class="flex flex-col text-left justify-between gap-[10px]">
                                <h6 class="font-bold text-display-18 md:text-display-24 text-[#ffffff]"><?php echo esc_html(get_sub_field('text_trio_title')); ?></h6>
                                <p class="text-display-14 md:text-display-16 text-[#ffffff]"><?php echo esc_html(get_sub_field('text_trio_description')); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?> 
        </div>
    </div>
</div>
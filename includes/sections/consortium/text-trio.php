<?php 
    $page_id = get_query_var('page_id');
?>

<div class="capri-aims-to-achieve py-[50px] lg:py-[100px]">
    <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
        <div class="flex flex-col w-[80%] lg:flex-row justify-start pb-[60px]">
            <div class="flex flex-col">
                <?php if($page_id) : ?>
                    <?php if (get_field("text_trio_container_title", $page_id)) : ?>
                        <div class="font-bold">
                            <h2 class="w-[100%] text-display-24 lg:text-display-42  pb-[10px]"><?php echo get_field("text_trio_container_title", $page->ID); ?></h2>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if($page_id) : ?>
                    <?php if (get_field("text_trio_container_description", $page_id)) : ?>
                        <div class="">
                            <p class=""><?php echo get_field("text_trio_container_description", $page_id); ?></p>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>      
        <div class="relative flex flex-col md:flex-row gap-[50px] justify-between">
            <?php if (have_rows('text_trio_content', $page_id)) : ?>
                <svg style="position: absolute; align-items: center; z-index: -1" width="100%" height="32" viewBox="0 0 999 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.0214844 24.7666L123.909 29.8948C194.106 32.8006 264.41 28.0046 333.562 15.5926C445.318 -4.46619 560.04 -4.52186 671.833 15.3256C742.613 27.8915 814.761 32.537 886.566 29.1099L998.521 23.7666" stroke="#008C67" stroke-dasharray="8 8"/>
                </svg>
                <?php while (have_rows('text_trio_content', $page_id)) : the_row(); ?>
                    <?php $index = get_row_index(); // 1-based index ?>
                    <div class="flex flex-col gap-[20px] w-[100%] md:w-[33.33%] justify-between" style="<?php echo $index == 2 ? 'margin-top: -25px;' : ''; ?>">
                        <div class="flex flex-col gap-[5px] justify-between items-center lg:h-[185px]">
                            <img class="w-[50px] rounded-[5px]" src="<?php echo esc_url(get_sub_field('text_trio_icon')); ?>" alt="">
                            <div class="flex flex-col text-center justify-between gap-[10px]">
                                <h6 class="font-bold text-display-18 md:text-display-24"><?php echo esc_html(get_sub_field('text_trio_title')); ?></h6>
                                <p class="text-display-14 md:text-display-16"><?php echo esc_html(get_sub_field('text_trio_description')); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?> 
        </div>
    </div>
</div>
<div class="relative h-[800px] flex jusitify-center">
    <div class="flex items-center w-[90%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[150px] font-light z-[2]">
        <div class="w-[100%]">
            <div class="flex gap-[5px] text-[#ffffff] text-[14px] font-extralight">
                <div class="flex gap-[10px] items-center py-[10px] px-[15px] rounded-full border-[1px] border-[#EBEBEB82]">
                    <div class="h-[10px] w-[10px] bg-[#F7D671] rounded-full"></div>
                    <h1><?php the_title() ?></h1>
                </div>
            </div>
            <div class="text-[#ffffff] text-[45px] font-bold max-w-[500px]">
                <h1 class="cursor-pointer"><?php echo esc_html($page_identifier); ?></h1>
            </div>
            <div>
                <p class="text-[#ffffff] pb-[20px]"><?php echo esc_html(get_the_content()); ?></p>
                <?php
                    get_button_data('button-template', array(
                        'title' => "Explore " . get_the_title(), // Concatenating the function result
                        'root_url' => "#",
                        'alignment' => "justify-start"
                    ));
                ?>
            </div>
        </div>
        <div class="relative w-[100%] h-[100%]">
            <div class="featured-image-container absolute z-[1]"></div> 
            <?php 
                if(!empty(get_the_post_thumbnail_url())) {
            ?>
                <div class="fadein-shape bg-[#B59637] absolute w-[280px] h-[200px] absolute top-[140px] left-[0] z-[0] rounded-xl" style="transform: rotate(80deg);"></div> 
            <?php } ?>
        </div>
    </div>
    <div class="bg-[#096936] opacity-[0.90] w-full h-full absolute top-0 left-0 z-[1]"></div>
    <img class="absolute w-full h-full object-cover z-[0]" src="<?php echo esc_url($hero_background); ?>" alt="<?php the_title(); ?>">
</div>
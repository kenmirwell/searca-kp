<?php 
    $logo_url = get_query_var('logo_url');
    $card_color = get_query_var('card_color');
    $aspiring_outcome = get_query_var('aspiring_outcome');
    $expected_output = get_query_var('expected_output');
    $thumbnail_url = get_query_var('thumbnail_url');
?>

<div class="block lg:hidden w-[100%]">
    <div style="background-color: <?php echo esc_attr($card_color); ?>" class="w-[100%] py-[15px] rounded-lg">
        <div class="flex flex-col">
            <div class="flex justify-between gap-[25px] pr-[17px] pl-[20px]">
                <div class="flex items-center">
                    <!-- <div class="flex relative w-[20%] h-[100px]">
                        <div class="bg-gradient-to-t from-black to-transparent w-[100%] h-[100%] absolute top-0 left-0 z-[1]"></div>
                        <img class="absolute w-full h-full object-cover scale-[1] group-hover:scale-[1.1] transition-all duration-700 ease" src="<?php //echo esc_url($thumbnail_url); ?>" alt="<?php //the_title(); ?>">
                    </div> -->
                    <div class="">
                        <div class="text-[12px] font-bold text-[#ffffff]">
                            <h4><?php the_title()?></h4>
                        </div>
                        <div class="pt-[5px] font-extralight text-[10px] text-[#ffffff]">
                            <?php echo $aspiring_outcome?>
                        </div>
                    </div>
                </div>
                <div class="flex items-center text-white">
                    <a href="<?php echo get_permalink(get_the_ID()) ?>" class="">
                        <svg width="10" height="24" viewBox="0 0 14 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="1.41406" width="17" height="2" rx="1" transform="rotate(45 1.41406 0)" fill="#ffffff"/>
                            <rect x="13.4355" y="12.4141" width="17" height="2" rx="1" transform="rotate(135 13.4355 12.4141)" fill="#ffffff"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
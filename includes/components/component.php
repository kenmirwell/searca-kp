<?php 
    $logo_url = get_query_var('logo_url');
    $card_color = get_query_var('card_color');
    $aspiring_outcome = get_query_var('aspiring_outcome');
    $expected_output = get_query_var('expected_output');
    $thumbnail_url = get_query_var('thumbnail_url');
    $page_link = get_query_var('page_link');
    $components_index =  get_query_var('component_index');
?>

<div class="component-item-element block w-[100%] md:w-auto h-[370px] xl:h-[435px] rounded-[20px] group component-<?php echo $components_index; ?>">
    <div class="flex items-end relative h-[100%] w-[100%] md:w-[250px] xl:w-[400px] rounded-3xl overflow-hidden">
        <div class="relative z-[2]">
             <div class="p-[20px]">
                <div class="text-display-16 xl:text-display-18 font-bold pt-[10px] text-[#ffffff]">
                    <h4><?php the_title()?></h4>
                </div>
                <div id="comp-container-<?php echo get_the_ID(); ?>" class="hidden md:block component-text pt-[10px] font-extralight text-[10px] xl:text-[14px] text-[#ffffff]">
                    <?php echo $aspiring_outcome?>
                </div>
                <div id="comp-container-<?php echo get_the_ID(); ?>" class="block md:hidden component-text pt-[10px] font-extralight text-[10px] xl:text-[14px] text-[#ffffff]">
                    <?php echo $aspiring_outcome?>
                </div>
            </div>
            <a class="w-auto group cursor-pointer" href="<?php echo esc_url($page_link); ?>">
                <div class="flex items-center gap-[20px] py-[5px] pl-[20px] pr-[5px] bg-[#096936] group-hover:bg-[#B59637] transition-all duration-200 ease rounded-full">
                    <p class="group-hover:text-[#000000] text-[#ffffff]">Learn More</p>
                    <div class="bg-[#B59637] group-hover:bg-[#096936] rounded-full p-[15px] transition-all duration-200 ease">
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.10042 21.8995L21.8994 2.10051M21.8994 2.10051H2.10042M21.8994 2.10051V21.8995" 
                                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
            </a>
        </div>
        <div class="bg-gradient-to-t from-black to-transparent w-[100%] h-[100%] absolute top-0 left-0 z-[1]"></div>
        <img class="absolute w-full h-full object-cover scale-[1] group-hover:scale-[1.1] transition-all duration-700 ease" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title(); ?>">
    </div>
</div>
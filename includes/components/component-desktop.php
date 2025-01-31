<?php 
    $logo_url = get_query_var('logo_url');
    $card_color = get_query_var('card_color');
    $aspiring_outcome = get_query_var('aspiring_outcome');
    $expected_output = get_query_var('expected_output');
    $thumbnail_url = get_query_var('thumbnail_url');
?>

<div class="hidden lg:block h-[370px] xl:h-[435px] rounded-[20px]">
    <div class="flex items-end relative h-[100%] w-[250px] rounded-3xl overflow-hidden">
         <div class="p-[20px] z-[2]">
            <div class="text-[12px] xl:text-[18px] font-bold pt-[10px] text-[#ffffff]">
                <h4><?php the_title()?></h4>
            </div>
            <div class="pt-[10px] font-extralight text-[10px] xl:text-[14px] text-[#ffffff]">
                <?php echo $aspiring_outcome?>
            </div>
        </div>
        <div class="bg-gradient-to-t from-black to-transparent w-[100%] h-[100%] absolute top-0 left-0 z-[1]"></div>
        <img class="absolute w-full h-full object-cover" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title(); ?>">
    </div>
</div>
<?php 
/*
*Template Name: Registration Success
*/

get_header();
?>

<div class="absolute top-0 flex justify-center w-[100%] h-[100vh] bg-[#ffffff]">
    <div class="mt-[140px]">
        <div class="z-[999] shadow-gray-300 shadow-sm top-[20%] bg-[#ffffff] px-[30px] py-[50px] pt-[65px] rounded-xl">
            <?php 
                if ( function_exists( 'the_custom_logo' ) ) { ?>
                <div class="flex justify-center pr-[20px] pb-[50px] pl-[60px] lg:pl-[0px] cursor-pointer">
                    <?php the_custom_logo(); ?>
                </div>
            <?php }?>
            <div class="flex flex-col justify-center text-center gap-[10px]">
                <h6>Thank you for registering!</h6>
                <h6 class="text-[16px]">Your account is under review, and you’ll be notified via email once approved.</h6>
            </div>
            <div class="mt-[50px] text-[#196129] text-[14px] flex justify-center">
                <a href="/">Back to homepage</a>
            </div>
        </div>
    </div>
</div>
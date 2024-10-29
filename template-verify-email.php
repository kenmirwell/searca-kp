<?php 
/*
*Template Name: Verify Email
*/

get_header();
?>


<div class="absolute top-0 flex justify-center w-[100%] h-[100vh] bg-[#ffffff]">
    <div class="mt-[140px]">
        <div class="z-[999] shadow-gray-300 shadow-sm w-[360px] top-[20%] bg-[#ffffff] px-[30px] py-[50px] pt-[65px] rounded-xl">
            <div>
                <?php 
                    if ( function_exists( 'the_custom_logo' ) ) { ?>
                    <div class="flex justify-center pr-[20px] pb-[50px] pl-[60px] lg:pl-[0px] cursor-pointer">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php }?>
                <form method="post" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
                    <div class="pb-[20px] w-[100%] flex justify-center items-center text-[18px]">
                        <h6>Verify email</h6>
                    </div>
                    <div class="pb-[20px]">
                        <input class="p-[10px] border-[1px] rounded-lg w-[100%]" id="email_data" name="email_data" type="email_data" placeholder="Enter your email">
                    </div>
                    <div class="w-[100%] flex justify-center items-center text-[18px]">
                        <button type="submit" class="rounded-lg bg-[#F3BD1C] px-[35px] py-[10px] w-[100%]">Submit</button>
                    </div>
                    <div class="mt-[10px] text-[#196129] text-[14px]">
                        <a href="/">Back to homepage</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
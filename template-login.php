<?php 
/*
*Template Name: Login
*/

get_header();
?>


<div class="absolute top-0 flex justify-center w-[100%] h-[100vh] bg-[#ffffff]">
    <div class="mt-[140px]">
        <div class="z-[999] shadow-gray-300 shadow-sm w-[360px] top-[20%] bg-[#ffffff] px-[30px] py-[50px] pt-[65px] rounded-xl">
            <div>
                <?php 
                    if ( function_exists( 'the_custom_logo' ) ) { ?>
                    <div class="flex justify-center pr-[20px] cursor-pointer">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php }?>
                <form id="loginform" action="" method="post">
                    <div class="py-[10px] w-[100%] flex justify-center items-center text-[18px]">
                        <h6>Login</h6>
                    </div>
                    <div class="w-[100%] flex justify-center pb-[20px]">
                        <span class="login-validation text-red-600 text-[12px] font-[600] hidden">Incorrect Username or Password</span>
                    </div>
                    <div class="pb-[20px]">
                        <input class="p-[10px] border-[1px] rounded-lg w-[100%]" id="username" name="username" type="username" placeholder="Enter your email or username" required>
                    </div>
                    <div class="pb-[20px]">
                        <input class="p-[10px] border-[1px] rounded-lg w-[100%]" id="email" name="password" type="password" placeholder="Enter your password" required>
                    </div>
                    <div class="flex gap-[10px] pb-[20px]">
                        <input type="checkbox">
                        <p>Remember Me</p>
                    </div>
                    <div class="w-[100%] flex justify-center items-center text-[18px]">
                        <button type="submit" class="w-[100%] rounded-lg bg-[#F3BD1C] px-[35px] py-[10px]">Login</button>
                    </div>
                    <div class="mt-[10px] text-[#196129] text-[14px]">
                        <div class="flex gap-[5px]">
                            <p>Don't have an account yet?</p>
                            <a class="" href="/">Register</a>
                        </div>
                    </div>
                    <div class="mt-[10px] text-[#196129] text-[14px]">
                        <a href="/">Back to homepage</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
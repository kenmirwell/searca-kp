<!DOCTYPE html>
<html lang="en">
<head>
    <?php wp_head(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
</head>
<body <?php body_class() ?>>
    <div id="search-modal" class="hidden justify-center z-[99999]">
        <!-- <div class="search-modal z-[999] absolute w-[90%] h-[95%] top-[5%] bg-[#ffffff] px-[50px] py-[20px]"> -->
        <div id="search-modal-content" class="search-modal z-[99999] fixed bg-[#ffffff] w-[100%] opacity-95 h-[100vh] overflow-y-scroll">
            <div class="w-[100%]">
                <div class="w-[80%] py-[20px] mx-auto">
                    <div class="flex items-center relative">
                        <div class="w-[100%] flex items-center">
                            <div class="p-[16px] absolute top-0 left-0">
                                <svg width="20" height="20" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.91189 0C3.55164 0 0 3.55164 0 7.91189C0 12.2721 3.55164 15.8238 7.91189 15.8238C9.80798 15.8238 11.5493 15.1505 12.914 14.0328L17.6379 18.7567C17.7109 18.8327 17.7982 18.8933 17.8948 18.9351C17.9914 18.9768 18.0954 18.9989 18.2007 19C18.3059 19.001 18.4104 18.9811 18.5078 18.9413C18.6053 18.9015 18.6938 18.8427 18.7682 18.7682C18.8427 18.6938 18.9015 18.6053 18.9413 18.5078C18.9811 18.4104 19.001 18.3059 19 18.2007C18.9989 18.0954 18.9768 17.9914 18.9351 17.8948C18.8933 17.7982 18.8327 17.7109 18.7567 17.6379L14.0328 12.914C15.1505 11.5493 15.8238 9.80798 15.8238 7.91189C15.8238 3.55164 12.2721 0 7.91189 0ZM7.91189 1.58238C11.417 1.58238 14.2414 4.40683 14.2414 7.91189C14.2414 11.417 11.417 14.2414 7.91189 14.2414C4.40683 14.2414 1.58238 11.417 1.58238 7.91189C1.58238 4.40683 4.40683 1.58238 7.91189 1.58238Z" fill="#00b428"/>
                                </svg>
                            </div>
                            <input id="global-search" class="pl-[50px] w-[100%] p-[10px] border-[3px] border-[#00b428] rounded-l-lg" type="text" placeholder="What are you looking for?">
                        </div>
                        <div onclick="onModal('search-modal', 'close')" class="p-[16px] bg-[#00b428] rounded-r-lg">
                            <svg width="20" height="20" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17 2L2 17M2 2L17 17" stroke="#ffffff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                    <div id="global-search-content" class="w-[100%]">
                    </div>
                    <div class="flex gap-[5px] py-[20px]" id="pagination-container">
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="search-modal z-[99] fixed bg-[#000000] opacity-70 w-[100%] h-[100vh]"></div> -->
    </div>
    <div id="login-modal" class="hidden justify-center">
        <div class="z-[9999] fixed w-[360px] top-[30%] bg-[#ffffff] px-[30px] py-[50px] pt-[65px] rounded-xl">
            <div onclick="onModal('login-modal', event)" class="absolute cursor-pointer top-[5px] right-[5px] bg-[#ffffff] rounded-full p-[10px]">
                <svg width="20" height="20" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 2L2 17M2 2L17 17" stroke="#7C7C7C" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div>
                <form action="" id="loginform" action="<?php echo esc_url(site_url('wp_login.ph', 'login_post')); ?>" method="post">
                    <div class="pb-[20px] w-[100%] flex justify-center items-center text-[18px]">
                        <h6>Please Login</h6>
                    </div>
                    <div class="pb-[20px]">
                        <input class="p-[10px] border-[1px] rounded-lg w-[100%]" id="username" name="username" type="username" placeholder="Enter your email">
                    </div>
                    <div class="pb-[20px]">
                        <input class="p-[10px] border-[1px] rounded-lg w-[100%]" id="email" name="password" type="password" placeholder="Enter your password">
                    </div>
                    <div class="flex gap-[10px] pb-[20px]">
                        <input type="checkbox">
                        <p>Remember Me</p>
                    </div>
                    <div class="w-[100%] flex justify-center items-center text-[18px]">
                        <button type="submit" class="rounded-lg bg-[#F3BD1C] px-[35px] py-[10px]">Login</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="z-[99] fixed bg-[#000000] opacity-70 w-[100%] h-[100vh]"></div>
    </div>
    <div id="signup-modal" class="hidden justify-center">
        <div class="z-[9999] fixed w-[360px] top-[30%] bg-[#ffffff] px-[30px] py-[50px] pt-[65px] rounded-xl">
            <div onclick="onModal('signup-modal', event)" class="absolute top-[5px] right-[5px] bg-[#ffffff] rounded-full p-[10px]">
                <svg width="20" height="20" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 2L2 17M2 2L17 17" stroke="#7C7C7C" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div>
                <div class="pb-[20px] w-[100%] flex justify-center items-center text-[18px]">
                    <h6>Please Signup</h6>
                </div>
                <div class="pb-[20px]">
                    <input class="p-[10px] border-[1px] rounded-lg w-[100%]" id="username" name="username" type="username" placeholder="Enter your username">
                </div>
                <div class="pb-[20px]">
                    <input class="p-[10px] border-[1px] rounded-lg w-[100%]" id="email" name="email" type="email" placeholder="Enter your email">
                </div>
                <!-- <div class="pb-[20px]">
                    <input class="p-[10px] border-[1px] rounded-lg w-[100%]" id="email" name="password" type="password" placeholder="Enter your password">
                </div> -->
                <div class="flex gap-[10px] pb-[20px] w-[100%] justify-center items-center">
                    <input type="checkbox">
                    <p>I accept all terms and conditions</p>
                </div>
                <div class="w-[100%] flex justify-center items-center text-[18px]">
                    <button class="rounded-lg bg-[#F3BD1C] px-[35px] py-[10px]">Signup</button>
                </div>
            </div>
        </div>
        <div class="z-[99] fixed bg-[#000000] opacity-70 w-[100%] h-[100vh]"></div>
    </div>
    <div id="header" class="bg-[#F2F2F2] top-0 z-[999] fixed w-[100%] transition-all duration-200 ease">
        <div class="flex justify-between items-center w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] m-auto py-[10px] lg:py-[20px] font-light">
            <div class="block lg:hidden">
                <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.8125 4.18212C0.597012 4.18212 0.390349 4.27024 0.237976 4.4271C0.0856026 4.58396 0 4.7967 0 5.01854C0 5.24037 0.0856026 5.45312 0.237976 5.60998C0.390349 5.76684 0.597012 5.85496 0.8125 5.85496V4.18212ZM12.1875 5.85496C12.403 5.85496 12.6097 5.76684 12.762 5.60998C12.9144 5.45312 13 5.24037 13 5.01854C13 4.7967 12.9144 4.58396 12.762 4.4271C12.6097 4.27024 12.403 4.18212 12.1875 4.18212V5.85496ZM0.8125 0C0.597012 0 0.390349 0.0881231 0.237976 0.244983C0.0856026 0.401843 0 0.61459 0 0.836423C0 1.05826 0.0856026 1.271 0.237976 1.42786C0.390349 1.58472 0.597012 1.67285 0.8125 1.67285V0ZM12.1875 1.67285C12.403 1.67285 12.6097 1.58472 12.762 1.42786C12.9144 1.271 13 1.05826 13 0.836423C13 0.61459 12.9144 0.401843 12.762 0.244983C12.6097 0.0881231 12.403 0 12.1875 0V1.67285ZM0.8125 8.36423C0.597012 8.36423 0.390349 8.45235 0.237976 8.60921C0.0856026 8.76607 0 8.97882 0 9.20065C0 9.42249 0.0856026 9.63523 0.237976 9.79209C0.390349 9.94895 0.597012 10.0371 0.8125 10.0371V8.36423ZM12.1875 10.0371C12.403 10.0371 12.6097 9.94895 12.762 9.79209C12.9144 9.63523 13 9.42249 13 9.20065C13 8.97882 12.9144 8.76607 12.762 8.60921C12.6097 8.45235 12.403 8.36423 12.1875 8.36423V10.0371ZM0.8125 5.85496H12.1875V4.18212H0.8125V5.85496ZM0.8125 1.67285H12.1875V0H0.8125V1.67285ZM0.8125 10.0371H12.1875V8.36423H0.8125V10.0371Z" fill="black"/>
                </svg>
            </div>
            <?php 
                if ( function_exists( 'the_custom_logo' ) ) { ?>
                <div class="pl-[60px] lg:pl-[0px] cursor-pointer">
                    <?php the_custom_logo(); ?>
                </div>
            <?php }           
            ?>
            <div class="flex gap-[20px] justify-between items-center">
                <div class="justify-between gap-[20px] hidden lg:flex">
                    <?php
                        wp_nav_menu(
                            array(
                                'theme_location'    => 'header_menu',
                                'container'         => '',
                                'menu_id'           => 'main-menu',
                                'menu_class'        => 'primary-menu',
                            )
                        )
                    ?>
                </div>
                <div class="flex gap-[10px]">
                    <div onclick="onModal('search-modal', 'open')" class="flex justify-center items-center text-[#7C7C7C] rounded-full bg-[#F3BD1C] p-[10px] min-w-[35px] h-[35px]">
                        <svg width="17" height="17" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.91189 0C3.55164 0 0 3.55164 0 7.91189C0 12.2721 3.55164 15.8238 7.91189 15.8238C9.80798 15.8238 11.5493 15.1505 12.914 14.0328L17.6379 18.7567C17.7109 18.8327 17.7982 18.8933 17.8948 18.9351C17.9914 18.9768 18.0954 18.9989 18.2007 19C18.3059 19.001 18.4104 18.9811 18.5078 18.9413C18.6053 18.9015 18.6938 18.8427 18.7682 18.7682C18.8427 18.6938 18.9015 18.6053 18.9413 18.5078C18.9811 18.4104 19.001 18.3059 19 18.2007C18.9989 18.0954 18.9768 17.9914 18.9351 17.8948C18.8933 17.7982 18.8327 17.7109 18.7567 17.6379L14.0328 12.914C15.1505 11.5493 15.8238 9.80798 15.8238 7.91189C15.8238 3.55164 12.2721 0 7.91189 0ZM7.91189 1.58238C11.417 1.58238 14.2414 4.40683 14.2414 7.91189C14.2414 11.417 11.417 14.2414 7.91189 14.2414C4.40683 14.2414 1.58238 11.417 1.58238 7.91189C1.58238 4.40683 4.40683 1.58238 7.91189 1.58238Z" fill="#000000"/>
                        </svg>
                    </div>
                    <div class="relative">
                        <div onclick="handlePopup('auth', event)" class="flex gap-[10px] justify-center items-center text-[14px] min-w-[35px] h-[35px] rounded-full bg-[#C5192D]">
                            <svg width="19" height="19" viewBox="0 0 241 221" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="121" cy="59" r="59" fill="white"/>
                                <g clip-path="url(#clip0_1639_52)">
                                    <ellipse cx="121" cy="230.5" rx="107" ry="120.5" fill="white"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_1639_52">
                                        <path d="M12 110H230V201C230 212.046 221.046 221 210 221H32C20.9543 221 12 212.046 12 201V110Z" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <?php 
                            $current_user = wp_get_current_user();
                            
                            if ( is_user_logged_in() ) {
                                $user_id = $current_user->ID;
                                $user_name = $current_user->user_login ;
                                $user_email = $current_user->user_email;
                                $display_name = $current_user->display_name;
                                $first_name = $current_user->user_firstname;
                                $last_name = $current_user->user_lastname;
                                $userRole = $current_user->roles;

                                $firstname_initial = substr($first_name, 0, 1);
                                $lastname_initial = substr($last_name, 0, 1);
                        ?>

                                <div id="auth" class="absolute hidden flex flex-col gap-[10px] text-[14px] bg-[#ffffff] w-[300px] rounded-lg z-50 right-0 top-[40px]">
                                    <div class="w-[100%] flex justify-center pt-[30px] bg-[#FFF7E0] relative h-[65px]"></div>
                                    <div class="w-[100%] flex flex-col items-center mt-[-45px] z-[9]">
                                        <div class="flex p-[20px] rounded-full bg-[#C5192D] w-[60px] h-[60px] justify-center items-center text-[32px] text-[#ffffff]">
                                            <span><?php echo $firstname_initial ?></span>
                                            <span><?php echo $lastname_initial ?></span>
                                        </div>
                                        <div class="flex flex-col items-center gap-[2px] pt-[5px]">
                                            <p><?php echo $display_name ?></p>
                                            <p><?php echo $user_email ?></p>
                                        </div>
                                    </div>
                                    <div class="w-[100%] justify-center">
                                        <div class="px-[35px] py-[20px] flex justify-center">
                                            <a href="<?php echo wp_logout_url(home_url()); ?>">Logout</a>
                                        </div>
                                    </div>
                                </div>
                        <?php  
                            } else { 
                        ?>
                            
                                <!-- <div id="auth" class="absolute hidden flex flex-col gap-[10px] py-[15px] px-[10px] text-[14px] bg-[#ffffff] w-[100px] rounded-lg z-50 right-0 top-[40px]">
                                    <div class="py-[5px]">
                                        <p onclick="onModal('login-modal')" class="cursor-pointer">Login</p>
                                    </div>
                                    <div>
                                        <p onclick="onModal('signup-modal')" class="cursor-pointer">Signup</p>  
                                    </div class="py-[5px]">
                                </div> -->
                                <div id="auth" class="absolute hidden flex flex-col gap-[10px] py-[15px] px-[10px] text-[14px] bg-[#ffffff] w-[100px] rounded-lg z-50 right-0 top-[40px]">
                                    <div class="py-[5px]">
                                        <a href="<?php echo esc_url(get_permalink(416)) ?>">Login</a>
                                    </div>
                                    <div>
                                        <!-- <p onclick="onModal('signup-modal')" class="cursor-pointer">Signup</p>   -->
                                        <a href="<?php echo esc_url(get_permalink(341)) ?>">Signup</a>
                                    </div class="py-[5px]">
                                </div>
                        <?php 
                            } 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

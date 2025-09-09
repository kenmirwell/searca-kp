<!DOCTYPE html>
<html lang="en">
<head>
    <?php wp_head(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
</head>
<body <?php body_class() ?>>
    <div id="header-menu" class="header-menu">
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
                        <div id="global-search-content" class="w-[100%]"></div>
                        <div class="flex gap-[5px] py-[20px]" id="pagination-container"></div>
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
            <div class="flex justify-between items-center w-[90%] lg:w-[1024px] xl:w-[1280px] m-auto py-[15px] font-light">
                <?php if ( function_exists( 'the_custom_logo' ) ) { ?>
                    <div class="cursor-pointer flex justify-center">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php } ?>
                <div class="justify-between gap-[20px] hidden md:block">
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
                <div class="flex gap-[10px] items-center">
                    <div onclick="onModal('search-modal', 'open')" class="flex">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.5 21.75C5.85 21.75 1.25 17.15 1.25 11.5C1.25 5.85 5.85 1.25 11.5 1.25C17.15 1.25 21.75 5.85 21.75 11.5C21.75 17.15 17.15 21.75 11.5 21.75ZM11.5 2.75C6.67 2.75 2.75 6.68 2.75 11.5C2.75 16.32 6.67 20.25 11.5 20.25C16.33 20.25 20.25 16.32 20.25 11.5C20.25 6.68 16.33 2.75 11.5 2.75Z" fill="black"/>
                            <path d="M21.9999 22.75C21.8099 22.75 21.6199 22.68 21.4699 22.53L19.4699 20.53C19.1799 20.24 19.1799 19.76 19.4699 19.47C19.7599 19.18 20.2399 19.18 20.5299 19.47L22.5299 21.47C22.8199 21.76 22.8199 22.24 22.5299 22.53C22.3799 22.68 22.1899 22.75 21.9999 22.75Z" fill="black"/>
                        </svg>
                    </div>
                    <div class="relative">
                        <div onclick="handlePopup('auth', event)" class="flex">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M20.5899 22C20.5899 18.13 16.7399 15 11.9999 15C7.25991 15 3.40991 18.13 3.40991 22" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
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
                    <div id="contactus-header-button" class="hidden sm:block py-[10px] px-[20px] text-[#000000] hover:text-[#ffffff] border-[1px] border-[#000000] hover:border-[#2a7f3d] hover:bg-[#2a7f3d] rounded-full overflow-hidden transition-all duration-200 ease">
                        <button class="w-[80px]">Contact us</button>
                    </div>
                    <div onclick="handleMobileMenu()" class="block sm:hidden">
                        <svg width="29" height="17" viewBox="0 0 29 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 1.0625C0 0.475697 0.540989 0 1.20833 0H27.7917C28.459 0 29 0.475697 29 1.0625C29 1.6493 28.459 2.125 27.7917 2.125H1.20833C0.540989 2.125 0 1.6493 0 1.0625ZM0 8.5C0 7.9132 0.540989 7.4375 1.20833 7.4375H27.7917C28.459 7.4375 29 7.9132 29 8.5C29 9.0868 28.459 9.5625 27.7917 9.5625H1.20833C0.540989 9.5625 0 9.0868 0 8.5ZM13.2917 15.9375C13.2917 15.3507 13.8327 14.875 14.5 14.875H27.7917C28.459 14.875 29 15.3507 29 15.9375C29 16.5243 28.459 17 27.7917 17H14.5C13.8327 17 13.2917 16.5243 13.2917 15.9375Z" fill="#096936"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="mid-size bg-[#FFFFFF] z-[9999] hidden sm:block lg:hidden">
                <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
                    <?php
                        wp_nav_menu(
                            array(
                                'theme_location'    => 'header_menu',
                                'container'         => '',
                                'menu_id'           => 'main-menu-tablet',
                                'menu_class'        => 'primary-menu-tablet',
                            )
                        )
                    ?>
                </div>
            </div>
            <div id="mobile-menu-container" class="md:hidden bg-transparent absolute top-0 h-screen w-[100%] z-[9999] inactive-mobile-menu">
                <div class="bg-[#000000] opacity-[0.8] absolute top-0 w-[100%] h-[100%] z-[0]"></div>
                <div class="absolute w-[100%] bg-[#ffffff] h-[500px] rounded-t-2xl bottom-0 p-[20px] pt-[50px] z-[1]">
                    <div class="flex justify-between items-center pb-[20px]">
                        <div id="contactus-header-button" class="py-[10px] px-[20px] text-[#ffffff] border-[1px] border-[#2a7f3d] bg-[#2a7f3d] rounded-full overflow-hidden transition-all duration-200 ease">
                            <button class="w-[90px]">Contact us</button>
                        </div>
                        <div onclick="handleMobileMenu()" class="flex justify-end mr-[20px]">
                            <svg width="20" height="20" viewBox="0 0 207 207" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M197 10L10 197M10 10L197 197" stroke="#1E1E1E" stroke-width="20" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                    <div class="pt-[20px] border-t-[1px] border-[#DBDBDB]">
                        <div class="flex primary-menu-mobile-home w-[100%]">
                            <a href="/" class="w-[100%]">Home</a>
                        </div>
                        <?php
                            wp_nav_menu(
                                array(
                                    'theme_location'    => 'header_menu',
                                    'container'         => '',
                                    'menu_id'           => 'main-menu-mobile',
                                    'menu_class'        => 'primary-menu-mobile',
                                )
                            )
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

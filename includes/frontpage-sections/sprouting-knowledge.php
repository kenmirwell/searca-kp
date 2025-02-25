<?php 
    $cop_image = get_query_var('cop_image');
    $cop_image_2 = get_query_var('cop_image_2');
    $root_url = get_query_var('root_url');
?>

<div class="py-[50px] sm:py-[20px] lg:py-[100px]">
    <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
        <div class="flex flex-col-reverse sm:flex-row md:flex-col gap-[20px] md:gap-[0] items-center items-start">
            <div class="w-[100%]">
                <div>
                    <h2 class="text-[22px] md:text-[32px] lg:text-[36px] font-[600]">Community of practice</h2>
                    <h2 class="text-[22px] md:text-[32px] lg:text-[36px] font-[600] pb-[20px] sm:pb-[0px]">Sprouting Knowledge. Cultivating Conversations.</h2>
                </div>
                <div class="relative block sm:hidden w-[100%] max-w-[600px] mx-auto">
                    <!-- Large Image -->
                    <div class="rounded-xl overflow-hidden border-[8px] border-white shadow-lg">
                        <img class="w-full h-auto object-cover rounded-xl" src="<?php echo esc_url($cop_image_2) ?>" alt="Large Image">
                        <div class="text-[12px] md:text-[16px] w-[100%] md:w-[70%] py-[20px]">
                            <p>Become part of discussions and build our community. Join a vibrant network of agricultural professionals, researchers, and stakeholders dedicated to driving sustainable change in Southeast Asia.</p>
                        </div>
                    </div>

                    <!-- Small Image (Top Left) -->
                    <div class="absolute w-[60%] top-0 left-0 transform translate-x-[-9px] translate-y-[-9px] rounded-xl overflow-hidden border-[8px] border-white shadow-lg">
                        <img class="w-full h-full object-cover rounded-xl" src="<?php echo esc_url($cop_image) ?>" alt="Small Image">
                    </div>
                </div>
                <div class="flex flex-col md:flex-row justify-between gap-[20px] md:gap-[0px] pt-[20px] pb-[20px] md:pb-[40px]">
                    <div class="hidden sm:block text-[14px] md:text-[16px] w-[100%] md:w-[70%]">
                        <p>Become part of discussions and build our community. Join a vibrant network of agricultural professionals, researchers, and stakeholders dedicated to driving sustainable change in Southeast Asia.</p>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center gap-[10px] sm:gap-[20px]">
                        <?php
                            get_button_data('button-template', array(
                                'title' => 'Register for free',
                                'root_url' => "/partnerships"
                            ));
                        ?>

                        <!-- <a href="/partnerships" class="w-auto group cursor-pointer">
                            <div class="flex items-center gap-[20px] py-[5px] pl-[20px] pr-[5px] bg-[#2a7f3d] group-hover:bg-[#ceab23] transition-all duration-200 ease rounded-full">
                                <p class="text-[#ffffff]">Register for free</p>
                                <div class="bg-[#ceab23] group-hover:bg-[#2a7f3d] rounded-full p-[15px] transition-all duration-200 ease">
                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.10042 21.8995L21.8994 2.10051M21.8994 2.10051H2.10042M21.8994 2.10051V21.8995" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </div>
                        </a> -->
                        <div class="flex">
                            <a class="w-[100%]" href="<?php echo esc_url(get_permalink(416)) ?>">Log in</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-[100%] hidden md:flex gap-[20px] h-[350px] lg:h-[450px]">
                <div class="flex items-end relative h-[100%] w-[30%] rounded-3xl overflow-hidden">
                    <img class="absolute w-full h-full object-cover" src="<?php echo esc_url($cop_image) ?>">
                </div>
                <div class="flex items-end relative h-[100%] w-[70%] rounded-3xl overflow-hidden">
                    <img class="absolute w-full h-full object-cover" src="<?php echo esc_url($cop_image_2) ?>">
                </div>
            </div>
            <div class="relative hidden sm:block md:hidden w-[100%] max-w-[600px] mx-auto">
                <!-- Large Image -->
                <div class="rounded-xl overflow-hidden border-[8px] border-white shadow-lg">
                    <img class="w-full h-auto object-cover rounded-xl" src="<?php echo esc_url($cop_image_2) ?>" alt="Large Image">
                </div>

                <!-- Small Image (Top Left) -->
                <div class="absolute w-[60%] top-0 left-0 transform translate-x-[-15px] translate-y-[-15px] rounded-xl overflow-hidden border-[8px] border-white shadow-lg">
                    <img class="w-full h-full object-cover rounded-xl" src="<?php echo esc_url($cop_image) ?>" alt="Small Image">
                </div>
            </div>
        </div>        
    </div>
</div>
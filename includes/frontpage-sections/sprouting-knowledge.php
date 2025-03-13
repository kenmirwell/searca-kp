<?php 
    $cop_image = get_query_var('cop_image');
    $cop_image_2 = get_query_var('cop_image_2');
    $root_url = get_query_var('root_url');
?>

<div class="py-[50px] lg:py-[100px]">
    <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
        <div class="flex flex-col-reverse md:flex-row lg:flex-col gap-[20px] md:gap-[0] items-center items-start">
            <div class="w-[100%]">
                <div class="font-bold">
                    <h2 class="text-display-24 lg:text-display-42 text-[#1f1f1f] pb-[10px]">Community of practice:<br>Cultivating Conversations,</h2>
                </div>
                <div class="block md:hidden pb-[30px] text-[14px] md:text-[16px] w-[100%]">
                    <p>Become part of discussions and build our community. Join a vibrant network of agricultural</br> professionals, researchers, and stakeholders dedicated to driving sustainable change in Southeast Asia.</p>
                </div>
                <div class="relative block md:hidden w-[100%] max-w-[600px] mx-auto">
                    <!-- Large Image -->
                    <div class="rounded-xl overflow-hidden border-[8px] border-white shadow-lg">
                        <img class="w-full h-auto object-cover rounded-xl" src="<?php echo esc_url($cop_image_2) ?>" alt="Large Image">
                    </div>

                    <!-- Small Image (Top Left) -->
                    <div class="absolute w-[60%] top-0 left-0 transform translate-x-[-15px] translate-y-[-15px] rounded-xl overflow-hidden border-[8px] border-white shadow-lg">
                        <img class="w-full h-full object-cover rounded-xl" src="<?php echo esc_url($cop_image) ?>" alt="Small Image">
                    </div>
                </div>
                <div class="flex flex-col lg:flex-row justify-between gap-[20px] md:gap-[0px]">
                    <div class="hidden md:block text-[14px] md:text-[16px] w-[100%] lg:w-[70%] pb-[20px]">
                        <p>Become part of discussions and build our community. Join a vibrant network of agricultural</br> professionals, researchers, and stakeholders dedicated to driving sustainable change in Southeast Asia.</p>
                    </div>
                    <div class="flex flex-row items-center gap-[10px] sm:gap-[20px] pt-[30px] md:pt-[0px]">
                        <?php
                            get_button_data('button-template', array(
                                'title' => 'Register for free',
                                'root_url' => "/partnerships",
                                'alignment' => "justify-start"
                            ));
                        ?>
                        <div class="flex">
                            <a class="w-[100%]" href="<?php echo esc_url(get_permalink(416)) ?>">Log in</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- For Medium size -->
            <div class="relative hidden md:block lg:hidden w-[100%] max-w-[600px] mx-auto">
                <!-- Large Image -->
                <div class="rounded-xl overflow-hidden border-[8px] border-white shadow-lg">
                    <img class="w-full h-auto object-cover rounded-xl" src="<?php echo esc_url($cop_image_2) ?>" alt="Large Image">
                </div>

                <!-- Small Image (Top Left) -->
                <div class="absolute w-[60%] top-0 left-0 transform translate-x-[-15px] translate-y-[-15px] rounded-xl overflow-hidden border-[8px] border-white shadow-lg">
                    <img class="w-full h-full object-cover rounded-xl" src="<?php echo esc_url($cop_image) ?>" alt="Small Image">
                </div>
            </div>
              <!-- For Large size -->
              <div class="w-[100%] hidden lg:flex gap-[20px] h-[350px] lg:h-[450px]">
                <div class="flex items-end relative h-[100%] w-[40%] rounded-3xl overflow-hidden">
                    <img class="absolute w-full h-full object-cover" src="<?php echo esc_url($cop_image) ?>">
                </div>
                <div class="flex items-end relative h-[100%] w-[100%] rounded-3xl overflow-hidden">
                    <img class="absolute w-full h-full object-cover" src="<?php echo esc_url($cop_image_2) ?>">
                </div>
            </div>
        </div>        
    </div>
</div>
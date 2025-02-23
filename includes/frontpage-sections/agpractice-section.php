<?php 
    $agpractices_brief_description = get_query_var('agpractices_brief_description');
?>

<div class="relative">
    <div class="bg-[#196129] pt-[50px] pb-[30px] lg:pb-[0] lg:pt-[80px] overflow-hidden">
        <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
            <div class="flex justify-center gap-[20px] xl:gap-[60px] items-start">
                <div class="w-[100%] lg:w-[40%] py-[20px] xl:pt-[50px] flex flex-col gap-[20px] text-left items-center mx-auto z-[2]">
                    <div class="text-[#ffffff] w-[100%] text-[22px] md:text-[32px] lg:text-[36px] font-[600]">
                        <h2>Agpractices&Domains: transforming agriculture through data and innovation</h2>
                    </div>
                    <div class="flex flex-col gap-[20px]">
                        <div class="text-[#ffffff] w-[100%] font-light md:font-normal text-[12px] lg:text-[16px]">
                            <p class="font-[300]"><?php echo $agpractices_brief_description ?></p>
                            <ul class="flex flex-col gap-[5px] lg:gap-[20px] py-[20px] lg:py-[50px] agpractices-list">
                                <li class="flex gap-[10px] items-center">
                                    <svg width="21" height="11" viewBox="0 0 36 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M34 2L12 24L2 14" stroke="#CEAB23" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>Customized recommendations for sustainable practices.</span>
                                </li>
                                <li class="flex gap-[10px] items-center">
                                    <svg width="21" height="11" viewBox="0 0 36 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M34 2L12 24L2 14" stroke="#CEAB23" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>Empowering decisions with advanced modeling.</span>
                                </li>
                                <li class="flex gap-[10px] items-center">
                                    <svg width="21" height="11" viewBox="0 0 36 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M34 2L12 24L2 14" stroke="#CEAB23" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>Helping stakeholders achieve efficient outcomes.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- <?php
                        // get_button_data('button-template', array(
                        //     'title' => 'Explore the platform',
                        //     'button_class' => 'button-green',
                        //     'ar_bg' => 'bg-[#ceab23]',
                        //     'button_bg' => '#2a7f3d',
                        //     'root_url' => "$root_url/agricultural-data-tools/"
                        // ));
                    ?> -->
                </div>
                <div class="hidden md:block w-[60%] mt-[-20px] lg:mt-[0px]">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/leaf.png" alt="Leaf Image">
                    <a href="/agricultural-data-tools/" class="flex justify-center p-[10px] lg:p-[20px] bg-[#2a7f3d] overflow-hidden rounded-t-xl">
                        <img class="w-full h-full object-cover" src="<?php echo esc_url($agpractices_image) ?>" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <img class="absolute top-[0] opacity-[.09] w-full h-full object-cover z-[1] flex md:hidden" src="<?php echo esc_url($agpractices_image) ?>" alt="">
</div>
<?php 
    $agpractices_brief_description = get_query_var('agpractices_brief_description');
?>

<div class="relative">
    <div class="bg-[#096936] overflow-hidden">
        <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
            <div class="ag-elements flex flex-col md:flex-row relative pt-[50px] py-[60px] justify-center gap-[20px] items-start">
                <div class="w-[100%] pb-[20px] xl:pt-[50px] flex flex-col gap-[20px] text-left items-left mx-auto z-[2]">
                    <div class="ag-element-left opacity-[0] w-[100%] xl:w-[50%]">
                        <div class="hidden lg:block text-[#ffffff] w-[100%] text-display-24 md:text-display-42 font-bold">
                            <h2>Agpractices&Domains:</br> transforming agriculture</br> through data and innovation</h2>
                        </div>
                        <div class="block lg:hidden text-[#ffffff] w-[100%] text-display-24 md:text-display-42 font-bold">
                            <h2>Agpractices&Domains: transforming agriculture through data and innovation</h2>
                        </div>
                        <div class="flex flex-col gap-[20px] pt-[20px]">
                            <div class="text-[#ffffff] w-[100%] font-light md:font-normal text-[12px] lg:text-[16px]">
                                <p class="font-[300]"><?php echo $agpractices_brief_description ?></p>
                                <ul class="flex flex-col w-[100%] gap-[5px] lg:gap-[20px] py-[20px] lg:pt-[30px] agpractices-list">
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
                        <div class="flex">
                            <?php
                                button_template('common-button', array(
                                    'title' => "Explore the platform",
                                    'url' => "/agricultural-digital-tools",
                                    'color' => 'gold_to_white'
                                ))
                            ?>
                        </div>
                    </div>
                </div>
                <div class="ag-element-right opacity-[0] xl:absolute bottom-0 right-0 w-[100%] xl:w-[50%]">
                    <a href="/agricultural-data-tools/" class="flex justify-center p-[10px] lg:p-[20px] bg-[#2a7f3d] overflow-hidden rounded-t-xl">
                        <img class="w-full h-full object-cover" src="<?php echo esc_url($agpractices_image) ?>" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
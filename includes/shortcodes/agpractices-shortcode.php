<?php 
    add_shortcode('agpractices_shortcode', 'agpractices_shortcode_fn');
        
    function agpractices_shortcode_fn() {
        ob_start();
        $agpractices_brief_description = get_field("agpractices_brief_description");
        $agpractices_image = get_field("agpractices_image");
        $link_to_agpractices = get_field("link_to_agpractices");

        ?>
        <div class="bg-[#196129] pt-[80px] mt-[80px] relative overflow-hidden">
            <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto">
                <div class="flex justify-center gap-[60px] items-start">
                    <div class="w-[40%] pt-[50px] flex flex-col gap-[10px] text-left items-center mx-auto pb-[20px] md:pb-[40px]">
                        <div class="text-[#ffffff] w-[100%] text-[22px] lg:text-[32px] font-[600]">
                            <h2>AgPractices & Domains Platform</h2>
                        </div>
                        <div class="flex flex-col gap-[20px]">
                            <div class="text-[#ffffff] w-[100%] font-light md:font-normal text-[12px] lg:text-[16px]">
                                <p class="font-[300]"><?php echo $agpractices_brief_description ?></p>
                            </div>
                            <div class="w-[100%] flex justify-start text-left">
                                <a class="p-[20px] rounded-lg bg-[#F3BD1C] px-[35px] py-[10px]" href="<?php echo $link_to_agpractices ?>">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="w-[60%] overflow-hidden rounded-t-xl">
                        <div class="flex justify-center">
                            <img class="w-full h-full object-cover" src="<?php echo esc_url($agpractices_image) ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <img class="w-[100%] absolute opacity-[.09] top-[0]" src="https://bcsdevelopmentgator.site/wp-content/uploads/2024/10/20231125123019_mm_aung_chan_thar-766aa0f6.webp" alt="">
        </div>
        <?php
        return ob_get_clean();
    }
?>
<?php 
    add_shortcode('cop_shortcode', 'cop_shortcode_fn');
        
    function cop_shortcode_fn() {
        ob_start();
        
        $cop_image = get_field("cop_image");
        $cop_title = get_field("cop_title");
        $cop_description = get_field("cop_description");
        $cop_link = get_field("cop_link");

        ?>
        <div class="py-[100px]">
            <div class="sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto">
                <div class="flex gap-[40px] items-center">
                    <div class="w-[30%] rounded-lg overflow-hidden">
                        <img src="<?php echo esc_url($cop_image) ?>" alt="">
                    </div>
                    <div class="w-[50%] flex flex-col gap-[10px] text-left">
                        <h6 class="text-[24px] font-[600]">Join the Community</h6>
                        <p class="font-[300]">Built upon SEARCA's experiences and goals in developing and disseminating science-based information, the K-Hub aims to create a collaborative space for learning through this. The platform is set to be a system that produces a digital lifestyle, allowing its users to share and co-learn about each other's experiences in day-to-day operations.</p>
                        <a class="text-[#458753]" href="">Learn More</a>
                    </div>
                    <div class="w-[1px] h-[250px] bg-[#458753]"></div>
                    <div class="w-[20%] flex flex-col items-end gap-[5px] font-[600] text-center">
                        <a class="rounded-lg bg-[#F3BD1C] px-[35px] py-[10px] w-[100%]" href="<?php echo esc_url(get_permalink(416)) ?>">Log in</a>
                        <div class="flex gap-[10px] justify-center w-[100%]">
                            <span>or</span>
                            <a class="text-[#458753]" href="<?php echo esc_url(get_permalink(341)) ?>">Register for free</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
?>
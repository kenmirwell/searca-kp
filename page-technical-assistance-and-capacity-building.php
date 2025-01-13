<?php 
    get_header();

    while (have_posts()) {
        the_post();

        $aspiring_outcome = get_field("aspiring_outcome");

        $expected_output = get_field("expected_output");

        $grants_image = get_field("travel_grants_image");
        $grants_desc = get_field("travel_grants_description");
        $grants_link = get_field("travel_grants_link");

        $staf_ex_image = get_field("staff_exchange_image");
        $staf_ex_desc = get_field("staff_exchange_description");
        $staf_ex_link = get_field("staff_exchange_link");

        $tsw_image = get_field("trainings_seminars_workshops_image");
        $tsw_desc = get_field("trainings_seminars_workshops_description");
        $tsw_link = get_field("trainings_seminars_workshop_link");


?>
    <div>
        <div class="bg-[#196129]">
            <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[50px] font-light">
                <div>
                    <div class="flex gap-[5px] text-[#ffffff] text-[14px] font-extralight">
                        <p class="cursor-pointer"><a href="/">Home |</a></p>
                        <p class="cursor-pointer"><?php the_title()?></p>
                    </div>
                    <div class="border-b-[1px] border-[#F7D671] text-[#F7D671] text-[45px] pb-[20px] my-[20px]">
                        <h1 class="cursor-pointer"><?php the_title() ?></h1>
                    </div>
                    <div class="text-[16px] font-extralight flex gap-[20px] text-[#ffffff]">
                        <div class="component-banner-description w-[50%]">
                            <?php the_content() ?>
                        </div>
                        <div class="w-[50%]">
                            <div class="">
                                <p><span class="font-[600]">Expected Output: </span><?php echo $expected_output ?></p>
                            </div>
                            <div class="pt-[20px]">
                                <p> <span class="font-[600]">Aspiring Outcome: </span><?php echo $aspiring_outcome ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-[60px] py-[60px]">
            <div class="sm:w-[640px] md:w-[768px] lg:w-[980px] mx-auto">
                <div class="flex gap-[20px] items-center">
                    <div class="w-[40%] h-[200px] md:h-[250px] rounded-lg overflow-hidden">
                        <img class="w-full h-full object-cover" src="<?php echo esc_url($grants_image); ?>" alt="">
                    </div>
                    <div class="flex flex-col gap-[20px] w-[100%]">
                        <h2 class="text-[24px]">Travel Grants</h2>
                        <p class="text-[14px] font-[300]"><?php echo $grants_desc ?></p>
                        <a class= "text-[14px]" href="<?php echo esc_url($grants_link); ?>">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="sm:w-[640px] md:w-[768px] lg:w-[980px] mx-auto">
                <div class="flex flex-row-reverse gap-[20px] items-center">
                    <div class="w-[40%] h-[200px] md:h-[250px] rounded-lg overflow-hidden">
                        <img class="w-full h-full object-cover" src="<?php echo esc_url($staf_ex_image); ?>" alt="">
                    </div>
                    <div class="flex flex-col gap-[20px] w-[100%] items-end text-right">
                        <h2 class="text-[24px]">Staﬀ Exchanges and Mentorship Program</h2>
                        <p class="text-[14px] font-[300]"><?php echo $staf_ex_desc ?></p>
                        <a class= "text-[14px]" href="<?php echo esc_url($staf_ex_link); ?>">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="sm:w-[640px] md:w-[768px] lg:w-[980px] mx-auto">
                <div class="flex gap-[20px] items-center">
                    <div class="w-[40%] h-[200px] md:h-[250px] rounded-lg overflow-hidden">
                        <img class="w-full h-full object-cover" src="<?php echo esc_url($tsw_image); ?>" alt="">
                    </div>
                    <div class="flex flex-col gap-[20px] w-[100%]">
                        <h2 class="text-[24px]">Trainings, Seminars, Workshops</h2>
                        <p class="text-[14px] font-[300]"><?php echo $tsw_desc ?></p>
                        <a class= "text-[14px]" href="<?php echo esc_url($tsw_link); ?>">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
    }
    get_footer()
?>
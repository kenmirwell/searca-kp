<?php 
    get_header();

    while (have_posts()) {
        the_post();

        $aspiring_outcome = get_field("aspiring_outcome");

        $expected_output = get_field("expected_output");

        $rrp_group = get_field('regional_research_program');
        $srf_group = get_field('strategic_response_fund');


        $rrp_title = $rrp_group['rrp_title'];
        $rrp_text = $rrp_group['rrp_text'];
        $rrp_image = $rrp_group['rrp_image'];
        $srf_title = $srf_group['srf_title'];
        $srf_text = $srf_group['srf_text'];
        $srf_image = $srf_group['srf_image'];
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
        <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[50px]">
            <div class="flex flex-col w-[95%] mx-auto gap-[40px]">
                <div class="flex gap-[40px] items-center">
                    <div class="flex flex-col gap-[20px] w-[100%]">
                            <h6 class="text-[18px] font-[600]"><?php echo $rrp_title ?></h6>
                            <p><?php echo $rrp_text ?></p>
                    </div>
                    <div class="h-[100%] w-[500px] rounded-lg">
                        <img class="w-full h-full object-cover rounded-xl overflow-hidden" src="<?php echo esc_url($rrp_image) ?>">
                    </div>
                </div>    
                <div class="flex flex-row-reverse gap-[40px] items-center">
                    <div class="flex flex-col gap-[20px] w-[100%]">
                            <h6 class="text-[18px] font-[600]"><?php echo $srf_title ?></h6>
                            <p><?php echo $srf_text ?></p>
                    </div>
                    <div class="h-[100%] w-[500px]">
                        <img class="w-full h-full object-cover rounded-xl overflow-hidden" src="<?php echo esc_url($srf_image) ?>">
                    </div>
                </div>    
            </div>  

            <div class="w-[95%] gap-[20px] mx-auto py-[50px]">
                <h6>Aside from these research programs, Working Groups will be established under this component based on priority research areas once there is a significant number of members and partners. To kick-start this initiative, CADRE will partner with CIRAD’s platforms in partnership for research and training (dPs) in Asia and will serve as the initial Working Groups of CADRE. These include:</h6>
                <ul class="colab-list flex flex-col gap-[10px] pt-[20px]">
                    <li>Agro-ecology for Southeast Asia (ASEA)</li>
                    <li>Emerging Diseases in Southeast Asia (GREASE)</li>
                    <li>Sustainable Food Systems for Cities in Asia (MALICA)</li>
                    <li>Sustainable Agricultural Landscape in Southeast Asia (SALSA) </li>
                </ul>
            </div>
        </div>
    </div>
<?php 
    }
    get_footer()
?>
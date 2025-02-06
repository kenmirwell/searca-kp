<?php 
    get_header();

    while (have_posts()) {
        the_post();

        $aspiring_outcome = get_field("aspiring_outcome");

        $expected_output = get_field("expected_output");

        $ps_group = get_field('policy_studies');
        $pr_group = get_field('policy_roundtables');
        $gedi_group = get_field('gedi');


        $ps_title = $ps_group['ps_title'];
        $ps_desc = $ps_group['ps_description'];
        $ps_image = $ps_group['ps_image'];

        $pr_title = $pr_group['pr_title'];
        $pr_desc = $pr_group['pr_description'];
        $pr_image = $pr_group['pr_image'];

        $gedi_title = $gedi_group['gedi_title'];
        $gedi_desc = $gedi_group['gedi_description'];
        $gedi_image = $gedi_group['gedi_image'];
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
                            <h6 class="text-[18px] font-[600]"><?php echo $ps_title ?></h6>
                            <p><?php echo $ps_desc ?></p>
                    </div>
                    <div class="h-[100%] w-[500px] rounded-lg">
                        <img class="w-full h-full object-cover rounded-xl overflow-hidden" src="<?php echo esc_url($ps_image) ?>">
                    </div>
                </div>    
                <div class="flex flex-row-reverse gap-[40px] items-center">
                    <div class="flex flex-col gap-[20px] w-[100%]">
                            <h6 class="text-[18px] font-[600]"><?php echo $pr_title ?></h6>
                            <p><?php echo $pr_desc ?></p>
                    </div>
                    <div class="h-[100%] w-[500px]">
                        <img class="w-full h-full object-cover rounded-xl overflow-hidden" src="<?php echo esc_url($pr_image) ?>">
                    </div>
                </div>   
                <div class="flex gap-[40px] items-center">
                    <div class="flex flex-col gap-[20px] w-[100%]">
                            <h6 class="text-[18px] font-[600]"><?php echo $gedi_title ?></h6>
                            <p><?php echo $gedi_desc ?></p>
                    </div>
                    <div class="h-[100%] w-[500px] rounded-lg">
                        <img class="w-full h-full object-cover rounded-xl overflow-hidden" src="<?php echo esc_url($gedi_image) ?>">
                    </div>
                </div>  
            </div>  
        </div>
    </div>
<?php 
    }
    get_footer()
?>
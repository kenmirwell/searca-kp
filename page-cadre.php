<?php 
    get_header();

    while (have_posts()) {
        the_post();       

        $cadre_obj = get_field("cadre-objectives");
        $obj_heading = $cadre_obj["objective_heading"];
        $obj_subheading = $cadre_obj["objective_subheading"];
        $obj_image = $cadre_obj["objective_image"];
        $obj_specs_title = $cadre_obj["specifications"]['specification_title'];
        $specs_1 = $cadre_obj["specifications"]['spec_1'];
        $specs_2 = $cadre_obj["specifications"]['spec_2'];
        $specs_3 = $cadre_obj["specifications"]['spec_3'];
        $specs_4 = $cadre_obj["specifications"]['spec_4'];
        $specs_5 = $cadre_obj["specifications"]['spec_5'];
        $specs_6 = $cadre_obj["specifications"]['spec_6'];

        $column_text = get_field('two_column_text'); 
        $right_1 = $column_text['right_column']['right_1'];
        $right_2 = $column_text['right_column']['right_2'];
        $left_1 = $column_text['left_column']['left_1'];
        $left_2 = $column_text['left_column']['left_2'];

        $org_str = get_field("organizational_structure");
        $org_str_heading = $org_str["org_structure_heading"];
        $org_str_sb1 = $org_str["org_structure_subheading"]["org_structure_subheading_paragraph_1"];
        $org_str_sb2 = $org_str["org_structure_subheading"]["org_structure_subheading_paragraph_2"];
        $org_str_sb3 = $org_str["org_structure_subheading"]["org_structure_subheading_paragraph_3"];

        $conceptual = get_field("conceptual_framework");
        $con_image = $conceptual["framework_image"];
       
        $org_str_h = [];
        
        for ($i = 1; $i <= 7; $i++) {
            $org_str_h[$i] = $org_str["org_structure_$i"]["structure_{$i}_heading"];
        }

        $org_str_sb = [];

        for ($i = 1; $i <= 7; $i++) {
            $org_str_sb[$i] = $org_str["org_structure_$i"]["structure_{$i}_subheading"];
        }


?>
<div class="">
    <div class="bg-[#196129]">
        <div class="flex relative w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto pt-[120px] pb-[50px] font-light">
            <div class="w-[50%]">
                <div class="flex gap-[5px] text-[#ffffff] text-[14px] font-extralight">
                    <p class="cursor-pointer"><a href="/">Home |</a></p>
                    <p class="cursor-pointer">About</p>
                </div>
                <div class="text-[#F7D671] text-[45px] pb-[20px] my-[20px]">
                    <h1 class="cursor-pointer font-[500]"><?php the_title() ?></h1>
                </div>
            </div>
            <div class="absolute right-0 bottom-0 w-[50%] h-[500px]">
                <?php
                    if ( has_post_thumbnail() ) {
                        $thumbnail_url = get_the_post_thumbnail_url();
                ?>
                      <div class="bg-black opacity-50 w-[100%] h-[100%] absolute top-0 left-0 z-[1]"></div>
                      <img class="absolute w-full h-full object-cover" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title(); ?>">
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[50px] font-light">
        <div class="flex gap-[20px]">
            <div class="flex flex-col gap-[20px] w-[50%]">
                <p><?php echo $right_1; ?></p>
                <p><?php echo $right_2; ?></p>
            </div>
            <div class="flex flex-col gap-[20px] w-[50%]">
                <p><?php echo $left_1; ?></p>
                <p><?php echo $left_2; ?></p>
            </div>
        </div>
    </div>
    <div class="bg-[#196129]">
        <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[50px] font-light text-[#ffffff]">
            <div class="flex relative items-end h-[300px] items-center">
                <div class="flex flex-col gap-[20px] w-[50%]">
                    <h6 class="text-[34px] font-[500]"><?php echo $obj_heading ?></h6>
                    <p class="font-[200]"><?php echo $obj_subheading ?></p>
                    <p class="font-[200]"><?php echo $obj_specs_title ?></p>
                </div>
                <div class="absolute right-0 bottom-0 w-[50%] h-[100%]">
                    <?php
                        if ( has_post_thumbnail() ) {
                            $thumbnail_url = get_the_post_thumbnail_url();
                    ?>
                        <!-- <div class="rounded-lg bg-black opacity-50 w-[100%] h-[100%] absolute top-0 left-0 z-[1]"></div> -->
                        <img class="rounded-lg absolute w-full h-full object-cover" src="<?php echo esc_url($obj_image); ?>" alt="<?php the_title(); ?>">
                    <?php
                        }
                    ?>
                </div>
            </div>
            <div class="font-[200] spec-list flex gap-[20px] pt-[50px]">
                <ul class="flex bulleted flex-col gap-[20px]">
                    <li><?php echo $specs_1 ?></li>
                    <li><?php echo $specs_2 ?></li>
                    <li><?php echo $specs_3 ?></li>
                </ul>
                <ul class="flex bulleted flex-col gap-[20px]">
                    <li><?php echo $specs_4 ?></li>
                    <li><?php echo $specs_5 ?></li>
                    <li><?php echo $specs_6 ?></li>
                </ul>
            </div>
        </div>
    </div>
    <div>
        <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] mx-auto pt-[60px] pb-[40px]">
            <div class="flex gap-[40px]">
                <div class="w-[65%]">
                    <div class="w-[100%] flex items-center justify-center">
                        <h2 class="text-[32px] font-600 mb-[20px]">Conceptual Framework, Components, and Activities</h2>
                    </div>
                    <div class="text-[16px] font-400">
                        <div class="mb-[10px]">
                            <p>Capitalizing on the interoperability of research, policy and program development, and knowledge management, as proven by RTLD's current functional areas, CADRE will support the transformation of Southeast Asia's agriculture sector through a systematic approach to development. These will be reinforced by technical assistance, capacity-building (extension) eﬀorts, and partnerships with relevant institutions/organizations in the region and beyond (Figure 1).</p>
                        </div>
                        <div class="mb-[10px]">  
                            <p>To achieve its goal of supporting agricultural transformation in the region, SEARCA will initially integrate its existing programs under RTLD and use these available resources to kick oﬀ CADRE’s activities.</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-[16px] mb-[10px] font-[600]">CADRE will have the following components:</p>
                        <div class="pb-[20px] relative">
                            <?php 
                                $component = new WP_Query(array(
                                    "post_type" => "component",
                                    "post_per_page" => 10
                                ));
            
                                if ($component->have_posts()) { 
                                    while ($component->have_posts()){
                                        $component->the_post();

                                        $logo_url = get_field("component_logo");
            
                                        $card_color = get_field("component_color");
            
                                        $aspiring_outcome = get_field("aspirational_outcome");
            
                                        $expected_output = get_field("expected_output");

                                        $page_link = get_field("component_page_link");
                            ?>
                                <div class="my-[5px] abosolute">
                                    <div 
                                        id="acc-head-<?php echo get_the_ID(); ?>" 
                                        onclick="handleAccordion('component-acc-<?php echo get_the_ID(); ?>', 'container-acc-<?php echo get_the_ID(); ?>', 'acc-head-<?php echo get_the_ID(); ?>')" 
                                        style="background-color: <?php echo esc_attr($card_color); ?>;" 
                                        class="rounded-t-lg transition-all duration-300 ease cursor-pointer"
                                    >
                                        <div class="text-[16px] text-[#ffffff] px-[20px] pt-[10px]">
                                            <h4><?php the_title()?></h4>
                                        </div>
                                    </div>
                                    <div 
                                        style="height: 0; border-color: <?php echo esc_attr($card_color); ?>" 
                                        id="container-acc-<?php echo get_the_ID(); ?>" 
                                        class="h-[100%] overflow-hidden transition-all duration-300 ease border-[1px] border-b-[6px] rounded-b-lg"
                                    >
                                        <div id="component-acc-<?php echo get_the_ID(); ?>" class="p-[20px]">
                                            <?php the_content(); ?>
                                            <a href="<?php echo esc_url($page_link)?>" class="text-[#196129] pt-[20px]">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } } ?>
                        </div>
                    </div>
                </div>
                <div class="w-[35%]">
                    <img src="<?php echo esc_url($con_image); ?>" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] mx-auto pt-[60px] pb-[40px]">
        <div class="w-[100%]">
            <h6 class="text-[32px]"><?php echo $org_str_heading ?></h6>
        </div>
        <div class="flex flex-col gap-[20px] pt-[20px]">
            <p><?php echo $org_str_sb1 ?></p>
            <p><?php echo $org_str_sb2 ?></p>
            <p><?php echo $org_str_sb3 ?></p>
        </div>
        <div class="flex flex-col gap-[10px]">
            <?php for ($i = 1; $i <= 7; $i++): ?>
                <div class="p-[20px] border-[1px] rounded-lg">
                    <h6 class="font-[700] text-[16px] pb-[10px]"><?php echo $org_str_h[$i]; ?></h6>
                    <p><?php echo $org_str_sb[$i]; ?></p>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</div>
<?php }

get_footer()
?>

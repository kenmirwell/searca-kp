<?php 
    get_header();

    while (have_posts()) {
        the_post();

        $cadre_objectives = get_field("cadre-objectives");

?>
<div class="bg-[#196129]">
    <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[10px] font-light">
        <div>
            <div class="flex gap-[5px] text-[#ffffff] text-[14px] font-extralight">
                <p class="cursor-pointer"><a href="/">Home |</a></p>
                <p class="cursor-pointer"><?php the_title()?></p>
            </div>
        </div>
    </div>
</div>
<?php
    the_content();
?>
<div class="bg-[#3AC05E]">
    <div class="pt-[40px] pb-[60px]">
        <div class="text-[32px] w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] mx-auto text-[#ffffff]">
            <div class="flex flex-col justify-center text-center py-[20px]">
                <h2 class="text-[32px]">Objectives</h2>
                <div class="py-[20px]">
                    <h6 class="text-[18px] font-[200]"><span class="font-[600]">General Objective:</span> CADRE aims to build a regional network of high-caliber, like-minded institutions that will work together to provide research and extension support in addressing the most pressing issues and challenges faced by Southeast Asia's agriculture sector that can hinder or delay its desired transformation.</h6>
                </div>
            </div>
            <div class="font-[200]">
                <div class="pb-[20px]">
                    <p class="text-[16px]">Speciﬁcally, CADRE will:</p>
                </div>
                <div class="flex gap-[20px]">
                    <ul class="flex flex-col gap-[20px]">
                        <li class="objective-item text-[16px]">Facilitate the setting of research and development priorities that address SEA-wise challenges and draw on the strength of the member states capabilities.</li>
                        <li class="objective-item text-[16px]">Support policy and program development through participatory and bottom-up approaches to provide policymakers with evidence-based, timely, and realistic recommendations to address critical issues and challenges in the region's agriculture sector.</li>
                        <li class="objective-item text-[16px]">Disseminate research results, facilitate knowledge exchanges and discussions on the most pressing issues and challenges the agriculture sector faces, and provide data and information on key agricultural indicators.</li>
                    </ul>
                    <ul class="flex flex-col gap-[20px]">
                        <li class="objective-item text-[16px]">Foster collaborative research on these priorities among its members and partners on priority and emerging topics related to agricultural development in Southeast Asia.</li>
                        <li class="objective-item text-[16px]">Strengthen institutional and technical capacities of its members, partners, and stakeholders by providing technical assistance/extension services and developing their skills through capacity-building activities to prepare them for the future of work in agriculture.</li>
                        <li class="objective-item text-[16px]">Establish stronger partnerships among the academe-industry-government nexus and with other relevant organizations that could accelerate the transformation of Southeast Asia's agriculture sector.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] mx-auto pt-[60px] pb-[40px]">
        <div class="w-[100%] flex items-center justify-center">
            <h2 class="text-[32px] font-600 mb-[20px]">Conceptual Framework, Components, and Activities</h2>
        </div>
        <div class="flex gap-[40px]">
            <div class="w-[65%]">
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
                <img src="<?php echo get_permalink(398); ?>" alt="">
            </div>
        </div>
    </div>
</div>
<div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] mx-auto pt-[60px] pb-[40px]">
    <div class="w-[100%] flex items-center justify-center">
        <h2 class="text-[32px] font-600 mb-[20px]">Organizational Structure, Governance, and Membership</h2>
    </div>
    <div class="grid grid-cols-3 gap-[20px]">
        <div class="p-[40px] rounded-lg shadow text-[16px] font-[300]">
            <p>CADRE will be governed by a Board. All decisions and strategic directions will come from the Board with recommendations from the Technical Advisory Committee (TAC) and the CADRE Secretariat. A Board Meeting will be organized annually and held back-to-back with the CADRE planning meeting.</p>
        </div>
        <div class="p-[40px] rounded-lg shadow text-[16px] font-[300]">
            <p>TAC will provide technical guidance and support to steer CADRE's activities and programs. For the day-to-day operations, coordination, monitoring, and evaluation of CADRE programs and activities, a Secretariat will be established at the SEARCA Headquarters under RTLD. Quarterly TAC consultation meetings and monthly meetings of the Secretariat will be organized to monitor and discuss the progress of implementing projects/activities under CADRE.</p>
        </div>
        <div class="p-[40px] rounded-lg shadow text-[16px] font-[300]">
            <p>CADRE will build its membership in phases starting with the academic institutions, industries/private sector, and governments in Southeast Asia. Non-governmental, research, farmers, and civil society organizations who are interested in being part of the Consortium will also be welcomed. CADRE will also aspire to expand its membership beyond Southeast Asia.</p>
        </div>
    </div>
</div>
<div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] mx-auto pt-[60px] pb-[40px]">
    <div class="w-[100%] flex items-center justify-center">
        <h2 class="text-[32px] font-600 mb-[20px]">Planned Activities for Fiscal Year 2024-2025</h2>
    </div>
</div>
<?php }

get_footer()
?>

<div class="py-[50px]">
    <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
        <div class="flex flex-col gap-[5px] items-baseline text-center w-[100%] mx-auto pb-[20px] md:pb-[40px]">
            <div class="text-left w-[50%]">
                <h6 class="text-[22px] md:text-[42px] text-[#1f1f1f] pb-[10px] font-bold">Key pillars of our work</h6>
                <p class="text-[16px]">The foundation of our work, driving collaboration, research, and sustainable solutions in agriculture, forestry, and natural resource management.</p>
            </div>
        </div>
        <div class="flex flex-wrap xl:flex-nowrap flex-col sm:flex-row justify-between items-start gap-[10px] xl:gap-[20px]">
            <?php 
                $components = new WP_Query(array(
                    "post_type" => "component",
                    "posts_per_page" => 10,
                    'order' => 'DESC',     
                ));

                if ($components->have_posts()) {
                    while ($components->have_posts()){
                
                        $components->the_post();
                        $logo_url = get_field("component_logo");
                        $card_color = get_field("component_color");
                        $aspiring_outcome = get_field("aspirational_outcome");
                        $expected_output = get_field("expected_output");
                        $thumbnail_url = get_the_post_thumbnail_url();
                        $page_link = get_field("component_page_link");
                        $components_index = (int) $components->current_post;

                        set_query_var('component_index', $components_index);
                        set_query_var('logo_url', $logo_url);
                        set_query_var('card_color', $card_color);
                        set_query_var('aspiring_outcome', $aspiring_outcome);
                        set_query_var('expected_output', $expected_output);
                        set_query_var('thumbnail_url', $thumbnail_url);
                        set_query_var('page_link', $page_link);
                    
                    get_template_part("includes/components/component");
                ?>
                <?php } } 
                
                wp_reset_postdata(); 
                
            ?>
        </div>
    </div>
</div>
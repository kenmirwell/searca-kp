<?php 
    get_header();

    while (have_posts()) {
        the_post();

        $agpractices_brief_description = get_field("agpractices_brief_description");
        $agpractices_image = get_field("agpractices_image");
        $link_to_agpractices = get_field("link_to_agpractices");
        $cop_image = get_field("cop_image");
        $cop_image_2 = get_field("cop_image_2");
        $cop_title = get_field("cop_title");
        $cop_description = get_field("cop_description");
        $cop_link = get_field("cop_link");
        $cadre_in_action_banner = get_field("cadre_in_action_banner");
        $faq_list = get_field('faq_list');
?>
    <?php
        $home_banner = new WP_Query(array(
            "post_type" => "home-banner",
            "post_per_page" => 10
        ));
    ?>
    <div>
        <div class="bg-[#196129] h-[780px]">
            <?php
                // $home_banner = new WP_Query(array(
                //     "post_type" => "home-banner",
                //     "post_per_page" => 10
                // ));
            ?>
                <div class="banner-slider h-[100%]">
                
                <?php
                    if ($home_banner->have_posts()) {
                        while ($home_banner->have_posts()){
                            $home_banner->the_post();
                            
                            $banner_alignment = get_field("banner_alignment");
                            $banner_background = get_field("banner_background");
                            $button_link = get_field("button_url");
                            $button_name = get_field("button_name");
                            $thumbnail_url = get_the_post_thumbnail_url();

                            set_query_var('thumbnail_url', $thumbnail_url);
                            set_query_var('banner_alignment', $banner_alignment);
                            set_query_var('banner_background', $banner_background);
                            set_query_var('button_name', $button_name)
                ?>  
                    <div class="slide-container">
                        <?php
                            if ( has_post_thumbnail()) {
                                if($banner_alignment !== "text-center") {
                                    get_template_part("includes/banner/thumbnail", "left-right");
                                } else {
                                    get_template_part("includes/banner/thumbnail", "center");
                                }
                                // get_template_part("includes/banner/thumbnail");
                            } else if(!has_post_thumbnail()) {
                                get_template_part("includes/banner/nothumbnail");
                            }
                        ?>
                    </div>
                <?php }}?>
            </div>
        </div>
        <div class="py-[100px] bg-[#fffeeb]">
            <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
                <div class="flex flex-col gap-[5px] items-center text-center w-[100%] mx-auto pb-[20px] md:pb-[40px]">
                    <div class="text-[22px] lg:text-[32px] font-[600]">
                        <h2>Key pillars of our work</h2>
                    </div>
                </div>
                <div class="flex flex-wrap lg:flex-nowrap flex-col sm:flex-row justify-center items-start gap-[20px]">
                    <?php 
                        $thematic_areas = new WP_Query(array(
                            "post_type" => "thematic-area",
                            "post_per_page" => 10
                        ));

                        if ($thematic_areas->have_posts()) {
                            while ($thematic_areas->have_posts()){
                        
                                    $thematic_areas->the_post();
                                    $logo_url = get_field("thematic_logo");
                                    $card_color = get_field("thematic_color");
                                    $aspiring_outcome = get_field("aspirational_outcome");
                                    $expected_output = get_field("expected_output");
                                    $thumbnail_url = get_the_post_thumbnail_url();

                                    set_query_var('logo_url', $logo_url);
                                    set_query_var('card_color', $card_color);
                                    set_query_var('aspiring_outcome', $aspiring_outcome);
                                    set_query_var('expected_output', $expected_output);
                                    set_query_var('thumbnail_url', $thumbnail_url);

                            get_template_part("includes/components/component", "desktop");

                            get_template_part("includes/components/component", "mobile");
                        ?>
                        <?php } } ?>
                    </div>
                </div>
            </div>
        <div class="bg-[#196129] pt-[80px] relative overflow-hidden">
            <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
                <div class="flex justify-center gap-[60px] items-end">
                    <div class="w-[40%] pt-[50px] flex flex-col gap-[10px] text-left items-center mx-auto pb-[20px] md:pb-[40px]">
                        <div class="text-[#ffffff] w-[100%] text-[22px] lg:text-[32px] font-[600]">
                            <h2>Agpractices and Domains: transforming agriculture through data and innovation</h2>
                        </div>
                        <div class="flex flex-col gap-[20px]">
                            <div class="text-[#ffffff] w-[100%] font-light md:font-normal text-[12px] lg:text-[16px]">
                                <p class="font-[300]"><?php echo $agpractices_brief_description ?></p>
                                <ul class="flex flex-col gap-[10px] py-[20px] agpractices-list">
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
                        <div class="flex w-[100%]">
                            <div class="flex gap-[20px] py-[5px] pl-[20px] pr-[5px] bg-[#ceab23] rounded-full">
                                <button>Explore the platform</button>
                                <div class="bg-[#2a7f3d] rounded-full p-[10px]">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.10042 21.8995L21.8994 2.10051M21.8994 2.10051H2.10042M21.8994 2.10051V21.8995" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-[60%] overflow-hidden rounded-t-xl">
                        <div class="flex justify-center p-[20px] bg-[#2a7f3d]">
                            <img class="w-full h-full object-cover" src="<?php echo esc_url($agpractices_image) ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- <img class="w-[100%] absolute opacity-[.09] top-[0]" src="https://bcsdevelopmentgator.site/wp-content/uploads/2024/10/20231125123019_mm_aung_chan_thar-766aa0f6.webp" alt=""> -->
        </div>
        <!-- <div class="py-[20px] lg:py-[100px]">
            <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
                <div class="flex gap-[40px] items-center">
                    <div class="w-[30%] rounded-lg overflow-hidden">
                        <img src="<?php //echo esc_url($cop_image) ?>" alt="">
                    </div>
                    <div class="w-[80%] lg:w-[50%] flex flex-col gap-[10px] text-left">
                        <h6 class="text-[16px] lg:text-[24px] font-[600]">Join the Community</h6>
                        <p class="text-[12px] lg:text-[16px] font-[300]">Built upon SEARCA's experiences and goals in developing and disseminating science-based information, the K-Hub aims to create a collaborative space for learning through this. The platform is set to be a system that produces a digital lifestyle, allowing its users to share and co-learn about each other's experiences in day-to-day operations.</p>
                        <a class="text-[12px] lg:text-[16px] text-[#458753]" href="">Learn More</a>
                    </div>
                    <div class="hidden lg:block w-[1px] h-[250px] bg-[#458753]"></div>
                    <div class="hidden lg:flex text-[12px] lg:text-[16px] w-[20%] flex flex-col items-end gap-[5px] font-[600] text-center">
                        <a class="rounded-lg bg-[#F3BD1C] px-[35px] py-[10px] w-[100%]" href="<?php //echo esc_url(get_permalink(416)) ?>">Log in</a>
                        <div class="flex gap-[10px] justify-center w-[100%]">
                            <span>or</span>
                            <a class="text-[#458753]" href="<?php //echo esc_url(get_permalink(341)) ?>">Register for free</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="py-[20px] lg:py-[100px]">
            <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
                <div>
                    <h2 class="text-[32px]">Sprouting Knowledge.</br> Cultivating Conversations.</h2>
                    <div class="flex justify-between pt-[20px] pb-[40px]">
                        <div class=" w-[70%]">
                            <p>Become part of discussions and build our community. Join a vibrant network of agricultural professionals, researchers, and stakeholders dedicated to driving sustainable change in Southeast Asia.</p>
                        </div>
                        <div class="flex items-center gap-[20px]">
                            <div class="flex">
                                <a class="flex gap-[20px] py-[5px] pl-[20px] pr-[5px] bg-[#2a7f3d] rounded-full" href="<?php echo esc_url(get_permalink(341)) ?>">
                                    <button class="text-[#ffffff]">Register for free</button>
                                    <div class="bg-[#ceab23] rounded-full p-[10px]">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.10042 21.8995L21.8994 2.10051M21.8994 2.10051H2.10042M21.8994 2.10051V21.8995" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a class="" href="<?php echo esc_url(get_permalink(416)) ?>">Log in</a>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-[20px] h-[450px]">
                        <div class="flex items-end relative h-[100%] w-[30%] rounded-3xl overflow-hidden">
                            <img class="absolute w-full h-full object-cover" src="<?php echo esc_url($cop_image) ?>">
                        </div>
                        <div class="flex items-end relative h-[100%] w-[70%] rounded-3xl overflow-hidden">
                            <img class="absolute w-full h-full object-cover" src="<?php echo esc_url($cop_image_2) ?>">
                        </div>
                    </div>
                </div>        
            </div>
        </div>
        <div class="flex w-[100%] h-[720px] relative">
            <div class="flex w-[40%] mx-auto justify-between items-center relative z-[9]">
                <h2 class="text-[#ffffff] text-[48px]">See CADRE in Action</br> Driving Agricultural</br> Innovation</h2>
                <div class="flex flex-col items-center justify-center gap-[20px]">
                    <div class="flex relative justify-center items-center">
                        <div class="bg-[#ffffff] p-[50px] rounded-full"></div>
                        <svg class="z-[2] absolute" width="11" height="14" viewBox="0 0 11 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 14V0L11 7L0 14Z" fill="#1D1B20"/>
                        </svg>
                    </div>
                    <h2 class="text-[#ffffff]">Watch the Video</h2>
                </div>
            </div>
            <div class="bg-black opacity-50 w-[100%] h-[100%] absolute top-0 left-0 z-[1]"></div>
            <img class="absolute w-full h-full object-cover object-bottom" src="<?php echo esc_url($cadre_in_action_banner) ?>">
        </div>
        <div class="bg-[#FFFbf1] pt-[50px] pb-[150px]">
            <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
                <div class="flex justify-between items-end pb-[50px]">
                    <div>
                        <h2 class="text-[32px]">Knowledge resources</br> empowering informed decisions</h2>
                    </div>
                    <div class="flex gap-[20px]">
                        <div class="flex gap-[20px] items-center text-[#458753] text-[16px] font-[600] border-b-[1px] border-[#458753] py-[10px]">
                            <button>Type</button>
                            <svg width="22" height="8" viewBox="0 0 32 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M30 2L16 16L2 2" stroke="#458753" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div>
                            <?php
                                $terms = get_terms(array(
                                    'taxonomy' => 'km_category', // Replace with your taxonomy name
                                    'hide_empty' => false,       // Set to true if you only want terms with posts
                                ));
                            ?>
                            <ul class="category-container w-[100%] flex flex-col sm:flex-row lg:flex-col flex-nowrap sm:flex-wrap lg:flex-nowrap gap-[0px] sm:flex-row sm:gap-[20px] lg:gap-[0px] text-[12px] justify-center text-[center] font-[300] my-[10px] lg:text-[14px] lg:text-[left] lg:justify-start">
                                <?php    
                                if (!is_wp_error($terms)) {
                                    foreach ($terms as $term) {
                                        // echo '<li class="text-[#196129] p-[5px] cursor-pointer hover:font-[600]" data-name="' . $term->name . '" data-value="' . esc_attr($term->term_id) . '">' . esc_html($term->name) . '</li>';
                                        ?>
                                            <div>

                                            </div>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <div>
                            <div class="flex h-[100%]">
                                <input id="search-resources" class="w-[250px] font-[600] h-[100%] border-b-[1px] bg-transparent border-[#458753] text-[16px] text-[#458753] placeholder-[#458753] py-[10px] px-[10px]" type="text" placeholder="Topic">
                            </div>
                        </div>
                        <div class="flex w-[100%]">
                            <div>
                                <a class="flex gap-[20px] py-[5px] pl-[20px] pr-[5px] bg-[#2a7f3d] rounded-full" href="<?php echo esc_url(get_permalink(341)) ?>">
                                    <button class="text-[#ffffff]">Explore resources</button>
                                    <div class="bg-[#ceab23] rounded-full p-[10px]">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.10042 21.8995L21.8994 2.10051M21.8994 2.10051H2.10042M21.8994 2.10051V21.8995" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-[100%]">
                    <div id="home-search-container" class="home-search-container hidden">
                        <div id="search-result-title" class="hidden pb-[20px]">
                            <h6 class="font-[600]">Search Result</h6>
                        </div>
                        <div id="home-search-result" class="flex flex-col gap-[10px]">
                        </div>
                    </div>
                    <div id="home-featured-resources" class="h-auto">
                        <?php
                            $knowledge_management = new WP_Query(array(
                                "post_type" => "knowledge-management",
                                "tax_query" => array(
                                    array(
                                        "taxonomy" => "km_category",
                                        "field"    => "slug",
                                        "terms"    => "Featured",
                                    ),
                                ),
                            ));
                        ?>
                        <a href="<?php echo get_permalink($learning_materials_id) ?>" class="hidden md:flex justify-center gap-[30px] relative py-[10px] h-[500px] h-auto">
                            <?php 
                                if ($knowledge_management->have_posts()) {
                                    while ($knowledge_management->have_posts()){
                                        $knowledge_management->the_post();

                                        $learning_materials_id = get_the_ID();
                            ?>
                                <div class="flex h-auto justify-start gap-[20px] w-[100%]">
                                    <div class="flex flex-col h-auto rounded-[15px] overflow-hidden cursor-pointer">
                                        <div class="flex h-[400px] relative bg-[#ffffff] rounded-[15px] overflow-hidden">
                                            <div class="absolute top-[15px] left-[15px] z-[11]">
                                                 <?php 
                                                    $terms = get_the_terms(get_the_ID(), 'km_category'); 
                                                    if ($terms && !is_wp_error($terms)) {
                                                        foreach ($terms as $term) {
                                                            if (strtolower($term->name) !== 'featured') { 
                                                                echo '<p class="text-[#ffffff] text-[14px] rounded-full backdrop-blur-lg bg-white/10 py-[8px] px-[20px]">' . esc_html($term->name) . '</p>';
                                                            }
                                                        }
                                                    }
                                                 ?>
                                            </div>
                                            <div class="bg-black opacity-5 w-[100%] h-[100%] absolute top-0 left-0 z-10 group-hover:opacity-0 transition-all duration-200 ease"></div>
                                            <?php
                                                if ( has_post_thumbnail() ) {
                                                    $thumbnail_url = get_the_post_thumbnail_url();
                                            ?>
                                                <img class="absolute w-full h-full object-cover" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title(); ?>">
                                            <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="flex h-auto pb-[20px]">
                                            <div class="pt-[40px] pb-[10px]">
                                                <div class="flex gap-[10px]">
                                                    <p class="text-[16px] text-[#458753]">Published Date</p>
                                                </div>
                                                <div class="flex items-end text-[24px] font-bold">
                                                    <h4><?php the_title()?></h4>
                                                </div>
                                                <div class="pt-[10px] font-extralight text-[16px] h-[60px] overflow-hidden">
                                                    <p><?php the_content()?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php   }
                                }
                            ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-[#FFFbf1] pt-[50px] pb-[150px]">
            <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
                <div class="flex">
                    <div>
                        <h2>Frequently asked questions</h2>
                        <p>Find answers to common questions about CADRE, our platform, and how we support sustainable agriculture in Southeast Asia.</p>
                        <a class="flex gap-[20px] py-[5px] pl-[20px] pr-[5px] bg-[#2a7f3d] rounded-full" href="<?php echo esc_url(get_permalink(341)) ?>">
                            <button class="text-[#ffffff]">Explore resources</button>
                            <div class="bg-[#ceab23] rounded-full p-[10px]">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.10042 21.8995L21.8994 2.10051M21.8994 2.10051H2.10042M21.8994 2.10051V21.8995" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </a>
                    </div>
                    <div>
                    <?php 
                        if ($faq_list) {
                            $question = $faq_list['question'];

                            echo '<h2>' . esc_html($question) . '</h2>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
    }
    get_footer();
?>

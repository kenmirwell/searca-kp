<?php 
    get_header();

    while (have_posts()) {
        the_post();

        $agpractices_brief_description = get_field("agpractices_brief_description");
        $agpractices_image = get_field("agpractices_image");
        $link_to_agpractices = get_field("link_to_agpractices");
        $cop_image = get_field("cop_image");
        $cop_title = get_field("cop_title");
        $cop_description = get_field("cop_description");
        $cop_link = get_field("cop_link");
?>
    <?php
        $home_banner = new WP_Query(array(
            "post_type" => "home-banner",
            "post_per_page" => 10
        ));
    ?>
    <div>
        <div class="bg-[#196129]">
            <div class="">
                <?php
                    // $home_banner = new WP_Query(array(
                    //     "post_type" => "home-banner",
                    //     "post_per_page" => 10
                    // ));
                ?>
                    <div class="banner-slider">
                    
                    <?php
                        if ($home_banner->have_posts()) {
                            while ($home_banner->have_posts()){
                                $home_banner->the_post();
                                
                                $banner_alignment = get_field("banner_alignment");
                    ?>  
                        <div class="slide-container">
                            <?php
                                if ( has_post_thumbnail() && $banner_alignment !== "center-align" ) {
                                    $thumbnail_url = get_the_post_thumbnail_url();
                            ?>
                            <div class="<?php echo esc_html($banner_alignment); ?> slide-content w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto relative">
                                <div class="w-[100%] lg:w-[50%] text-container">
                                    <div>
                                        <h1><?php the_title() ?></h1>
                                    </div>
                                    <div class="tracking-wide leading-relaxed">
                                        <?php the_content() ?>
                                    </div>
                                </div>
                                <div class="w-[100%] lg:w-[50%] image-container">
                                        <div class="h-[200px] md:h-[320px] lg:h-[450px] rounded-lg overflow-hidden">
                                            <img class="w-full h-full object-cover" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title(); ?>">
                                        </div>
                                </div>
                            </div>
                            <?php
                                } else if(!has_post_thumbnail()) {
                                $thumbnail_url = get_the_post_thumbnail_url();
                            ?>
                                <div class="center-align slide-content h-[100%] w-[100%] relative">
                                    <div class="text-container w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px]] mx-auto text-center z-[2]">
                                        <div>
                                            <h1><?php the_title() ?></h1>
                                        </div>
                                        <div class="tracking-wide leading-relaxed">
                                            <?php the_content() ?>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                } else {
                                $thumbnail_url = get_the_post_thumbnail_url();
                            ?>
                                <div class="center-align slide-content h-[100%] w-[100%] relative">
                                    <div class="text-container w-[80%] sm:w-[640px] md:w-[768px] mx-auto text-center z-[2]">
                                        <div>
                                            <h1><?php the_title() ?></h1>
                                        </div>
                                        <div class="tracking-wide leading-relaxed">
                                            <?php the_content() ?>
                                        </div>
                                    </div>
                                    <div class="bg-black opacity-50 w-[100%] h-[100%] absolute top-0 left-0 z-[1]"></div>
                                    <img class="absolute w-full h-full object-cover" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title(); ?>">
                                </div>
                            <?php   }
                            ?>
                        </div>

                    <?php }}?>
                </div>
            </div>
        </div>
        <div class="py-[50px]">
            <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
                <div class="flex flex-col gap-[5px] items-center text-center w-[100%] mx-auto pb-[20px] md:pb-[40px]">
                    <div class="text-[22px] lg:text-[32px] font-[600]">
                        <h2>Components</h2>
                    </div>
                    <div class="font-light md:font-normal text-[12px] lg:text-[16px]">
                        <p class="font-[300]">Knowledge products by thematic areas from the research initiatives and various activities of SEARCA and its partners</p>
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
                    ?>
                    <div class="hidden lg:block h-[370px] xl:h-[435px]">
                        <div style="background-color: <?php echo esc_attr($card_color); ?>" class="z-10 rounded-xl relative flex flex-col justify-between p-[20px] pb-[40px] h-[100%]">
                            <div class="flex flex-col">
                                <div class="flex justify-center z-10">
                                    <div class="rounded-full flex justify-between h-[80px] w-[80px]">
                                        <img class="w-[100%] h-[100%]" src="<?php echo esc_url($logo_url); ?>" alt="<?php the_title(); ?> logo">
                                    </div>
                                </div>
                                <div class="flex flex-col gap-[20px] items-center text-center w-[150px] xl:w-[200px] mx-auto">
                                    <div class="text-[12px] xl:text-[18px] font-bold pt-[10px] text-[#ffffff]">
                                        <h4><?php the_title()?></h4>
                                    </div>
                                    <div class="pt-[10px] font-extralight text-[10px] xl:text-[14px] text-[#ffffff]">
                                        <?php echo $aspiring_outcome?>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-center text-white">
                                <a href="<?php echo get_permalink(get_the_ID()) ?>" class="rounded-lg border border-[1px] xl:border-2 border-white px-[10px] xl:px-[20px] py-[5px] xl:py-[10px] text-[12px] xl:text-[14px]">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="block lg:hidden w-[100%]">
                        <div style="background-color: <?php echo esc_attr($card_color); ?>" class="w-[100%] pb-[15px] pt-[10px] rounded-lg">
                            <div class="flex flex-col">
                                <div class="flex justify-between gap-[25px] pr-[17px] pl-[5px]">
                                    <div class="flex">
                                        <div class="flex justify-center">
                                            <div class="rounded-full flex justify-between h-[80px] w-[80px]">
                                                <img class="w-[100%] h-[100%]" src="<?php echo esc_url($logo_url); ?>" alt="<?php the_title(); ?> logo">
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text-[12px] font-bold pt-[10px] text-[#ffffff]">
                                                <h4><?php the_title()?></h4>
                                            </div>
                                            <div class="pt-[5px] font-extralight text-[10px] text-[#ffffff]">
                                                <?php echo $aspiring_outcome?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center text-white">
                                        <a href="<?php echo get_permalink(get_the_ID()) ?>" class="">
                                            <svg width="10" height="24" viewBox="0 0 14 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="1.41406" width="17" height="2" rx="1" transform="rotate(45 1.41406 0)" fill="#ffffff"/>
                                                <rect x="13.4355" y="12.4141" width="17" height="2" rx="1" transform="rotate(135 13.4355 12.4141)" fill="#ffffff"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
        <div class="bg-[#196129] pt-[80px] mt-[80px] relative overflow-hidden">
            <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
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
        <div class="py-[20px] lg:py-[100px]">
            <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
                <div class="flex gap-[40px] items-center">
                    <div class="w-[30%] rounded-lg overflow-hidden">
                        <img src="<?php echo esc_url($cop_image) ?>" alt="">
                    </div>
                    <div class="w-[80%] lg:w-[50%] flex flex-col gap-[10px] text-left">
                        <h6 class="text-[16px] lg:text-[24px] font-[600]">Join the Community</h6>
                        <p class="text-[12px] lg:text-[16px] font-[300]">Built upon SEARCA's experiences and goals in developing and disseminating science-based information, the K-Hub aims to create a collaborative space for learning through this. The platform is set to be a system that produces a digital lifestyle, allowing its users to share and co-learn about each other's experiences in day-to-day operations.</p>
                        <a class="text-[12px] lg:text-[16px] text-[#458753]" href="">Learn More</a>
                    </div>
                    <div class="hidden lg:block w-[1px] h-[250px] bg-[#458753]"></div>
                    <div class="hidden lg:flex text-[12px] lg:text-[16px] w-[20%] flex flex-col items-end gap-[5px] font-[600] text-center">
                        <a class="rounded-lg bg-[#F3BD1C] px-[35px] py-[10px] w-[100%]" href="<?php echo esc_url(get_permalink(416)) ?>">Log in</a>
                        <div class="flex gap-[10px] justify-center w-[100%]">
                            <span>or</span>
                            <a class="text-[#458753]" href="<?php echo esc_url(get_permalink(341)) ?>">Register for free</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-[#FFFbf1] pt-[50px] pb-[150px]">
            <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
                <div class="w-[100%] flex justify-center items-center">
                    <h6 class="text-[16px] lg:text-[24px] font-[600]">Knowledge Management</h6>
                </div>
                <div class="text-[12px] lg:text-[16px] lg:w-[70%] mx-auto flex justify-center text-center pt-[20px] font-[300]">
                    <p>Increased awareness and knowledge of its members, partners, and stakeholders on the most pressing issues and challenges faced by the agriculture sector.</p>
                </div>
                <div class="flex flex-col lg:flex-row justify-center gap-[30px] py-[40px]">
                    <div class="w-[100%] lg:w-[30%] mb-[10px] border-b-[1px] border-[#458753]">
                        <div class="">
                            <h6 class="text-[12px] lg:text-[14px] font-[600]">Search by topic</h6>
                            <div class="flex mt-[10px] gap-[10px] justify-between bg-[#458753] px-[10px] py-[15px] items-center rounded-md overflow-hidden w-[100%]">
                                <input id="search-resources" class="w-[100%] font-[300] text-[14px] text-[#458753] placeholder-[#458753] py-[2px] px-[5px] bg-[#ffffff] rounded-md" type="text" placeholder="Type a topic here...">
                            </div>
                        </div>
                        <div class="hidden md:block mt-[20px]">
                            <h6 class="font-[600]">Search by type</h6>
                            <div class="flex gap-[5px]">
                                <ul class="category-container w-[50%] flex flex-col text-[14px] font-[300] mt-[10px]">
                                    <li class="text-[#196129] p-[5px] cursor-pointer" data-value="books">Books</li>
                                    <li class="text-[#196129] p-[5px] cursor-pointer" data-value="briefs-and-notes">Briefs and Notes</li>
                                    <li class="text-[#196129] p-[5px] cursor-pointer" data-value="discussion-papers">Discussion Papers</li>
                                    <li class="text-[#196129] p-[5px] cursor-pointer" data-value="featured">Featured</li>
                                    <li class="text-[#196129] p-[5px] cursor-pointer" data-value="monographs">Monographs</li>
                                </ul>
                                <ul class="category-container w-[50%] flex flex-col text-[14px] font-[300] mt-[10px]">
                                    <li class="text-[#196129] p-[5px] cursor-pointer" data-value="proceedings-and-workshop-reports">Proceedings and Workshop Reports</li>
                                    <li class="text-[#196129] p-[5px] cursor-pointer" data-value="refereed-journal">Refereed Journal</li>
                                    <li class="text-[#196129] p-[5px] cursor-pointer" data-value="videos">Videos</li>
                                </ul>
                            </div>
                        </div>
                        <div class="block md:hidden mt-[20px]">
                            <h6 class="text-[12px] lg:text-[16px] font-[600]">Search by type</h6>
                            <div class="flex gap-[5px] pb-[20px]">
                                <ul class="category-container w-[100%] flex flex-col text-[12px] font-[300] mt-[10px]">
                                    <li class="text-[#196129] p-[5px] cursor-pointer" data-value="books">Books</li>
                                    <li class="text-[#196129] p-[5px] cursor-pointer" data-value="briefs-and-notes">Briefs and Notes</li>
                                    <li class="text-[#196129] p-[5px] cursor-pointer" data-value="discussion-papers">Discussion Papers</li>
                                </ul>
                                <ul class="category-container w-[100%] flex flex-col text-[12px] font-[300] mt-[10px]">
                                    <li class="text-[#196129] p-[5px] cursor-pointer" data-value="featured">Featured</li>
                                    <li class="text-[#196129] p-[5px] cursor-pointer" data-value="monographs">Monographs</li>
                                    <li class="text-[#196129] p-[5px] cursor-pointer" data-value="proceedings-and-workshop-reports">Proceedings and Workshop Reports</li>
                                </ul>
                                <ul class="category-container w-[100%] flex flex-col text-[12px] font-[300] mt-[10px]">
                                    <li class="text-[#196129] p-[5px] cursor-pointer" data-value="refereed-journal">Refereed Journal</li>
                                    <li class="text-[#196129] p-[5px] cursor-pointer" data-value="videos">Videos</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="w-[100%] lg:w-[80%]">
                        <div id="home-search-container" class="home-search-container hidden">
                            <div id="search-result-title" class="hidden pb-[20px]">
                                <h6 class="font-[600]">Search Result</h6>
                            </div>
                            <div id="home-search-result" class="flex flex-col gap-[10px]">
                            </div>
                        </div>
                        <div id="home-featured-resources" class="">
                            <div class="w-[100%] text-center font-[600]">
                                <p>Featured Resources</p>
                            </div>
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
                            <div class="hidden md:flex justify-center gap-[30px] relative py-[10px] h-[345px]">
                                <?php 
                                    if ($knowledge_management->have_posts()) {
                                        while ($knowledge_management->have_posts()){
                                            $knowledge_management->the_post();

                                            $learning_materials_id = get_the_ID();
                                ?>
                                    <div class="flex justify-start gap-[20px] w-[220px]">
                                        <div class="flex flex-col rounded-[15px] overflow-hidden group hover:shadow-md transition-all duration-200 ease cursor-pointer">
                                            <div class="h-[150px] relative bg-[#ffffff]">
                                                <div class="bg-black opacity-5 w-[100%] h-[100%] absolute top-0 left-0 z-10 group-hover:opacity-0 transition-all duration-200 ease"></div>
                                                <div class="w-[100%] h-[100%] absolute top-0 left-0">
                                                        <?php
                                                            if ( has_post_thumbnail() ) {
                                                                $thumbnail_url = get_the_post_thumbnail_url();
                                                        ?>
                                                            <img class="w-full h-full object-cover" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title(); ?>">
                                                        <?php
                                                            }
                                                        ?>
                                                </div>
                                            </div>
                                        <div class="flex flex-col justify-between h-[100%] bg-[#EAE9E5] group-hover:bg-[#FFF7E0] transition-all duration-200 ease pb-[20px]">
                                            <div class="px-[20px] py-[10px]">
                                                <div class="text-[14px] font-bold h-[40px]">
                                                    <h4><?php the_title()?></h4>
                                                </div>
                                                <div class="pt-[10px] font-extralight text-[12px] h-[100px] overflow-hidden">
                                                    <p><?php the_content()?></p>
                                                </div>
                                            </div>
                                            <div class="flex justify-center items-center text-[12px] w-[100%]">
                                                <a href="<?php echo get_permalink($learning_materials_id) ?>" class="text-[#196129] px-[8px] py-[5px] text-[14px]">View Now</a>  
                                                <?php $learning_materials_id ?>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                <?php   }
                                    }
                                ?>
                            </div>
                            <div class="flex flex-col md:hidden justify-center gap-[30px] relative py-[10px]">
                                <?php 
                                    if ($knowledge_management->have_posts()) {
                                        while ($knowledge_management->have_posts()){
                                            $knowledge_management->the_post();

                                            $learning_materials_id = get_the_ID();
                                ?>
                                    <div class="flex justify-start gap-[20px] w-[100%]">
                                        <div class="flex flex-row rounded-[15px] overflow-hidden group hover:shadow-md transition-all duration-200 ease cursor-pointer">
                                            <div class="w-[30%] relative bg-[#ffffff]">
                                                <div class="bg-black opacity-5 w-[100%] h-[100%] absolute top-0 left-0 z-10 group-hover:opacity-0 transition-all duration-200 ease"></div>
                                                <div class="w-[100%] h-[100%] absolute top-0 left-0">
                                                        <?php
                                                            if ( has_post_thumbnail() ) {
                                                                $thumbnail_url = get_the_post_thumbnail_url();
                                                        ?>
                                                            <img class="w-full h-full object-cover" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title(); ?>">
                                                        <?php
                                                            }
                                                        ?>
                                                </div>
                                            </div>
                                            <div class="w-[80%] flex flex-col justify-between h-[100%] bg-[#EAE9E5] group-hover:bg-[#FFF7E0] transition-all duration-200 ease pb-[20px]">
                                                <div class="px-[20px] py-[10px]">
                                                    <div class="text-[12px] font-bold">
                                                        <h4><?php the_title()?></h4>
                                                    </div>
                                                    <div class="pt-[10px] font-extralight text-[12px] h-[50px] overflow-hidden">
                                                        <p><?php the_content()?></p>
                                                    </div>
                                                </div>
                                                <div class="flex justify-center items-center text-[12px] w-[100%]">
                                                    <a href="<?php echo get_permalink($learning_materials_id) ?>" class="text-[#196129] px-[8px] py-[5px] text-[12px]">View Now</a>  
                                                    <?php $learning_materials_id ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php   }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center w-[100%] text-center items-center">
                    <div class="w-[200px] p-[20px] rounded-lg bg-[#F3BD1C] px-[35px] py-[10px]">
                        <a href="https://bcsdevelopmentgator.site/knowledge-resources/">See More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
    }
    get_footer();
?>

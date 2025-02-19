<div class="bg-[#FFFbf1] pt-[50px] pb-[150px]">
    <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
        <div class="flex flex-col xl:flex-row justify-between items-start gap-[20px] xl:items-end pb-[50px]">
            <div class="block md:flex w-[100%] lg:w-auto justify-between items-end">
                <h2 class="hidden md:block text-[22px] xl:text-[36px] font-[600]">Knowledge resources</br> empowering informed decisions</h2>
                <h2 class="block md:hidden text-[22px] xl:text-[36px] font-[600] pb-[20px]">Knowledge resources empowering informed decisions</h2>
                <div class="block xl:hidden">
                    <?php
                        get_button_data('button-template', array(
                            'title' => 'Explore resources',
                            'button_class' => 'button-green',
                            'ar_bg' => 'bg-[#ceab23] group-hover:bg-[#ffcb00]',
                            'button_bg' => '#2a7f3d',
                            'root_url' => "$root_url/partnerships/"
                        ));
                    ?>
                </div>
            </div>
            <div class="flex gap-[20px] items-center w-[100%] xl:w-auto">
                <div class="relative w-[100%] xl:w-auto">
                    <div onclick="handlePopup('filter-type', event)" class="flex gap-[20px] justify-between items-center text-[#458753] text-[14px]  xl:text-[18px] font-[600] border-b-[1px] border-[#458753] py-[10px] cursor-pointer">
                        <p>Select Type</p>
                        <svg width="22" height="8" viewBox="0 0 32 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M30 2L16 16L2 2" stroke="#458753" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div id="filter-type" class="hidden absolute rounded-lg overflow-hidden">
                        <?php
                            $terms = get_terms(array(
                                'taxonomy' => 'km_category', 
                                'hide_empty' => false,       
                            ));
                        ?>
                        <ul class="category-container relative bg-[#ffffff] py-[20px] z-[99] w-[100%] flex flex-col">
                            <?php    
                            if (!is_wp_error($terms)) {
                                foreach ($terms as $term) {
                            ?>
                                <li class="w-[200px] font-[200] hover:font-[600] text-[#196129] text-[14px] px-[10px] py-[5px] cursor-pointer" data-name="<? echo $term->name ?>" data-value="<? echo esc_attr($term->term_id) ?>"><?php echo esc_html($term->name) ?></li>
                            <?php } } ?>
                        </ul>
                    </div>
                </div>
                <div class="flex h-[100%] w-[100%] xl:w-auto">
                    <input id="search-resources" class="w-[100%] xl:w-[250px] font-[600] h-[100%] border-b-[1px] bg-transparent border-[#458753] text-[14px] xl:text-[18px] text-[#458753] placeholder-[#458753] py-[10px] px-[10px]" type="text" placeholder="Enter Topic">
                </div>
                <div class="hidden xl:flex">
                    <?php
                        get_button_data('button-template', array(
                            'title' => 'Explore resources',
                            'button_class' => 'button-green',
                            'ar_bg' => 'bg-[#ceab23] group-hover:bg-[#ffcb00]',
                            'button_bg' => '#2a7f3d',
                            'root_url' => "$root_url/partnerships/"
                        ));
                    ?>
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

                    if ($knowledge_management->have_posts()) {
                        while ($knowledge_management->have_posts()){
                            $knowledge_management->the_post();

                            $learning_materials_id = get_the_ID();
                ?>
                    <a href="<?php echo get_permalink($learning_materials_id) ?>" class="hidden md:flex justify-center gap-[30px] relative py-[10px] h-[500px] h-auto">
                        <div class="flex h-auto justify-start gap-[20px] w-[100%]">
                            <div class="flex flex-col h-auto rounded-[15px] overflow-hidden cursor-pointer">
                                <div class="flex h-[350px] xl:h-[400px] relative bg-[#ffffff] rounded-[15px] overflow-hidden">
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
                                    <div class="pt-[20px] xl:pt-[40px] pb-[10px]">
                                        <div class="flex gap-[10px]">
                                            <p class="text-[14px] xl:text-[16px] text-[#458753]">Published Date</p>
                                        </div>
                                        <div class="flex items-end text-[18px] xl:text-[24px] font-bold">
                                            <h4><?php the_title()?></h4>
                                        </div>
                                        <div class="pt-[10px] font-extralight text-[14px] xl:text-[16px] h-[50px] xl:h-[60px] overflow-hidden">
                                            <p><?php the_content()?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php   
                        }
                    }

                    wp_reset_postdata(); 
                ?>
            </div>
        </div>
    </div>
</div>
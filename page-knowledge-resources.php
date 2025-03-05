<?php 
    get_header();

    while (have_posts()) {
        the_post();

        $aspiring_outcome = get_field("aspiring_outcome");

        $expected_output = get_field("expected_output");

        $countryField = get_field("km_country", 463);
        
?>
    <div>
        <div class="bg-[#196129]">
            <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto pt-[140px] pb-[50px] font-light">
                <div>
                    <div class="flex gap-[5px] text-[#ffffff] text-[14px] font-extralight">
                        <h1 class="cursor-pointer py-[10px] px-[15px] rounded-full border-[1px] border-[#ffffff]">Knowledge Resources</h1>
                    </div>
                    <div class="text-[#F7D671] text-[45px] pb-[20px] my-[20px]">
                        <h1 class="cursor-pointer"><?php the_title() ?></h1>
                    </div>
                    <div class="text-[16px] font-extralight flex gap-[20px] text-[#ffffff]">
                        <div class="w-[50%]">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pb-[50px]">
            <div class="pt-[100px]">
                <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] pb-[40px] mx-auto">
                    <input id="search-resources" class="w-[100%] border-[1px] bg-transparent border-[#CECECE] text-[16px] rounded-lg text-[#000000] placeholder-[#848484] py-[10px] px-[10px]" type="text" placeholder="Search by Topic">
                    <ul class="flex lg:justify-end">
                        <div id="search-by-title" class="flex gap-[5px] items-center cursor-pointer text-[16px] py-[5px] px-[10px]">
                            <div>
                                <svg class="checked-box hidden" width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 15C11.3833 15 12.5625 14.5125 13.5375 13.5375C14.5125 12.5625 15 11.3833 15 10C15 8.61667 14.5125 7.4375 13.5375 6.4625C12.5625 5.4875 11.3833 5 10 5C8.61667 5 7.4375 5.4875 6.4625 6.4625C5.4875 7.4375 5 8.61667 5 10C5 11.3833 5.4875 12.5625 6.4625 13.5375C7.4375 14.5125 8.61667 15 10 15ZM10 20C8.61667 20 7.31667 19.7375 6.1 19.2125C4.88333 18.6875 3.825 17.975 2.925 17.075C2.025 16.175 1.3125 15.1167 0.7875 13.9C0.2625 12.6833 0 11.3833 0 10C0 8.61667 0.2625 7.31667 0.7875 6.1C1.3125 4.88333 2.025 3.825 2.925 2.925C3.825 2.025 4.88333 1.3125 6.1 0.7875C7.31667 0.2625 8.61667 0 10 0C11.3833 0 12.6833 0.2625 13.9 0.7875C15.1167 1.3125 16.175 2.025 17.075 2.925C17.975 3.825 18.6875 4.88333 19.2125 6.1C19.7375 7.31667 20 8.61667 20 10C20 11.3833 19.7375 12.6833 19.2125 13.9C18.6875 15.1167 17.975 16.175 17.075 17.075C16.175 17.975 15.1167 18.6875 13.9 19.2125C12.6833 19.7375 11.3833 20 10 20ZM10 18C12.2333 18 14.125 17.225 15.675 15.675C17.225 14.125 18 12.2333 18 10C18 7.76667 17.225 5.875 15.675 4.325C14.125 2.775 12.2333 2 10 2C7.76667 2 5.875 2.775 4.325 4.325C2.775 5.875 2 7.76667 2 10C2 12.2333 2.775 14.125 4.325 15.675C5.875 17.225 7.76667 18 10 18Z" fill="#1D1B20"/>
                                </svg>
                                <svg class="unchecked-box" width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 20C8.61667 20 7.31667 19.7375 6.1 19.2125C4.88333 18.6875 3.825 17.975 2.925 17.075C2.025 16.175 1.3125 15.1167 0.7875 13.9C0.2625 12.6833 0 11.3833 0 10C0 8.61667 0.2625 7.31667 0.7875 6.1C1.3125 4.88333 2.025 3.825 2.925 2.925C3.825 2.025 4.88333 1.3125 6.1 0.7875C7.31667 0.2625 8.61667 0 10 0C11.3833 0 12.6833 0.2625 13.9 0.7875C15.1167 1.3125 16.175 2.025 17.075 2.925C17.975 3.825 18.6875 4.88333 19.2125 6.1C19.7375 7.31667 20 8.61667 20 10C20 11.3833 19.7375 12.6833 19.2125 13.9C18.6875 15.1167 17.975 16.175 17.075 17.075C16.175 17.975 15.1167 18.6875 13.9 19.2125C12.6833 19.7375 11.3833 20 10 20ZM10 18C12.2333 18 14.125 17.225 15.675 15.675C17.225 14.125 18 12.2333 18 10C18 7.76667 17.225 5.875 15.675 4.325C14.125 2.775 12.2333 2 10 2C7.76667 2 5.875 2.775 4.325 4.325C2.775 5.875 2 7.76667 2 10C2 12.2333 2.775 14.125 4.325 15.675C5.875 17.225 7.76667 18 10 18Z" fill="#1D1B20"/>
                                </svg>
                            </div>
                            <p>By Title</p>
                        </div>
                        <div id="search-by-keyword" class="flex gap-[5px] items-center cursor-pointer text-[16px] py-[5px] pl-[10px]">
                            <div>
                                <svg class="checked-box" width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 15C11.3833 15 12.5625 14.5125 13.5375 13.5375C14.5125 12.5625 15 11.3833 15 10C15 8.61667 14.5125 7.4375 13.5375 6.4625C12.5625 5.4875 11.3833 5 10 5C8.61667 5 7.4375 5.4875 6.4625 6.4625C5.4875 7.4375 5 8.61667 5 10C5 11.3833 5.4875 12.5625 6.4625 13.5375C7.4375 14.5125 8.61667 15 10 15ZM10 20C8.61667 20 7.31667 19.7375 6.1 19.2125C4.88333 18.6875 3.825 17.975 2.925 17.075C2.025 16.175 1.3125 15.1167 0.7875 13.9C0.2625 12.6833 0 11.3833 0 10C0 8.61667 0.2625 7.31667 0.7875 6.1C1.3125 4.88333 2.025 3.825 2.925 2.925C3.825 2.025 4.88333 1.3125 6.1 0.7875C7.31667 0.2625 8.61667 0 10 0C11.3833 0 12.6833 0.2625 13.9 0.7875C15.1167 1.3125 16.175 2.025 17.075 2.925C17.975 3.825 18.6875 4.88333 19.2125 6.1C19.7375 7.31667 20 8.61667 20 10C20 11.3833 19.7375 12.6833 19.2125 13.9C18.6875 15.1167 17.975 16.175 17.075 17.075C16.175 17.975 15.1167 18.6875 13.9 19.2125C12.6833 19.7375 11.3833 20 10 20ZM10 18C12.2333 18 14.125 17.225 15.675 15.675C17.225 14.125 18 12.2333 18 10C18 7.76667 17.225 5.875 15.675 4.325C14.125 2.775 12.2333 2 10 2C7.76667 2 5.875 2.775 4.325 4.325C2.775 5.875 2 7.76667 2 10C2 12.2333 2.775 14.125 4.325 15.675C5.875 17.225 7.76667 18 10 18Z" fill="#1D1B20"/>
                                </svg>
                                <svg class="unchecked-box hidden" width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 20C8.61667 20 7.31667 19.7375 6.1 19.2125C4.88333 18.6875 3.825 17.975 2.925 17.075C2.025 16.175 1.3125 15.1167 0.7875 13.9C0.2625 12.6833 0 11.3833 0 10C0 8.61667 0.2625 7.31667 0.7875 6.1C1.3125 4.88333 2.025 3.825 2.925 2.925C3.825 2.025 4.88333 1.3125 6.1 0.7875C7.31667 0.2625 8.61667 0 10 0C11.3833 0 12.6833 0.2625 13.9 0.7875C15.1167 1.3125 16.175 2.025 17.075 2.925C17.975 3.825 18.6875 4.88333 19.2125 6.1C19.7375 7.31667 20 8.61667 20 10C20 11.3833 19.7375 12.6833 19.2125 13.9C18.6875 15.1167 17.975 16.175 17.075 17.075C16.175 17.975 15.1167 18.6875 13.9 19.2125C12.6833 19.7375 11.3833 20 10 20ZM10 18C12.2333 18 14.125 17.225 15.675 15.675C17.225 14.125 18 12.2333 18 10C18 7.76667 17.225 5.875 15.675 4.325C14.125 2.775 12.2333 2 10 2C7.76667 2 5.875 2.775 4.325 4.325C2.775 5.875 2 7.76667 2 10C2 12.2333 2.775 14.125 4.325 15.675C5.875 17.225 7.76667 18 10 18Z" fill="#1D1B20"/>
                                </svg>
                            </div>
                            <p>By Keyword</p>
                        </div>
                    </ul>
                </div>
                <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    
                    $taxonomy = 'km_category'; 
                    $terms = get_terms(array(
                        'taxonomy' => $taxonomy,
                        'hide_empty' => false, 
                    ));

                    $selected_categories = isset($_GET['type']) ? array_map('absint', $_GET['type']) : array();
                    $selected_author = isset($_GET['research_author']) ? absint($_GET['research_author']) : null;
                    $selected_country = isset($_GET['country']) ? sanitize_text_field($_GET['country']) : null;
                    $published_date = isset($_GET['published_date']) ? sanitize_text_field($_GET['published_date']) : null;
                    
                    $args = array(
                        'post_type' => 'knowledge-management',
                        "post_per_page" => 5,
                        'paged' => $paged,
                    );
                    
                    if (!empty($selected_categories)) {
                        $args['tax_query'] = array(
                            array(
                                'taxonomy' => 'km_category',
                                'field'    => 'term_id',
                                'terms'    => $selected_categories,
                                'operator' => 'IN',
                            ),
                        );
                    }

                    if (!empty($selected_author)) {
                        $args['tax_query'] = array(
                            array(
                                'taxonomy' => 'research_author',
                                'field'    => 'term_id',
                                'terms'    => $selected_author,
                                'operator' => 'IN',
                            ),
                        );
                    }

                    if (!empty($selected_country)) {
                        $args['tax_query'] = array(
                            array(
                                'taxonomy' => 'country', 
                                'field'    => 'slug',   
                                'terms'    => $selected_country, 
                            ),
                        );
                    }

                    if (!empty($published_date)) {
                        $args['meta_query'] = array(
                            array(
                                'key'     => 'published_date', 
                                'value'   => $published_date,  
                                'compare' => '=',              
                            ),
                        );
                    }
                    
                    $knowledge_management = new WP_Query($args);

                ?>
                <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] relative mx-auto flex justify-between gap-[40px]">
                    <div class="w-[20%] z-[9] bg-[#ffffff] sticky top-[50px] h-[600px]">
                        <form method="get" action="">
                            <div class="flex gap-[20px] w-[100%] pb-[20px]">
                                <button class="flex justify-center text-[14px] py-[10px] px-[10px] bg-[#196129] hover:bg-[#00b127] text-[#ffffff] w-[100%] text-left rounded-md" type="submit">Apply Filter</button>
                                <button class="flex justify-center text-[14px] py-[10px] px-[10px] bg-[#196129] hover:bg-[#00b127] text-[#ffffff] w-[100%] text-left rounded-md" type="submit">Clear Filter</button>
                            </div>
                            <div>
                                <p>Filter by:</p>
                            </div>
                            <div class="border-t-[1px] py-[20px]">
                                <div class="flex justify-between pb-[10px]">
                                    <div>
                                        <p class="text-[14px]">Type</p>
                                    </div>
                                </div>

                                <div class="flex flex-col">
                                    <?php
                                        $categories = get_categories(array(
                                            'taxonomy' => 'km_category', 
                                            'hide_empty' => true,
                                        ));
                                        foreach ($categories as $category) {
                                            $checked = isset($_GET['type']) && in_array($category->term_id, $_GET['type']) ? 'checked' : '';
                                    ?>
                                            <div class="flex gap-[10px] items-baseline">
                                                <input type="checkbox" name="type[]" value="<?php echo $category->term_id; ?>" <?php echo $checked; ?>>
                                                <p class="text-[14px]"><?php echo $category->name; ?></p>
                                            </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="border-t-[1px] py-[20px]">
                                <div>
                                    <p class="text-[14px]">Author</p>
                                </div>
                                    <?php
                                        wp_dropdown_categories(array(
                                            'taxonomy'     => 'research_author',  
                                            'name'          => 'research_author',  
                                            'orderby'       => 'name', 
                                            'show_option_all' => 'Select Category',  
                                            'selected'      => isset($_GET['research_author']) ? $_GET['research_author'] : '', 
                                            'hide_empty'    => false,   
                                        ));
                                    ?>
                            </div>
                            <div class="border-t-[1px] py-[20px]">
                                <div>
                                    <p class="text-[14px]">Country</p>
                                </div>
                                <div>
                                    <!-- <select class="w-[100%]" name="country" id="country">
                                        <option value="">Select Country</option> -->
                                        <?php
                                        // $posts = get_posts(array(
                                        //     'post_type'      => 'knowledge-management', 
                                        //     'posts_per_page' => -1,
                                        //     'fields'         => 'ids', 
                                        // ));

                                        // $countries = array();

                                        // foreach ($posts as $post_id) {
                                        //     $country = get_field('country', $post_id); 
                                        //     if ($country && !in_array($country, $countries)) {
                                        //         $countries[] = $country;
                                        //     }
                                        // }

                                        // sort($countries);
                                        
                                        // foreach ($countries as $country) {
                                        //     var_dump($country['value']);
                                        //     if($country['value'] !== 'Unassigned'){
                                        //         $selected = isset($_GET['country']) && $_GET['country'] === $country['value'] ? 'selected' : '';
                                        //         echo '<option value="' . esc_attr($country['value']) . '" ' . $selected . '>' . esc_html($country['label']) . '</option>';
                                        //     }
                                        // }
                                        ?>
                                    <!-- </select> -->
                                    <?php
                                        wp_dropdown_categories(array(
                                            'taxonomy'         => 'country', 
                                            'name'             => 'country', 
                                            'orderby'          => 'name',
                                            'show_option_all'  => 'Select Country',
                                            'selected'         => $selected_country, 
                                            'hide_empty'       => false, 
                                            'value_field'      => 'slug',  
                                        ));
                                    ?>
                                </div>
                            </div>
                            <div class="border-t-[1px] py-[20px]">
                                <div class="flex gap-[10px]">
                                    <p class="text-[14px]">Published Date</p>
                                </div>
                                <div class="flex gap-[10px] justify-between items-center rounded-sm">
                                    <input
                                        class="text-[14px] w-[100%] py-[5px] px-[5px] border-[1px] border-[#000000] rounded-md"
                                        type="date"
                                        id="published-date"
                                        name="published_date"
                                        value="<?php echo isset($_GET['published_date']) ? esc_attr($_GET['published_date']) : ''; ?>"
                                    />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="flex flex-wrap w-[80%] gap-[30px] relative justify-right">
                        <?php                            
                            if ($knowledge_management->have_posts()) {
                                while ($knowledge_management->have_posts()){
                                    $knowledge_management->the_post();
                        ?>
                            <div class="flex flex-col w-[300px] rounded-full items-center group transition-all duration-200 ease cursor-pointer">
                                <div class="flex rounded-[15px] bg-[#ffffff] items-center w-[100%] h-[250px] overflow-hidden relative">
                                    <a href="<?php echo get_permalink() ?>">
                                        <div class="bg-black opacity-5 w-[100%] h-[100%] absolute top-0 left-0 z-10 group-hover:opacity-0 transition-all duration-200 ease"></div>
                                    </a>
                                    <div class="w-[100%] h-[100%] absolute">
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
                                <div class="w-[100%] py-[10px] bg-[#ffffff] transition-all duration-200 ease">
                                    <div class="flex justify-between">
                                        <div class="flex items-center gap-[5px]">
                                            <div class="w-[15px]">
                                                <svg width="auto" height="auto" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11 11C13.2091 11 15 9.20914 15 7C15 4.79086 13.2091 3 11 3C8.79086 3 7 4.79086 7 7C7 9.20914 8.79086 11 11 11Z" stroke="#343434" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M18 19C18 15.6829 14.8626 13 11 13C7.13737 13 4 15.6829 4 19" stroke="#343434" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </div>
                                            <?php if($author_ID){ ?>        
                                                    <p class="text-[#7C7C7C] text-[12px]"><?php echo get_the_title( $author_ID ); ?></p>
                                            <?php } else { ?>    
                                                    <p class="text-[#7C7C7C] text-[12px]">Author unknown</p>
                                            <?php } ?>
                                        </div>
                                        <div class="flex items-center gap-[5px]">
                                            <div class="w-[15px]">
                                                <svg width="auto" height="auto" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.33333 11.834C5.07361 11.834 4.85606 11.746 4.68067 11.57C4.50528 11.394 4.41728 11.1764 4.41667 10.9173C4.41606 10.6582 4.50406 10.4407 4.68067 10.2647C4.85728 10.0887 5.07483 10.0007 5.33333 10.0007C5.59183 10.0007 5.80969 10.0887 5.98692 10.2647C6.16414 10.4407 6.25183 10.6582 6.25 10.9173C6.24817 11.1764 6.16017 11.3943 5.986 11.5709C5.81183 11.7475 5.59428 11.8352 5.33333 11.834ZM9 11.834C8.74028 11.834 8.52272 11.746 8.34733 11.57C8.17194 11.394 8.08394 11.1764 8.08333 10.9173C8.08272 10.6582 8.17072 10.4407 8.34733 10.2647C8.52394 10.0887 8.7415 10.0007 9 10.0007C9.2585 10.0007 9.47636 10.0887 9.65358 10.2647C9.83081 10.4407 9.9185 10.6582 9.91667 10.9173C9.91483 11.1764 9.82683 11.3943 9.65267 11.5709C9.4785 11.7475 9.26094 11.8352 9 11.834ZM12.6667 11.834C12.4069 11.834 12.1894 11.746 12.014 11.57C11.8386 11.394 11.7506 11.1764 11.75 10.9173C11.7494 10.6582 11.8374 10.4407 12.014 10.2647C12.1906 10.0887 12.4082 10.0007 12.6667 10.0007C12.9252 10.0007 13.143 10.0887 13.3202 10.2647C13.4975 10.4407 13.5852 10.6582 13.5833 10.9173C13.5815 11.1764 13.4935 11.3943 13.3193 11.5709C13.1452 11.7475 12.9276 11.8352 12.6667 11.834ZM2.58333 19.1673C2.07917 19.1673 1.64772 18.988 1.289 18.6292C0.930278 18.2705 0.750611 17.8388 0.75 17.334V4.50065C0.75 3.99649 0.929667 3.56504 1.289 3.20632C1.64833 2.8476 2.07978 2.66793 2.58333 2.66732H3.5V1.75065C3.5 1.49093 3.588 1.27338 3.764 1.09799C3.94 0.922599 4.15756 0.834599 4.41667 0.833988C4.67578 0.833376 4.89364 0.921377 5.07025 1.09799C5.24686 1.2746 5.33456 1.49215 5.33333 1.75065V2.66732H12.6667V1.75065C12.6667 1.49093 12.7547 1.27338 12.9307 1.09799C13.1067 0.922599 13.3242 0.834599 13.5833 0.833988C13.8424 0.833376 14.0603 0.921377 14.2369 1.09799C14.4135 1.2746 14.5012 1.49215 14.5 1.75065V2.66732H15.4167C15.9208 2.66732 16.3526 2.84699 16.7119 3.20632C17.0713 3.56565 17.2506 3.9971 17.25 4.50065V17.334C17.25 17.8382 17.0706 18.2699 16.7119 18.6292C16.3532 18.9886 15.9214 19.1679 15.4167 19.1673H2.58333ZM2.58333 17.334H15.4167V8.16732H2.58333V17.334ZM2.58333 6.33399H15.4167V4.50065H2.58333V6.33399Z" fill="#343434"/>
                                                </svg>  
                                            </div>
                                            <p class="text-[12px] font-light text-[#7C7C7C]"><?php echo get_field("published_date"); ?></p>
                                        </div>
                                    </div>
                                    <div class="text-[16px] font-bold pt-[7px]">
                                        <?php
                                            $text = get_the_title(); // Get the title as a string
                                            $limit = 50;
                                            $trimmed = mb_strimwidth($text, 0, $limit, "..."); // Trim it properly
                                        ?>
                                        <h4><?php echo esc_html($trimmed); ?></h4>
                                    </div>
                                    <div class="flex justify-between items-center pt-[15px]">
                                        <a href="<?php echo get_permalink() ?>" class="py-[8px] px-[15px] border-[#096936] border-[1px] rounded-full text-[12px] text-[#096936]">Read More</a>  
                                    </div>
                                </div>
                            </div>
                        <?php   }
                            } 
                        ?>
        
                    </div>
                </div>
                <div class="flex justify-end w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] relative mx-auto">
                    <div class="flex gap-[15px]">
                        <?php 
                            echo paginate_links(array(
                                'total' => $knowledge_management->max_num_pages,
                                'current' => $paged,
                                'prev_text' => __('<div class="px-[10px]"><</div>'),
                                'next_text' => __('<div class="px-[10px]">></div>'),
                            ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
    }
    get_footer()
?>
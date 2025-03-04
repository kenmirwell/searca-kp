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
                    <div class="text-[32px] w-[100%] text-center">
                        <h2>Knowledge Resources</h2>
                    </div>
                    <div class="w-[100%] text-center">
                        <p>Explore Knowledge Resources from experienced, real-world experts.</p>
                    </div>
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
                    <div class="flex flex-col w-[80%] gap-[30px] relative">
                        <?php                            
                            if ($knowledge_management->have_posts()) {
                                while ($knowledge_management->have_posts()){
                                    $knowledge_management->the_post();
                        ?>
                            <div class="flex rounded-full drop-shadow-md items-center group transition-all duration-200 ease cursor-pointer">
                                <div class="flex rounded-l-[15px] bg-[#ffffff] items-center w-[30%] h-[100%] overflow-hidden relative">
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
                                <div class="w-[80%] rounded-r-[15px] p-[20px] bg-[#ffffff] group-hover:bg-[#FFF7E0] transition-all duration-200 ease">
                                    <div class="flex justify-between">
                                        <div class="flex items-center gap-[10px]">
                                            <div class="rounded-full h-[30px] w-[30px] bg-[#E8E8E8]"></div>
                                            <div>
                                                <p class="text-[#7C7C7C] text-[12px]">
                                                    <?php if($author_ID){ ?>        
                                                            <p class="text-[#7C7C7C] text-[12px]"><?php echo get_the_title( $author_ID ); ?></p>
                                                    <?php } else { ?>    
                                                            <p class="text-[#7C7C7C] text-[12px]">Author unknown</p>
                                                    <?php } ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-[#7C7C7C] font-light text-[12px]">30 mins</p>
                                        </div>
                                    </div>
                                    <div class="text-[16px] font-bold pt-[20px]">
                                        <h4><?php the_title() ?></h4>
                                    </div>
                                    <div class="pt-[10px] font-light text-[12px] h-[30px] overflow-hidden">
                                        <p><?php the_content() ?></p>
                                    </div>
                                    <div class="flex justify-between items-center pt-[10px]">
                                        <p class="text-[12px] font-light text-[#7C7C7C]">Published: <?php echo get_field("published_date"); ?></p>
                                        <a href="<?php echo get_permalink() ?>" class="text-[12px] text-[#096936] px-[8px] py-[5px]">View Now</a>  
                                    </div>
                                </div>
                            </div>
                        <?php   }
                            } 
                        ?>
                            <div class="flex justify-end">
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
        </div>
    </div>
<?php 
    }
    get_footer()
?>
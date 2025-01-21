<?php 
    get_header();

    while (have_posts()) {
        the_post();

        $aspiring_outcome = get_field("aspiring_outcome");

        $expected_output = get_field("expected_output");

        $country = get_field("country");
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
                            <?php 
                                the_content();
                             ?>
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
        <div>
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

                    // $knowledge_management = new WP_Query(array(
                    //     "post_type" => "knowledge-management",
                    //     "post_per_page" => 5,
                    //     'paged' => $paged,
                    //     // 'tax_query' => array(
                    //     //     array(
                    //     //         'taxonomy' => 'km_category', 
                    //     //     ),
                    //     // ),
                    // ));
                    
                    $taxonomy = 'km_category'; 
                    $terms = get_terms(array(
                        'taxonomy' => $taxonomy,
                        'hide_empty' => false, 
                    ));

                    $selected_categories = isset($_GET['type']) ? array_map('absint', $_GET['type']) : array();
                    $selected_author = isset($_GET['research_author']) ? absint($_GET['research_author']) : null;
                    
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
                    // if (!empty($selected_author)) {
                    //     $args['meta_query'] = array(
                    //         array(
                    //             'key' => 'material-author', 
                    //             'value' => $selected_author,
                    //             'compare' => '=',
                    //         ),
                    //     );
                    // }
                    
                    $knowledge_management = new WP_Query($args);
                ?>
                <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] relative mx-auto flex justify-between gap-[40px]">
                    <div class="w-[20%] z-[9] bg-[#ffffff] sticky top-[50px] h-[600px]">
                        <form method="get" action="">
                            <div class="w-[100%]">
                                <button class="py-[10px] px-[10px] bg-[#196129] hover:bg-[#00b127] text-[#ffffff] w-[100%] text-left rounded-md" type="submit">Filter by:</button>
                            </div>
                            <div class="border-t-[1px] py-[20px]">
                                <div class="flex justify-between pb-[20px]">
                                    <div>
                                        <p>Type</p>
                                    </div>
                                </div>
                                <?php 
                                /* if (!empty($terms) && !is_wp_error($terms)) {
                                        foreach ($terms as $term) {
                                ?>
                                    <div class="flex gap-[20px] items-start">
                                        <div class="pt-[1px]">
                                            <input type="checkbox" name="filter_categories[]" value="' . esc_attr($term->slug) . '">
                                        </div>
                                        <p><?php echo esc_html($term->name) ?></p>
                                    </div>
                                <?php
                                        }
                                    } else {
                                        echo '<p>No terms found.</p>';
                                    } */
                                ?>

                                <!-- <form method="get" action=""> -->
                                <div class="flex flex-col">
                                    <?php
                                        $categories = get_categories(array(
                                            'taxonomy' => 'km_category', // Adjust if you're using a custom taxonomy
                                            'hide_empty' => true,
                                        ));
                                        foreach ($categories as $category) {
                                            $checked = isset($_GET['type']) && in_array($category->term_id, $_GET['type']) ? 'checked' : '';
                                    ?>
                                            <div class="flex gap-[10px] items-baseline">
                                                <input type="checkbox" name="type[]" value="<?php echo $category->term_id; ?>" <?php echo $checked; ?>>
                                                <p><?php echo $category->name; ?></p>
                                            </div>
                                    <?php } ?>
                                </div>
                                <!-- </form> -->
                            </div>
                            <div class="border-t-[1px] py-[20px]">
                                <div>
                                    <p>Author</p>
                                </div>
                                <!-- <select id="material__author" name="km-author" class="rounded-lg w-[100%] py-[7px] text-[14px] font-light text-[#9A9A9A] bg-[#E9E9E9]">
                                    <option value="<?php /*echo null ?>">Select author</option>
                                    <?php
                                        $all_authors = new WP_Query(array(
                                            "post_type" => "material-author",
                                            // "post_per_page" => 10
                                        ));

                                        if($all_authors->have_posts()) {
                                            while ($all_authors->have_posts()){
                                                $all_authors->the_post();
                                                $selected = isset($_GET['km-author']) && $_GET['km-author'] == get_the_ID() ? 'selected' : '';
                                    ?>
                                       <option value="<?php echo get_the_ID(); ?>" <?php echo $selected; ?>><?php the_title(); ?></option>
                                    <?php 
                                        }} */
                                    ?>
                                </select> -->
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
                                    <p>Country</p>
                                </div>
                                
                            </div>
                            <div class="border-t-[1px] py-[20px]">
                                <div class="flex gap-[10px]">
                                    <p>Published Date</p>
                                </div>
                                <div class="flex gap-[10px] justify-between items-center rounded-sm">
                                    <input class="w-[100%] py-[5px] px-[5px] border-[1px] border-[#000000] rounded-md" type="date" id="published-date" />
                                    <!-- <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21.0013 1.56738H18.8072V0.783689C18.8072 0.313431 18.4938 0 18.0235 0C17.5533 0 17.2399 0.313436 17.2399 0.783689V1.56738H7.83627V0.783689C7.83627 0.313431 7.52283 0 7.05258 0C6.58233 0 6.26889 0.313436 6.26889 0.783689V1.56738H4.07483C1.80227 1.56738 0 3.44798 0 5.64221V20.9229C0 23.1955 1.88061 24.9977 4.07483 24.9977H20.9228C23.1954 24.9977 24.9976 23.1171 24.9976 20.9229V5.64221C25.0761 3.44793 23.1955 1.56738 21.0013 1.56738ZM4.07495 3.13453H6.269V4.23167C5.3287 4.54511 4.70185 5.40709 4.70185 6.42573C4.70185 7.75777 5.72043 8.77657 7.05269 8.77657C8.38473 8.77657 9.40353 7.75799 9.40353 6.42573C9.40353 5.40715 8.77668 4.54512 7.83638 4.23167V3.13453H17.24V4.23167C16.2997 4.54511 15.6728 5.40709 15.6728 6.42573C15.6728 7.75777 16.6914 8.77657 18.0237 8.77657C19.3557 8.77657 20.3745 7.75799 20.3745 6.42573C20.3745 5.40715 19.7477 4.54512 18.8073 4.23167L18.8071 3.13453H21.0012C22.4117 3.13453 23.5086 4.30995 23.5086 5.64198V9.40342H1.56749V5.64198C1.56771 4.30995 2.74314 3.13453 4.07517 3.13453H4.07495ZM7.05269 5.64198C7.52295 5.64198 7.83638 5.95542 7.83638 6.42567C7.83638 6.89593 7.52295 7.20936 7.05269 7.20936C6.58244 7.20936 6.269 6.89593 6.269 6.42567C6.269 5.95542 6.58266 5.64198 7.05269 5.64198ZM18.0235 5.64198C18.4938 5.64198 18.8072 5.95542 18.8072 6.42567C18.8072 6.89593 18.4938 7.20936 18.0235 7.20936C17.5533 7.20936 17.2399 6.89593 17.2399 6.42567C17.2399 5.95542 17.5535 5.64198 18.0235 5.64198ZM21.0013 23.5085H4.15334C2.7428 23.5085 1.64588 22.333 1.64588 21.001V10.9703H23.587V21.0005C23.5087 22.3327 22.3333 23.5081 21.001 23.5081L21.0013 23.5085Z" fill="#7A7A7A"/>
                                        <path d="M10.6572 13.3213H9.87353C9.40327 13.3213 9.08984 13.6347 9.08984 14.105C9.08984 14.5752 9.40328 14.8887 9.87353 14.8887H10.6572C11.1275 14.8887 11.4409 14.5752 11.4409 14.105C11.4409 13.6347 11.0492 13.3213 10.6572 13.3213Z" fill="#7A7A7A"/>
                                        <path d="M15.2041 13.3213H14.4204C13.9501 13.3213 13.6367 13.6347 13.6367 14.105C13.6367 14.5752 13.9502 14.8887 14.4204 14.8887H15.2041C15.6744 14.8887 15.9878 14.5752 15.9878 14.105C15.9876 13.6347 15.5958 13.3213 15.2041 13.3213Z" fill="#7A7A7A"/>
                                        <path d="M6.11425 13.3213H5.33056C4.86031 13.3213 4.54688 13.6347 4.54688 14.105C4.54688 14.5752 4.86031 14.8887 5.33056 14.8887H6.11425C6.58451 14.8887 6.89794 14.5752 6.89794 14.105C6.89794 13.6347 6.50598 13.3213 6.11425 13.3213Z" fill="#7A7A7A"/>
                                        <path d="M19.7471 13.3213H18.9634C18.4931 13.3213 18.1797 13.6347 18.1797 14.105C18.1797 14.5752 18.4931 14.8887 18.9634 14.8887H19.7471C20.2173 14.8887 20.5308 14.5752 20.5308 14.105C20.5308 13.6347 20.1388 13.3213 19.7471 13.3213Z" fill="#7A7A7A"/>
                                        <path d="M6.11425 16.4561H5.33056C4.86031 16.4561 4.54688 16.7695 4.54688 17.2397C4.54688 17.71 4.86031 18.0234 5.33056 18.0234H6.11425C6.58451 18.0234 6.89794 17.71 6.89794 17.2397C6.89794 16.7695 6.50598 16.4561 6.11425 16.4561Z" fill="#7A7A7A"/>
                                        <path d="M10.6572 16.4561H9.87353C9.40327 16.4561 9.08984 16.7695 9.08984 17.2397C9.08984 17.71 9.40328 18.0234 9.87353 18.0234H10.6572C11.1275 18.0234 11.4409 17.71 11.4409 17.2397C11.4409 16.7695 11.0492 16.4561 10.6572 16.4561Z" fill="#7A7A7A"/>
                                        <path d="M19.7471 16.4561H18.9634C18.4931 16.4561 18.1797 16.7695 18.1797 17.2397C18.1797 17.71 18.4931 18.0234 18.9634 18.0234H19.7471C20.2173 18.0234 20.5308 17.71 20.5308 17.2397C20.5308 16.7695 20.1388 16.4561 19.7471 16.4561Z" fill="#7A7A7A"/>
                                        <path d="M15.2041 16.4561H14.4204C13.9501 16.4561 13.6367 16.7695 13.6367 17.2397C13.6367 17.71 13.9502 18.0234 14.4204 18.0234H15.2041C15.6744 18.0234 15.9878 17.71 15.9878 17.2397C15.9876 16.7695 15.5958 16.4561 15.2041 16.4561Z" fill="#7A7A7A"/>
                                        <path d="M15.2041 19.5908H14.4204C13.9501 19.5908 13.6367 19.9043 13.6367 20.3745C13.6367 20.8448 13.9502 21.1582 14.4204 21.1582H15.2041C15.6744 21.1582 15.9878 20.8448 15.9878 20.3745C15.9876 19.9042 15.5958 19.5908 15.2041 19.5908Z" fill="#7A7A7A"/>
                                        <path d="M19.7471 19.5908H18.9634C18.4931 19.5908 18.1797 19.9043 18.1797 20.3745C18.1797 20.8448 18.4931 21.1582 18.9634 21.1582H19.7471C20.2173 21.1582 20.5308 20.8448 20.5308 20.3745C20.5308 19.9042 20.1388 19.5908 19.7471 19.5908Z" fill="#7A7A7A"/>
                                        <path d="M10.6572 19.5908H9.87353C9.40327 19.5908 9.08984 19.9043 9.08984 20.3745C9.08984 20.8448 9.40328 21.1582 9.87353 21.1582H10.6572C11.1275 21.1582 11.4409 20.8448 11.4409 20.3745C11.4409 19.9042 11.0492 19.5908 10.6572 19.5908Z" fill="#7A7A7A"/>
                                        <path d="M6.11425 19.5908H5.33056C4.86031 19.5908 4.54688 19.9043 4.54688 20.3745C4.54688 20.8448 4.86031 21.1582 5.33056 21.1582H6.11425C6.58451 21.1582 6.89794 20.8448 6.89794 20.3745C6.89794 19.9042 6.50598 19.5908 6.11425 19.5908Z" fill="#7A7A7A"/>
                                    </svg> -->
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
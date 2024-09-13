<?php 
    get_header();

    while (have_posts()) {
        the_post();
    
    
?>
    <div>
        <div class="bg-[#196129]">
            <div class="w-[1100px] mx-auto py-[50px] font-light">
                <div>
                    <div class="text-[#ffffff]">
                        <p>Home | <?php the_title()?></p>
                    </div>
                    <div class="border-b-[1px] border-[#F7D671] text-[#F7D671] text-[45px] pb-[20px] my-[20px]">
                        <h1><?php the_title() ?></h1>
                    </div>
                    <div class="text-[#ffffff]">
                        <p><?php the_content() ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php 

        $current_post_id = get_the_ID();
        $learning_materials = new WP_Query(array(
            "category_name" => "featured",
            "meta_query" => array(
                array(
                    "key" => "thematic_area",   // The ACF field name
                    "value" => $current_post_id, // The value you're looking for
                    "compare" => "="             // Comparison operator (can be changed if needed)
                )
            )
        ));

        if ($learning_materials->have_posts()) { ?> 
            <div class="w-[1100px] mx-auto py-[50px] rounded-[10px]">
                <div class="pb-[40px]">
                    <div class="text-[40px]">
                        <h2>Featured Courses</h2>
                    </div>
                    <div>
                        <p>Explore Courses from experienced, real-world experts.</p>
                    </div>
                </div>

                <div class="flex justify-start gap-[20px]">
                    <?php
                        while ($learning_materials->have_posts()){
                            $learning_materials->the_post();
                            $author_ID = get_field("material_author");

                            $learning_materials_id = get_the_ID();
                        ?>
                        
                        <div class="w-[330px] h-[420px] rounded-[15px] overflow-hidden translate-y-[0] group hover:shadow-md hover:translate-y-[-10px] transition-all duration-200 ease cursor-pointer">
                            <div class="h-[30%] overflow-hidden relative bg-[#ffffff]">
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
                            <div class="h-[100%] px-[20px] pb-[40px] bg-[#EAE9E5] group-hover:bg-[#FFF7E0] transition-all duration-200 ease">
                                <div class="flex justify-between items-center pt-[10px]">
                                    <div class="flex items-center gap-[10px]">
                                        <div class="rounded-full h-[40px] w-[40px] bg-[#ffffff]"></div>
                                        <div>
                                            <p class="text-[#7C7C7C] text-[12px]">
                                                <?php if($author_ID){ ?>        
                                                        <p class="text-[#7C7C7C] text-[12px]"><?php echo get_the_title( $author_ID ); ?></p>
                                                <?php } else { ?>    
                                                        <p class="text-[#7C7C7C] text-[12px]"></p>
                                                <?php } ?>
                                            </p>
                                            <p class="text-[#7C7C7C] text-[12px]">Published: date</p>
                                        </div>
                                    </div>
                                    <p class="text-[#7C7C7C] text-center font-light text-[12px]">30 mins</p>
                                </div>
                                <div class="text-[16px] font-bold pt-[20px]">
                                    <h4><?php the_title()?></h4>
                                </div>
                                <div class="pt-[10px] font-extralight text-[12px] h-[50px] overflow-hidden">
                                    <p><?php the_content()?></p>
                                </div>
                                <div class="flex justify-between items-center mt-[30px]">
                                    <p class="text-[14px] font-light text-[#7C7C7C]">Jan 20, 2024</p>
                                    <a href="<?php echo get_permalink($learning_materials_id) ?>" class="text-[#096936] px-[8px] py-[5px] text-[14px]">View Now</a>  
                                </div>
                            </div>
                        </div>
                        
                        <?php
                        }
                    }
                ?>
            </div>
        </div>
        <div class="pt-[20px]">
            <div class="w-[1100px] pb-[40px] mx-auto">
                <div class="text-[40px]">
                    <h2>All Courses</h2>
                </div>
                <div>
                    <p>Explore Courses from experienced, real-world experts.</p>
                </div>
            </div>
            <div class="w-[1100px] mx-auto flex justify-between gap-[20px]">
                <div class="w-[20%]">
                    <div>
                        <p>Filter</p>
                    </div>
                    <div>
                        <div class="flex justify-between">
                            <div>
                                <p>Type</p>
                            </div>
                            <div>
                                >
                            </div>
                        </div>
                        <div>
                            <div class="flex gap-[5px]">
                                <input type="checkbox">
                                <p>PDF</p>
                            </div>
                            <div class="flex gap-[5px]">
                                <input type="checkbox">
                                <p>Audio</p>
                            </div>
                            <div class="flex gap-[5px]">
                                <input type="checkbox">
                                <p>Video</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="w-[80%] flex flex-col gap-[30px]">
                    <?php 
                        $all_learning_materials = new WP_Query(array(
                            "posts_per_page" => 10,
                            "meta_query" => array(
                                array(
                                    "key" => "thematic_area",   // The ACF field name
                                    "value" => $current_post_id, // The value you're looking for
                                    "compare" => "="             // Comparison operator (can be changed if needed)
                                )
                            )
                        ));
                        if ($all_learning_materials->have_posts()) {
                            while ($all_learning_materials->have_posts()){
                                $all_learning_materials->the_post();
                                
                                $author_ID = get_field("material_author");

                                $learning_materials_id = get_the_ID();
                    ?>
                        <div class="flex rounded-[15px] overflow-hidden shadow-md items-center group hover:translate-x-[-10px] transition-all duration-200 ease cursor-pointer">
                            <div class="flex bg-[#ffffff] items-center w-[30%] h-[100%] overflow-hidden relative">
                                <div class="bg-black opacity-5 w-[100%] h-[100%] absolute top-0 left-0 z-10 group-hover:opacity-0 transition-all duration-200 ease"></div>
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
                            <div class="w-[80%] p-[20px] group-hover:bg-[#FFF7E0] transition-all duration-200 ease">
                                <div class="flex justify-between">
                                    <div class="flex items-center gap-[10px]">
                                        <div class="rounded-full h-[30px] w-[30px] bg-[#E8E8E8]"></div>
                                        <div>
                                            <p class="text-[#7C7C7C] text-[12px]">
                                                <?php if($author_ID){ ?>        
                                                        <p class="text-[#7C7C7C] text-[12px]"><?php echo get_the_title( $author_ID ); ?></p>
                                                <?php } else { ?>    
                                                        <p class="text-[#7C7C7C] text-[12px]"></p>
                                                <?php } ?>
                                            </p>
                                            <p class="text-[#7C7C7C] text-[12px]">Published: date</p>
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
                                    <p class="text-[12px] font-light text-[#7C7C7C]">Jan 20, 2024</p>
                                    <a href="<?php echo get_permalink($all_learning_materials_id) ?>" class="text-[12px] text-[#096936] px-[8px] py-[5px]">View Now</a>  
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php 
    }
    get_footer()
?>



<?php 
    add_shortcode('knowledge_management', 'knowledge_management_fn');
    
    function knowledge_management_fn() {
        ob_start();
        
        $cop_image = get_field("cop_image");
        $cop_title = get_field("cop_title");
        $cop_description = get_field("cop_description");
        $cop_link = get_field("cop_link");

        ?>
        <div class="bg-[#FFFbf1] pt-[50px] pb-[150px]">
            <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto">
                <div class="w-[100%] flex justify-center items-center">
                    <h6 class="text-[24px] font-[600]">Knowledge Management</h6>
                </div>
                <div class="w-[720px] mx-auto flex justify-center text-center pt-[20px] font-[300]">
                    <p>Increased awareness and knowledge of its members, partners, and stakeholders on the most pressing issues and challenges faced by the agriculture sector.</p>
                </div>
                <div class="flex justify-center gap-[30px] py-[40px]">
                    <div class="w-[30%] mb-[10px] border-b-[1px] border-[#458753]">
                        <div class="">
                            <h6 class="font-[600]">Search by topic</h6>
                            <div class="flex mt-[10px] gap-[10px] justify-between bg-[#458753] px-[10px] py-[15px] items-center rounded-md overflow-hidden w-[100%]">
                                <input class="w-[100%] font-[300] text-[14px] text-[#458753] placeholder-[#458753] py-[2px] px-[5px] bg-[#ffffff] rounded-md" type="text" placeholder="Type a topic here...">
                            </div>
                        </div>
                        <div class="mt-[20px]">
                            <h6 class="font-[600]">Search by type</h6>
                            <div class="flex gap-[5px]">
                                <ul class="w-[50%] flex flex-col text-[14px] font-[300] mt-[10px]">
                                    <li class="text-[#196129] p-[5px] cursor-pointer">Books</li>
                                    <li class="text-[#196129] p-[5px] cursor-pointer">Briefs and Notes</li>
                                    <li class="text-[#196129] p-[5px] cursor-pointer">Discussion Papers</li>
                                    <li class="text-[#196129] p-[5px] cursor-pointer">Featured</li>
                                    <li class="text-[#196129] p-[5px] cursor-pointer">Monographs</li>
                                </ul>
                                <ul class="w-[50%] flex flex-col text-[14px] font-[300] mt-[10px]">
                                    <li class="text-[#196129] p-[5px] cursor-pointer">Proceedings and Workshop Reports</li>
                                    <li class="text-[#196129] p-[5px] cursor-pointer">Refereed Journal</li>
                                    <li class="text-[#196129] p-[5px] cursor-pointer">Videos</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="w-[100%] text-center font-[600]">
                            <p>Featured Resources</p>
                        </div>
                        <div class="flex justify-center gap-[30px] relative py-[10px] h-[345px]">
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
                <div class="flex justify-center w-[100%] text-center items-center">
                    <div class="w-[200px] p-[20px] rounded-lg bg-[#F3BD1C] px-[35px] py-[10px]">
                        <a href="https://bcsdevelopmentgator.site/knowledge-resources/">See More</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
?>
<div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
    <div class="h-auto featured-publications">
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
        <div>
            <div class="flex justify-center gap-[30px] relative py-[10px] h-[500px] h-auto">
                <div class="h-auto justify-start gap-[20px] w-[100%]">
                    <div class="flex flex-col justify-between">
                      <div class="flex flex-col h-auto rounded-[15px] overflow-hidden cursor-pointer">
                        <div class="bg-[#F5F8FC] p-[20px]">
                            <div class="bg-[#DBE1E9] p-[5px] rounded-[8px] overflow-hidden">
                                <div class="relative flex h-[250px] xl:h-[300px] rounded-[8px] overflow-hidden">
                                    <div class="bg-black opacity-5 w-[100%] h-[100%] absolute top-0 left-0 z-10 group-hover:opacity-0 transition-all duration-200 ease"></div>
                                    <?php
                                        if ( has_post_thumbnail() ) {
                                            $thumbnail_url = get_the_post_thumbnail_url();
                                    ?>
                                        <img class="absolute w-full h-full object-cover rounded-[5px]" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title(); ?>">
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="flex h-auto pb-[10px] md:pb-[20px]">
                            <div class="pt-[20px] pb-[10px] w-[100%]">
                                <div class="flex flex-col lg:flex-row gap-[10px] md:gap-[5px] justify-between min-h-[30px] items-start">
                                    <div class="flex items-center gap-[5px]">
                                          <div class="w-[20px]">
                                            <svg width="auto" height="auto" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11 11C13.2091 11 15 9.20914 15 7C15 4.79086 13.2091 3 11 3C8.79086 3 7 4.79086 7 7C7 9.20914 8.79086 11 11 11Z" stroke="#343434" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M18 19C18 15.6829 14.8626 13 11 13C7.13737 13 4 15.6829 4 19" stroke="#343434" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                          </div>
                                        <?php $terms = get_the_terms(get_the_ID(), 'research_author');?>
                                        <?php if (!empty($terms) && !is_wp_error($terms)) : ?>
                                          <?php foreach ($terms as $term) : ?>
                                            <p class="text-display-12 xl:text-display-14"><?php echo esc_html($term->name); ?></p>
                                          <?php endforeach; ?>
                                        <?php else : ?>
                                            <p class="text-display-12 xl:text-display-14">SEARCA</p>
                                        <?php endif; ?>
                                    </div>

                                    <?php $published_year = get_field("published_date"); ?>
                                    <?php  if($published_year) : ?>
                                      <div class="pl-[20px] pl-[0px]">
                                          <p class="text-display-12 xl:text-display-14">
                                            <?php echo get_field("published_date"); ?>
                                          </p>
                                      </div>
                                    <?php endif; ?>
                                </div>
                                <div class="hidden xl:flex items-end md:text-display-18 font-[600] pt-[10px]">
                                    <?php
                                        $text = get_the_title(); // Get the title as a string
                                        $limit = 60;
                                        $trimmed = mb_strimwidth($text, 0, $limit, "..."); // Trim it properly
                                    ?>
                                    <h6><?php echo esc_html($trimmed); ?></h6>
                                </div>
                                <div class="flex xl:hidden items-end md:text-display-18 font-[600] pt-[10px]">
                                    <?php
                                        $text = get_the_title(); // Get the title as a string
                                        $limit = 40;
                                        $trimmed = mb_strimwidth($text, 0, $limit, "..."); // Trim it properly
                                    ?>
                                    <h6><?php echo esc_html($trimmed); ?></h6>
                                </div>
                                <div class="flex items-end text-display-16 pt-[10px] font-[200]">
                                    <?php
                                        $text = get_the_content(); // Get the title as a string
                                        $limit = 40;
                                        $trimmed = mb_strimwidth($text, 0, $limit, "..."); // Trim it properly
                                    ?>
                                    <p><?php echo esc_html($trimmed); ?></p>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div>
                        <a href="<?php echo get_permalink($learning_materials_id) ?>" class="rounded-full px-[20px] py-[10px] border-[1px] border-[#096936] text-display-16 text-[#096936]">Read More</a>
                      </div>
                    </div>
                  </div>
              </div>
        </div>
    <?php   
            }
        }

        wp_reset_postdata(); 
    ?>
    </div>
</div>
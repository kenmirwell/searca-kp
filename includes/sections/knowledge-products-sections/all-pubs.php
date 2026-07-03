<div class="py-[100px] bg-[#F9F9F9]">
        <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            // Base Query Arguments
            $args = array(
                'post_type'      => 'knowledge-management',
                'posts_per_page' => 15,
                'paged'          => $paged,
            );

            $knowledge_management = new WP_Query($args);
        ?>
        <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] relative mx-auto flex flex-col lg:flex-row justify-between gap-[40px]">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 w-[100%] gap-[30px] relative justify-right">
                <?php                            
                    if ($knowledge_management->have_posts()) {
                        while ($knowledge_management->have_posts()){
                            $knowledge_management->the_post();

                            $author_terms = get_the_terms(get_the_ID(), 'research_author'); 
                            $author_name = ($author_terms && !is_wp_error($author_terms)) ? $author_terms[0]->name : 'Author unknown';
                            
                            $trimmed_author = mb_strimwidth($author_name, 0, 15, "..."); 
                ?>
                    <a href="<?php echo get_permalink() ?>">
                    <div class="flex flex-col md:flex-row w-[100%] gap-[10px] md:gap-[20px] items-start group transition-all duration-200 ease cursor-pointer py-[20px] border-b-[1px] border-[#C0C0C0]">
                        <div class="bg-[#DBE1E9] p-[10px] w-[100%] rounded-[8px]">
                          <div class="flex rounded-[8px] bg-[#ffffff] items-center w-[100%] h-[120px] md:h-[180px] overflow-hidden relative">
                            <div class="bg-black opacity-5 w-[100%] h-[100%] absolute top-0 left-0 z-10 group-hover:opacity-0 transition-all duration-200 ease"></div>
                            <div class="w-[100%] h-[100%] absolute">
                                <?php
                                    if ( has_post_thumbnail() ) {
                                        $thumbnail_url = get_the_post_thumbnail_url();
                                ?>
                                    <img class="w-full h-full object-cover" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title(); ?>">
                                <?php } else { ?>
                                    <img class="w-full h-full object-cover" src="https://knowledgeplatform.searca.org/wp-content/uploads/2025/03/Frame-2147226575-1.png" alt="<?php the_title(); ?>">
                                <?php } ?>
                            </div>
                          </div>
                        </div>
                        <div class="w-[100%] py-[10px]">
                            <div class="text-[18px] font-bold pt-[7px]">
                                <?php
                                    $text = get_the_title(); // Get the title as a string
                                    $limit = 50;
                                    $trimmed = mb_strimwidth($text, 0, $limit, "..."); // Trim it properly
                                ?>
                                <h4><?php echo esc_html($trimmed); ?></h4>
                            </div>
                            <div class="text-[16px] font-[200] pt-[7px]">
                                <?php
                                    $text = get_the_content(); // Get the title as a string
                                    $limit = 40;
                                    $trimmed = mb_strimwidth($text, 0, $limit, "..."); // Trim it properly
                                ?>
                                <p><?php echo esc_html($trimmed); ?></p>
                            </div>
                        </div>
                    </div>
                    </a>
                <?php   }
                    } 
                ?>

            </div>
        </div>
        <div class="flex justify-end w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] relative mx-auto pt-[50px]">
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
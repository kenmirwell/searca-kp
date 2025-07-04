<div id="agri-featured-resources" class="h-auto">
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
        <a href="<?php echo get_permalink($learning_materials_id) ?>" class="hidden md:flex justify-center gap-[30px] relative py-[10px] h-[500px] h-auto">
            <div class="h-auto justify-start gap-[20px] w-[100%]">
                <div class="flex flex-col h-auto rounded-[15px] overflow-hidden cursor-pointer">
                    <div class="flex h-[250px] xl:h-[300px] relative bg-[#ffffff] rounded-[15px] overflow-hidden">
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
                    <div class="flex h-auto pb-[10px] md:pb-[20px]">
                        <div class="pt-[20px] pb-[10px] w-[100%]">
                            <div class="flex flex-col lg:flex-row gap-[5px] justify-between">
                                <div class="flex items-center gap-[10px]">
                                    <div class="w-[20px]">
                                        <svg width="auto" height="auto" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.33333 11.834C5.07361 11.834 4.85606 11.746 4.68067 11.57C4.50528 11.394 4.41728 11.1764 4.41667 10.9173C4.41606 10.6582 4.50406 10.4407 4.68067 10.2647C4.85728 10.0887 5.07483 10.0007 5.33333 10.0007C5.59183 10.0007 5.80969 10.0887 5.98692 10.2647C6.16414 10.4407 6.25183 10.6582 6.25 10.9173C6.24817 11.1764 6.16017 11.3943 5.986 11.5709C5.81183 11.7475 5.59428 11.8352 5.33333 11.834ZM9 11.834C8.74028 11.834 8.52272 11.746 8.34733 11.57C8.17194 11.394 8.08394 11.1764 8.08333 10.9173C8.08272 10.6582 8.17072 10.4407 8.34733 10.2647C8.52394 10.0887 8.7415 10.0007 9 10.0007C9.2585 10.0007 9.47636 10.0887 9.65358 10.2647C9.83081 10.4407 9.9185 10.6582 9.91667 10.9173C9.91483 11.1764 9.82683 11.3943 9.65267 11.5709C9.4785 11.7475 9.26094 11.8352 9 11.834ZM12.6667 11.834C12.4069 11.834 12.1894 11.746 12.014 11.57C11.8386 11.394 11.7506 11.1764 11.75 10.9173C11.7494 10.6582 11.8374 10.4407 12.014 10.2647C12.1906 10.0887 12.4082 10.0007 12.6667 10.0007C12.9252 10.0007 13.143 10.0887 13.3202 10.2647C13.4975 10.4407 13.5852 10.6582 13.5833 10.9173C13.5815 11.1764 13.4935 11.3943 13.3193 11.5709C13.1452 11.7475 12.9276 11.8352 12.6667 11.834ZM2.58333 19.1673C2.07917 19.1673 1.64772 18.988 1.289 18.6292C0.930278 18.2705 0.750611 17.8388 0.75 17.334V4.50065C0.75 3.99649 0.929667 3.56504 1.289 3.20632C1.64833 2.8476 2.07978 2.66793 2.58333 2.66732H3.5V1.75065C3.5 1.49093 3.588 1.27338 3.764 1.09799C3.94 0.922599 4.15756 0.834599 4.41667 0.833988C4.67578 0.833376 4.89364 0.921377 5.07025 1.09799C5.24686 1.2746 5.33456 1.49215 5.33333 1.75065V2.66732H12.6667V1.75065C12.6667 1.49093 12.7547 1.27338 12.9307 1.09799C13.1067 0.922599 13.3242 0.834599 13.5833 0.833988C13.8424 0.833376 14.0603 0.921377 14.2369 1.09799C14.4135 1.2746 14.5012 1.49215 14.5 1.75065V2.66732H15.4167C15.9208 2.66732 16.3526 2.84699 16.7119 3.20632C17.0713 3.56565 17.2506 3.9971 17.25 4.50065V17.334C17.25 17.8382 17.0706 18.2699 16.7119 18.6292C16.3532 18.9886 15.9214 19.1679 15.4167 19.1673H2.58333ZM2.58333 17.334H15.4167V8.16732H2.58333V17.334ZM2.58333 6.33399H15.4167V4.50065H2.58333V6.33399Z" fill="#343434"/>
                                        </svg>
                                    </div>
                                    <p class="text-[12px] xl:text-[14px]">
                                        <?php 
                                            $published_year = get_field("published_date");

                                            if($published_year) {
                                        ?>
                                        <?php echo get_field("published_date"); ?>
                                        <?php } else { ?>
                                            N/A
                                        <?php } ?>
                                    </p>
                                </div>
                                <div class="flex items-center gap-[10px]">
                                    <div class="w-[20px]">
                                        <svg width="auto" height="auto" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 11C13.2091 11 15 9.20914 15 7C15 4.79086 13.2091 3 11 3C8.79086 3 7 4.79086 7 7C7 9.20914 8.79086 11 11 11Z" stroke="#343434" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M18 19C18 15.6829 14.8626 13 11 13C7.13737 13 4 15.6829 4 19" stroke="#343434" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <?php
                                        $terms = get_the_terms(get_the_ID(), 'research_author');

                                        if ($terms && !is_wp_error($terms)) {
                                            foreach ($terms as $term) { ?>
                                                <p class="text-[12px] xl:text-[14px]"><?php echo esc_html($term->name); ?></p>
                                    <?php } } else { ?>
                                            <p class="text-[12px] xl:text-[14px]">Unknown</p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="hidden xl:flex items-end md:text-[18px] font-[600] pt-[10px]">
                                <?php
                                    $text = get_the_title(); // Get the title as a string
                                    $limit = 70;
                                    $trimmed = mb_strimwidth($text, 0, $limit, "..."); // Trim it properly
                                ?>
                                <h6><?php echo esc_html($trimmed); ?></h6>
                            </div>
                            <div class="flex xl:hidden items-end md:text-[18px] font-[600] pt-[10px]">
                                <?php
                                    $text = get_the_title(); // Get the title as a string
                                    $limit = 40;
                                    $trimmed = mb_strimwidth($text, 0, $limit, "..."); // Trim it properly
                                ?>
                                <h6><?php echo esc_html($trimmed); ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </a>
    </div>
  <?php   
          }
      }

      wp_reset_postdata(); 
  ?>
</div>
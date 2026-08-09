<div class="w-full z-[1] relative">
  <div class="w-[90%] lg:w-[1024px] xl:w-fit mt-[-60px] md:mt-[-100px] py-[20px] md:py-[50px] px-[20px] md:px-[40px] mx-auto rounded-3xl shadow bg-white">
      <div class="flex flex-col gap-[20px] md:flex-row justify-between  md:items-center">
        <div class="flex flex-col gap-[10px]">
          <h2 class="text-display-24 md:text-display-32 font-semibold">Stay Informed</h2>
          <p>Explore the latest news, research highlights, policy developments.</p>
        </div>
        <a href="<?php echo esc_url(get_sub_field('button_link')); ?>" class="group cursor-pointer w-fit">
          <div class="flex items-center gap-[20px] py-[5px] pl-[20px] pr-[5px] bg-[#008c67] group-hover:bg-[#B59637] transition-all duration-200 ease rounded-full">  
            <p class="w-max text-white">View all News</p>
            <div class="bg-[#B59637] group-hover:bg-[#008c67] rounded-full p-[15px] transition-all duration-200 ease">
              <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.10042 21.8995L21.8994 2.10051M21.8994 2.10051H2.10042M21.8994 2.10051V21.8995" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
          </div>
        </a>
      </div>

      <?php
          $news_query = new WP_Query([
              'post_type'      => 'news',
              'posts_per_page' => -1, // change to a number (e.g. 6, 10) for pagination/limits
              'post_status'    => 'publish',
              'orderby'        => 'date',
              'order'          => 'DESC',
          ]);

          if ($news_query->have_posts()) : ?>

              <div class="flex flex-wrap xl:flex-nowrap flex-col sm:flex-row justify-start xl:justify-between items-start gap-[20px] py-[20px]">
                  <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>

                      <?php
                          // Native WordPress fields
                          $title = wp_trim_words(get_the_title(), 8);
                          $content = get_the_content();
                          $link    = get_permalink();

                          // ACF custom fields (adjust field names to match your ACF setup)
                          $date      = get_field('published_date');
                          $thumbnail = get_field('thumbnail'); // ACF Image field
                      ?>

                      <div class="news-card w-[100%] md:w-[30%] xl:w-[100%]">

                        <div class="w-[100%] md:w-auto h-[370px] xl:h-[435px] rounded-[20px] group">
                            <div class="flex flex-col relative h-full w-full xl:w-[400px] rounded-3xl overflow-hidden border-[1px] border-[#CFCFCF]">
                              <?php if ($thumbnail) : ?>
                                  <div class="relative w-full h-[450px]">
                                    <img src="<?php echo esc_url($thumbnail); ?>" 
                                      alt="<?php echo esc_attr($thumbnail); ?>" 
                                      class="absolute w-full h-full object-cover scale-[1] group-hover:scale-[1.1] transition-all duration-700 ease">
                                  </div>
                              <?php endif; ?>

                              <div class="p-[20px] z-[2] w-full bg-[#ffffff] min-h-[180px] bottom-0">
                                  
                                  <div class="flex flex-col gap-[20px]">
                                    <div class="flex justify-between">
                                      <p class="text-[#343434] font-normal text-display-14">Policy News</p>
                                      <?php if ($date) : ?>
                                        <p class="text-[#343434] font-normal text-display-14"><?php echo esc_html($date); ?></p>
                                      <?php endif; ?>
                                    </div>

                                    <?php
                                        $full_title = $title;
                                        $short_title = mb_strimwidth($title, 0, 40, '...'); // multibyte-safe truncation
                                    ?>

                                    <h3 class=" font-semibold">
                                        <span class="hidden md:block xl:hidden"><?php echo esc_html($short_title); ?></span>
                                        <span class="inline md:hidden xl:inline"><?php echo esc_html($full_title); ?></span>
                                    </h3>

                                    <!-- <div class="excerpt">
                                        <?php //echo wp_trim_words($content, 20); ?>
                                    </div> -->

                                    <a class="flex gap-[10px] items-center" href="<?php echo esc_url($link); ?>">Read more 
                                      <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.5 5.5L10.5 5.5M5.5 0.5L10.5 5.5L5.5 10.5" stroke="#525355" stroke-linecap="round" stroke-linejoin="round"/>
                                      </svg>
                                    </a>
                                  </div>

                              </div>
                            </div>
                        </div>

                      </div>

                  <?php endwhile; ?>
              </div>

          <?php else : ?>
              <p>No news posts found.</p>
          <?php endif;

          wp_reset_postdata(); // always reset after a custom WP_Query loop
          ?>
    </div>
</div>
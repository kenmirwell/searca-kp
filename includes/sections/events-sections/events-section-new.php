<div class="py-[30px] md:py-[50px] relative">
    <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto z-[1] relative">
        <div class="">
            <div class="flex gap-[40px]">
                <?php //I'm not getting anything from here inside
                    $event = new WP_Query(array(
                        "post_type" => "event",
                        "posts_per_page" => 10,
                        'order' => 'ASC',     
                    ));
                ?>
                <?php if ($event->have_posts()) : ?>
                    <?php while ($event->have_posts()) : ?>
                        <?php
                            $event->the_post();
                            $event_index = (int) $event->current_post;
                            $event_location = get_field("event_location");
                            $event_schedule =  get_field("event_schedule");
                            $event_thumbnail = get_field("event_thumbnail");
                            
                            $event_date_from = $event_schedule['event_date_from'] ?? '';
                            $event_date_to   = $event_schedule['event_date_to'] ?? '';

                            $date_range = '';

                            if ($event_date_from && $event_date_to) {
                                $from = DateTime::createFromFormat('F j, Y', $event_date_from);
                                $to   = DateTime::createFromFormat('F j, Y', $event_date_to);

                                if ($from && $to) {
                                    if ($from->format('Y') !== $to->format('Y')) {
                                        $date_range = $from->format('j F Y') . ' - ' . $to->format('j F Y');
                                    } elseif ($from->format('m') !== $to->format('m')) {
                                        $date_range = $from->format('j F') . ' - ' . $to->format('j F Y');
                                    } else {
                                        $date_range = $from->format('j') . ' - ' . $to->format('j F Y');
                                    }
                                }
                            }
                        ?>
                            <div class="w-[447px] shadow">
                                <div class="relative w-full h-[350px] rounded-lg group overflow-hidden">
                                    <img class="w-full h-full object-cover" src="<?php echo esc_url($event_thumbnail); ?>" alt="event thumbnail">
                                </div>
                                <div class="flex flex-col gap-[15px] bg-[#F7FAF7] p-[20px]">
                                    <div class="flex gap-[10px]">
                                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M8 2V5" stroke="#096936" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M16 2V5" stroke="#096936" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M3.5 9.08984H20.5" stroke="#096936" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z" stroke="#096936" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M15.6937 13.7002H15.7027" stroke="#096936" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M15.6937 16.7002H15.7027" stroke="#096936" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M11.9945 13.7002H12.0035" stroke="#096936" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M11.9945 16.7002H12.0035" stroke="#096936" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M8.29529 13.7002H8.30427" stroke="#096936" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M8.29688 16.7002H8.30586" stroke="#096936" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                      </svg>
                                      <div class="flex gap-[5px] text-display-16 text-[#096936]">
                                          <?php if ($date_range) : ?>
                                              <span><?php echo esc_html($date_range); ?></span>
                                          <?php endif; ?>
                                          <?php if ($event_schedule['event_start_time']) : ?>
                                              <div class="flex gap-[5px]">
                                                <p><?php echo esc_html($event_schedule['event_start_time']); ?></p>
                                                <div>-</div>
                                                <p><?php echo esc_html($event_schedule['event_end_time']); ?></p>
                                              </div>
                                          <?php endif; ?>
                                      </div>
                                  </div>

                                  <h2 class="text-display-24 font-semibold text-[#1f1f1f]"><?php the_title(); ?></h2>

                                  <?php if( $event_location) : ?>
                                      <div class="flex gap-[10px]">
                                          <svg width="18" height="21" viewBox="0 0 18 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                              <path d="M3.40146 3.75953C4.89178 2.29902 6.89826 1.48566 8.98489 1.49619C11.0715 1.50673 13.0697 2.34032 14.5452 3.81581C16.0207 5.2913 16.8543 7.28946 16.8648 9.37609C16.8753 11.4627 16.062 13.4692 14.6015 14.9595L10.4155 19.1455C10.0404 19.5205 9.53179 19.7311 9.00146 19.7311C8.47113 19.7311 7.96252 19.5205 7.58746 19.1455L3.40146 14.9595C1.91635 13.4743 1.08203 11.4599 1.08203 9.35953C1.08203 7.25915 1.91635 5.24479 3.40146 3.75953Z" stroke="#096936" stroke-width="1.5" stroke-linejoin="round"/>
                                              <path d="M9 12.3594C10.6569 12.3594 12 11.0162 12 9.35937C12 7.70252 10.6569 6.35938 9 6.35938C7.34315 6.35938 6 7.70252 6 9.35937C6 11.0162 7.34315 12.3594 9 12.3594Z" stroke="#096936" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          </svg>
                                          <p class="text-display-16 text-[#096936]"><?php echo $event_location; ?></p>
                                      </div>
                                  <?php  endif;?>
                                  
                                  <?php if(have_rows("event_tags")) : ?>
                                      <div class="flex gap-[20px] py-[10px]">
                                          <?php while (have_rows('event_tags')) : the_row(); ?>
                                              <div class="border-[1px] border-[#1f1f1f] rounded-[5px] py-[5px] px-[20px]">
                                                  <p class="text-display-14 text-[#1f1f1f]"><?php echo esc_html(get_sub_field('event_tag')); ?></p>
                                              </div>
                                          <?php endwhile; ?>
                                      </div>
                                  <?php endif; ?>

                                  <div class="flex">
                                      <?php
                                          button_template('common-button', array(
                                              'title' => "Register Now",
                                              'url' => "/agricultural-digital-tools",
                                              'color' => 'green_to_gold'
                                          ))
                                      ?>
                                  </div>
                              </div>
                            </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</div>
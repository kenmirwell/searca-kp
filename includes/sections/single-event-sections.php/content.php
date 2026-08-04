<div class="w-[80%] mb-[100px] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto pb-[80px]">
  <div class="flex justify-between gap-[60px]">
    <div class="w-[70%]">
        <div class="pb-[20px]">
            <h2 class="text-display-32">Event Overview</h2>
        </div>
        <div class="[&_p]:mb-4 font-light">
            <?php echo wp_kses_post(wpautop(get_the_content())); ?>
        </div>
    </div>

    <div class="w-[30%]">
        <?php
            $event_location = get_field('event_location'); // or get_field('event_location', $post_id) if outside the main loop
            if ($event_location) :
                $map_query = urlencode($event_location);
        ?>
            <div class="p-[20px] mb-[20px] rounded-2xl bg-[#EBF6F3]">
                <div class="flex flex-col gap-[10px]">
                    <div class="pb-[20px]">
                        <h6 class="font-semibold text-display-16">Event Location</h6>
                        <p class="text-display-14"><?php echo esc_html($event_location); ?></p>
                    </div>
                    <div class="w-full aspect-video rounded-lg overflow-hidden shadow">
                        <iframe
                            src="https://www.google.com/maps?q=<?php echo $map_query; ?>&output=embed"
                            width="100%"
                            height="100%"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        <?php endif; ?>
      

        <div class=" p-[20px] border-[1px] border-[#D3D3D3] rounded-2xl h-fit">
            <?php
                $current_id = get_the_ID();
                $related_ids = [];

                // STEP 1: Try to find related posts by shared category
                $categories = wp_get_post_categories($current_id);

                $related_query = new WP_Query([
                    'post_type'      => 'event', // change to your actual post type if different
                    'posts_per_page' => 4,
                    'post_status'    => 'publish',
                    'post__not_in'   => [$current_id],
                    'category__in'   => $categories,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                ]);

                if ($related_query->have_posts()) {
                    while ($related_query->have_posts()) {
                        $related_query->the_post();
                        $related_ids[] = get_the_ID();
                    }
                }
                wp_reset_postdata();

                // STEP 2: If fewer than 4 related posts found, fill the rest with most recent posts
                $needed = 4 - count($related_ids);

                if ($needed > 0) {
                    $exclude_ids = array_merge([$current_id], $related_ids);

                    $fallback_query = new WP_Query([
                        'post_type'      => 'post',
                        'posts_per_page' => $needed,
                        'post_status'    => 'publish',
                        'post__not_in'   => $exclude_ids,
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                    ]);

                    if ($fallback_query->have_posts()) {
                        while ($fallback_query->have_posts()) {
                            $fallback_query->the_post();
                            $related_ids[] = get_the_ID();
                        }
                    }
                    wp_reset_postdata();
                }

                // STEP 3: Render
                if (!empty($related_ids)) :
            ?>
            
            <div class="flex flex-col gap-[10px]">
                <h3 class="font-semibold text-display-16">More Events</h3>

                    <?php foreach ($related_ids as $post_id) :
                    $permalink = get_permalink($post_id);
                    $title     = get_the_title($post_id);

                    $event_location = get_field('event_location', $post_id);
                    $event_schedule = get_field('event_schedule', $post_id);

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

                    <div class="flex flex-col gap-[15px] pb-[16px] border-b border-[#E5E5E5] last:border-b-0">
                        <a href="<?php echo esc_url($permalink); ?>" class="text-[#1A1A1A] hover:text-[#008C67] transition-colors text-display-16">
                            <?php echo esc_html($title); ?>
                        </a>
                        <div class="flex flex-col gap-[10px] text-sm text-[#8A8A8A]">
                            <?php if ($date_range) : ?>
                                <span class="flex items-center gap-[6px] text-[#096936] text-display-14">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 2V5" stroke="#096936" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16 2V5" stroke="#096936" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M3.5 9.09009H20.5" stroke="#096936" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z" stroke="#096936" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M15.6947 13.7H15.7037" stroke="#096936" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M15.6947 16.7H15.7037" stroke="#096936" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M11.9955 13.7H12.0045" stroke="#096936" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M11.9955 16.7H12.0045" stroke="#096936" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.29431 13.7H8.30329" stroke="#096936" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.29431 16.7H8.30329" stroke="#096936" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    <?php echo esc_html($date_range); ?>
                                </span>
                            <?php endif; ?>
                            <?php if ($event_location) : ?>
                                <span class="flex items-center gap-[10px] text-[#096936] text-display-14">
                                    <div class="w-[20px]">
                                        <svg width="24" height="26" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3.06943 3.01343C4.55975 1.55292 6.56623 0.739562 8.65286 0.750101C10.7395 0.76064 12.7377 1.59423 14.2131 3.06971C15.6886 4.5452 16.5222 6.54337 16.5328 8.63C16.5433 10.7166 15.7299 12.7231 14.2694 14.2134L10.0834 18.3994C9.70837 18.7744 9.19976 18.985 8.66943 18.985C8.1391 18.985 7.63048 18.7744 7.25543 18.3994L3.06943 14.2134C1.58432 12.7282 0.75 10.7138 0.75 8.61343C0.75 6.51306 1.58432 4.4987 3.06943 3.01343Z" stroke="#096936" stroke-width="1.5" stroke-linejoin="round"/>
                                            <path d="M8.66797 11.6138C10.3248 11.6138 11.668 10.2706 11.668 8.61377C11.668 6.95691 10.3248 5.61377 8.66797 5.61377C7.01111 5.61377 5.66797 6.95691 5.66797 8.61377C5.66797 10.2706 7.01111 11.6138 8.66797 11.6138Z" stroke="#096936" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>

                                    <?php echo esc_html($event_location); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>

            <?php endif; ?>
        </div>
    </div>
  </div>
</div>
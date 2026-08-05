<div class="w-[80%] mb-[100px] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[40px] md:py-[80px]">
  <div class="flex flex-col lg:flex-row justify-between gap-[60px]">
    <div class="w-[100%] lg:w-[70%]">
      <div class="flow-root pb-[40px]">
        <?php if (get_field('initial')) : ?>
            <p class="font-bold text-display-42 float-left pr-3">
                <?php echo esc_html(get_field('initial')); ?>
            </p>
        <?php endif; ?>
        <div class="[&_p]:mb-4 font-light">
            <?php echo wp_kses_post(wpautop(get_the_content())); ?>
        </div>
      </div>
    </div>

    <div class="w-[100%] lg:w-[30%]">
      <?php
        $current_id = get_the_ID();
        $related_ids = [];

        // STEP 1: Try to find related posts by shared category
        $categories = wp_get_post_categories($current_id);

        $related_query = new WP_Query([
            'post_type'      => 'news', // change to your actual post type if different
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

      <div class="flex flex-col gap-[20px]">
          <h3 class="font-bold text-display-24">More News</h3>

          <?php foreach ($related_ids as $post_id) :
                $permalink = get_permalink($post_id);
                $title     = get_the_title($post_id);
                $date_from_raw = get_field('date_from', $post_id);
                $date = '';

                if ($date_from_raw) {
                    $date_obj = DateTime::createFromFormat('d/m/Y', $date_from_raw);
                    if ($date_obj) {
                        $date = $date_obj->format('M j, Y');
                    }
                }

                $content    = get_post_field('post_content', $post_id);
                $word_count = str_word_count(wp_strip_all_tags($content));
                $read_mins  = max(1, ceil($word_count / 200));
          ?>

              <div class="flex flex-col gap-[8px] pb-[16px] border-b border-[#E5E5E5] last:border-b-0">
                  <a href="<?php echo esc_url($permalink); ?>" class="font-semibold text-[#1A1A1A] hover:text-[#008C67] transition-colors">
                      <?php echo esc_html($title); ?>
                  </a>
                  <div class="flex items-center gap-[16px] text-sm text-[#8A8A8A]">
                      <span class="flex items-center gap-[6px]">
                          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="3" y="4" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2"/>
                              <path d="M3 10H21" stroke="currentColor" stroke-width="2"/>
                              <path d="M8 2V6M16 2V6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                          </svg>
                          <?php echo esc_html($date); ?>
                      </span>
                      <span class="flex items-center gap-[6px]">
                          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/>
                              <path d="M12 7V12L15 15" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                          </svg>
                          <?php echo esc_html($read_mins); ?> mins
                      </span>
                  </div>
              </div>

          <?php endforeach; ?>
      </div>

      <?php endif; ?>
    </div>
  </div>
</div>
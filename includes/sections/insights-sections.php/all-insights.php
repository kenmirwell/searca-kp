<div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto py-[80px]">
  <div>
    <?php
      $insights_query = new WP_Query([
          'post_type'      => 'insight',
          'posts_per_page' => -1,
          'post_status'    => 'publish',
          'orderby'        => 'date',
          'order'          => 'DESC',
      ]);

      if ($insights_query->have_posts()) :
    ?>

    <div class="flex flex-wrap gap-[40px]">
      <?php
            while ($insights_query->have_posts()) : $insights_query->the_post();

                $link  = get_permalink();
                $label = get_field('label');
                $title = get_field('title');

                $published_date_raw = get_field('date_from');
                $published_date = '';
                if ($published_date_raw) {
                    $date_obj = DateTime::createFromFormat('d/m/Y', $published_date_raw);
                    if ($date_obj) {
                        $published_date = $date_obj->format('j F Y');
                    }
                }

                $display_title = get_the_title();
                $hero_image = get_field('hero_image');
                $search_text = strtolower($display_title . ' ' . $title . ' ' . $label);
      ?>

      <div class="border-b-[1px] border-[#DADADA] w-[100%] md:w-[447px] knowledge-card" 
           data-search="<?php echo esc_attr($search_text); ?>">
        <div class="relative w-full h-[250px] lg:h-[350px] rounded-lg group overflow-hidden">
          <?php if ($hero_image) : ?>
            <img src="<?php echo esc_url($hero_image); ?>" 
                alt="<?php echo esc_attr($title ?: get_the_title()); ?>" 
                class="absolute w-full h-full object-cover scale-[1] group-hover:scale-[1.1] transition-all duration-700 ease">
          <?php endif; ?>
        </div>
        <div class="flex flex-col gap-[20px] py-[20px]">

          <div class="flex justify-between text-[#343434]">
            <?php if ($title) : ?>
              <span class="text-[#343434]"><?php echo esc_html($title); ?></span>
            <?php endif; ?>

            <?php if ($published_date) : ?>
              <span class="text-[#343434]"><?php echo esc_html($published_date); ?></span>
            <?php endif; ?>
          </div>

          <?php if ($display_title) : ?>
            <h6 class="text-display-24 font-semibold"><?php echo esc_html($display_title); ?></h6>
          <?php endif; ?>

          <a class="flex gap-[20px] items-center" href="<?php echo esc_url($link); ?>">
            Learn more 
            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0.5 5.5L10.5 5.5M5.5 0.5L10.5 5.5L5.5 10.5" stroke="#525355" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>
        </div>
      </div>

      <?php endwhile; ?>
    </div>

    <?php endif;

      wp_reset_postdata();
    ?>
  </div>
</div>
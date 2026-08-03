<div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto py-[80px]">
  <div class="flex justify-between pb-[50px]">
    <h2 class="text-display-32 font-semibold">Knowledge Watch</h2>
    <div class="relative flex items-center w-[50%] justify-end">
      <svg class="absolute left-[10px]" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M11.8477 21.75C6.19766 21.75 1.59766 17.15 1.59766 11.5C1.59766 5.85 6.19766 1.25 11.8477 1.25C17.4977 1.25 22.0977 5.85 22.0977 11.5C22.0977 17.15 17.4977 21.75 11.8477 21.75ZM11.8477 2.75C7.01766 2.75 3.09766 6.68 3.09766 11.5C3.09766 16.32 7.01766 20.25 11.8477 20.25C16.6777 20.25 20.5977 16.32 20.5977 11.5C20.5977 6.68 16.6777 2.75 11.8477 2.75Z" fill="#444242"/>
        <path d="M22.3471 22.7499C22.1571 22.7499 21.9671 22.6799 21.8171 22.5299L19.8171 20.5299C19.5271 20.2399 19.5271 19.7599 19.8171 19.4699C20.1071 19.1799 20.5871 19.1799 20.8771 19.4699L22.8771 21.4699C23.1671 21.7599 23.1671 22.2399 22.8771 22.5299C22.7271 22.6799 22.5371 22.7499 22.3471 22.7499Z" fill="#444242"/>
      </svg>
      <input id="knowledge-products-search-input" class="pl-[40px] py-[10px] pr-[10px] text-[#000000] w-[100%] border-[1px] border-[#CECECE]" type="text" placeholder="Select by ">
    </div>
  </div>
  <div>
    <?php
      $kw_query = new WP_Query([
          'post_type'      => 'knowledge-watch',
          'posts_per_page' => -1,
          'post_status'    => 'publish',
          'orderby'        => 'date',
          'order'          => 'DESC',
      ]);

      if ($kw_query->have_posts()) :
    ?>

    <div class="flex flex-wrap gap-[40px]" id="knowledge-products-list">
      <?php
            while ($kw_query->have_posts()) : $kw_query->the_post();

                $link  = get_permalink();
                $label = get_field('label');
                $title = get_field('title');

                $published_date_raw = get_field('published_date');
                $published_date = '';
                if ($published_date_raw) {
                    $date_obj = DateTime::createFromFormat('d/m/Y', $published_date_raw);
                    if ($date_obj) {
                        $published_date = $date_obj->format('j F Y');
                    }
                }

                $display_title = get_the_title();
                $search_text = strtolower($display_title . ' ' . $title . ' ' . $label);
      ?>

      <div class="border-b-[1px] border-[#DADADA] w-[447px] knowledge-card" 
           data-search="<?php echo esc_attr($search_text); ?>">
        <div class="relative w-full h-[350px] rounded-lg group overflow-hidden">
          <?php if (has_post_thumbnail()) : ?>
            <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>" 
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

    <p id="knowledge-no-results" class="hidden text-[#525355] mt-[40px]">No results found.</p>

    <?php endif;

      wp_reset_postdata();
    ?>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('knowledge-products-search-input');
    const cards = document.querySelectorAll('.knowledge-card');
    const noResultsMsg = document.getElementById('knowledge-no-results');

    if (!searchInput) return;

    searchInput.addEventListener('input', function () {
        const query = this.value.trim().toLowerCase();
        let visibleCount = 0;

        cards.forEach(card => {
            const searchText = card.dataset.search || '';
            const isMatch = searchText.includes(query);
            card.style.display = isMatch ? '' : 'none';
            if (isMatch) visibleCount++;
        });

        noResultsMsg.classList.toggle('hidden', visibleCount > 0);
    });
});
</script>
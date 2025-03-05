<div id="home-side-filter-group-0" class="relative">
    <div 
        id="home-side-filter-head-0"
        onclick="handleHomeAccordion('home-side-filter-content-0', parseInt('0', 10))"   
        class="flex gap-[20px] justify-between items-center text-[14px]  xl:text-[18px] font-[600] border-b-[1px] border-[#CECECE] py-[10px] cursor-pointer"
    >
        <p class="text-[16px]">Type</p>
        <svg width="22" height="8" viewBox="0 0 32 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M30 2L16 16L2 2" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>
    <div 
        id="home-side-filter-container-0" 
        class="rounded-lg overflow-hidden h-[100%] transition-all duration-200 ease"
        style="height: 0;" 
    >
        <?php
            $terms = get_terms(array(
                'taxonomy' => 'km_category', 
                'hide_empty' => false,       
            ));
        ?>
        <ul id="home-side-filter-content-0" class="type-category-container category-container relative py-[20px] z-[99] w-[100%] flex flex-col">
            <?php    
            if (!is_wp_error($terms)) {
                foreach ($terms as $term) {
            ?>
                <div 
                    class="flex items-center"  
                    id="filter-item-<? echo esc_attr($term->term_id) ?>"
                    data-name="<? echo $term->name ?>" 
                    data-value="<? echo esc_attr($term->term_id) ?>"
                >
                    <li 
                        class="w-[200px] flex gap-[10px] font-[200] hover:font-[600] text-[#000000] text-[14px] py-[2px] cursor-pointer" 
                        data-name="<? echo $term->name ?>" 
                        data-value="<? echo esc_attr($term->term_id) ?>"
                        data-taxonomy="km_category[]"
                    >
                        <div class="selection-box">
                            <svg class="unchecked-box" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="17" height="17" rx="2.5" stroke="#D3D3D3"/>
                            </svg>
                            <svg class="checked-box hidden"  width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="17" height="17" rx="2.5" fill="#DFF8EA"/>
                                <rect x="0.5" y="0.5" width="17" height="17" rx="2.5" stroke="#096936"/>
                                <path d="M13.5 5.625L7.3125 11.8125L4.5 9" stroke="#096936" stroke-width="1.6666" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <?php echo esc_html($term->name) ?>
                    </li>
                </div>
            <?php } } ?>
        </ul>
    </div>
</div>
<div id="home-side-filter-group-1" class="relative">
    <div 
        id="home-side-filter-head-1"
        onclick="handleHomeAccordion('home-side-filter-content-1', parseInt('1', 10))"   
        class="flex gap-[20px] justify-between items-center text-[14px]  xl:text-[18px] font-[600] border-b-[1px] border-[#CECECE] py-[10px] cursor-pointer"
    >
        <p class="text-[16px]">Author</p>
        <svg width="22" height="8" viewBox="0 0 32 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M30 2L16 16L2 2" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>
    <div 
        id="home-side-filter-container-1" 
        class="rounded-lg overflow-hidden h-[100%] transition-all duration-200 ease"
        style="height: 0;" 
    >
        <?php
            $terms = get_terms(array(
                'taxonomy' => 'research_author', 
                'hide_empty' => true,       
            ));
        ?>
        <ul id="home-side-filter-content-1" class="author-category-container category-container relative py-[20px] z-[99] w-[100%] flex flex-col">
            <?php    
            if (!is_wp_error($terms) && !empty($terms)) {
                foreach ($terms as $term) {
            ?>
                <div 
                    class="flex items-center"  
                    id="filter-item-<? echo esc_attr($term->term_id) ?>"
                    data-name="<? echo $term->name ?>" 
                    data-value="<? echo esc_attr($term->term_id) ?>"
                >
                    <li 
                        class="w-[200px] flex gap-[10px] font-[200] hover:font-[600] text-[#000000] text-[14px] py-[2px] cursor-pointer" 
                        data-name="<? echo $term->name ?>" 
                        data-value="<? echo esc_attr($term->term_id) ?>"
                        data-taxonomy="research_author[]"
                    >
                        <div class="selection-box">
                            <svg class="unchecked-box" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="17" height="17" rx="2.5" stroke="#D3D3D3"/>
                            </svg>
                            <svg class="checked-box hidden"  width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="17" height="17" rx="2.5" fill="#DFF8EA"/>
                                <rect x="0.5" y="0.5" width="17" height="17" rx="2.5" stroke="#096936"/>
                                <path d="M13.5 5.625L7.3125 11.8125L4.5 9" stroke="#096936" stroke-width="1.6666" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <?php echo esc_html($term->name) ?>
                    </li>
                </div>
            <?php } } ?>
        </ul>
    </div>
</div>
<div id="home-side-filter-group-2" class="relative">
    <div 
        id="home-side-filter-head-2"
        onclick="handleHomeAccordion('home-side-filter-content-2', parseInt('2', 10))"   
        class="flex gap-[20px] justify-between items-center text-[14px]  xl:text-[18px] font-[600] border-b-[1px] border-[#CECECE] py-[10px] cursor-pointer"
    >
        <p class="text-[16px]">Country</p>
        <svg width="22" height="8" viewBox="0 0 32 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M30 2L16 16L2 2" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>
    <div 
        id="home-side-filter-container-2" 
        class="rounded-lg overflow-hidden h-[100%] transition-all duration-200 ease"
        style="height: 0;" 
    >
        <?php
            $terms = get_terms(array(
                'taxonomy' => 'country', 
                'hide_empty' => false,       
            ));
        ?>
        <ul id="home-side-filter-content-2" class="country-category-container category-container relative py-[20px] z-[99] w-[100%] flex flex-col">
            <?php    
            if (!is_wp_error($terms) && !empty($terms)) {
                foreach ($terms as $term) {
            ?>
                <div 
                    class="flex items-center"  
                    id="filter-item-<? echo esc_attr($term->term_id) ?>"
                    data-name="<? echo $term->name ?>" 
                    data-value="<? echo esc_attr($term->term_id) ?>"
                >
                    <li 
                        class="w-[200px] flex gap-[10px] font-[200] hover:font-[600] text-[#000000] text-[14px] py-[2px] cursor-pointer" 
                        data-name="<? echo $term->name ?>" 
                        data-value="<? echo esc_attr($term->term_id) ?>"
                        data-taxonomy="country[]"
                    >
                        <div class="selection-box">
                            <svg class="unchecked-box" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="17" height="17" rx="2.5" stroke="#D3D3D3"/>
                            </svg>
                            <svg class="checked-box hidden"  width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="17" height="17" rx="2.5" fill="#DFF8EA"/>
                                <rect x="0.5" y="0.5" width="17" height="17" rx="2.5" stroke="#096936"/>
                                <path d="M13.5 5.625L7.3125 11.8125L4.5 9" stroke="#096936" stroke-width="1.6666" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <?php echo esc_html($term->name) ?>
                    </li>
                </div>
            <?php } } ?>
        </ul>
    </div>
</div>
<div id="home-side-filter-group-3" class="relative">
    <div 
        id="home-side-filter-head-3"
        onclick="handleHomeAccordion('home-side-filter-content-3', parseInt('3', 10))"   
        class="flex gap-[20px] justify-between items-center text-[14px] xl:text-[18px] font-[600] border-b-[1px] border-[#CECECE] py-[10px] cursor-pointer"
    >
        <p class="text-[16px]">Publication Year</p>
        <svg width="22" height="8" viewBox="0 0 32 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M30 2L16 16L2 2" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>
    <div 
        id="home-side-filter-container-3" 
        class="rounded-lg overflow-hidden h-[100%] transition-all duration-200 ease"
        style="height: 0;" 
    >
        <?php
        // Fetch unique published dates
        $args = array(
            'post_type'      => 'knowledge-management',
            'posts_per_page' => -1,
            'meta_key'       => 'published_date',
            'orderby'        => 'meta_value',
            'order'          => 'ASC',
            'fields'         => 'ids',
        );

        $query = new WP_Query($args);
        $dates = [];

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $date = get_field('published_date'); // Ensure this returns the expected format
                if ($date && !in_array($date, $dates)) {
                    $dates[] = $date;
                }
            }
            wp_reset_postdata();
        }
        ?>

        <ul id="home-side-filter-content-3" class="date-category-container category-container relative py-[20px] z-[99] w-[100%] flex flex-col">
            <?php    
            if (!empty($dates)) {
                foreach ($dates as $date) {
                    $date_id = sanitize_title($date); // Generate a unique ID from the date
            ?>
                <div 
                    class="flex items-center"  
                    id="filter-item-<?php echo esc_attr($date_id); ?>"
                    data-name="<?php echo esc_attr($date); ?>" 
                    data-value="<?php echo esc_attr($date_id); ?>"
                >
                    <li 
                        class="w-[200px] flex gap-[10px] font-[200] hover:font-[600] text-[#000000] text-[14px] py-[2px]" 
                        data-name="<?php echo esc_attr($date); ?>" 
                        data-value="<?php echo esc_attr($date_id); ?>"
                        data-taxonomy="published_date[]"
                    >
                        <div class="selection-box">
                            <svg class="unchecked-box" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="17" height="17" rx="2.5" stroke="#D3D3D3"/>
                            </svg>
                            <svg class="checked-box hidden"  width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="17" height="17" rx="2.5" fill="#DFF8EA"/>
                                <rect x="0.5" y="0.5" width="17" height="17" rx="2.5" stroke="#096936"/>
                                <path d="M13.5 5.625L7.3125 11.8125L4.5 9" stroke="#096936" stroke-width="1.6666" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <?php echo esc_html($date); ?>
                    </li>
                </div>
            <?php } } ?>
        </ul>
    </div>
</div>



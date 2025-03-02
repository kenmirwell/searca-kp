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
                    class="flex gap-[10px] items-center"  
                    id="filter-item-<? echo esc_attr($term->term_id) ?>"
                    data-name="<? echo $term->name ?>" 
                    data-value="<? echo esc_attr($term->term_id) ?>"
                >
                    <div class="selection-box">
                        <svg class="unchecked-box" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.5 16V16.5H2H16H16.5V16V2V1.5H16H2H1.5V2V16ZM2 17.5C1.58366 17.5 1.2397 17.3576 0.941053 17.0589C0.642407 16.7603 0.5 16.4163 0.5 16V2C0.5 1.58366 0.642407 1.2397 0.941053 0.941053C1.2397 0.642407 1.58366 0.5 2 0.5H16C16.4163 0.5 16.7603 0.642407 17.0589 0.941053C17.3576 1.2397 17.5 1.58366 17.5 2V16C17.5 16.4163 17.3576 16.7603 17.0589 17.0589C16.7603 17.3576 16.4163 17.5 16 17.5H2Z" fill="#1D1B20" stroke="black"/>
                        </svg>
                        <svg class="checked-box hidden" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.6 13.2L14.65 6.15L13.25 4.75L7.6 10.4L4.75 7.55L3.35 8.95L7.6 13.2ZM2 18C1.45 18 0.979167 17.8042 0.5875 17.4125C0.195833 17.0208 0 16.55 0 16V2C0 1.45 0.195833 0.979167 0.5875 0.5875C0.979167 0.195833 1.45 0 2 0H16C16.55 0 17.0208 0.195833 17.4125 0.5875C17.8042 0.979167 18 1.45 18 2V16C18 16.55 17.8042 17.0208 17.4125 17.4125C17.0208 17.8042 16.55 18 16 18H2ZM2 16H16V2H2V16Z" fill="#1D1B20"/>
                        </svg>
                    </div>
                    <li 
                        class="w-[200px] font-[200] hover:font-[600] text-[#000000] text-[14px] px-[10px] py-[5px] cursor-pointer" 
                        data-name="<? echo $term->name ?>" 
                        data-value="<? echo esc_attr($term->term_id) ?>"
                        data-taxonomy="km_category"
                    >
                    <?php echo esc_html($term->name) ?></li>
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
                    class="flex gap-[10px] items-center"  
                    id="filter-item-<? echo esc_attr($term->term_id) ?>"
                    data-name="<? echo $term->name ?>" 
                    data-value="<? echo esc_attr($term->term_id) ?>"
                >
                    <div class="selection-box">
                        <svg class="unchecked-box" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.5 16V16.5H2H16H16.5V16V2V1.5H16H2H1.5V2V16ZM2 17.5C1.58366 17.5 1.2397 17.3576 0.941053 17.0589C0.642407 16.7603 0.5 16.4163 0.5 16V2C0.5 1.58366 0.642407 1.2397 0.941053 0.941053C1.2397 0.642407 1.58366 0.5 2 0.5H16C16.4163 0.5 16.7603 0.642407 17.0589 0.941053C17.3576 1.2397 17.5 1.58366 17.5 2V16C17.5 16.4163 17.3576 16.7603 17.0589 17.0589C16.7603 17.3576 16.4163 17.5 16 17.5H2Z" fill="#1D1B20" stroke="black"/>
                        </svg>
                        <svg class="checked-box hidden" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.6 13.2L14.65 6.15L13.25 4.75L7.6 10.4L4.75 7.55L3.35 8.95L7.6 13.2ZM2 18C1.45 18 0.979167 17.8042 0.5875 17.4125C0.195833 17.0208 0 16.55 0 16V2C0 1.45 0.195833 0.979167 0.5875 0.5875C0.979167 0.195833 1.45 0 2 0H16C16.55 0 17.0208 0.195833 17.4125 0.5875C17.8042 0.979167 18 1.45 18 2V16C18 16.55 17.8042 17.0208 17.4125 17.4125C17.0208 17.8042 16.55 18 16 18H2ZM2 16H16V2H2V16Z" fill="#1D1B20"/>
                        </svg>
                    </div>
                    <li 
                        class="w-[200px] font-[200] hover:font-[600] text-[#000000] text-[14px] px-[10px] py-[5px] cursor-pointer" 
                        data-name="<? echo $term->name ?>" 
                        data-value="<? echo esc_attr($term->term_id) ?>"
                        data-taxonomy="research_author"
                    >
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
                    class="flex gap-[10px] items-center"  
                    id="filter-item-<? echo esc_attr($term->term_id) ?>"
                    data-name="<? echo $term->name ?>" 
                    data-value="<? echo esc_attr($term->term_id) ?>"
                >
                    <div class="selection-box">
                        <svg class="unchecked-box" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.5 16V16.5H2H16H16.5V16V2V1.5H16H2H1.5V2V16ZM2 17.5C1.58366 17.5 1.2397 17.3576 0.941053 17.0589C0.642407 16.7603 0.5 16.4163 0.5 16V2C0.5 1.58366 0.642407 1.2397 0.941053 0.941053C1.2397 0.642407 1.58366 0.5 2 0.5H16C16.4163 0.5 16.7603 0.642407 17.0589 0.941053C17.3576 1.2397 17.5 1.58366 17.5 2V16C17.5 16.4163 17.3576 16.7603 17.0589 17.0589C16.7603 17.3576 16.4163 17.5 16 17.5H2Z" fill="#1D1B20" stroke="black"/>
                        </svg>
                        <svg class="checked-box hidden" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.6 13.2L14.65 6.15L13.25 4.75L7.6 10.4L4.75 7.55L3.35 8.95L7.6 13.2ZM2 18C1.45 18 0.979167 17.8042 0.5875 17.4125C0.195833 17.0208 0 16.55 0 16V2C0 1.45 0.195833 0.979167 0.5875 0.5875C0.979167 0.195833 1.45 0 2 0H16C16.55 0 17.0208 0.195833 17.4125 0.5875C17.8042 0.979167 18 1.45 18 2V16C18 16.55 17.8042 17.0208 17.4125 17.4125C17.0208 17.8042 16.55 18 16 18H2ZM2 16H16V2H2V16Z" fill="#1D1B20"/>
                        </svg>
                    </div>
                    <li 
                        class="w-[200px] font-[200] hover:font-[600] text-[#000000] text-[14px] px-[10px] py-[5px] cursor-pointer" 
                        data-name="<? echo $term->name ?>" 
                        data-value="<? echo esc_attr($term->term_id) ?>"
                        data-taxonomy="country"
                    >
                        <?php echo esc_html($term->name) ?>
                    </li>
                </div>
            <?php } } ?>
        </ul>
    </div>
</div>
<!-- <div class="relative ">
    <div  class="flex gap-[20px] justify-between items-center text-[14px]  xl:text-[18px] font-[600] border-b-[1px] border-[#CECECE] py-[10px] cursor-pointer">
        <p class="text-[16px]">Published Date</p>
    </div>
    <div class="flex gap-[10px] justify-between items-center rounded-sm">
        <input
            class="text-[14px] w-[100%] py-[5px] px-[5px] border-[1px] border-[#000000] rounded-md"
            type="date"
            id="published-date"
            name="published_date"
            value="<?php //echo isset($_GET['published_date']) ? esc_attr($_GET['published_date']) : ''; ?>"
        />
    </div>
</div> -->
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
                    class="flex gap-[10px] items-center"  
                    id="filter-item-<?php echo esc_attr($date_id); ?>"
                    data-name="<?php echo esc_attr($date); ?>" 
                    data-value="<?php echo esc_attr($date_id); ?>"
                >
                    <div class="selection-box">
                        <svg class="unchecked-box" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.5 16V16.5H2H16H16.5V16V2V1.5H16H2H1.5V2V16ZM2 17.5C1.58366 17.5 1.2397 17.3576 0.941053 17.0589C0.642407 16.7603 0.5 16.4163 0.5 16V2C0.5 1.58366 0.642407 1.2397 0.941053 0.941053C1.2397 0.642407 1.58366 0.5 2 0.5H16C16.4163 0.5 16.7603 0.642407 17.0589 0.941053C17.3576 1.2397 17.5 1.58366 17.5 2V16C17.5 16.4163 17.3576 16.7603 17.0589 17.0589C16.7603 17.3576 16.4163 17.5 16 17.5H2Z" fill="#1D1B20" stroke="black"/>
                        </svg>
                        <svg class="checked-box hidden" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.6 13.2L14.65 6.15L13.25 4.75L7.6 10.4L4.75 7.55L3.35 8.95L7.6 13.2ZM2 18C1.45 18 0.979167 17.8042 0.5875 17.4125C0.195833 17.0208 0 16.55 0 16V2C0 1.45 0.195833 0.979167 0.5875 0.5875C0.979167 0.195833 1.45 0 2 0H16C16.55 0 17.0208 0.195833 17.4125 0.5875C17.8042 0.979167 18 1.45 18 2V16C18 16.55 17.8042 17.0208 17.4125 17.4125C17.0208 17.8042 16.55 18 16 18H2ZM2 16H16V2H2V16Z" fill="#1D1B20"/>
                        </svg>
                    </div>
                    <li 
                        class="w-[200px] font-[200] hover:font-[600] text-[#000000] text-[14px] px-[10px] py-[5px] cursor-pointer" 
                        data-name="<?php echo esc_attr($date); ?>" 
                        data-value="<?php echo esc_attr($date_id); ?>"
                        data-taxonomy="published_date"
                    >
                        <?php echo esc_html($date); ?>
                    </li>
                </div>
            <?php } } ?>
        </ul>
    </div>
</div>



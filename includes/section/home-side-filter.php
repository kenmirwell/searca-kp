<?php 
    $filter_group = array(
        array( 'key' => 'Type', 'value' => 'km_category', 'index' => 0),
        array( 'key' => 'Author', 'value' => 'research_author', 'index' => 1),
        array( 'key' => 'Country', 'value' => 'country', 'index' => 2),
        array( 'key' => 'Date', 'value' => 'published_date', 'index' => 3)
    );
?>

<?php foreach ($filter_group as $filter): ?>
    <?php if ($filter['key'] !== 'Date'): ?>
        <div id="home-side-filter-group-<?php echo $filter['index']; ?>" class="relative">
            <div 
                id="home-side-filter-head-<?php echo $filter['index']; ?>"
                onclick="handleHomeAccordion('home-side-filter-content-<?php echo $filter['index']; ?>', <?php echo $filter['index']; ?>)"   
                class="flex gap-[20px] justify-between items-center text-[14px] xl:text-[18px] font-[600] border-b-[1px] border-[#CECECE] py-[10px] cursor-pointer"
            >
                <p class="text-[16px]"><?php echo $filter['key']; ?></p>
                <svg width="22" height="8" viewBox="0 0 32 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M30 2L16 16L2 2" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div 
                id="home-side-filter-container-<?php echo $filter['index']; ?>" 
                class="rounded-lg overflow-y-scroll pr-[20px] scrollbar-custom h-[100%] transition-all duration-200 ease"
                style="height: 0;" 
            >
                <?php
                    $taxonomy = $filter['value'];
                    $terms = get_categories(array(
                        'taxonomy'   => $taxonomy, 
                        'hide_empty' => true,
                    ));
                ?>
                <ul id="home-side-filter-content-<?php echo $filter['index']; ?>" class="type-category-container category-container relative py-[20px] z-[99] w-[100%] flex flex-col">
                    <?php    
                    if (!is_wp_error($terms)) {
                        foreach ($terms as $term) {
                    ?>
                        <div 
                            class="flex items-center"  
                            id="filter-item-<?php echo esc_attr($term->term_id); ?>"
                            data-name="<?php echo esc_attr($term->name); ?>" 
                            data-value="<?php echo esc_attr($term->term_id); ?>"
                        >
                            <li 
                                class="w-[200px] flex gap-[10px] font-[200] hover:font-[600] text-[#000000] text-[14px] py-[2px] cursor-pointer" 
                                data-name="<?php echo esc_attr($term->name); ?>" 
                                data-value="<?php echo esc_attr($term->term_id); ?>"
                                data-taxonomy="<?php echo $filter['value']; ?>[]"
                            >
                                <div class="selection-box">
                                    <svg class="unchecked-box" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="0.5" y="0.5" width="17" height="17" rx="2.5" stroke="#D3D3D3"/>
                                    </svg>
                                    <svg class="checked-box hidden" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="0.5" y="0.5" width="17" height="17" rx="2.5" fill="#DFF8EA"/>
                                        <rect x="0.5" y="0.5" width="17" height="17" rx="2.5" stroke="#096936"/>
                                        <path d="M13.5 5.625L7.3125 11.8125L4.5 9" stroke="#096936" stroke-width="1.6666" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <?php echo esc_html($term->name); ?>
                            </li>
                        </div>
                    <?php } } ?>
                </ul>
            </div>
        </div>
    <?php else: ?>
        <div id="home-side-filter-group-<?php echo $filter['index']; ?>" class="relative">
            <div 
                id="home-side-filter-head-<?php echo $filter['index']; ?>"
                onclick="handleHomeAccordion('home-side-filter-content-<?php echo $filter['index']; ?>', <?php echo $filter['index']; ?>)"   
                class="flex gap-[20px] justify-between items-center text-[14px] xl:text-[18px] font-[600] border-b-[1px] border-[#CECECE] py-[10px] cursor-pointer"
            >
                <p class="text-[16px]">Publication Year</p>
                <svg width="22" height="8" viewBox="0 0 32 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M30 2L16 16L2 2" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div 
                id="home-side-filter-container-<?php echo $filter['index']; ?>" 
                class="rounded-lg overflow-y-scroll pr-[20px] scrollbar-custom h-[100%] transition-all duration-200 ease"
                style="height: 0;" 
            >
                <?php
                // Fetch unique published dates
                $taxonomy = $filter['value'];
                $args = array(
                    'post_type'      => 'knowledge-management',
                    'posts_per_page' => -1,
                    'meta_key'       => $taxonomy,
                    'orderby'        => 'meta_value',
                    'order'          => 'ASC',
                    'fields'         => 'ids',
                );

                $query = new WP_Query($args);
                $dates = [];

                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $date = get_field($filter['value']);
                        if ($date && !in_array($date, $dates)) {
                            $dates[] = $date;
                        }
                    }
                    wp_reset_postdata();
                }
                ?>

                <ul id="home-side-filter-content-<?php echo $filter['index']; ?>" class="date-category-container category-container relative py-[20px] z-[99] w-[100%] flex flex-col">
                    <?php    
                    if (!empty($dates)) {
                        foreach ($dates as $date) {
                            $date_id = sanitize_title($date);
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
                                data-taxonomy="<?php echo $filter['value']; ?>[]"
                            >
                                <div class="selection-box">
                                    <svg class="unchecked-box" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="0.5" y="0.5" width="17" height="17" rx="2.5" stroke="#D3D3D3"/>
                                    </svg>
                                </div>
                                <?php echo esc_html($date); ?>
                            </li>
                        </div>
                    <?php } } ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>

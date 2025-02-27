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
        <ul id="home-side-filter-content-0" class="category-container relative py-[20px] z-[99] w-[100%] flex flex-col">
            <?php    
            if (!is_wp_error($terms)) {
                foreach ($terms as $term) {
            ?>
                <div class="flex gap-[10px] items-center">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.5" y="0.5" width="17" height="17" rx="2.5" stroke="#D3D3D3"/>
                    </svg>
                    <li class="w-[200px] font-[200] hover:font-[600] text-[#000000] text-[14px] px-[10px] py-[5px] cursor-pointer" data-name="<? echo $term->name ?>" data-value="<? echo esc_attr($term->term_id) ?>"><?php echo esc_html($term->name) ?></li>
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
        <ul id="home-side-filter-content-1" class="category-container relative py-[20px] z-[99] w-[100%] flex flex-col">
            <?php    
            if (!is_wp_error($terms) && !empty($terms)) {
                foreach ($terms as $term) {
            ?>
                <div class="flex gap-[10px] items-center">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.5" y="0.5" width="17" height="17" rx="2.5" stroke="#D3D3D3"/>
                    </svg>
                    <li class="w-[200px] font-[200] hover:font-[600] text-[#000000] text-[14px] px-[10px] py-[5px] cursor-pointer" data-name="<? echo $term->name ?>" data-value="<? echo esc_attr($term->term_id) ?>"><?php echo esc_html($term->name) ?></li>
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
        <ul id="home-side-filter-content-2" class="category-container relative py-[20px] z-[99] w-[100%] flex flex-col">
            <?php    
            if (!is_wp_error($terms) && !empty($terms)) {
                foreach ($terms as $term) {
            ?>
                <div class="flex gap-[10px] items-center">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.5" y="0.5" width="17" height="17" rx="2.5" stroke="#D3D3D3"/>
                    </svg>
                    <li class="w-[200px] font-[200] hover:font-[600] text-[#000000] text-[14px] px-[10px] py-[5px] cursor-pointer" data-name="<? echo $term->name ?>" data-value="<? echo esc_attr($term->term_id) ?>"><?php echo esc_html($term->name) ?></li>
                </div>
            <?php } } ?>
        </ul>
    </div>
</div>
<div class="relative ">
    <div  class="flex gap-[20px] justify-between items-center text-[14px]  xl:text-[18px] font-[600] border-b-[1px] border-[#CECECE] py-[10px] cursor-pointer">
        <p class="text-[16px]">Published Date</p>
    </div>
    <div class="flex gap-[10px] justify-between items-center rounded-sm">
        <input
            class="text-[14px] w-[100%] py-[5px] px-[5px] border-[1px] border-[#000000] rounded-md"
            type="date"
            id="published-date"
            name="published_date"
            value="<?php echo isset($_GET['published_date']) ? esc_attr($_GET['published_date']) : ''; ?>"
        />
    </div>
</div>

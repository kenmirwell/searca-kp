<?php 
   $filter_group = array(
        array( 'key' => 'Type', 'value' => 'km_category', 'index' => 0),
        array( 'key' => 'Author', 'value' => 'research_author', 'index' => 1),
        array( 'key' => 'Country', 'value' => 'country', 'index' => 2),
        array( 'key' => 'Date', 'value' => 'published_date', 'index' => 3)
    );
?>
<div class="py-[50px]">
  <div class="lg:w-[1024px] xl:w-[1280px] mx-auto justify-between">
    <div class="flex gap-[120px] items-center">
      <div class="text-[#000000] w-[40%] text-display-24 md:text-display-42 font-bold">
        <h2>Search a publication or document</h2>
      </div>
      <div class="w-[60%]">
        <div class="flex-col items-right">
          <div class="relative flex items-center w-[100%] justify-end">
            <svg class="absolute left-[10px]" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M11.8477 21.75C6.19766 21.75 1.59766 17.15 1.59766 11.5C1.59766 5.85 6.19766 1.25 11.8477 1.25C17.4977 1.25 22.0977 5.85 22.0977 11.5C22.0977 17.15 17.4977 21.75 11.8477 21.75ZM11.8477 2.75C7.01766 2.75 3.09766 6.68 3.09766 11.5C3.09766 16.32 7.01766 20.25 11.8477 20.25C16.6777 20.25 20.5977 16.32 20.5977 11.5C20.5977 6.68 16.6777 2.75 11.8477 2.75Z" fill="#444242"/>
              <path d="M22.3471 22.7499C22.1571 22.7499 21.9671 22.6799 21.8171 22.5299L19.8171 20.5299C19.5271 20.2399 19.5271 19.7599 19.8171 19.4699C20.1071 19.1799 20.5871 19.1799 20.8771 19.4699L22.8771 21.4699C23.1671 21.7599 23.1671 22.2399 22.8771 22.5299C22.7271 22.6799 22.5371 22.7499 22.3471 22.7499Z" fill="#444242"/>
            </svg>
            <input id="knowledge-products-search-input" class="pl-[40px] py-[10px] pr-[10px] text-[#000000] w-[100%] border-[1px] border-[#CECECE]" type="text" placeholder="Select by ">
          </div>
          <div class="flex gap-[20px] w-[100%] justify-end pt-[30px]">
              <div id="kp-search-title" class="cursor-pointer kp-search-category kp-search-active">
                <p>By Title</p>
              </div>
              <div class="text-[#CECECE]">|</div>
              <div id="kp-search-author" class="cursor-pointer kp-search-category">
                <p>By Autor</p>
              </div>
              <div class="text-[#CECECE]">|</div>
              <div id="kp-search-keyword" class="cursor-pointer kp-search-category">
                <p>By Keyword</p>
              </div>
              <div class="text-[#CECECE]">|</div>
              <div id="kp-search-country" class="cursor-pointer kp-search-category">
                <p>By Country</p>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="flex gap-[20px] justify-between pt-[20px]">
      <?php foreach ($filter_group as $filter): ?>
        <div id="type-filter" class="w-[25%] flex items-center justify-between bg-[#F5F8FC] py-[10px] px-[20px]">
          <div>Type:</div>
          <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M8.71094 1V15M1.71094 8H15.7109" stroke="#1F1F1F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
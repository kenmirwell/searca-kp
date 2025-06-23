<div class="component-item-element block w-[100%] md:w-auto h-[370px] xl:h-[435px] rounded-[20px] group component-<?php echo $components_index; ?>">
  <div class="flex items-end relative h-[100%] w-[100%] md:w-[250px] xl:w-[400px] rounded-3xl overflow-hidden">
    <div class="relative p-[20px] z-[2] w-[100%]">
      <div class="mb-[10px]">
        <div class="text-display-16 xl:text-display-18 font-bold pt-[10px] text-[#ffffff]">
          <h4><?php echo esc_html(get_query_var('component_title'));  ?></h4>
        </div>
        <div class="hidden md:block component-text pt-[10px] font-extralight text-[10px] xl:text-[14px] text-[#ffffff] pb-[10px] border-b-[1px] border-[#D7D7D7]">
          <?php echo esc_html(get_query_var('component_1st_sub')); ?>
        </div>
        <div class="block md:hidden component-text pt-[10px] font-extralight text-[10px] xl:text-[14px] text-[#ffffff] pb-[10px] border-b-[1px] border-[#D7D7D7]">
          <?php echo esc_html(get_query_var('component_1st_sub')); ?>
        </div>
      </div>

      <p class="font-extralight text-[10px] xl:text-[14px] text-[#ffffff]"><?php echo esc_html(get_query_var('component_2nd_sub')); ?></p>
      <!-- ✅ Learn More: slide down on card hover, with its own hover effects -->
      <a class="block w-auto max-h-0 group-hover:max-h-[300px] overflow-hidden transition-all duration-300 ease-in-out delay-150 pt-[10px]" href="<?php echo esc_url(get_query_var('component_button_link')); ?>">
        <div class="flex justify-between items-center gap-[20px] py-[5px] pl-[20px] pr-[5px] bg-[#096936] hover:bg-[#B59637] transition-all duration-200 ease rounded-full">
          <p class="hover:text-[#000000] text-[#ffffff]">Learn More</p>
          <div class="bg-[#B59637] hover:bg-[#096936] rounded-full p-[15px] transition-all duration-200 ease">
            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M2.10042 21.8995L21.8994 2.10051M21.8994 2.10051H2.10042M21.8994 2.10051V21.8995" 
                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
        </div>
      </a>
    </div>

    <!-- Image zooms on card hover -->
    <div class="bg-gradient-to-t from-black to-transparent w-[100%] h-[100%] absolute top-0 left-0 z-[1]"></div>
    <img class="absolute w-full h-full object-cover scale-[1] group-hover:scale-[1.1] transition-all duration-700 ease" src="<?php echo esc_url(get_query_var('component_image')); ?>">
  </div>
</div>




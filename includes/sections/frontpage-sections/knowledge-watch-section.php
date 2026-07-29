<div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto pb-[80px]">
  <div class="flex justify-center items-center rounded-2xl relative overflow-hidden p-[50px] h-[475px]">
    <?php if (have_rows('image_bg_cta_flexicon')) : ?>
        <?php while (have_rows('image_bg_cta_flexicon')) : the_row();
            $layout = get_row_layout();
        ?>
          <?php if ($layout === 'image_bg_cta_flexicon') : ?>
            <?php if (get_sub_field('section_name') === "AFNR Knowledge Watch") : ?>
              <div class="bg-gradient-to-l from-[rgba(0,0,0,0.2)] to-[rgba(0,0,0,0.7)] w-full h-full absolute top-0 left-0 z-[1]"></div>
              <img class="absolute w-full h-full object-cover z-[0]" src="<?php echo esc_url(get_sub_field('background_image')); ?>" alt="">
              <div class="relative flex flex-col gap-[10px] pb-[20px] z-[2]">
                <h2 class="text-white text-display-24 md:text-display-42 font-bold"><?php echo esc_html(get_sub_field('title')); ?></h2>
                  <?php if (have_rows('description_repeater')) : ?>
                    <?php while (have_rows('description_repeater')) : the_row(); ?>
                      <div class="w-[100%] md:w-[50%]">
                        <p class="text-white font-light md:font-normal text-display-12 md:text-display-16 mt-[20px]"><?php echo esc_html(get_sub_field('description')); ?></p>
                      </div>
                    <?php endwhile; ?>
                  <?php endif; ?>
                <a href="<?php echo esc_url(get_sub_field('button_link')); ?>" class="w-auto group cursor-pointer w-fit">
                  <div class="flex items-center gap-[20px] py-[5px] pl-[20px] pr-[5px] bg-[#008c67] group-hover:bg-[#B59637] transition-all duration-200 ease rounded-full">  
                    <p class="w-max text-white"><?php echo esc_html(get_sub_field('button_name')); ?></p>
                    <div class="bg-[#B59637] group-hover:bg-[#008c67] rounded-full p-[15px] transition-all duration-200 ease">
                      <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.10042 21.8995L21.8994 2.10051M21.8994 2.10051H2.10042M21.8994 2.10051V21.8995" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                    </div>
                  </div>
                </a>
              </div>
            <?php endif; ?>
          <?php endif; ?>
        <?php endwhile; ?>
      <?php endif; ?>
  </div>
</div>
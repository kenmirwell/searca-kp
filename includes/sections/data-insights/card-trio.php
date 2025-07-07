<?php 
    $page_id = get_query_var('page_id');
?>

<div class="py-[50px] lg:py-[100px]">
    <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
        <div class="flex flex-col pb-[50px]">
            <?php if($page_id) : ?>
                <?php if (get_field("image_cards_container_title", $page_id)) : ?>
                    <div class="font-bold">
                        <h2 class="w-[100%] text-display-24 lg:text-display-42 text-[#1f1f1f] pb-[10px]"><?php echo get_field("image_cards_container_title", $page->ID); ?></h2>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <?php if($page_id) : ?>
                <?php if (get_field("image_cards_container_description", $page_id)) : ?>
                    <div class="">
                        <p class="text-[#1f1f1f]"><?php echo get_field("image_cards_container_description", $page_id); ?></p>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>  
        <div class="flex flex-col lg:flex-row gap-[50px] justify-between">
            <?php if (have_rows('image_cards', $page_id)) : ?>
                <?php while (have_rows('image_cards', $page_id)) : the_row(); 
                   $image = get_sub_field('image_card_image');
                ?>
                    <!-- Loop through each row in the 'about_description' repeater -->
                    <div class="relative flex flex-col gap-[10px] w-[100%] md:w-[33.33%] text-left h-[200px] md:h-[320px] lg:h-[450px] rounded-xl overflow-hidden border-[1px] border-[#E3E3E3] shadow-xl">
                        <div class="relative flex flex-col justify-between z-[1] h-[100%] p-[30px]">
                          <svg width="36" height="37" viewBox="0 0 36 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M30.534 7.88379L28.0377 9.84554C27.4486 10.3086 26.732 10.5589 25.9957 10.5589H20.2814C19.7277 10.5591 19.1875 10.7388 18.735 11.0732C18.2824 11.4077 17.9396 11.8806 17.7535 12.4271C17.5673 12.9737 17.547 13.5672 17.6952 14.1264C17.8434 14.6856 18.153 15.183 18.5814 15.5507L21.9848 18.4683C23.303 19.5986 24.3304 21.0565 24.9736 22.7092C25.6167 24.362 25.8552 26.1571 25.6672 27.9311L25.6332 28.2521C25.4978 29.5291 25.1984 30.7811 24.7432 31.9741L23.7273 34.6349M1.60547 15.9091L7.11551 14.9461C7.64999 14.8526 8.19804 14.8942 8.71409 15.0674C9.23013 15.2407 9.69924 15.5405 10.0824 15.9421C10.4656 16.3437 10.7517 16.8353 10.917 17.3761C11.0823 17.917 11.122 18.4914 11.0328 19.0515L10.8031 20.4907C10.6045 21.7461 10.7947 23.0352 11.3459 24.169C11.8971 25.3029 12.7803 26.2219 13.8661 26.7915C14.7333 27.2452 15.4267 27.9957 15.8314 28.9187C16.2362 29.8417 16.3281 30.8819 16.0919 31.8671L15.2189 35.5266" 
                              stroke="<?php echo $image ? "#ffffff" : "#096936"?>" stroke-width="3"
                            />
                            <path d="M17.9983 35.5267C27.0519 35.5267 34.3912 28.0435 34.3912 18.8124C34.3912 9.58139 27.0519 2.09814 17.9983 2.09814C8.9448 2.09814 1.60547 9.58139 1.60547 18.8124C1.60547 28.0435 8.9448 35.5267 17.9983 35.5267Z" 
                              stroke="<?php echo $image ? "#ffffff" : "#096936"?>" stroke-width="3"
                            />
                          </svg>
                          <div class="text-left">
                              <h6 class="font-bold text-display-24 <?php echo $image ? "text-[#ffffff]" : "text-[#1f1f1f]"?>"><?php echo esc_html(get_sub_field('image_card_title')); ?></h6>
                              <p class="<?php echo $image ? "text-[#ffffff]" : "text-[#1f1f1f]"?>"><?php echo esc_html(get_sub_field('image_card_description')); ?></p>
                          </div>
                        </div>
                        <?php if($image) : ?>
                          <img class="absolute w-full h-full object-cover" src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?> 
        </div>
    </div>
</div>
<?php 
  $page = get_query_var('page_id');

  $group = get_field('simple_text_image_group', $page_id);
?>

<div class="relative">
    <div class="bg-[#EBF3EF] overflow-hidden">
        <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
            <div class="flex flex-col-reverse md:flex-row relative pt-[50px] py-[60px] justify-center gap-[50px] items-center">
                <?php if (!empty($group['description'])) : ?> 
                    <div class="text-[#000000] w-[100%] text-display-18 md:text-display-22 font-bold w-[100%] md:w-[70%] lg:mr-auto">
                        <h6 class="text-display-14 md:text-display-18"><?php echo esc_html($group['description']); ?></h6>
                    </div>
                <?php endif; ?> 
                <?php if (!empty($group['image'])) : ?> 
                    <div class="relative h-[100%] w-[100%] md:w-[20%] md:ml-auto">
                        <img class="w-full h-full object-cover" src="<?php echo esc_url($group['image']); ?>" alt="searca image">
                    </div>
                <?php endif; ?>    
        </div>
    </div>
</div>
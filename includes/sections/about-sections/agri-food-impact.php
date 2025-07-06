<?php 
    $page_id = get_query_var('page_id');
?>

<div class="relative">
    <div class="bg-[#F2FFF8] overflow-hidden">
        <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
            <div class="relative flex flex-col relative pt-[50px] py-[60px] justify-start gap-[50px] items-start h-[700px] my-[100px]">
                <div class="w-[50%]">
                    <?php if (get_field("agri_food_impact_title", $page_id)) : ?> 
                        <div class="hidden lg:block text-[#000000] w-[100%] text-display-24 md:text-display-42 font-bold">
                            <h2><?php echo get_field("agri_food_impact_title", $page_id); ?></h2>
                        </div>
                    <?php endif; ?>    
                    
                    <?php if (have_rows('agri_food_impact_sub', $page_id)) : ?>
                        <?php while (have_rows('agri_food_impact_sub', $page_id)) : the_row(); ?>
                            <div class="flex flex-col">
                                <div class="w-[100%] max-w-[980px] mx-auto">
                                    <p class="text-left text-[14px] md:text-[16px]"><?php echo esc_html(get_sub_field('paragraph')); ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?> 
                </div>
                
                <?php if (get_field("agri_food_impact_image", $page_id)) : ?> 
                    <div class="absolute top-[0px] w-full h-max">
                        <img class="relative w-full h-full object-cover" src="<?php echo get_field('agri_food_impact_image'); ?>" alt="searca image">
                    </div>
                <?php endif; ?>    

        </div>
    </div>
</div>
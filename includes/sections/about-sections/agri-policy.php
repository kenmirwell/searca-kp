<?php 
  $page = get_query_var('page_id');
?>

<div class="relative">
    <div class="bg-[#ffffff] overflow-hidden">
        <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
            <div class="flex flex-col relative pt-[50px] py-[60px] justify-center gap-[50px] items-center">
                <?php if (get_field("agri_policy_title", $page_id)) : ?> 
                    <div class="text-[#000000] w-[100%] text-display-28 md:text-display-42 font-bold w-[100%] lg:w-[70%] lg:mr-auto">
                        <h2><?php echo get_field("agri_policy_title", $page_id); ?></h2>
                    </div>
                <?php endif; ?>    
                <div class="flex flex-col lg:flex-row gap-[20px] w-[100%] lg:w-[80%] lg:ml-auto">
                    <?php if (have_rows('agri_policy_description', $page_id)) : ?>
                        <?php while (have_rows('agri_policy_description', $page_id)) : the_row(); ?>
                            <div class="flex flex-col md:flex-row lg:flex-col gap-[20px]">
                                <?php if (have_rows('agri_policy_description_columns', $page_id)) : ?>
                                    <?php while (have_rows('agri_policy_description_columns', $page_id)) : the_row(); ?>
                                        <div class="flex flex-row lg:flex-col">
                                            <?php if (have_rows('agri_policy_description_column', $page_id)) : ?>
                                                <?php while (have_rows('agri_policy_description_column', $page_id)) : the_row(); ?>
                                                    <div class="w-[100%] max-w-[980px] mx-auto">
                                                        <p class="text-left text-[14px] md:text-[16px]"><?php echo esc_html(get_sub_field('paragraph')); ?></p>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?> 
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?> 
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?> 
                </div>
                
                <?php if (get_field("agri_policy_image", $page_id)) : ?> 
                    <div class="relative h-[400px] w-[100%] md:w-[80%] md:ml-auto">
                        <img class="absolute w-full h-full object-cover rounded-lg" src="<?php echo get_field('agri_policy_image'); ?>" alt="searca image">
                    </div>
                <?php endif; ?>    

        </div>
    </div>
</div>
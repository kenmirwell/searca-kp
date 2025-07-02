<?php 
  $page = get_query_var('page');
  $group = get_field('split_section', $page->ID);

  $inner_group = $group['split_section_title_description'] ?? null;
?>

<div class="relative">
    <div class="bg-[#F2FFF8] overflow-hidden">
        <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
            <div class="flex flex-col relative pt-[50px] py-[60px] justify-center gap-[50px] items-center">
                <?php if (get_field("agri_policy_title", $page->ID)) : ?> 
                    <div class="hidden lg:block text-[#000000] w-[100%] text-display-24 md:text-display-42 font-bold">
                        <h2><?php echo get_field("agri_policy_title", $page->ID); ?></h2>
                    </div>
                <?php endif; ?>    
                
                <?php if (have_rows('agri_policy_description', $page->ID)) : ?>
                    <?php while (have_rows('agri_policy_description', $page->ID)) : the_row(); ?>
                        <div class="flex flex-col">
                            <?php if (have_rows('agri_policy_description_columns', $page->ID)) : ?>
                                <?php while (have_rows('agri_policy_description_columns', $page->ID)) : the_row(); ?>
                                    <div class="flex flex-col">
                                        <?php if (have_rows('agri_policy_description_column', $page->ID)) : ?>
                                            <?php while (have_rows('agri_policy_description_column', $page->ID)) : the_row(); ?>
                                                <div class="w-[100%] max-w-[980px] mx-auto">
                                                    <p class="text-center text-[14px] md:text-[16px]"><?php echo esc_html(get_sub_field('paragraph')); ?></p>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php endif; ?> 
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?> 
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?> 
                
                <?php if (get_field("agri_policy_image", $page->ID)) : ?> 
                    <div>
                        <img class="absolute w-full h-full object-cover" src="<?php echo get_field('agri_policy_image'); ?>" alt="searca image">
                    </div>
                <?php endif; ?>    

        </div>
    </div>
</div>
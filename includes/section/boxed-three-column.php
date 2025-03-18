<div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto py-[60px]">
    <?php if (have_rows('boxed_three_column_section')): ?>
        <?php while (have_rows('boxed_three_column_section')): the_row(); ?>
            <div class="text-left flex flex-col gap-[10px] pb-[20px]">
                <h2 class="text-display-28 lgtext-display-42 font-bold"><?php the_sub_field('title'); ?></h2>
                <p><?php the_sub_field('subtext'); ?></p>
            </div>
            <?php if (have_rows('thumbnail_section')): ?>
                <div class="flex flex-col lg:flex-row gap-[40px] lg:gap-[20px] items-center justify-between">
                    <?php while (have_rows('thumbnail_section')): the_row(); ?>
                        <div class="flex flex-col gap-[10px] lg:gap-[20px] justify-between items-start text-left w-[100%]">
                            <div class="rounded-lg w-[35px] lg:w-[40px] overflow-hidden">
                                <img
                                    class="w-full h-full object-cover z-[0]" 
                                    src="<?php echo esc_url(get_sub_field('icon')); ?>" 
                                    alt="<?php echo esc_attr(get_sub_field('title')); ?>"
                                >
                            </div>
                            <h6 class="font-[600] text-display-20 lg:text-display-24"><?php the_sub_field('thumbnail_title'); ?></h6>
                            <div class="lg:h-[90px]">
                                <p class="text-display-14 lg:text-display-16"><?php the_sub_field('thumbnail_subtext'); ?></p>
                            </div>
                            <div class="relative overflow-hidden rounded-xl w-[100%] h-[400px]">
                                <img
                                    class="absolute w-full h-full object-cover z-[0]" 
                                    src="<?php echo esc_url(get_sub_field('thumbnail')); ?>" 
                                    alt="<?php echo esc_attr(get_sub_field('thumbnail')); ?>"
                                >
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?> 
        <?php endwhile; ?>
    <?php endif; ?> 
</div>
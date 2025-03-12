<?php 
    get_header();

    while (have_posts()) {
        the_post();
        
        $hero_background = get_field('hero_background');
        $hero_description = get_field('hero_description');
        $page_identifier = get_field("page_identifier");
?>
    <div>
        <?php get_template_part("includes/section/common-hero"); ?>
        <?php get_template_part("includes/section/boxed-three-column"); ?>
        <?php get_template_part("includes/section/common-two-column"); ?>
        <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[50px]">
            <?php if (have_rows('round_three_column_section')): ?>
                <?php while (have_rows('round_three_column_section')): the_row(); ?>
                    <div class="text-center flex flex-col gap-[10px] pb-[20px]">
                        <h2 class="text-[36px] font-bold"><?php the_sub_field('title'); ?></h2>
                        <p><?php the_sub_field('subtext'); ?></p>
                    </div>
                    <?php if (have_rows('thumbnail_section')): ?>
                        <div class="flex gap-[20px] items-center justify-between">
                            <?php while (have_rows('thumbnail_section')): the_row(); ?>
                                <div class="flex flex-col gap-[10px] items-center text-center w-[700px]">
                                    <div class="relative overflow-hidden rounded-full bg-[#8FBAA3] w-[200px] h-[200px] mb-[20px]">
                                        <div class="rounded-full overflow-hidden w-[200px] h-[200px] relative top-[-10px]">
                                            <img 
                                                class="absolute w-full h-full object-cover z-[0]" 
                                                src="<?php echo esc_url(get_sub_field('thumbnail')); ?>" 
                                                alt="<?php echo esc_attr(get_sub_field('thumbnail_title')); ?>"
                                            >
                                        </div>
                                    </div>
                                    <h6 class="font-[600] text-[24px]"><?php the_sub_field('thumbnail_title'); ?></h6>
                                    <p><?php the_sub_field('thumbnail_subtext'); ?></p>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?> 
                <?php endwhile; ?>
            <?php endif; ?> 
        </div>                       
    </div>
<?php 
    }
    get_footer()
?>
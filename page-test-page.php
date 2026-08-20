<?php 
    get_header();

    while (have_posts()) {
        the_post();
?>

    <div class="relative flex justify-between w-[90%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto gap-[100px]">
        <div class="w-[100%] lg:w-[80%] mb-[100px] pt-[40px]">
            <?php the_content(); ?>
        </div>
        <div class="hidden lg:block w-[20%] sticky h-fit top-0 pt-[40px] pb-[40px]">
            <?php get_template_part("includes/sections/single-insight-sections/right-nav"); ?>
        </div>
    </div>

<?php 
    }
    get_footer();
?>
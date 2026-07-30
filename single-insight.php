<?php 
get_header();

while (have_posts()) {
    the_post();
?>
    <div class="pt-[30px] md:pt-[70px]">
        <?php get_template_part("includes/sections/single-insight-sections/hero"); ?>
        <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[50px] font-light">
            <h1 class="text-[32px] text-[#ffffff]"><?php the_title()?></h1>
        </div>
    </div>
<?php 
}
get_footer();
?>

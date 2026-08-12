<?php 
    get_header();

    while (have_posts()) {
        the_post();
?>
<div class="w-[80%] mb-[100px] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto pb-[80px]">
    <?php the_content(); ?>
</div>

<?php 
    }
    get_footer();
?>
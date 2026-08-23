<?php 
get_header();

while (have_posts()) {
    the_post();
?>
    <style>
    .toc-link {
        color: #8A8A8A;
        text-decoration: none;
        display: block;
        transition: color 0.2s ease;
    }

    .toc-item {
        transition: border-color 0.2s ease;
    }

    .toc-item.active {
        border-color: #BE9D38;
    }

    .toc-item.active .toc-link {
        color: #BE9D38;
        font-weight: 600;
    }
    </style>

    <div class="pt-[30px] md:pt-[70px]">
        <?php get_template_part("includes/sections/single-knowledge-watch-sections/hero"); ?>
        <div class="relative flex justify-between w-[90%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto gap-[100px]">
            <div class="w-[100%] lg:w-[80%] mb-[100px] pt-[40px]">
                <?php the_content(); ?>
            </div>
            <div class="hidden lg:block w-[20%] sticky h-fit top-0 pt-[40px] pb-[40px]">
                <?php get_template_part("includes/sections/single-insight-sections/right-nav"); ?>
            </div>
        </div>
    </div>
<?php 
}
get_footer();
?>
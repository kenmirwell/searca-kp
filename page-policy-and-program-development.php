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
        <div>
            <div class="flex flex-col justify-center items-center gap-[20px] pb-[20px] pt-[60px]">
                <h2 class="text-[42px] font-bold">Key Initiatives</h2>
                <p>Advancing Policy Innovation for a Sustainable Agricultural Future</p>
            </div>
            <?php get_template_part("includes/section/common-two-column"); ?>
        </div>
    </div>
<?php 
    }
    get_footer()
?>
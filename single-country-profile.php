<?php 
get_header();

while (have_posts()) {
    the_post();

    $map = get_field("map");

    $geographic_profile = get_field('geographic_profile');



?>
    <div class="bg-[#196129] pt-[70px]">
        <div class="flex w-[90%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto pt-[50px] pb-[10px] font-light">
            <div class="w-[50%]">
                <div class="flex gap-[5px] text-[#ffffff] text-[14px] font-extralight">
                    <p class="cursor-pointer"><a href="/">Home | Agricultural Statistics Data |</a></p>
                    <p class="cursor-pointer"><?php the_title()?></p>
                </div>
            </div>
        </div>
    </div>

    <?php get_template_part("includes/country-profile-sections/hero-section"); ?>
    
    <div class="w-[90%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[40px]">
        <div>
            <div class="pb-[20px]">
                <h2>Geographiv Area</h2>
            </div>
            <?php if (have_rows('geographic_profile')): ?>
                <div class="pb-[20px]">
                    <h6>Area</h6>
                </div>
                <?php while (have_rows('geographic_profile')): the_row(); 
                    if (have_rows('area')): ?>
                        <ul class="flex flex-col gap-[10px]">
                            <?php while (have_rows('area')): the_row(); ?>
                                <li><?php the_sub_field('area_paragraph'); ?></li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif;
                endwhile;
            endif; ?>
        </div>
    </div>
<?php 
}
get_footer();
?>

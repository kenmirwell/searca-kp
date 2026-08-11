<?php 
    get_header();
    
    while (have_posts()) {
        the_post();

?>

<div class="py-[50px] lg:py-[100px]">
    <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
        <div class="pb-[20px]">
            <h1 class="text-display-48 font-bold"><?php the_title(); ?></h1>
        </div>
        <?php if (have_rows('contact_reasons_repeater')): ?>
            <?php while (have_rows('contact_reasons_repeater')): the_row(); ?>
                <div class="pb-[30px]">
                    <h6 class="text-display-24 pb-[20px] font-bold"><?php echo $title ?></h6>
                    <div class="flex flex-col gap-[10px]">
                        <?php echo wp_kses_post($content); ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>

<?php 
    }
    get_footer()
?>
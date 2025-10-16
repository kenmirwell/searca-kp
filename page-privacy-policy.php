<?php 
    get_header();
    
    while (have_posts()) {
        the_post();

?>

<div class="py-[50px] lg:py-[100px]">
    <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
        <div class="pb-[20px]">
            <h1 class="text-display-48 font-bold">Terms & Conditions</h1>
        </div>
        <?php if (have_rows('text_repeater')): ?>
            <?php while (have_rows('text_repeater')): the_row(); ?>
                <?php 
                    $title = get_sub_field('title');    
                    $content = get_sub_field('content');
                ?>
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
<?php if (get_field("title")) : ?> 
    <div class="text-[#000000] w-[100%] text-display-24 md:text-display-42 font-bold">
        <h2><?php echo get_field("title"); ?></h2>
    </div>
<?php endif; ?>    

<?php if (have_rows('list_repeater')) : ?>
    <?php while (have_rows('list_repeater')) : the_row(); ?>
        <div class="flex flex-col">
            <div class="w-[100%] max-w-[980px] mx-auto">
                <p class="text-left text-[14px] md:text-[16px]"><?php echo esc_html(get_sub_field('list_title')); ?></p>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?> 
<?php 
    get_header();

    while (have_posts()) {
        the_post();

        $aspiring_outcome = get_field("aspiring_outcome");



?>
    <div>
        <div class="bg-[#196129]">
            <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[50px] font-light">
                <div>
                    <div class="flex gap-[5px] text-[#ffffff] text-[14px] font-extralight">
                        <p class="cursor-pointer"><a href="/">Home |</a></p>
                        <p class="cursor-pointer"><?php the_title()?></p>
                    </div>
                    <div class="border-b-[1px] border-[#F7D671] text-[#F7D671] text-[45px] pb-[20px] my-[20px]">
                        <h1 class="cursor-pointer"><?php the_title() ?></h1>
                    </div>
                    <div class="text-[16px] font-extralight flex gap-[20px] text-[#ffffff]">
                        <div class="component-banner-description w-[50%]">
                            <?php the_content() ?>
                        </div>
                        <div class="w-[50%]">
                            <div class="">
                                <p><span class="font-[600]">Expected Output: </span><?php echo $expected_output ?></p>
                            </div>
                            <div class="pt-[20px]">
                                <p> <span class="font-[600]">Aspiring Outcome: </span><?php echo $aspiring_outcome ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto py-[50px]">
            <?php if (have_rows('content')): ?>
                <?php $index = 0; // Initialize counter ?>
                <?php while (have_rows('content')): the_row(); ?>
                    <?php $index++; // Increment counter ?>
                    
                    <div class="flex gap-[20px] items-center py-[20px] <?php echo ($index % 2 === 0) ? 'flex-row' : 'flex-row-reverse'; ?>"> 
                        <!-- Example: Apply different background styles for even and odd indexes -->

                        <div class="w-[40%] h-[200px] rounded-lg overflow-hidden">
                            <img class="w-full h-full object-cover" src="<?php echo esc_url(get_sub_field('image')); ?>" alt="">
                        </div>
                        <div class="flex flex-col gap-[20px] w-[100%]">
                            <h6 class="text-[#000000] font-bold text-[18px]"><?php the_sub_field('heading'); ?></h6>
                            <p class="text-[#000000] pb-[10px] text-[14px]"><?php the_sub_field('description'); ?></p>
                            <a class="text-[14px]" href="<?php echo esc_url(get_sub_field('button_link')); ?>">Learn More</a>
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
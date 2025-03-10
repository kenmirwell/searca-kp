<?php 
    get_header();

    while (have_posts()) {
        the_post();

        $hero_background = get_field('hero_background');
        $hero_description = get_field('hero_description');
        $page_identifier = get_field("page_identifier");
?>
    <div>
        <div class="relative h-[800px] flex jusitify-center">
            <div class="flex items-center w-[90%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[150px] font-light z-[2]">
                <div class="w-[100%]">
                    <div class="flex gap-[5px] text-[#ffffff] text-[14px] font-extralight">
                        <div class="flex gap-[10px] items-center py-[10px] px-[15px] rounded-full border-[1px] border-[#EBEBEB82]">
                            <div class="h-[10px] w-[10px] bg-[#F7D671] rounded-full"></div>
                            <h1><?php the_title() ?></h1>
                        </div>
                    </div>
                    <div class="text-[#ffffff] text-[45px] font-bold max-w-[500px]">
                        <h1 class="cursor-pointer"><?php echo esc_html($page_identifier); ?></h1>
                    </div>
                    <div>
                        <p class="text-[#ffffff] pb-[20px]"><?php echo esc_html(get_the_content()); ?></p>
                        <?php
                            get_button_data('button-template', array(
                                'title' => "Explore " . get_the_title(), // Concatenating the function result
                                'root_url' => "#",
                                'alignment' => "justify-start"
                            ));
                        ?>
                    </div>
                </div>
                <div class="flex relative w-[100%]">
                    <img class="w-full z-[0]" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                </div>
            </div>
            <div class="bg-[#096936] opacity-[0.90] w-full h-full absolute top-0 left-0 z-[1]"></div>
            <img class="absolute w-full h-full object-cover z-[0]" src="<?php echo esc_url($hero_background); ?>" alt="<?php the_title(); ?>">
        </div>
        <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[50px]">
            <?php if (have_rows('about_agridigital')): ?>
                <?php while (have_rows('about_agridigital')): the_row(); ?>
                    <div class="text-left flex flex-col gap-[10px] pb-[20px]">
                        <h2 class="text-[36px] font-bold"><?php the_sub_field('title'); ?></h2>
                        <p><?php the_sub_field('subtext'); ?></p>
                    </div>
                    <?php if (have_rows('key_points')): ?>
                        <div class="flex gap-[20px] items-center justify-between pt-[50px]">
                            <?php while (have_rows('key_points')): the_row(); ?>
                                <div class="flex flex-col gap-[20px] justify-between items-start text-left w-[100%]">
                                    <div class="rounded-xl overflow-hidden w-[50px] relative top-[-10px] flex">
                                        <img 
                                            class="w-full h-full object-cover" 
                                            src="<?php echo esc_url(get_sub_field('icon')); ?>" 
                                            alt="<?php echo esc_attr(get_sub_field('title')); ?>"
                                        >
                                    </div>
                                    <h6 class="font-[600] text-[24px]"><?php the_sub_field('title'); ?></h6>
                                    <p><?php the_sub_field('subtext'); ?></p>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?> 
                <?php endwhile; ?>
            <?php endif; ?> 
        </div>
        <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[50px]">
            <?php if (have_rows('agpractices_platform')): ?>
                <?php while (have_rows('agpractices_platform')): the_row(); ?>
                    <div class="text-left flex flex-col gap-[10px] pb-[20px]">
                        <h2 class="text-[36px] font-bold"><?php the_sub_field('title'); ?></h2>
                        <p><?php the_sub_field('subtext'); ?></p>
                    </div>
                    <?php if (have_rows('key_points')): ?>
                        <div class="flex gap-[20px] items-center justify-between pt-[50px]">
                            <?php while (have_rows('key_points')): the_row(); ?>
                                <div class="">
                                    <div class="flex gap-[20px] justify-between items-start text-left w-[100%]">
                                        <div class="rounded-xl overflow-hidden w-[50px] relative top-[-10px] flex">
                                            <img 
                                                class="w-full h-full object-cover" 
                                                src="<?php echo esc_url(get_sub_field('icon')); ?>" 
                                                alt="<?php echo esc_attr(get_sub_field('title')); ?>"
                                            >
                                        </div>
                                        <div class="">
                                            <h6 class="font-[600] text-[24px]"><?php the_sub_field('title'); ?></h6>
                                            <p><?php the_sub_field('subtext'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?> 
                <?php endwhile; ?>
            <?php endif; ?> 
        </div>
    </div>
<?php 
    }
    get_footer()
?>


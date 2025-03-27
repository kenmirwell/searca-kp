<?php 
    get_header();

    while (have_posts()) {
        the_post(); 
?>
    <div>
        <?php get_template_part("includes/section/common-hero"); ?>
        <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[80px]">
            <?php if (have_rows('boxed_three_column_section_unique')): ?>
                <?php while (have_rows('boxed_three_column_section_unique')): the_row(); ?>
                    <div class="text-left flex flex-col gap-[10px] pb-[20px]">
                        <h2 class="text-display-24 lg:text-display-48 font-bold text-[#1f1f1f]"><?php the_sub_field('title'); ?></h2>
                        <p class="text-display-16 md:text-display-18"><?php the_sub_field('subtext'); ?></p>
                    </div>
                    <?php if (have_rows('thumbnail_section')): ?>
                        <div class="flex flex-col lg:flex-row gap-[20px] items-center justify-between">
                            <?php while (have_rows('thumbnail_section')): the_row(); ?>
                                <div class="flex flex-col gap-[20px] justify-between items-start text-left w-[100%] border-[#C2C2C2] border-t-[1px] pt-[50px]">
                                    <svg width="47" height="47" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="47" height="47" rx="10" fill="#096935" fill-opacity="0.12"/>
                                        <path d="M11.5 23C11.5 29.9036 17.0964 35.5 24 35.5C30.9036 35.5 36.5 29.9036 36.5 23C36.5 16.0964 30.9036 10.5 24 10.5" stroke="#096936" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M31.5 23C31.5 18.8579 28.1421 15.5 24 15.5C19.8579 15.5 16.5 18.8579 16.5 23C16.5 27.1421 19.8579 30.5 24 30.5" stroke="#096936" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <h6 class="font-[600] text-[24px]"><?php the_sub_field('thumbnail_title'); ?></h6>
                                    <p><?php the_sub_field('thumbnail_subtext'); ?></p>
                                    <div class="relative overflow-hidden rounded-xl w-[100%] h-[400px]">
                                        <img
                                            class="absolute w-full h-full object-cover z-[0]" 
                                            src="<?php echo esc_url(get_sub_field('thumbnail')); ?>" 
                                            alt="<?php echo esc_attr(get_sub_field('thumbnail')); ?>"
                                        >
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?> 
                <?php endwhile; ?>
            <?php endif; ?> 
        </div>
        <div class="bg-[#096936]">
            <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[80px]">
                <?php if (have_rows('community_invitation_section')): ?>
                    <?php while (have_rows('community_invitation_section')): the_row(); ?>
                        <div class="flex flex-col lg:flex-row justify-between">
                            <div class="w-[60%] text-left flex flex-col gap-[10px] pb-[20px] text-[#ffffff]">
                                <h2 class="text-display-24 lg:text-display-48 font-bold"><?php the_sub_field('title'); ?></h2>
                                <p class="text-display-16 md:text-display-18"><?php the_sub_field('subtext'); ?></p>
                            </div>
                            <div class="w-[40%] flex justify-start lg:justify-end ">
                                <?php $button_link = get_sub_field('button_link'); ?>
                                <?php
                                    button_template('common-button', array(
                                        'title' => 'Join the community',
                                        'url' => $button_link,
                                        'color' => 'gold_to_white'
                                    ))
                                ?>
                            </div>
                        </div>
                        <div class="flex flex-col lg:flex-row justify-between gap-[40px] xl:gap-[20px] items-start xl:items-center pt-[50px]">
                            <div class="rounded-xl overflow-hidden w-[100%] h-[300px] lg:h-[100%] xl:w-[35%] relative top-[-10px] flex">
                                <img 
                                    class="w-full h-full object-cover" 
                                    src="<?php echo esc_url(get_sub_field('image')); ?>" 
                                    alt="<?php echo esc_attr(get_sub_field('title')); ?>"
                                >
                            </div>
                            <?php if (have_rows('key_points')): ?>
                                <div class="flex flex-wrap gap-[20px] w-[100%] justify-between xl:justify-end">
                                    <?php while (have_rows('key_points')): the_row(); ?>
                                        <div class="w-[100%] lg:w-[450px]">
                                            <div class="flex">
                                                <div class="bg-[#407738] p-[10px] rounded-lg">
                                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2.5 15C2.5 21.9036 8.09644 27.5 15 27.5C21.9036 27.5 27.5 21.9036 27.5 15C27.5 8.09644 21.9036 2.5 15 2.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M22.5 15C22.5 10.8579 19.1421 7.5 15 7.5C10.8579 7.5 7.5 10.8579 7.5 15C7.5 19.1421 10.8579 22.5 15 22.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="text-left text-[#ffffff] py-[20px]">
                                                <h6 class="text-[22px] font-bold pb-[20px]"><?php the_sub_field('title'); ?></h6>
                                                <p class="text-[#C2C2C2] font-[300]"><?php the_sub_field('subtext'); ?></p>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?> 
            </div>
        </div>
        <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[80px]">
            <?php if (have_rows('round_three_column_section')): ?>
                <?php while (have_rows('round_three_column_section')): the_row(); ?>
                    <div class="text-center flex flex-col gap-[10px] pb-[20px]">
                        <h2 class="text-display-24 lg:text-display-48 font-bold text-[#1f1f1f]"><?php the_sub_field('title'); ?></h2>
                        <p class="text-display-16 md:text-display-18 w-[80%] m-auto"><?php the_sub_field('subtext'); ?></p>
                    </div>
                    <?php if (have_rows('thumbnail_section')): ?>
                        <div class="flex flex-col lg:flex-row gap-[20px] items-center justify-between">
                            <?php while (have_rows('thumbnail_section')): the_row(); ?>
                                <div class="flex flex-col gap-[10px] items-center text-center w-[80%] lg:w-[700px]">
                                    <div class="relative overflow-hidden rounded-full bg-[#8FBAA3] w-[200px] h-[200px] mb-[20px]">
                                        <div class="rounded-full overflow-hidden w-[200px] h-[200px] relative top-[-10px]">
                                            <img 
                                                class="absolute w-full h-full object-cover z-[0]" 
                                                src="<?php echo esc_url(get_sub_field('thumbnail')); ?>" 
                                                alt="<?php echo esc_attr(get_sub_field('thumbnail_title')); ?>"
                                            >
                                        </div>
                                    </div>
                                    <h6 class="font-[600] text-[24px] w-[300px]"><?php the_sub_field('thumbnail_title'); ?></h6>
                                    <p><?php the_sub_field('thumbnail_subtext'); ?></p>
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
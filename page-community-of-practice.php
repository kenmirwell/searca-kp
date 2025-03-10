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
            <?php if (have_rows('boxed_three_column_section')): ?>
                <?php while (have_rows('boxed_three_column_section')): the_row(); ?>
                    <div class="text-left flex flex-col gap-[10px] pb-[20px]">
                        <h2 class="text-[36px] font-bold"><?php the_sub_field('title'); ?></h2>
                        <p><?php the_sub_field('subtext'); ?></p>
                    </div>
                    <?php if (have_rows('thumbnail_section')): ?>
                        <div class="flex gap-[20px] items-center justify-between">
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
            <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[50px]">
                <?php if (have_rows('community_invitation_section')): ?>
                    <?php while (have_rows('community_invitation_section')): the_row(); ?>
                        <div class="flex justify-between">
                            <div class="w-[100%] text-left flex flex-col gap-[10px] pb-[20px] text-[#ffffff]">
                                <h2 class="text-[36px] font-bold"><?php the_sub_field('title'); ?></h2>
                                <p><?php the_sub_field('subtext'); ?></p>
                            </div>
                            <div class="w-[50%]">
                                <a href="<?php echo esc_url(the_sub_field('button_link')); ?>" class="flex justify-end w-auto group cursor-pointer">
                                    <div class="flex items-center gap-[20px] py-[5px] pl-[20px] pr-[5px] bg-[#ceab23] group-hover:bg-[#2a7f3d] transition-all duration-200 ease rounded-full">
                                        <p class="text-[#ffffff]"><?php the_sub_field('button_name'); ?></p>
                                        <div class="rounded-full p-[15px] transition-all duration-200 ease bg-[#2a7f3d] group-hover:bg-[#ceab23]">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.10042 21.8995L21.8994 2.10051M21.8994 2.10051H2.10042M21.8994 2.10051V21.8995" 
                                                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="flex justify-between gap-[20px] items-center pt-[50px]">
                            <div class="rounded-xl overflow-hidden w-[35%] relative top-[-10px] flex">
                                <img 
                                    class="w-full h-full object-cover" 
                                    src="<?php echo esc_url(get_sub_field('image')); ?>" 
                                    alt="<?php echo esc_attr(get_sub_field('title')); ?>"
                                >
                            </div>
                            <?php if (have_rows('key_points')): ?>
                                <div class="flex flex-wrap gap-[20px] w-[100%] justify-end">
                                    <?php while (have_rows('key_points')): the_row(); ?>
                                        <div class="text-left text-[#ffffff] pb-[20px] w-[450px]">
                                            <h6 class="text-[22px] font-bold pb-[20px]"><?php the_sub_field('title'); ?></h6>
                                            <p class="text-[#C2C2C2] font-[300]"><?php the_sub_field('subtext'); ?></p>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?> 
            </div>
        </div>
        <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[50px]">
            <?php if (have_rows('round_three_column_section')): ?>
                <?php while (have_rows('round_three_column_section')): the_row(); ?>
                    <div class="text-center flex flex-col gap-[10px] pb-[20px]">
                        <h2 class="text-[36px] font-bold"><?php the_sub_field('title'); ?></h2>
                        <p><?php the_sub_field('subtext'); ?></p>
                    </div>
                    <?php if (have_rows('thumbnail_section')): ?>
                        <div class="flex gap-[20px] items-center justify-between">
                            <?php while (have_rows('thumbnail_section')): the_row(); ?>
                                <div class="flex flex-col gap-[10px] items-center text-center w-[700px]">
                                    <div class="relative overflow-hidden rounded-full bg-[#8FBAA3] w-[200px] h-[200px] mb-[20px]">
                                        <div class="rounded-full overflow-hidden w-[200px] h-[200px] relative top-[-10px]">
                                            <img 
                                                class="absolute w-full h-full object-cover z-[0]" 
                                                src="<?php echo esc_url(get_sub_field('thumbnail')); ?>" 
                                                alt="<?php echo esc_attr(get_sub_field('thumbnail_title')); ?>"
                                            >
                                        </div>
                                    </div>
                                    <h6 class="font-[600] text-[24px]"><?php the_sub_field('thumbnail_title'); ?></h6>
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
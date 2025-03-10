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
        <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[60px]">
            <?php if (have_rows('boxed_three_column_section')): ?>
                <?php while (have_rows('boxed_three_column_section')): the_row(); ?>
                    <div class="text-left flex flex-col gap-[10px] pb-[20px]">
                        <h2 class="text-[42px] font-bold"><?php the_sub_field('title'); ?></h2>
                        <p><?php the_sub_field('subtext'); ?></p>
                    </div>
                    <?php if (have_rows('thumbnail_section')): ?>
                        <div class="flex gap-[20px] items-center justify-between">
                            <?php while (have_rows('thumbnail_section')): the_row(); ?>
                                <div class="flex flex-col gap-[20px] justify-between items-start text-left w-[100%]">
                                    <div class="rounded-lg w-[50px] overflow-hidden">
                                        <img
                                            class="w-full h-full object-cover z-[0]" 
                                            src="<?php echo esc_url(get_sub_field('icon')); ?>" 
                                            alt="<?php echo esc_attr(get_sub_field('title')); ?>"
                                        >
                                    </div>
                                    <h6 class="font-[600] text-[24px]"><?php the_sub_field('thumbnail_title'); ?></h6>
                                    <div class="h-[90px]">
                                        <p><?php the_sub_field('thumbnail_subtext'); ?></p>
                                    </div>
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
        <?php if (have_rows('inner_content')): ?>
            <?php while (have_rows('inner_content')): the_row(); ?>
                <?php if (!get_sub_field("has_white_background")): ?>
                <div class="bg-[#096936] text-[#ffffff]">
                <?php else: ?>  
                <div>
                <?php endif; ?>
                    <?php if (get_sub_field("is_text_right")): ?>
                        <div>
                            <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[50px]">
                                <div class="flex flex-col gap-[10px]">
                                    <div class="flex justify-between gap-[100px] items-center">
                                        <div class="relative w-[50%]">
                                            <img class="w-full z-[0]" src="<?php echo esc_url(get_sub_field("section_image")); ?>" alt="<?php the_title(); ?>">
                                        </div>
                                        <div class="flex flex-col gap-[10px] w-[50%]">
                                            <h6 class="text-[36px] font-bold pb-[10px]"><?php the_sub_field('section_title'); ?></h6>
                                            <div class="text-[14px] flex flex-col gap-[15px]">
                                                <?php the_sub_field('text_area'); ?>
                                            </div>
                                            <?php if (get_sub_field("button_name")): ?>
                                                <?php $button_link = get_sub_field('button_link'); ?>
                                                <?php $button_name = get_sub_field('button_name'); ?>
                                                <?php $is_button_gold = get_sub_field("is_button_gold"); ?>

                                                <?php var_dump($is_button_gold); ?>
                                                <div class="flex mt-[12px]">
                                                    <a href="<?php echo esc_url($button_link); ?>" class="w-auto group cursor-pointer">
                                                        <div class="flex items-center gap-[20px] py-[5px] pl-[20px] pr-[5px] <?php echo $is_button_gold ? 'bg-[#2a7f3d] group-hover:bg-[#ceab23]' : 'bg-[#ceab23] group-hover:bg-[#2a7f3d]'; ?> transition-all duration-200 ease rounded-full">
                                                            
                                                            <p class="text-[#ffffff]"><?php echo esc_html($button_name); ?></p>
                                                            
                                                            <div class="rounded-full p-[15px] transition-all duration-200 ease <?php echo $is_button_gold ? 'bg-[#ceab23] group-hover:bg-[#2a7f3d]' : 'bg-[#2a7f3d] group-hover:bg-[#ceab23]'; ?>">
                                                                
                                                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M2.10042 21.8995L21.8994 2.10051M21.8994 2.10051H2.10042M21.8994 2.10051V21.8995" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>  
                        <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[50px]">
                            <div class="flex flex-col gap-[10px]">
                                <div class="flex flex-row-reverse justify-between gap-[100px] items-center">
                                    <div class="relative w-[50%]">
                                        <img class="w-full z-[0]" src="<?php echo esc_url(get_sub_field("section_image")); ?>" alt="<?php the_title(); ?>">
                                    </div>
                                    <div class="flex flex-col gap-[10px] w-[50%]">
                                        <h6 class="text-[36px] font-bold pb-[10px]"><?php the_sub_field('section_title'); ?></h6>
                                        <div class="text-[14px] flex flex-col gap-[15px]">
                                            <?php the_sub_field('text_area'); ?>
                                        </div>
                                        <?php if (get_sub_field("button_name")): ?>
                                            <?php $button_link = get_sub_field('button_link'); ?>
                                            <?php $button_name = get_sub_field('button_name'); ?>
                                            <?php $is_button_gold = get_sub_field("is_button_gold"); ?>

                                            <div class="flex mt-[12px]">
                                                <a href="<?php echo esc_url($button_link); ?>" class="w-auto group cursor-pointer">
                                                    <div class="flex items-center gap-[20px] py-[5px] pl-[20px] pr-[5px] 
                                                        <?php echo $is_button_gold ? 'bg-[#2a7f3d] group-hover:bg-[#ceab23]' : 'bg-[#ceab23] group-hover:bg-[#2a7f3d]'; ?> 
                                                        transition-all duration-200 ease rounded-full">
                                                        
                                                        <p class="text-[#ffffff]"><?php echo esc_html($button_name); ?></p>
                                                        
                                                        <div class="rounded-full p-[15px] transition-all duration-200 ease 
                                                            <?php echo $is_button_gold ? 'bg-[#ceab23] group-hover:bg-[#2a7f3d]' : 'bg-[#2a7f3d] group-hover:bg-[#ceab23]'; ?>">
                                                            
                                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M2.10042 21.8995L21.8994 2.10051M21.8994 2.10051H2.10042M21.8994 2.10051V21.8995" 
                                                                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?> 
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
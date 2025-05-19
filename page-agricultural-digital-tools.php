<?php 
    get_header();

    while (have_posts()) {
        the_post();
?>
    <div>
        <?php get_template_part("includes/section/common-hero"); ?>
        <div class="about-agri-digitools w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[50px]">
            <?php if (have_rows('about_agridigital')): ?>
                <?php while (have_rows('about_agridigital')): the_row(); ?>
                    <div class="text-left flex flex-col gap-[10px] pb-[20px]">
                        <h2 class="text-display-24 lg:text-display-42 font-bold"><?php the_sub_field('title'); ?></h2>
                        <p><?php the_sub_field('subtext'); ?></p>
                    </div>
                    <?php if (have_rows('key_points')): ?>
                        <div class="flex flex-col lg:flex-row gap-[40px] lg:gap-[20px] items-start justify-between pt-[50px]">
                            <?php while (have_rows('key_points')): the_row(); ?>
                                <div class="flex flex-col lg:gap-[20px] justify-between items-start text-left w-[100%]">
                                    <div class="rounded-xl overflow-hidden w-[50px] relative top-[-10px] flex">
                                        <img 
                                            class="w-full h-full object-cover" 
                                            src="<?php echo esc_url(get_sub_field('icon')); ?>" 
                                            alt="<?php echo esc_attr(get_sub_field('title')); ?>"
                                        >
                                    </div>
                                    <h6 class="font-[600] text-display-20 lg:text-display-24"><?php the_sub_field('title'); ?></h6>
                                    <p class="text-display-14 lg:text-display-16"><?php the_sub_field('subtext'); ?></p>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?> 
                <?php endwhile; ?>
            <?php endif; ?> 
        </div>
        <div id="agdom-keypoints" class="bg-[#096936]">
            <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[60px]">
                <?php if (have_rows('agpractices_platform')): ?>
                    <?php while (have_rows('agpractices_platform')): the_row(); ?>
                        <div class="text-left flex flex-col gap-[10px] pb-[50px] text-[#ffffff]">
                            <h2 class="text-display-24 lg:text-display-42 font-bold"><?php the_sub_field('title'); ?></h2>
                            <p><?php the_sub_field('subtext'); ?></p>
                        </div>

                        <?php 
                        // Store key_points in an array to prevent multiple loops
                        $key_points = get_sub_field('key_points');
                        if ($key_points): 
                        ?>
                            <div class="flex flex-col-reverse lg:flex-row items-center justify-between gap-[50px]">
                                <!-- Key Points Section -->
                                <div class="flex flex-col gap-[20px] items-start justify-between w-[100%]">
                                    <?php foreach ($key_points as $index => $point): ?>
                                        <div class="key-point cursor-pointer text-[#ffffff] rounded-xl w-[100%]" data-index="<?php echo $index; ?>">
                                            <div class="flex gap-[20px] items-start text-left w-[100%] p-[20px]">
                                                <div class="relative flex items-center justify-center h-[50px] w-[50px]">
                                                    <div class="absolute w-[20px] z-[1]">
                                                        <img 
                                                            class="w-full h-full z-[0]" 
                                                            src="<?php echo esc_url($point['icon']); ?>" 
                                                            alt="<?php echo esc_attr($point['title']); ?>"
                                                        >
                                                    </div>
                                                    <div class="bg-[#000000] opacity-[0.40] w-[100%] h-[100%] rounded-full"></div>
                                                </div>
                                                <div>
                                                    <h6 class="font-[600] text-display-20 lg:text-display-24"><?php echo $point['title']; ?></h6>
                                                    <p class="text-display-14 lg:text-display-16"><?php echo $point['subtext']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <!-- Images Section -->
                                <div class="relative flex gap-[20px] items-center justify-between pt-[50px] w-[100%] lg:w-[50%] h-[300px]">
                                    <?php foreach ($key_points as $index => $point): ?>
                                        <div class="image-wrapper absolute inset-0 flex w-[100%] h-[100%]" data-index="<?php echo $index; ?>" style="opacity: 0; transition: opacity 0.3s ease-in-out;">
                                            <div class="relative rounded-xl overflow-hidden w-[100%] h-[100%]">
                                                <img 
                                                    class="absolute w-full h-full object-cover z-[0]"
                                                    src="<?php echo esc_url($point['image']); ?>" 
                                                    alt="<?php echo esc_attr($point['title']); ?>"
                                                >
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="agri-key-objectives w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[60px]">
            <?php if (have_rows('agri_key_objectives')): ?>
                <?php while (have_rows('agri_key_objectives')): the_row(); ?>
                    <div class="text-center flex flex-col gap-[10px] pb-[50px]">
                        <h2 class="text-display-24 lg:text-display-42 font-bold"><?php echo esc_html(get_sub_field('title')); ?></h2>
                        <p><?php echo wp_kses_post(get_sub_field('subtext')); ?></p>
                    </div>
                    <?php if (have_rows('key_points')): ?>
                        <div class="flex flex-col lg:flex-row gap-[20px] items-center lg:items-start justify-between">
                            <?php $index = 1; ?>
                            <?php while (have_rows('key_points')): the_row(); ?>
                                <div class="flex items-start">
                                    <div class="flex flex-col gap-[10px] items-center text-center w-full max-w-[700px]">
                                        <div class="relative flex items-center justify-center h-[100px] w-[100px]">
                                            <div class="absolute w-[35px] z-[1]">
                                                <img 
                                                    class="w-full h-full z-[0]" 
                                                    src="<?php echo esc_url(get_sub_field('icon')); ?>" 
                                                    alt="<?php echo esc_attr(get_sub_field('title')); ?>"
                                                >
                                            </div>
                                            <div class="absolute flex w-[40px] h-[40px] justify-center items-center rounded-full bg-[#B59637] border-[4px] border-[#ffffff] top-0 right-[-16px] p-[10px]">
                                                <p class="text-[#ffffff]"><?php echo $index; ?></p>
                                            </div>
                                            <div class="bg-[#096936] w-[100%] h-[100%] rounded-full"></div>
                                        </div>
                                        <h6 class="font-[600] text-display-20 lg:text-display-24"><?php echo esc_html(get_sub_field('title')); ?></h6>
                                        <p><?php echo wp_kses_post(get_sub_field('subtext')); ?></p>
                                    </div>
                                    <?php if ($index < 3): ?>
                                        <div class="hidden lg:block mt-[50px]">
                                            <svg width="100%" height="16" viewBox="0 0 141 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M140.707 8.70711C141.098 8.31658 141.098 7.68342 140.707 7.29289L134.343 0.928932C133.953 0.538408 133.319 0.538408 132.929 0.928932C132.538 1.31946 132.538 1.95262 132.929 2.34315L138.586 8L132.929 13.6569C132.538 14.0474 132.538 14.6805 132.929 15.0711C133.319 15.4616 133.953 15.4616 134.343 15.0711L140.707 8.70711ZM0 9H140V7H0V9Z" fill="#B59637"/>
                                            </svg>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php $index++; ?>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?> 
                <?php endwhile; ?>
            <?php endif; ?> 
        </div>
        <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[60px]">
            <div class="flex flex-col lg:flex-row justify-between">
                <div class="w-[100%] text-left flex flex-col gap-[10px] lg:pb-[20px] text-[#000000]">
                    <h2 class="text-display-24 lg:text-display-42 font-bold">AgPractices&Domains Web Application</h2>
                </div>
                <div class="w-auto flex lg:block lg:w-[50%] pb-[20px] lg:pb-[0px]">
                    <a href="https://agpractices.searcaapps.org:3443/" class="flex justify-end w-auto group cursor-pointer">
                        <div class="flex items-center gap-[20px] py-[5px] pl-[20px] pr-[5px] group-hover:bg-[#ceab23] bg-[#2a7f3d] transition-all duration-200 ease rounded-full">
                            <p class="text-[#ffffff]">Visit Platform</p>
                            <div class="rounded-full p-[15px] transition-all duration-200 ease group-hover:bg-[#2a7f3d] bg-[#ceab23]">
                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.10042 21.8995L21.8994 2.10051M21.8994 2.10051H2.10042M21.8994 2.10051V21.8995" 
                                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="rounded-xl border-[4px] bg-[#EEEEEE]">
                <div class="relative rounded-xl overflow-hidden w-[100%] h-[500px]">
                    <img 
                        class="absolute w-full h-full object-cover z-[0]"
                        src="https://cadre.searca.org/wp-content/uploads/2025/03/image-4-scaled.jpg" 
                        alt=""
                    >
                </div>
            </div>
            <!-- <iframe src="https://agpractices.searcaapps.org:3443/" 
                width="100%" 
                height="600" 
                style="border: none;">
            </iframe> -->
        </div> 
        <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[60px]">
            <div class="flex flex-col lg:flex-row justify-between items-center">
                <div class="flex flex-col gap-[20px]">
                    <h2 class="text-display-24 lg:text-display-42 font-bold">Step-by-Step: How It Works</h2>
                    <div class="flex flex-col gap-[10px]">
                        <h6 class="font-bold">Inputs</h6>
                        <ul>
                            <li>Select target areas, research focus, and seasons</li>
                            <li>Upload survey data: field locations, crop details, pest/disease monitoring</li>
                        </ul>
                    </div>
                    <div class="flex flex-col gap-[10px]">
                        <h6 class="font-bold">Outputs</h6>
                        <ul>
                            <li>Productivity analysis & risk levels</li>
                            <li>AI-driven monitoring plans & recommendations</li>
                        </ul>
                    </div>
                </div>
                <div>
                    <img 
                        class="w-full h-full object-cover z-[0]"
                        src="https://cadre.searca.org/wp-content/uploads/2025/03/Group-1597884808.png" 
                        alt=""
                    >
                </div>
            </div>
        </div>
    </div>
<?php 
    }
    get_footer()
?>


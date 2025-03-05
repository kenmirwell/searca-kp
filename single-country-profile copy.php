<?php 
get_header();

while (have_posts()) {
    the_post();

    $map = get_field("map");

    $geographic_profile = get_field('geographic_profile');
    $hero_background = get_field('hero_background');
    $hero_description = get_field('hero_description');
?>
    <style>
        .featured-image-container {
            width: 100%; /* Adjust as needed */
            height: 100%;
            background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');
            background-repeat: no-repeat;
            background-size: cover; /* or 'contain' if needed */
            background-position: center;
            -webkit-mask-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1496 1291"><path d="M158.935 180.624C164.854 142.622 195.826 113.493 234.119 109.915L1404.18 0.579571C1453.45 -4.02386 1496 34.7365 1496 84.2152V1207C1496 1253.39 1458.39 1291 1412 1291H84.0952C32.5499 1291 -6.83645 1245 1.09582 1194.07L158.935 180.624Z" fill="white"/></svg>');
            mask-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1496 1291"><path d="M158.935 180.624C164.854 142.622 195.826 113.493 234.119 109.915L1404.18 0.579571C1453.45 -4.02386 1496 34.7365 1496 84.2152V1207C1496 1253.39 1458.39 1291 1412 1291H84.0952C32.5499 1291 -6.83645 1245 1.09582 1194.07L158.935 180.624Z" fill="white"/></svg>');

            -webkit-mask-size: contain;
            mask-size: contain;

            -webkit-mask-repeat: no-repeat;
            mask-repeat: no-repeat;

            -webkit-mask-position: center;
            mask-position: center;
        }
    </style>

    <div class="relative h-[800px] flex jusitify-center">
        <div class="flex items-center w-[90%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[150px] font-light z-[2]">
            <div class="w-[100%]">
                <div class="flex gap-[5px] text-[#ffffff] text-[14px] font-extralight pb-[20px]">
                    <p class="cursor-pointer text-[#ffffff]"><a href="/">Home | Agricultural Statistics Data |</a></p>
                    <p class="cursor-pointer text-[#ffffff]"><?php the_title()?></p>
                </div>
                <h1 class="text-[48px] font-bold text-[#ffffff] pb-[20px]"><?php the_title()?></h1>
                <div>
                    <p class="text-[#ffffff] pb-[20px]"><?php echo $hero_description ?></p>
                    <?php
                        get_button_data('button-template', array(
                            'title' => "Explore " . get_the_title(), // Concatenating the function result
                            'root_url' => "#",
                            'alignment' => "justify-start"
                        ));
                    ?>
                </div>
            </div>
            <div class="relative w-[100%] h-[100%]">
                <div class="featured-image-container absolute z-[1]"></div> 
                <?php 
                    if(!empty(get_the_post_thumbnail_url())) {
                ?>
                    <div class="bg-[#B59637] absolute w-[280px] h-[200px] absolute top-[140px] left-[0] z-[0] rounded-xl" style="transform: rotate(80deg);"></div> 
                <?php } ?>
            </div>
        </div>
        <div class="bg-gradient-to-r from-black/90 to-black/40 w-full h-full absolute top-0 left-0 z-[1]"></div>
        <img class="absolute w-full h-full object-cover z-[0]" src="<?php echo esc_url($hero_background); ?>" alt="<?php the_title(); ?>">
    </div>
    <div class="bg-[#2a7f3d] py-[50px]">
        <?php 
            $qf_desc = get_field('quick_facts_description');
        ?>
        <div class="w-[90%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto">
            <div class="text-[#ffffff] flex flex-col items-center justify-center">
                <h2 class="text-[42px] font-bold">Quick Facts</h2>
                <h6 class="flex text-[18px] justify-center items-center text-center w-[50%]">Agriculture plays a vital role in the Philippine economy, contributing significantly to employment and GDP.</h6>
            </div>
            <div class="pt-[20px]">
                <?php if (have_rows('quick_facts')): ?>
                    <div class="flex justify-between">
                        <?php while (have_rows('quick_facts')): the_row(); ?>
                            <div class="flex flex-col text-center justify-center items-center">
                                <img class="w-[100px] h-[100px]" src="<?php echo esc_url(get_sub_field('fact_icon')); ?>" alt="">
                                <h6 class="text-[#ceab23] font-bold text-[32px]"><?php the_sub_field('fact_figure'); ?></h6>
                                <p class="text-[#ffffff] pb-[10px] text-[14px]"><?php the_sub_field('fact'); ?></p>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="py-[50px]">
        <div class="w-[90%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto">
            <div class="flex flex-row-reverse gap-[20px]">
                <div class="w-[30%] sticky top-[0px] h-[700px] pl-[20px] pb-[50px]">
                    <ul class="flex flex-col gap-[20px] text-[16px] pb-[20px] border-b-[1px]">
                        <li class="cursor-pointer">Background</li>
                        <li class="cursor-pointer">Language</li>
                        <li class="cursor-pointer">Geographic Profile</li>
                        <li class="cursor-pointer">Demographic Profile</li>
                        <li class="cursor-pointer">Economic Profile</li>
                        <li class="cursor-pointer">Main Products</li>
                        <li class="cursor-pointer">Industry Profile</li>
                        <li class="cursor-pointer">Current Concerns</li>
                        <li class="cursor-pointer">Important Agricultural-related Policies and Legislations</li>
                    </ul>
                    <div class="pt-[20px]">
                        <p>Other South East Asian Countries</p>
                        <div class="flex flex-wrap gap-[10px] pt-[20px]">
                            <?php 
                                $countries = new WP_Query(array(
                                    "post_type" => "country-profile",
                                    "posts_per_page" => 11,
                                    'order' => 'DESC',     
                                ));

                                if ($countries->have_posts()) {
                                    while ($countries->have_posts()) {
                                        $countries->the_post();
                                        $country_index = (int) $countries->current_post;

                                        $flag_url = get_field('flag');
                            ?>
                                <a href="<?php echo get_permalink(); ?>" class="w-[40px]">
                                    <img class="" src="<?php echo esc_url($flag_url); ?>" alt="">
                                </a>
                            <?php 
                                } 
                            } 
                            wp_reset_postdata(); // Reset the query
                            ?>
                        </div>
                    </div>
                </div>
                <div class="w-[70%] border-r-[1px] pr-[40px]">
                    <div>
                        <h2 class="text-[36px] font-bold pb-[20px]">Background</h2>
                        <?php if (have_rows('background')): ?>
                            <div class="flex flex-col gap-[10px]">
                                <?php while (have_rows('background')): the_row(); ?>
                                    <p class="text-[#000000] pb-[10px] text-[14px]"><?php the_sub_field('paragraph'); ?></p>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div>
                        <?php if (have_rows('topics')): ?>
                            <div class="flex flex-col gap-[10px]">
                                <?php while (have_rows('topics')): the_row(); ?>
                                    <div class="relative h-[500px] w-[100%] my-[20px]">
                                        <img class="absolute top-[0] w-full h-full object-cover z-[1]" src="<?php echo esc_url(get_sub_field('topic_image')); ?>" alt="">
                                    </div>
                                    <h2 class="text-[#000000] pb-[10px] text-[36px] font-bold"><?php the_sub_field('topic'); ?></h2>

                                    <?php if (have_rows('content')): ?>
                                        <div class="flex flex-col gap-[10px]">
                                            <?php while (have_rows('content')): the_row(); ?>
                                                <h6 class="text-[#000000] pb-[10px] text-[22px] font-bold"><?php the_sub_field('sub_topic'); ?></h6>

                                                <?php if (have_rows('content_sub_topic')): ?>
                                                    <div class="flex flex-col gap-[10px]">
                                                        <?php while (have_rows('content_sub_topic')): the_row(); ?>

                                                            <?php if (have_rows('text_content_group')): ?>
                                                                <div class="flex flex-col gap-[10px]">
                                                                    <?php while (have_rows('text_content_group')): the_row(); ?>
                                                                        
                                                                        <?php 
                                                                        $layout = get_row_layout(); // Get the current layout
                                                                        ?>

                                                                        <div class="flex gap-[10px] items-center">
                                                                            
                                                                            <?php if ($layout === 'paragraph_1st_layer'): ?>  
                                                                                <?php if (get_sub_field('text_content')): ?>
                                                                                    <p class="text-[#000000] text-[14px]"><?php the_sub_field('text_content'); ?></p>
                                                                                <?php endif; ?>

                                                                            <?php elseif ($layout === 'bullet_1st_layer'): ?>  
                                                                                <?php if (get_sub_field('text_content')): ?>
                                                                                    <p class="text-[#000000] text-[14px]"><?php the_sub_field('text_content'); ?></p>
                                                                                <?php endif; ?>

                                                                            <?php elseif ($layout === 'paragraph_2nd_layer'): ?>  
                                                                                <?php if (get_sub_field('text_content')): ?>
                                                                                    <p class="text-[#000000] text-[14px]"><?php the_sub_field('text_content'); ?></p>
                                                                                <?php endif; ?>

                                                                            <?php elseif ($layout === 'bullet_2nd_layer'): ?>  
                                                                                <?php if (get_sub_field('text_content')): ?>
                                                                                    <p class="text-[#000000] text-[14px]"><?php the_sub_field('text_content'); ?></p>
                                                                                <?php endif; ?>

                                                                            <?php endif; ?>

                                                                        </div>

                                                                    <?php endwhile; ?>
                                                                </div>
                                                            <?php endif; ?>

                                                        <?php endwhile; ?>
                                                    </div>
                                                <?php endif; ?>

                                            <?php endwhile; ?>
                                        </div>
                                    <?php endif; ?>

                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
}
get_footer();
?>

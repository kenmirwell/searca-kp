<?php 
get_header();

while (have_posts()) {
    the_post();

    $map = get_field("map");

    $geographic_profile = get_field('geographic_profile');



?>

    <div class="bg-[#196129] pt-[70px]">
        <div class="flex w-[90%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto pt-[50px] pb-[10px] font-light">
            <div class="w-[50%]">
                <div class="flex gap-[5px] text-[#ffffff] text-[14px] font-extralight">
                    <p class="cursor-pointer"><a href="/">Home | Agricultural Statistics Data |</a></p>
                    <p class="cursor-pointer"><?php the_title()?></p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="bg-[#196129] pt-[70px]">
        <div class="flex w-[90%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto pt-[50px] pb-[10px] font-light">
            <div class="w-[50%]">
                <div class="flex gap-[5px] text-[#ffffff] text-[14px] font-extralight">
                    <p class="cursor-pointer"><a href="/">Home | Agricultural Statistics Data |</a></p>
                    <p class="cursor-pointer"><?php the_title()?></p>
                </div>
            </div>
        </div>
    </div>
    
    <?php get_template_part("includes/country-profile-sections/hero-section"); ?>
    
    <div class="w-[90%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[40px]">
        <div class="flex flex-row-reverse gap-[20px]">
            <div class="w-[30%] sticky top-[0px] h-[500px]">
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
            <div class="w-[70%] border-r-[1px] pr-[20px]">
                <?php if (have_rows('content_container')): ?>
                    <div class="">
                        <?php while (have_rows('content_container')): the_row(); ?>
                            <div class="pt-[20px]">
                                <h5 class="text-[22px] font-[600] pb-[20px]"><?php the_sub_field('heading'); ?></h5>

                                <?php if (have_rows('heading_content_paragraph')): ?>
                                    <?php while (have_rows('heading_content_paragraph')): the_row(); ?>
                                        <p class="pb-[10px] text-[14px] pb-[20px]"><?php the_sub_field('heading_content'); ?></p>
                                    <?php endwhile; ?>
                                <? endif; ?>

                                <?php if (have_rows('content')): ?>
                                    <div class="relative">
                                        <?php while (have_rows('content')): the_row(); ?>
                                            <?php 
                                                $topic_image = get_sub_field('image');
                                                $image_post = get_sub_field('image_position');

                                                if($topic_image) {
                                            ?>  
                                            <?php if($image_post === "right") {?>
                                                <div class="flex gap-[20px] py-[20px]">
                                            <?php }else { ?>    
                                                <div class="flex flex-row-reverse gap-[20px] py-[20px]">
                                            <?php } ?>
                                                    <div class="w-[50%]">
                                                        <h6 class="text-[16px] font-[600] pb-[10px]"><?php the_sub_field('sub_topic_heading'); ?></h6>      
                                                        <?php if (have_rows('sub_topic_content_container')): ?>
                                                            <?php while (have_rows('sub_topic_content_container')): the_row(); ?>
                                                                <?php if (have_rows('sub_topic_paragraph_group')): ?>
                                                                    <div class="pb-[20px]">
                                                                        <?php while (have_rows('sub_topic_paragraph_group')): the_row(); ?>
                                                                            <p class="pb-[10px] text-[14px]"><?php the_sub_field('sub_topic_paragraph'); ?></p>
                                                                        <?php endwhile; ?>
                                                                    </div>
                                                                <? endif; ?>

                                                                <?php if (have_rows('inner_content_container')): ?>
                                                                    <?php while (have_rows('inner_content_container')): the_row(); ?>
                                                                        <div class="pl-[20px]">
                                                                            <h6 class="text-[16px] font-[600] pb-[10px]"><?php the_sub_field('inner_content_title'); ?></h6>      
                                                                            <?php if (have_rows('inner_content_group')): ?>
                                                                                <?php while (have_rows('inner_content_group')): the_row(); ?>
                                                                                    <p class="pb-[10px] text-[14px]"><?php the_sub_field('inner_content_paragraph'); ?></p>      
                                                                                <?php endwhile; ?>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    <?php endwhile; ?>
                                                                <?php endif; ?>

                                                            <?php endwhile; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="relative max-h-[500px] w-[50%] shadow-lg rounded-xl overflow-hidden">
                                                        <img class="absolute w-full h-full object-cover rounded-xl z-[2]" src="<?php the_sub_field('image') ?>" alt="<?php the_sub_field('sub_topic_heading'); ?>">
                                                    </div>
                                                </div>
                                            <?php 
                                                } else {
                                            ?>
                                                <h6 class="text-[16px] font-[600] pb-[10px]"><?php the_sub_field('sub_topic_heading'); ?></h6>
                                                <?php if (have_rows('sub_topic_content_container')): ?>
                                                    <?php while (have_rows('sub_topic_content_container')): the_row(); ?>
                                                        <?php if (have_rows('sub_topic_paragraph_group')): ?>
                                                            <div class="pb-[20px]">
                                                                <?php while (have_rows('sub_topic_paragraph_group')): the_row(); ?>
                                                                    <p class="pb-[10px] text-[14px]"><?php the_sub_field('sub_topic_paragraph'); ?></p>
                                                                <?php endwhile; ?>
                                                            </div>
                                                        <? endif; ?>

                                                        <?php if (have_rows('inner_content_container')): ?>
                                                            <?php while (have_rows('inner_content_container')): the_row(); ?>
                                                                <div class="pl-[20px]">
                                                                    <h6 class="text-[16px] font-[600] pb-[10px]"><?php the_sub_field('inner_content_title'); ?></h6>      
                                                                    <?php if (have_rows('inner_content_group')): ?>
                                                                        <?php while (have_rows('inner_content_group')): the_row(); ?>
                                                                            <p class="pb-[10px] text-[14px]"><?php the_sub_field('inner_content_paragraph'); ?></p>      
                                                                        <?php endwhile; ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                            <?php endwhile; ?>
                                                        <?php endif; ?>

                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            <?php 
                                                }
                                            ?>
                                        <?php endwhile; ?>
                                    </div>
                                <? endif; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <? endif; ?>
            </div>
        </div>
    </div>
<?php 
}
get_footer();
?>

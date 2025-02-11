<?php 
get_header();

while (have_posts()) {
    the_post();
?>
    <div class="bg-[#196129]">
        <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[10px] font-light">
            <div>
                <div class="flex gap-[5px] text-[#ffffff] text-[14px] font-extralight">
                    <p class="cursor-pointer"><a href="/">Home |</a></p>
                    <p class="cursor-pointer"><?php the_title()?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-[#FDFDEF]">
        <div class="flex w-[80%] mx-auto h-[100%] py-[100px]">
            <div class="w-[100%] mx-auto relative">
                <?php
                    // if (has_post_thumbnail()) {
                        // $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Get featured image URL
                ?>
                        <!-- <img class="h-[100%]" src="<?php echo esc_url($featured_image_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"> -->
                <?php /*}*/ ?>
                <div class="relative w-[600px] h-[600px]">
                    <?php 
                        $countries = new WP_Query(array(
                            "post_type" => "country-post-type",
                            "posts_per_page" => 10,
                            'order' => 'DESC',     
                        ));

                        if ($countries->have_posts()) {
                            while ($countries->have_posts()) {
                                $countries->the_post();
                                $country_index = (int) $countries->current_post;

                                $image_url = get_field('map');
                    ?>
                            <img id="map-<?php the_title(); ?>" class="map-<?php echo $country_index; ?> absolute top-0 left-0 w-[100%] transition-all duration-300 ease-in-out" src="<?php echo esc_url($image_url); ?>" alt="">
                    <?php } }?>
                </div>
                <div id="map-container" class="absolute top-0 w-[600px] h-[600px]">
                    <?php 
                    $countries = new WP_Query(array(
                        "post_type" => "country-post-type",
                        "posts_per_page" => 10,
                        'order' => 'DESC',     
                    ));

                    if ($countries->have_posts()) {
                        while ($countries->have_posts()) {
                            $countries->the_post();
                            $country_index = (int) $countries->current_post;

                            $flag_url = get_field('flag');
                    ?>
                        <a href="<?php echo get_permalink(); ?>" data-index="<?php echo intval($country_index); ?>" class="country-<?php echo $country_index; ?> flex items-center absolute font-[200] transition-all duration-200 ease" id="country-<?php the_title(); ?>">
                            <img class="w-[50px] z-[2] transition-all duration-300 ease-in-out" src="<?php echo esc_url($flag_url); ?>" alt="">
                            <p class="absolute text-[14px] font-[500] flex justify-start items-center py-[7px] ml-[30px] rounded-br-full rounded-tr-full  bg-[#ffffff] overflow-hidden transition-all duration-300 ease-in-out"><?php the_title(); ?></p>
                        </a>
                    <?php 
                        } 
                    } 
                    wp_reset_postdata(); // Reset the query
                    ?>
                </div>
            </div>
            <div class="w-[50%] flex flex-col gap-[20px] text-[#000000]">
                <h2 class="text-[32px] text-center">South East Asian Countries</h2>
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fermentum bibendum pulvinar. Sed mollis mattis tortor nec fermentum. In at tellus nulla. Praesent mattis lacus massa, sed venenatis massa vehicula in. Quisque sollicitudin hendrerit sagittis. Donec id odio et odio aliquet pretium. Aliquam ac est ac lectus fringilla mollis vitae eu nunc. Maecenas in nisi ullamcorper, lobortis risus quis, scelerisque nibh.</p>
            </div>
        </div>
    </div>
<?php 
}
get_footer();
?>

<?php 
    add_shortcode('cadre_components_shortcode', 'cadre_components_shortcode_fn');

    function cadre_components_shortcode_fn() {
        ob_start();
        ?>
        <div class="py-[50px]">
            <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto">
                <div class="flex flex-col gap-[5px] items-center text-center w-[700px] mx-auto pb-[20px] md:pb-[40px]">
                    <div class="text-[22px] lg:text-[32px] font-[600]">
                        <h2>Components</h2>
                    </div>
                    <div class="font-light md:font-normal text-[12px] lg:text-[16px]">
                        <p class="font-[300]">Knowledge products by thematic areas from the research initiatives and various activities of SEARCA and its partners</p>
                    </div>
                </div>
                <div class="flex flex-wrap lg:flex-nowrap flex-col sm:flex-row justify-center items-start gap-[20px]">
                    <?php 
                    $components = new WP_Query(array(
                        'post_type' => 'component',
                        'posts_per_page' => 10,
                    ));

                    if ($components->have_posts()) {
                        while ($components->have_posts()) {
                            $components->the_post();

                            $logo_url = get_field('component_logo');
                            $card_color = get_field('component_color');
                            $aspiring_outcome = get_field('aspirational_outcome');
                    ?>
                    <!-- Card HTML -->
                    <div class="hidden sm:block h-[435px]">
                        <div style="background-color: <?php echo esc_attr($card_color); ?>" class="z-10 rounded-xl relative flex flex-col justify-between p-[20px] pb-[40px] h-[100%]">
                            <div class="flex flex-col">
                                <div class="flex justify-center z-10">
                                    <div class="rounded-full flex justify-between h-[80px] w-[80px]">
                                        <img class="w-[100%] h-[100%]" src="<?php echo esc_url($logo_url); ?>" alt="<?php the_title(); ?> logo">
                                    </div>
                                </div>
                                <div class="flex flex-col gap-[20px] items-center text-center w-[150px] xl:w-[200px] mx-auto">
                                    <div class="text-[12px] xl:text-[18px] font-bold pt-[10px] text-[#ffffff]">
                                        <h4><?php the_title(); ?></h4>
                                    </div>
                                    <div class="pt-[10px] font-extralight text-[10px] xl:text-[14px] text-[#ffffff]">
                                        <?php echo $aspiring_outcome; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-center text-white">
                                <a href="<?php echo get_permalink(get_the_ID()); ?>" class="rounded-lg border border-[1px] xl:border-2 border-white px-[10px] xl:px-[20px] py-[5px] xl:py-[10px] text-[12px] xl:text-[14px]">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <?php 
                        } 
                    } else {
                        echo '<p>No posts found.</p>';
                    } 
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
?>
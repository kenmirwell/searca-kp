<?php
    add_shortcode('hero_banner_shortcode', 'hero_banner_shortcode_fn');
        
    function hero_banner_shortcode_fn() {
        ob_start();

        
        $home_banner = new WP_Query(array(
            'post_type' => 'home-banner',
            'posts_per_page' => 10,
        ));
        ?>
        
        <div class="bg-[#196129]">
            <div class="banner-slider">
                <?php if ($home_banner->have_posts()) : ?>
                    <?php while ($home_banner->have_posts()) : $home_banner->the_post(); ?>
                        <?php 
                            $banner_alignment = get_field('banner_alignment');
                            $thumbnail_url = has_post_thumbnail() ? get_the_post_thumbnail_url() : '';
                        ?>
                        <div class="slide-container">
                            <?php if ($thumbnail_url && $banner_alignment !== 'center-align') : ?>
                                <div class="<?php echo esc_attr($banner_alignment); ?> slide-content w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto relative">
                                    <div class="w-[100%] lg:w-[50%] text-container">
                                        <h1><?php the_title(); ?></h1>
                                        <div class="tracking-wide leading-relaxed">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                    <div class="w-[100%] lg:w-[50%] image-container">
                                        <div class="h-[200px] md:h-[320px] lg:h-[450px] rounded-lg overflow-hidden">
                                            <img class="w-full h-full object-cover" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>">
                                        </div>
                                    </div>
                                </div>
                            <?php elseif (!$thumbnail_url) : ?>
                                <div class="center-align slide-content h-[100%] w-[100%] relative">
                                    <div class="text-container w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto text-center z-[2]">
                                        <h1><?php the_title(); ?></h1>
                                        <div class="tracking-wide leading-relaxed">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="center-align slide-content h-[100%] w-[100%] relative">
                                    <div class="text-container w-[80%] sm:w-[640px] md:w-[768px] mx-auto text-center z-[2]">
                                        <h1><?php the_title(); ?></h1>
                                        <div class="tracking-wide leading-relaxed">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                    <div class="bg-black opacity-50 w-[100%] h-[100%] absolute top-0 left-0 z-[1]"></div>
                                    <img class="absolute w-full h-full object-cover" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>">
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <p>No banners found.</p>
                <?php endif; ?>
            </div>
        </div>
        
        <?php
        return ob_get_clean();
    }
?>
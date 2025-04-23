<?php 
    get_header();

    while (have_posts()) {
        the_post();
?>
    <div>
        <?php get_template_part("includes/section/common-hero"); ?>
        <div class="bg-[#ffffff] py-[100px]">
            <div class="flex relative justify-center w-[100%] lg:w-[1024px] xl:w-[1280px] mx-auto h-[100%]">
                <div class="flex w-[100%] h-[100%] py-[20px] z-[1]">
                    <div class="w-[500px] lg:w-[800px] flex justify-center mx-auto relative">
                        <div class="relative w-[600px] lg:w-[800px] h-[600px] mx-auto">
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

                                        $image_url = get_field('map');
                            ?>
                                    <img id="map-<?php the_title(); ?>" class="map-<?php echo $country_index; ?> absolute top-0 left-0 w-[100%] transition-all duration-300 ease-in-out" src="<?php echo esc_url($image_url); ?>" alt="">
                            <?php } }?>
                        </div>
                        <div id="map-container" class="absolute top-0 w-[600px] lg:w-[800px] h-[600px] mx-auto">
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
                                <a href="<?php echo get_permalink(); ?>" 
                                    id="country-<?php the_title(); ?>" 
                                    data-index="<?php echo intval($country_index); ?>" 
                                    class="country-<?php echo $country_index; ?> flex items-center absolute font-[200] transition-all duration-200 ease"
                                >
                                    <div class="flag-icon w-[100%] relative transition-all duration-300 ease-in-out z-[1]">
                                        <img class="absolute top-[11px] right-[10px] w-[40px] z-[2]" src="<?php echo esc_url($flag_url); ?>" alt="">
                                        <div class="z-[2] w-[60px]">
                                            <svg width="auto" height="auto" viewBox="0 0 54 69" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M53.7712 27.7832C53.7712 27.7832 53.7712 28.039 53.7543 28.4825C53.7543 28.5507 53.7543 28.636 53.7543 28.7042C53.7543 28.7895 53.7543 28.8747 53.7543 28.96V29.0112C53.7543 29.0112 53.7543 29.0964 53.7543 29.1306C53.7543 29.1647 53.7543 29.1988 53.7543 29.2329V29.3011C53.7543 29.5399 53.7206 29.7957 53.6868 30.0856C53.6024 31.1942 53.4674 32.3028 53.248 33.3772C51.7628 42.5016 46.4294 51.4213 27.172 68.5444C8.04965 51.5237 2.6488 42.7404 1.12981 33.5307C1.12981 33.4966 1.12981 33.4625 1.11293 33.4113C0.859769 32.1834 0.70787 30.9043 0.623481 29.6081C0.623481 29.4887 0.623481 29.3523 0.606603 29.2329C0.606603 29.1817 0.606603 29.1135 0.606603 29.0623C0.606603 29.0282 0.606603 28.9941 0.606603 28.943C0.606603 28.8747 0.606603 28.8236 0.606603 28.7383C0.606603 28.7042 0.606603 28.653 0.606603 28.6189V28.4654C0.606603 28.4654 0.606603 28.329 0.606603 28.2608C0.606603 27.9538 0.606603 27.7662 0.606603 27.7662C0.471582 12.9113 12.4041 0.853516 27.1214 0.853516C41.8387 0.853516 53.7712 12.9113 53.7712 27.7832Z" fill="white"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <p class="absolute z-[0] text-[14px] font-[500] flex justify-start items-center py-[7px] ml-[30px] rounded-br-full rounded-tr-full  bg-[#ffffff] overflow-hidden transition-all duration-300 ease-in-out"><?php the_title(); ?></p>
                                </a>
                            <?php 
                                } 
                            } 
                            wp_reset_postdata(); // Reset the query
                            ?>
                        </div>
                    </div>
                </div>
                <div class="hidden lg:block absolute w-[100%] top-[-50px] right-0 flex flex-col gap-[20px] text-[#000000] z-[0] w-[500px]">
                    <h2 class="text-display-42 font-bold text-left">Explore South East Asian Counties</h2>
                    <p class="text-left">A dedicated digital space where members can engage in discussions, share research insights, and collaborate on agricultural solutions.</p>
                </div>
            </div>
        </div>
        <div class="bg-[#096936] py-[100px]">
            <?php 
                $qf_desc = get_field('quick_facts_description');
            ?>
            <div class="w-[90%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto">
                <div class="text-[#ffffff] flex flex-col items-center justify-center">
                    <h2 class="text-[42px] font-bold">Southeast Asia’s Agricultural Quick Facts</h2>
                    <h6 class="flex text-[18px] justify-center items-center text-center w-[50%]"><?php echo $qf_desc ?></h6>
                </div>
                <div class="pt-[50px]">
                    <?php if (have_rows('quick_facts')): ?>
                        <div class="flex justify-between">
                            <?php while (have_rows('quick_facts')): the_row(); ?>
                                <div class="flex flex-col text-center justify-center items-center">
                                    <img class="w-[56px] h-[56px]" src="<?php echo esc_url(get_sub_field('fact_icon')); ?>" alt="">
                                    <h6 class="text-[#ceab23] font-bold text-[22px]"><?php the_sub_field('fact_figure'); ?></h6>
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
                <div class="flex flex-row-reverse">
                    <div class="w-[30%] sticky top-[0px] h-[700px] pb-[50px]">
                        <ul class="text-[16px] py-[30px] border-b-[1px]">
                            <?php if (have_rows('topics')): ?>
                                <?php $index = 1; ?>
                                <?php while (have_rows('topics')): the_row(); ?>
                                    <li id="topic-<?php echo $index?>-button" class="py-[10px] px-[20px] cursor-pointer hover:bg-[#cbe0d5]"><?php the_sub_field('topic'); ?></li>
                                <?php $index++ ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="sea-content w-[70%] border-r-[1px] pr-[40px]">
                        <div>
                            <?php if (have_rows('background')): ?>
                                <h2 class="text-[36px] font-bold pb-[20px]">Background</h2>
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
                                    <?php $index = 1; ?>
                                    <?php while (have_rows('topics')): the_row(); ?>
                                        <div id="topic-<?php echo $index; ?>">
                                            <?php if (get_sub_field('topic_image')) : ?>
                                                <div class="relative h-[500px] w-[100%] my-[20px]">
                                                    <img class="absolute top-[0] w-full h-full object-cover z-[1]" src="<?php echo esc_url(get_sub_field('topic_image')); ?>" alt="">
                                                </div>
                                            <?php endif; ?>
                                            <h2 class="text-[#000000] pb-[10px] text-[36px] font-bold"><?php echo $index;?>. <?php the_sub_field('topic'); ?></h2>
                                            <?php if (have_rows('content')): ?>
                                                <div class="content-pertopic flex flex-col gap-[10px]">
                                                    <?php while (have_rows('content')): the_row(); ?>
                                                        <h6 class="text-[#000000] pb-[10px] text-[22px] font-bold"><?php the_sub_field('sub_topic'); ?></h6>
                                            
                                                        <?php the_sub_field('content_editor'); ?>

                                                    <?php endwhile; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <?php $index++ ?>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
    }
    get_footer()
?>


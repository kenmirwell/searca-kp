<?php 
    get_header();

    while (have_posts()) {
        the_post();
?>
    <div>
        <div class="bg-[#196129]">
            <div class="">
                <?php
                    $home_banner = new WP_Query(array(
                        "post_type" => "home-banner",
                        "post_per_page" => 10
                    ));
                ?>
                    <div class="banner-slider">
                    
                    <?php
                        if ($home_banner->have_posts()) {
                            while ($home_banner->have_posts()){
                                $home_banner->the_post();
                                
                                $banner_alignment = get_field("banner_alignment");
                    ?>  
                        <div class="slide-container">
                            <?php
                                if ( has_post_thumbnail() && $banner_alignment !== "center-align" ) {
                                    $thumbnail_url = get_the_post_thumbnail_url();
                            ?>
                            <div class="<?php echo esc_html($banner_alignment); ?> slide-content w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto relative">
                                <div class="w-[100%] lg:w-[50%] text-container">
                                    <div>
                                        <h1><?php the_title() ?></h1>
                                    </div>
                                    <div class="tracking-wide leading-relaxed">
                                        <?php the_content() ?>
                                    </div>
                                </div>
                                <div class="w-[100%] lg:w-[50%] image-container">
                                        <div class="h-[200px] md:h-[320px] lg:h-[450px] rounded-lg overflow-hidden">
                                            <img class="w-full h-full object-cover" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title(); ?>">
                                        </div>
                                </div>
                            </div>
                            <?php
                                } else if(!has_post_thumbnail()) {
                                $thumbnail_url = get_the_post_thumbnail_url();
                            ?>
                                <div class="center-align slide-content h-[100%] w-[100%] relative">
                                    <div class="text-container w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px]] mx-auto text-center z-[2]">
                                        <div>
                                            <h1><?php the_title() ?></h1>
                                        </div>
                                        <div class="tracking-wide leading-relaxed">
                                            <?php the_content() ?>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                } else {
                                $thumbnail_url = get_the_post_thumbnail_url();
                            ?>
                                <div class="center-align slide-content h-[100%] w-[100%] relative">
                                    <div class="text-container w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto text-center z-[2]">
                                        <div>
                                            <h1><?php the_title() ?></h1>
                                        </div>
                                        <div class="tracking-wide leading-relaxed">
                                            <?php the_content() ?>
                                        </div>
                                    </div>
                                    <div class="bg-black opacity-50 w-[100%] h-[100%] absolute top-0 left-0 z-[1]"></div>
                                    <img class="absolute w-full h-full object-cover" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title(); ?>">
                                </div>
                            <?php   }
                            ?>
                        </div>

                    <?php }}?>
                </div>
            </div>
        </div>
        <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[10px]">
            <div class="pb-[20px] md:pb-[40px]">
                <div class="text-[22px] lg:text-[32px]">
                    <h2>Thematic Areas</h2>
                </div>
                <div class="font-light md:font-normal text-[12px] lg:text-[16px]">
                    <p>Knowledge products by thematic areas from the research initiatives and various activities of SEARCA and its partners</p>
                </div>
            </div>
            <div class="flex flex-wrap lg:flex-nowrap flex-col sm:flex-row justify-center lg:justify-between items-center gap-[20px]">
                <?php 
                    $thematic_areas = new WP_Query(array(
                        "post_type" => "thematic-area",
                        "post_per_page" => 10
                    ));

                    if ($thematic_areas->have_posts()) {
                        while ($thematic_areas->have_posts()){
                            $thematic_areas->the_post();

                            $logo_url = get_field("thematic_logo");

                            $card_color = get_field("thematic_color")
                ?>
                <div class="hidden sm:block w-[200px] lg:w-[330px] h-[300px] xl:h-[500px] mb-[100px]">
                    <div class="h-[65%] xl:h-[50%] overflow-hidden rounded-t-xl relative bg-[#ffffff]">
                        <div class="bg-black opacity-10 w-[100%] h-[100%] absolute top-0 left-0"></div>
                        <div class="w-[100%] h-[100%] absolute top-0 left-0">
                            <?php
                                if ( has_post_thumbnail() ) {
                                    $thumbnail_url = get_the_post_thumbnail_url();
                            ?>
                                <img class="w-full h-full object-cover" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title(); ?>">
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <div style="background-color: <?php echo esc_attr($card_color); ?>" class="rounded-b-xl z-10 rounded-tr-[60px] xl:rounded-tr-[80px] h-[300px] xl:h-[400px] mt-[-80px] relative flex flex-col justify-between">
                        <div class="flex flex-col">
                            <div class="flex justify-center z-10 mt-[-30px]">
                                <div class="rounded-full flex justify-between h-[80px] w-[80px]">
                                    <img class="w-[100%] h-[100%]" src="<?php echo esc_url($logo_url); ?>" alt="<?php the_title(); ?> logo">
                                </div>
                            </div>
                            <div class="flex flex-col gap-[20px] items-center text-center w-[150px] xl:w-[200px] mx-auto">
                                <div class="text-[12px] xl:text-[18px] font-bold pt-[10px] text-[#ffffff]">
                                    <h4><?php the_title()?></h4>
                                </div>
                                <div class="pt-[10px] font-extralight text-[10px] xl:text-[14px] text-[#ffffff]">
                                    <?php the_content()?>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center mb-[50px] text-white">
                            <a href="<?php echo get_permalink(get_the_ID()) ?>" class="rounded-lg border border-[1px] xl:border-2 border-white px-[10px] xl:px-[20px] py-[5px] xl:py-[10px] text-[12px] xl:text-[14px]">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="block sm:hidden w-[100%]">
                    <div style="background-color: <?php echo esc_attr($card_color); ?>" class="w-[100%] pb-[15px] pt-[10px] rounded-lg">
                        <div class="flex flex-col">
                            <div class="flex justify-between gap-[25px] pr-[17px] pl-[5px]">
                                <div class="flex">
                                    <div class="flex justify-center">
                                        <div class="rounded-full flex justify-between h-[80px] w-[80px]">
                                            <img class="w-[100%] h-[100%]" src="<?php echo esc_url($logo_url); ?>" alt="<?php the_title(); ?> logo">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="text-[12px] font-bold pt-[10px] text-[#ffffff]">
                                            <h4><?php the_title()?></h4>
                                        </div>
                                        <div class="pt-[5px] font-extralight text-[10px] text-[#ffffff]">
                                            <?php the_content()?>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center text-white">
                                    <a href="<?php echo get_permalink(get_the_ID()) ?>" class="">
                                        <svg width="10" height="24" viewBox="0 0 14 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="1.41406" width="17" height="2" rx="1" transform="rotate(45 1.41406 0)" fill="#ffffff"/>
                                            <rect x="13.4355" y="12.4141" width="17" height="2" rx="1" transform="rotate(135 13.4355 12.4141)" fill="#ffffff"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } } ?>
            </div>
        </div>
    </div>
<?php 
    }
    get_footer();
?>

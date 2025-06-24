<div class="flex relative">
    <div class="w-[50%] bg-[#096936]">
        <div class="flex flex-col w-[60%] mx-auto">
            <div class="text-[#ffffff] w-[100%] text-display-24 md:text-display-42 font-bold">
                <h2>Country Agri Profile</br> Across Southeast Asia</h2>
            </div>
            <div class="flex flex-col gap-[20px] pt-[20px]">
                <div class="text-[#ffffff] w-[100%] font-light md:font-normal text-[12px] lg:text-[16px]">
                    <p class="font-[300]">Explore key agricultural data, policy trends, and national strategies across all 11 Southeast Asian countries. These profiles offer a snapshot of progress, priorities, and opportunities for collaboration.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="w-[50%] mx-auto">
        <div class="flex w-[100%] h-[100%] py-[20px] z-[1]">
            <div class="w-[600px] lg:w-[800px] flex justify-center mx-auto relative">
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
    </div>
</div>
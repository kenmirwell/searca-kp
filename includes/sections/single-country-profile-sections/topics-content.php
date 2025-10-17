<?php 
    $content_repeater = get_field("country_content");
?>
<div class="py-[100px]">
    <div class="flex flex-col md:flex-row sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[90%] 2xl:w-[1280px] mx-auto gap-[20px]">
        <div class="w-[100%] md:w-[70%]">
            <?php get_template_part("includes/sections/single-country-profile-sections/quick-facts"); ?>
            <?php if (!empty($content_repeater)) : ?>
                <?php foreach ($content_repeater as $index => $topic) : ?>
                    <div class="country-topic-content bg-[#ffffff] py-[50px]" data-index="<?php echo $index ?>">
                        <div class="w-100%]">
                            <div class="flex flex-col gap-[20px]">
                                <div class="text-[#000000] flex flex-col">
                                    <h2 class="text-display-24 lg:text-display-42 font-bold text-left"><?php echo esc_html($topic["topic_title"]); ?></h2>
                                    <?php if(!empty($topic["topic_description"])) : ?>
                                        <div class="relative pt-[10px] single-country-content"><?php echo wp_kses_post($topic["topic_description"]); ?></div>
                                    <?php endif; ?>
                                </div>
                                
                                <!-- Loop sub_topics (nested repeater) -->
                                <?php if (!empty($topic["sub_topics"])) : ?>
                                    <div class="nested-sub-topics flex flex-col gap-[10px]">
                                        <?php foreach ($topic["sub_topics"] as $subtopic) : ?>
                                            <div class="text-[#000000] flex flex-col">
                                                <h6 class="text-display-18 lg:text-display-24 font-bold w-[40%] mr-auto text-left"><?php echo esc_html($subtopic["sub_topics_title"]); ?></h6>
                                                <div class="relative pt-[10px] single-country-subcontent"><?php echo wp_kses_post($subtopic["sub_topics_content"]); ?></div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <!-- End sub_topics -->
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="w-[100%] md:w-[30%] sticky top-[0px] h-[700px]">
            <?php if(get_field("country_downloadable_file")) : ?>
                <div class="p-[20px] shadow-lg rounded">
                    <div class="flex gap-[20px] p-[10px] bg-[#FAFAFA] items-center">
                        <svg width="35" height="44" viewBox="0 0 35 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 2.60033C0 1.65218 0.766555 0.883545 1.71215 0.883545H24.6473C25.0974 0.883545 25.5294 1.06126 25.8498 1.37824L33.7333 9.17739C34.0594 9.49999 34.243 9.94016 34.243 10.3995V41.3998C34.243 42.3479 33.4764 43.1166 32.5308 43.1166H1.71215C0.766556 43.1166 0 42.3479 0 41.3998V2.60033Z" fill="#FF4B42"/>
                            <path d="M0 29.7256H34.243V41.1165C34.243 42.2211 33.3475 43.1165 32.243 43.1165H2C0.89543 43.1165 0 42.2211 0 41.1165V29.7256Z" fill="#E01C12"/>
                            <path d="M14.8357 8.29243C14.9351 6.49096 17.1549 6.27165 17.7347 8.29243C18.1986 9.90905 17.4527 12.5063 16.9778 14.3608C17.4527 15.4513 19.004 17.472 19.9285 18.3649C23.0155 17.895 24.755 17.9474 25.8989 18.4903C27.4502 19.2265 27.1212 21.0379 25.6168 21.1846C24.3319 21.3099 22.4357 21.1846 19.7405 18.9445C19.0405 19.0385 16.9543 19.4427 14.4596 20.3074C13.5038 21.8425 12.1718 23.9422 11.0435 24.8502C9.19442 26.3383 7.79978 25.8527 7.40803 25.0382C6.87525 23.597 9.03772 22.2498 12.9709 20.3074C13.5925 19.075 15.0269 15.9933 15.7916 13.5245C15.4573 12.7256 14.7104 10.5638 14.8357 8.29243ZM12.4382 21.1533C7.07895 23.4651 7.3297 25.0225 8.3326 25.1792C9.33549 25.3358 10.5734 24.0669 12.4382 21.1533ZM25.5542 19.7748C25.4915 18.3023 23.235 18.3022 20.289 18.8035C23.7207 21.2472 25.5542 20.8087 25.5542 19.7748ZM16.7161 14.95C15.8888 17.3937 15.0864 19.1116 14.7887 19.6651C17.0201 18.9759 18.7898 18.6051 19.3958 18.5059C18.1547 17.1023 17.0922 15.5504 16.7161 14.95ZM16.0736 12.7412C17.3743 8.59005 16.9355 7.2742 15.9483 7.41517C14.9141 7.58748 15.0551 10.5325 16.0736 12.7412Z" fill="white"/>
                            <path d="M22.092 32.9929V39.3397H20.8965V32.9929H22.092ZM24.6438 35.7348V36.6807H21.779V35.7348H24.6438ZM24.9786 32.9929V33.9388H21.779V32.9929H24.9786Z" fill="white"/>
                            <path d="M16.9887 39.3397H15.6237L15.6324 38.3981H16.9887C17.3568 38.3981 17.6654 38.3168 17.9147 38.154C18.1639 37.9884 18.3523 37.7515 18.4798 37.4435C18.6073 37.1325 18.6711 36.7606 18.6711 36.3276V36.0007C18.6711 35.6665 18.6349 35.3715 18.5624 35.1158C18.49 34.86 18.3827 34.645 18.2407 34.4706C18.1016 34.2963 17.9292 34.164 17.7234 34.074C17.5176 33.9839 17.2814 33.9388 17.0148 33.9388H15.5976V32.9929H17.0148C17.4379 32.9929 17.8234 33.0641 18.1712 33.2065C18.5218 33.3489 18.8247 33.5538 19.0797 33.8211C19.3377 34.0856 19.5348 34.4023 19.671 34.7714C19.8101 35.1405 19.8796 35.5531 19.8796 36.0094V36.3276C19.8796 36.7809 19.8101 37.1936 19.671 37.5655C19.5348 37.9346 19.3377 38.2514 19.0797 38.5158C18.8247 38.7803 18.5204 38.9837 18.1668 39.1261C17.8132 39.2685 17.4205 39.3397 16.9887 39.3397ZM16.2932 32.9929V39.3397H15.0977V32.9929H16.2932Z" fill="white"/>
                            <path d="M11.8192 37.025H10.189V36.0835H11.8192C12.0859 36.0835 12.3018 36.0399 12.467 35.9527C12.6351 35.8626 12.7582 35.7406 12.8365 35.5865C12.9147 35.4296 12.9539 35.2509 12.9539 35.0504C12.9539 34.8557 12.9147 34.6741 12.8365 34.5055C12.7582 34.337 12.6351 34.2004 12.467 34.0958C12.3018 33.9911 12.0859 33.9388 11.8192 33.9388H10.5803V39.3397H9.38477V32.9929H11.8192C12.3119 32.9929 12.7322 33.0816 13.0799 33.2588C13.4306 33.4332 13.6972 33.6758 13.8798 33.9868C14.0653 34.2948 14.1581 34.6464 14.1581 35.0417C14.1581 35.4514 14.0653 35.8045 13.8798 36.1009C13.6972 36.3973 13.4306 36.6254 13.0799 36.7853C12.7322 36.9451 12.3119 37.025 11.8192 37.025Z" fill="white"/>
                        </svg>
                        <div class="px-[20px] py-[5px]">
                            <a href="<?php echo get_field("country_downloadable_file")?>">Download Country Profile</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="py-[30px] shadow-lg rounded-lg">
                <div class="px-[20px] py-[5px] font-bold">
                    <p>South East Asia Countries</p>
                </div>
                <div class="flex flex-col pt-[20px]">
                    <?php 
                        $countries = new WP_Query(array(
                            "post_type"         => "country-profile",
                            "posts_per_page"    => 11,
                            'orderby'           => 'title',  // <-- important
                            'order'             => 'ASC',
                        ));

                        if ($countries->have_posts()) {
                            while ($countries->have_posts()) {
                                $countries->the_post();
                                $post_id = get_the_ID();
                                $is_active = $post_id === get_queried_object_id();

                                $active_class = $is_active 
                                    ? 'bg-[#096936] text-white font-semibold group'
                                    : 'hover:bg-[#096936] hover:text-white group';

                                $flag_url = get_field('flag');
                    ?>
                        <a href="<?php echo get_permalink(); ?>" class="flex items-center justify-between px-[20px] py-[10px] <?php echo $active_class; ?>">
                            <h6><?php echo get_the_title(); ?></h6>
                            <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="stroke-black group-hover:stroke-white <?php echo $is_active ? 'stroke-white' : ''; ?>">
                                <path d="M1.16732 7.50016L15.834 7.50016M15.834 7.50016L9.41732 1.0835M15.834 7.50016L9.41732 13.9168" 
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    <?php 
                            } 
                        } 
                        wp_reset_postdata(); 
                    ?>
                </div>
            </div>
        </div>   
    </div>
</div>
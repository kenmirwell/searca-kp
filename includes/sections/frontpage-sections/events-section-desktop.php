<style>
#event-swiper {
    width: 100%;
    height: 350px;
    overflow: hidden;
}

#event-swiper .swiper-slide {
    height: 100%;
    border-radius: 1.5rem;
    overflow: hidden;
}

#event-swiper .swiper-pagination {
    bottom: 0px !important; 
    display: none;
}

#event-swiper .swiper-pagination-bullet {
    background: #ffffff;
    opacity: 0.5;
}

#event-swiper .swiper-pagination-bullet-active {
    opacity: 1;
    background: #2196f3;
}

#event-swiper .swiper-button-next {
    width: 44px;
    height: 44px;
    background-color: #ffffff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    transition: background-color 0.2s ease, box-shadow 0.2s ease;
    padding: 12px;
}

#event-swiper .swiper-button-next:hover {
    background-color: #f5f5f5;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

#event-swiper .swiper-button-next::after {
    content: '';
}
</style>

<?php
$event_query = new WP_Query([
    'post_type'      => 'event',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
]);

if ($event_query->have_posts()) : ?>

    <div class="py-[50px]">
        <div class="relative w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
            <div class="flex flex-col gap-[20px] pb-[60px] items-center">
                <h2 class="font-semibold text-display-42">Upcoming Events</h2>
                <p>Explore the three main pillars that power evidence-based agricultural policy and innovation.</p>
            </div>
            <div class="swiper" id="event-swiper">
                <div class="swiper-wrapper">
                    <?php while ($event_query->have_posts()) : $event_query->the_post(); ?>

                        <?php
                            $title      = get_the_title();
                            $content    = get_the_content();
                            $location   = get_field('event_location');
                            $link       = get_permalink();
                            $thumbnail  = get_field('event_thumbnail');
                            $event_schedule = get_field('event_schedule');

                            $start_time = $event_schedule['event_start_time'] ?? '';
                            $end_time   = $event_schedule['event_end_time'] ?? '';
                            $date_from = $event_schedule['event_date_from'] ?? '';
                            $date_to   = $event_schedule['event_date_to'] ?? '';

                            $formatted_range = '';
                            if ($date_from && $date_to) {
                                $from = DateTime::createFromFormat('F j, Y', $date_from);
                                $to   = DateTime::createFromFormat('F j, Y', $date_to);

                                if ($from && $to) {
                                    $formatted_range = $from->format('j') . ' - ' . $to->format('j F Y');
                                }
                            }
                        ?>

                        <div class="swiper-slide bg-[#EBF2EC]">
                            <div class="w-full h-full event-card">

                                <div class="flex h-full text-[#000000]">
                                    <?php if ($thumbnail) : ?>
                                        <div class="w-[40%] h-full">
                                            <img src="<?php echo esc_url($thumbnail); ?>" 
                                                alt="<?php echo esc_attr($title); ?>" 
                                                class="w-full h-full object-cover"
                                            >
                                        </div>
                                    <?php endif; ?>

                                    <div class="flex flex-col justify-center w-[60%]">
                                        <div class="flex flex-col gap-[10px] pl-[40px] pr-[20px] py-[20px] ">
                                            <div class="flex gap-[20px] items-center">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 2V5" stroke="#008C67" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M16 2V5" stroke="#008C67" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M3.5 9.08984H20.5" stroke="#008C67" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z" stroke="#008C67" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M15.6937 13.7002H15.7027" stroke="#008C67" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M15.6937 16.7002H15.7027" stroke="#008C67" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M11.9945 13.7002H12.0035" stroke="#008C67" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M11.9945 16.7002H12.0035" stroke="#008C67" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M8.29529 13.7002H8.30427" stroke="#008C67" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M8.29529 16.7002H8.30427" stroke="#008C67" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>

                                                <div class="flex gap-[5px]">
                                                    <div class="text-display-16 font-light text-[#008C67]">
                                                        <?php echo esc_html($formatted_range); ?>
                                                    </div>
                                                    <div class="flex gap-[5px] text-[#008C67] items-center text-display-16 font-light">
                                                        <?php echo esc_html($start_time); ?>
                                                        <span>-</span>
                                                        <?php echo esc_html($end_time); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <h3 class="text-display-24 font-semibold"><?php echo esc_html($title); ?></h3>

                                            <div class="flex gap-[20px]">
                                                <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3.06943 3.01343C4.55975 1.55292 6.56623 0.739562 8.65286 0.750101C10.7395 0.76064 12.7377 1.59423 14.2131 3.06971C15.6886 4.5452 16.5222 6.54337 16.5328 8.63C16.5433 10.7166 15.7299 12.7231 14.2694 14.2134L10.0834 18.3994C9.70837 18.7744 9.19976 18.985 8.66943 18.985C8.1391 18.985 7.63048 18.7744 7.25543 18.3994L3.06943 14.2134C1.58432 12.7282 0.75 10.7138 0.75 8.61343C0.75 6.51306 1.58432 4.4987 3.06943 3.01343Z" stroke="#008C67" stroke-width="1.5" stroke-linejoin="round"/>
                                                    <path d="M8.66797 11.6133C10.3248 11.6133 11.668 10.2701 11.668 8.61328C11.668 6.95643 10.3248 5.61328 8.66797 5.61328C7.01111 5.61328 5.66797 6.95643 5.66797 8.61328C5.66797 10.2701 7.01111 11.6133 8.66797 11.6133Z" stroke="#008C67" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                <p class="text-display-16 text-[#008C67] font-light"><?php echo esc_html($location); ?></p>
                                            </div>

                                            <div class="excerpt text-display-16 font-light">
                                                <?php echo wp_trim_words($content, 20); ?>
                                            </div>
                                            
                                            <a href="<?php echo esc_url($link); ?>" class="group cursor-pointer w-fit block">
                                                <div class="flex items-center gap-[20px] py-[5px] pl-[20px] pr-[5px] bg-[#008c67] group-hover:bg-[#B59637] transition-all duration-200 ease rounded-full">  
                                                <p class="w-max text-white font-semibold text-display-14">View Event</p>
                                                <div class="bg-[#B59637] group-hover:bg-[#008c67] rounded-full p-[15px] transition-all duration-200 ease">
                                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2.10042 21.8995L21.8994 2.10051M21.8994 2.10051H2.10042M21.8994 2.10051V21.8995" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    <?php endwhile; ?>
                </div>

                <div class="swiper-pagination"></div>
                <div class="swiper-button-next">
                    <svg width="14" height="10" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 7H17M11 13L17 7L11 1" stroke="#B59637" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

<?php else : ?>
    <p>No events found.</p>
<?php endif;

wp_reset_postdata();
?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var eventSwiper = new Swiper('#event-swiper', {
        loop: true,
        slidesPerView: 1.1,
        spaceBetween: 12,
        centeredSlides: false,
        pagination: {
            el: '#event-swiper .swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '#event-swiper .swiper-button-next',
        },
    });
});
</script>
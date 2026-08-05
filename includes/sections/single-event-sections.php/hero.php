<div class="pb-[50px] pt-[100px]">
    <?php
        $event_location = get_field("event_location");
        $event_schedule =  get_field("event_schedule");

        $event_date_from = $event_schedule['event_date_from'] ?? '';
        $event_date_to   = $event_schedule['event_date_to'] ?? '';

        $date_range = '';

        if ($event_date_from && $event_date_to) {
            $from = DateTime::createFromFormat('F j, Y', $event_date_from);
            $to   = DateTime::createFromFormat('F j, Y', $event_date_to);

            if ($from && $to) {
                if ($from->format('Y') !== $to->format('Y')) {
                    $date_range = $from->format('j F Y') . ' - ' . $to->format('j F Y');
                } elseif ($from->format('m') !== $to->format('m')) {
                    $date_range = $from->format('j F') . ' - ' . $to->format('j F Y');
                } else {
                    $date_range = $from->format('j') . ' - ' . $to->format('j F Y');
                }
            }
        }
    ?>
    <div class="relative w-[90%] lg:w-[1104px] xl:w-[1360px] mx-auto rounded-3xl shadow overflow-hidden">
        <div class="flex space-between gap-[30px] items-end slide-content h-full w-full relative y-thumbnail">
            <div class="z-[2] px-[20px] md:px-[40px] py-[50px] md:py-[100px]">
                <div class="flex flex-col items-left gap-[20px] text-container ml-[0px] mr-auto w-[90%] lg:w-[980px]">
                    <div class="flex gap-[5px] text-[#ffffff] text-[14px] font-extralight mb-[10px]">
                        <div class="flex gap-[10px] items-center py-[10px] px-[15px] rounded-full border-[1px] border-[#EBEBEB82]">
                            <div class="h-[10px] w-[10px] bg-[#F7D671] rounded-full"></div>
                            <a href="/" class="text-display-14">Home</a>
                            <svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.650391 0.650025L4.32492 4.35457C4.75888 4.79207 4.75888 5.50798 4.32492 5.94548L0.650391 9.65002" stroke="white" stroke-width="1.3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <a href="https://knowledgeplatform.searca.org/events/" class="text-display-14">Events</a>
                            <svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.650391 0.650025L4.32492 4.35457C4.75888 4.79207 4.75888 5.50798 4.32492 5.94548L0.650391 9.65002" stroke="white" stroke-width="1.3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                            <?php
                                $breadcrumb_full = get_field('bread_crumb');
                                $breadcrumb_short = mb_strimwidth($breadcrumb_full, 0, 25, '...');
                            ?>
                            <a class="text-display-14">
                                <span class="xl:hidden"><?php echo esc_html($breadcrumb_short); ?></span>
                                <span class="hidden xl:inline"><?php echo esc_html($breadcrumb_full); ?></span>
                            </a>
                        </div>
                    </div>
                    <div class="items-end">
                        <h1 class="font-semibold text-display-24 md:text-display-32 lg:text-display-55 text-[#ffffff]"><?php the_title(); ?></h1>
                    </div>
                    <div class="w-[90%] md:w-[400px] border-[1px] bg-[#ffffff] my-[20px] ">

                    </div>
                    <div class="flex flex-col gap-[20px] text-display-14 md:text-display-18">
                        <div class="flex gap-[5px] text-display-16 text-[#ffffff] items-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 2V5" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16 2V5" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M3.5 9.08997H20.5" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15.6947 13.7H15.7037" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15.6947 16.7H15.7037" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M11.9955 13.7H12.0045" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M11.9955 16.7H12.0045" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8.29431 13.7H8.30329" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8.29431 16.7H8.30329" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <?php if ($date_range) : ?>
                                <span><?php echo esc_html($date_range); ?></span>
                            <?php endif; ?>
                        </div>

                        <?php if( $event_location) : ?>
                            <div class="flex gap-[10px] items-center">
                                <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.06943 3.01343C4.55975 1.55292 6.56623 0.739562 8.65286 0.750101C10.7395 0.76064 12.7377 1.59423 14.2131 3.06971C15.6886 4.5452 16.5222 6.54337 16.5328 8.63C16.5433 10.7166 15.7299 12.7231 14.2694 14.2134L10.0834 18.3994C9.70837 18.7744 9.19976 18.985 8.66943 18.985C8.1391 18.985 7.63048 18.7744 7.25543 18.3994L3.06943 14.2134C1.58432 12.7282 0.75 10.7138 0.75 8.61343C0.75 6.51306 1.58432 4.4987 3.06943 3.01343Z" stroke="white" stroke-width="1.5" stroke-linejoin="round"/>
                                    <path d="M8.66797 11.6135C10.3248 11.6135 11.668 10.2704 11.668 8.61352C11.668 6.95667 10.3248 5.61353 8.66797 5.61353C7.01111 5.61353 5.66797 6.95667 5.66797 8.61352C5.66797 10.2704 7.01111 11.6135 8.66797 11.6135Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <p class="text-display-16 text-[#ffffff]"><?php echo $event_location; ?></p>
                            </div>
                        <?php  endif;?>
                    </div>
                    <a href="<?php echo esc_url(get_sub_field('hero_banner_button')); ?>" class="w-auto cursor-pointer group">
                        <div class="items-center w-max flex gap-[20px] py-[5px] pl-[20px] pr-[5px] bg-[#B59637] group-hover:bg-[#008c67] transition-all duration-200 ease rounded-full">
                            <p class="w-max p-[0px] text-[#ffffff]">View Event Details</p>
                            <div class="h-max bg-[#008c67] group-hover:bg-[#ceab23] rounded-full p-[15px] transition-all duration-200 ease">
                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.10042 21.8995L21.8994 2.10051M21.8994 2.10051H2.10042M21.8994 2.10051V21.8995" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="bg-[rgba(0,140,103,0.8)] w-full h-full absolute top-0 left-0 z-[1]"></div>
        <img class="absolute w-full h-full object-cover top-[0]" src="<?php echo get_field('event_thumbnail'); ?>" alt="<?php echo get_sub_field('event_thumbnail'); ?>">
    </div>
</div>



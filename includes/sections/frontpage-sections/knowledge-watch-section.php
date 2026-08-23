<style>
#knowledge-watch-swiper {
    width: 100%;
    height: 670px;
}

#knowledge-watch-swiper .swiper-slide {
    width: 100%;
    height: 100%;
}

#knowledge-watch-swiper .swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

#knowledge-watch-swiper .swiper-button-prev,
#knowledge-watch-swiper .swiper-button-next {
    width: 35px;
    height: 35px;
    background-color: rgba(255, 255, 255, 0.2);
    border: 1.5px solid #E5E5E5;
    border-radius: 50%;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    transition: background-color 0.2s ease, box-shadow 0.2s ease;
}

/* Add this block — repositions arrows to bottom on mobile/tablet */
@media (max-width: 767px) {
    #knowledge-watch-swiper .swiper-button-prev,
    #knowledge-watch-swiper .swiper-button-next {
        top: auto;
        bottom: 125px;
    }

    #knowledge-watch-swiper .swiper-button-prev {
        left: unset !important;
        right: 60px !important; /* sits just left of the next button, no change to next's own right: 20px rule */
    }

    #knowledge-watch-swiper {
        height: 820px
    }
}

#knowledge-watch-swiper .swiper-button-prev:hover,
#knowledge-watch-swiper .swiper-button-next:hover {
    background-color: #EDEDED;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

#knowledge-watch-swiper .swiper-button-prev::after,
#knowledge-watch-swiper .swiper-button-next::after {
    content: '';
}

#knowledge-watch-swiper .swiper-button-prev::before,
#knowledge-watch-swiper .swiper-button-next::before {
    content: '';
    width: 10px;
    height: 10px;
    border-right: 2px solid #ffffff;
    border-bottom: 2px solid #ffffff;
    display: block;
}

#knowledge-watch-swiper .swiper-button-next::before {
    transform: rotate(-45deg);
    margin-left: -4px;
}

#knowledge-watch-swiper .swiper-button-prev::before {
    transform: rotate(135deg);
    margin-left: 4px;
}

#knowledge-watch-swiper .swiper-button-prev {
    left: 20px;
}

#knowledge-watch-swiper .swiper-button-next {
    right: 20px;
}
</style>

<?php
$kw_swiper_query = new WP_Query([
    'post_type'      => 'knowledge-watch', // confirm this matches your registered CPT slug
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
]);

if ($kw_swiper_query->have_posts()) :
?>

<div id="knowledge-watch-swiper" class="swiper">
    <div class="swiper-wrapper">

        <?php while ($kw_swiper_query->have_posts()) : $kw_swiper_query->the_post(); ?>

            <?php

                $slide_title = get_the_title();
                $slide_link  = get_permalink();
                $thumbnail_url = get_field('hero_image');

                
            ?>

            <div class="swiper-slide relative">
                <?php if ($thumbnail_url) : ?>
                    <img src="<?php echo esc_url($thumbnail_url); ?>" 
                        alt="<?php echo esc_attr($slide_title); ?>" 
                        class="absolute inset-0 w-full h-full object-cover z-0">
                    <div class="absolute inset-0 bg-black/40 z-[1]"></div>
                <?php endif; ?>

                <div class="relative z-[2] h-full flex justify-center items-center text-white ">
                    <div class="flex flex-col gap-[20px] w-[80%] xl:w-[1280px] mx-auto">
                        <div class="w-[100%] xl:w-[50%] flex flex-col gap-[20px]">
                            <h6 class="text-display-14 font-semibold">KNOWLEDGE WATCH</h6>
                            <p class="text-display-14 font-light">Discover biweekly briefs that synthesize trusted research, policy developments, and emerging trends across agriculture, forestry, and natural resources in Southeast Asia helping decision-makers stay informed with clear, evidence-based insights.</p>
                        </div>
                        <div class="w-[100%] xl:w-[60%]">
                            <h2 class="text-display-24 md:text-display-32 font-semibold">
                                <?php echo esc_html($slide_title); ?>
                            </h2>
                        </div>
                        <div class="w-[100%] xl:w-[60%] flex flex-col gap-[20px]">
                            <div class="w-[200px] h-[0.5px] bg-[#ffffff] border-black/20"></div>
                            <?php if (have_rows('description_repeater')) : ?>
                                <?php while (have_rows('description_repeater')) : the_row(); ?>
                                        <div>
                                            <p class="font-light text-display-14"><?php echo esc_html(get_sub_field('description')); ?></p>
                                        </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                            <a class="flex gap-[20px] text-display-14 font-semibold" href="<?php echo esc_url($slide_link); ?>">
                                READ FULL STORY 
                                <svg width="23" height="15" viewBox="0 0 23 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.5 14.3535L21.5 7.35352L14.5 0.353516M21.5 7.35352H0" stroke="white"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>

    </div>

    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>

<?php
wp_reset_postdata();
endif;
?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const knowledgeWatchSwiper = new Swiper('#knowledge-watch-swiper', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 0,
        navigation: {
            nextEl: '#knowledge-watch-swiper .swiper-button-next',
            prevEl: '#knowledge-watch-swiper .swiper-button-prev',
        },
    });
});
</script>
<style>
#knowledge-watch-swiper {
    width: 100%;
    height: 670px; /* adjust to your needs */
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

/* Custom circular arrow buttons */
#knowledge-watch-swiper .swiper-button-prev,
#knowledge-watch-swiper .swiper-button-next {
    width: 30px;
    height: 30px;
    background-color: rgba(255, 255, 255, 0.5);
    border: 1.5px solid #E5E5E5;
    border-radius: 50%;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    transition: background-color 0.2s ease, box-shadow 0.2s ease;
}

#knowledge-watch-swiper .swiper-button-prev:hover,
#knowledge-watch-swiper .swiper-button-next:hover {
    background-color: #EDEDED;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

/* Remove Swiper's default arrow font/icon */
#knowledge-watch-swiper .swiper-button-prev::after,
#knowledge-watch-swiper .swiper-button-next::after {
    content: '';
}

/* Custom chevron drawn with borders, rotated */
#knowledge-watch-swiper .swiper-button-prev::before,
#knowledge-watch-swiper .swiper-button-next::before {
    content: '';
    width: 12px;
    height: 12px;
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

<div id="knowledge-watch-swiper" class="swiper">
    <div class="swiper-wrapper">

        <div class="swiper-slide relative">
            <img src="https://knowledgeplatform.searca.org/wp-content/uploads/2026/08/Frame-2147230797.png" 
                 alt="AFNR Regional Scan 2026" 
                 class="absolute inset-0 w-full h-full object-cover z-0">
            <!-- <div class="absolute inset-0 bg-black/35 z-[1]"></div> -->
            <div class="relative z-[2] h-full flex justify-center items-center text-white mt-[-50px] md:mt-[-100px]">
                <div class="flex flex-col gap-[20px] w-[80%] xl:w-[1280px] mx-auto">
                    <div class="w-[100%] xl:w-[50%] flex flex-col gap-[20px]">
                        <h6 class="text-display-14 font-semibold">KNOWLEDGE WATCH</h6>
                        <p class="text-display-14 font-light">Discover biweekly briefs that synthesize trusted research, policy developments, and emerging trends across agriculture, forestry, and natural resources in Southeast Asia helping decision-makers stay informed with clear, evidence-based insights.</p>
                    </div>
                    <div class="w-[100%] xl:w-[60%]">
                      <h2 class="text-display-24 md:text-display-32 font-semibold">AFNR Regional Scan 2026: Five Shifts Reshaping Southeast Asia</h2>
                    </div>
                    <div class="w-[100%] xl:w-[60%] flex flex-col gap-[20px]">
                        <div class="w-[200px] h-[1px] bg-[#ffffff]"></div>
                        <p class="text-display-14 font-light">Drawing on FAO's State of Food and Agriculture in Asia and the Pacific Region and selected regional literature, this brief identifies five major shifts influencing Southeast Asia's agriculture, forestry, and natural resources systems and the strategic priorities that follow from them.</p>
                        <a class="flex gap-[20px] text-display-14 font-semibold" href="">READ FULL STORY 
                            <svg width="23" height="15" viewBox="0 0 23 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.5 14.3535L21.5 7.35352L14.5 0.353516M21.5 7.35352H0" stroke="white"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="swiper-slide relative">
            <img src="https://knowledgeplatform.searca.org/wp-content/uploads/2026/08/Frame-2147230796.png" 
                 alt="Regenerative Agriculture in Southeast Asia" 
                 class="absolute inset-0 w-full h-full object-cover z-0">
            <!-- <div class="absolute inset-0 bg-black/35 z-[1]"></div> -->
            <div class="relative z-[2] h-full flex justify-center items-center text-white mt-[-50px] md:mt-[-100px]">
                <div class="flex flex-col gap-[20px] w-[80%] xl:w-[1280px] mx-auto">
                    <div class="w-[100%] xl:w-[50%] flex flex-col gap-[20px]">
                        <h6 class="text-display-14 font-semibold">KNOWLEDGE WATCH</h6>
                        <p class="text-display-14 font-light">Discover biweekly briefs that synthesize trusted research, policy developments, and emerging trends across agriculture, forestry, and natural resources in Southeast Asia helping decision-makers stay informed with clear, evidence-based insights.</p>
                    </div>
                    <div class="w-[100%] xl:w-[60%]">
                      <h2 class="text-display-24 md:text-display-32 font-semibold">Regenerative Agriculture in Southeast Asia: Promise, Practice, and Evidence</h2>
                    </div>
                    <div class="w-[100%] xl:w-[60%] flex flex-col gap-[20px]">
                        <div class="w-[200px] h-[1px] bg-[#ffffff]"></div>
                        <p class="text-display-14 font-light">Southeast Asia's agrifood systems are under increasing pressure from soil degradation, biodiversity loss, water pollution, greenhouse gas emissions, and climate change. These pressures have intensified interest in farming approaches that seek to restore soil health and ecosystem functions</p>
                        <a class="flex gap-[20px] text-display-14 font-semibold" href="">READ FULL STORY
                            <svg width="23" height="15" viewBox="0 0 23 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.5 14.3535L21.5 7.35352L14.5 0.353516M21.5 7.35352H0" stroke="white"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Navigation arrows -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"></script>
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
<?php 
    get_header();

    while (have_posts()) {
        the_post();
?>
    <div>
        <div class="bg-[#196129] pt-[70px]">
            <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[50px] font-light">
                <div>
                    <div class="flex gap-[5px] text-[#ffffff] text-[14px] font-extralight">
                        <p class="cursor-pointer"><a href="/">Home |</a></p>
                        <p class="cursor-pointer"><?php the_title()?></p>
                    </div>
                    <div class="border-b-[1px] border-[#F7D671] text-[#F7D671] text-[45px] pb-[20px] my-[20px]">
                        <h1 class="cursor-pointer"><?php the_title() ?></h1>
                    </div>
                    <div class="text-[16px] font-extralight flex gap-[20px] text-[#ffffff]">
                        <div class="w-[50%]">
                            <div class="">
                                <p>Asia is the largest continent in the world covering about 30% of the Earth’s total land area. It is the world’s most populous continent, and it houses a total of 48 countries. It is divided into six main geographical regions: Northern Asia, Western Asia, Central Asia, Eastern Asia, Southern Asia, and Southeast Asia.</p>
                            </div>
                        </div>
                        <div class="w-[50%]">
                            <div class="">
                                <p>Southeast Asia consists of 11 countries that are generally divided into “mainland” and “island” zones.  The mainland zones are essentially viewed as an extension of the Asian continent, and this includes Cambodia, Lao PDR, Myanmar, Thailand, and Vietnam. The Islands of Southeast Asia, also known as the Insular Region, includes Brunei Darussalam, Indonesia, Malaysia, Philippines, Singapore, and Timor-Leste.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-[#FDFDEF] py-[100px]">
            <div class="flex relative w-[800px] mx-auto h-[100%]">
                <div class="flex w-[800px] mx-auto h-[100%] py-[20px] z-[1]">
                    <div class="w-[800px] flex justify-center mx-auto relative">
                        <div class="relative w-[800px] h-[600px] mx-auto">
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
                        <div id="map-container" class="absolute top-0 w-[800px] h-[600px] mx-auto">
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
                <div class="absolute w-[100%] top-0 right-0 flex flex-col gap-[20px] text-[#000000] z-[0]">
                    <h2 class="text-[32px] text-right">Agricultural Landscape in Southeast Asia:</br> A Regional Profile </h2>
                        <!-- <p class="text-right">Asia is the largest continent in the world covering about 30% of the Earth&apos;s total land area. It is the world&apos;s most populous continent, and it houses a total of 48 countries. It is divided into six main geographical regions: Northern Asia, Western Asia, Central Asia, Eastern Asia, Southern Asia, and Southeast Asia.</p>
                        <p class="text-right">Southeast Asia consists of 11 countries that are generally divided into “mainland” and “island” zones.  The mainland zones are essentially viewed as an extension of the Asian continent, and this includes Cambodia, Lao PDR, Myanmar, Thailand, and Vietnam. The Islands of Southeast Asia, also known as the Insular Region, includes Brunei Darussalam, Indonesia, Malaysia, Philippines, Singapore, and Timor-Leste.   -->
                    </p>
                </div>
            </div>
        </div>
        <div>
            <div class="w-[65%] sm:w-[640px] md:w-[768px] mx-auto py-[70px] font-light">
                <div>
                    <div>
                        <h2 class="text-[24px] font-[600] text-[#f7d671]">Geographic Profile</h2>
                        <div class="">
                            <div class="pt-[15px]">
                                <h3 class="text-[16px] font-[600]">Area</h3>
                                <p class="pt-[10px]">The Southeast Asia region lies between the tropics, which means that the climate, plants grown, and animal life in the countries throughout the region are relatively similar to each other.[3] It covers over 4,500,000 square kilometers of land area  with Indonesia being the largest country in the region.</p>
                            </div>
                            <div class="pt-[15px]">
                                <h3 class="text-[16px] font-[600]">Temperature and Climate</h3>
                                <p class="pt-[10px]">The climate of Southeast Asia can be described as tropical,[4] which means that the region is generally pretty warm in temperature and humidity is high all year round. [5]. The climate in some of the countries in this region are governed by a monsoon system of winds, while some other countries, particularly countries in the insular region, experience uniformly humid equatorial climates.</p>
                            </div>
                            <div class="pt-[15px]">
                                <h3 class="text-[16px] font-[600]">Agricultural Land Area</h3>
                                <p class="pt-[10px]">Around 140 million hectares or about 30% of the total land area in Southeast Asia are estimated to be agricultural land according to the combined data from the World Bank of the total land area and agricultural land area of each country in the region. According to the International Rice Research Institute (IRRI), about 48 million hectares are dedicated for rice cultivation in Southeast Asia, which is estimated to render almost 30% of the world rice harvest.</p>
                            </div>
                        </div>
                    </div>
                    <div class="pt-[50px]">
                        <h2 class="text-[24px] font-[600] text-[#f7d671]">Demographic Profile</h2>
                        <div class="">
                            <div class="pt-[15px]">
                                <h3 class="text-[16px] font-[600]">Race and Ethnicity</h3>
                                <p class="pt-[10px]">Southeast Asia is truly ethnically and culturally diverse with over 1,200 languages spoken by different ethnic groups across the region. Each country is dominated by major ethnic groups which adds to their national identity. Moreover, there are over 350 ethnic minorities recognized in the countries of Southeast Asia which often live in remote mountainous areas.</p>
                            </div>
                            <div class="pt-[15px]">
                                <h3 class="text-[16px] font-[600]">Religion</h3>
                                <p class="pt-[10px]">Aside from southeast asia&apos;s geographical division, it is also religiously split between the mainland and maritime region. The former is largely dominated by Buddhism, while the latter is dominated by Islam. About 40% of the Southeast Asian population are estimated to be Muslims that particularly follow Sunni Islam, followed by Theravada Buddhism and Christianity.</p>
                            </div>
                            <div class="pt-[15px]">
                                <h3 class="text-[16px] font-[600]">Population </h3>
                                <p class="pt-[10px]">Data obtained from the World Bank shows that in 2022, the Southeast Asia region’s total population reached 680,759,398, with Indonesia housing over 40% of this. Though it is forecasted to continue to increase in total, data from Worldometers show that the population growth rate is slowly declining annually.It is mainly driven by the decline in fertility in the region with the adoption of family planning programmes, rapid urbanization and migration, and other socioeconomic and biological factors.</p>
                            </div>
                        </div>
                    </div>
                    <div class="pt-[50px]">
                        <h2 class="text-[24px] font-[600] text-[#f7d671]">Economic Profile</h2>
                        <p class="pt-[10px]">The Association of Southeast Asian Nations region was recognized as one of the fastest growing regions of the world in 2022 with Malaysia’s economy having the quickest growth in the same year. </p>
                        <div class="pt-[20px]">
                            <div>
                                <h3 class="text-[16px] font-[600]">Gross Domestic Product (GDP)</h3>
                                <p class="pt-[10px]">In 2022, the total GDP of countries in Southeast Asia was estimated to reach about U$3.25 trillion according to the data obtained from the World Bank. US$ 1.32 trillion of this was contributed by Indonesia, which was mainly driven by the country’s palm oil production and export.</p>
                            </div>
                            <div class="pt-[10px]">
                                <h3 class="text-[16px] font-[600]">Employment</h3>
                                <p class="pt-[10px]">In the ASEAN Statistical Brief Volume VII released in April 2024, it was estimated that there were 337.9 million employees in ASEAN in 2022, and about 27.6% of this is from the Agriculture, Forestry, and Fishing (AFF) Industry.</p>
                                <div class="pl-[20px] pt-[20px]">
                                    <h3 class="text-[16px] font-[600]">Agriculture Labor Force</h3>
                                    <p class="pt-[10px]">According to the Food and Agriculture Organization (FAO), only about 30% of the population in Southeast Asia were employed in agriculture in 2020. This manifested a decline and is continuously declining that is driven by various factors such as shifting to non-agriculture work.</p>
                                    <p class="pt-[10px]">Among the eleven Southeast Asian countries, data from the World Bank shows that Lao PDR and Malaysia had the highest estimated proportion of agricultural employment relative to their country’s total labor force in 2022. </p>
                                </div>
                            </div>
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


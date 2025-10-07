<div class="country-profile-section flex flex-col lg:flex-row relative">
    <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto h-[900px]">
        <!-- Left Side -->
        <div class="w-[500px] bg-[#008c67] flex items-center absolute z-[9] py-[30px] px-[40px] rounded-[20px]">
            <div class="flex flex-col w-[90%] lg:w-[650px]">
                <div class="border-b-[1px] border-[#D4D4D4] pb-[20px]">
                    <h2 class="text-white text-display-24 md:text-display-42 font-bold">
                        Country Agri Profile<br>Across Southeast Asia
                    </h2>
                    <p class="text-white font-light md:font-normal text-display-12 md:text-display-16 mt-[20px]">
                        Explore key agricultural data, policy trends, and national strategies across all 11 Southeast Asian countries.
                    </p>
                </div>
                <div class="flex flex-col justify-between text-[#ffffff] py-[20px] gap-[18px] text-display-12 md:text-display-16">
                    <div class="flex gap-[5px]">
                        <p>📊 </p>
                        <p>Agri Performance Snapshots</p>
                    </div>
                    <div class="flex gap-[5px]">
                        <p>🧭 </p>
                        <p>Key Policy Milestones</p>
                    </div>
                    <div class="flex gap-[5px]">
                        <p>🌾 </p>
                        <p>Food, Climate & Rural Indicators</p>
                    </div>
                    <div class="flex gap-[5px]">
                        <p>🔍 </p>
                        <p>Challenges & Opportunities</p>
                    </div>
                    <div class="flex gap-[5px]">
                        <p>🤝 </p>
                        <p>Regional & Cross-Country Insights</p>
                    </div>
                </div>
                <div class="w-max">
                    <?php
                        button_template('common-button', array(
                            'title' => "Explore All Country Profiles",
                            'url' => "/agricultural-statistics-data",
                            'color' => 'gold_to_white'
                        ))
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="w-[100%] bg-[#F5F8FC] flex items-center justify-center absolute">
        <?php get_template_part("includes/components/fixed-size-map"); ?>
        <!-- <div id="openMapBtn" class="absolute bottom-[20px] left-[50px] cursor-pointer rounded-full p-[15px] bg-[#008c67]">
            <svg width="20" height="20" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M38 38L29.3 29.3M18 12V24M12 18H24M34 18C34 26.8366 26.8366 34 18 34C9.16344 34 2 26.8366 2 18C2 9.16344 9.16344 2 18 2C26.8366 2 34 9.16344 34 18Z" stroke="#ffffffff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div> -->
    </div>
</div>

<?php get_template_part("includes/components/map-modal"); ?>
<?php 
    $group = get_field("fact");

    $content_group = $group["facts_content"]
?>

<div class="bg-[#096936] py-[100px]">
    <div class="w-[90%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto">
        <div class="text-[#ffffff] flex flex-col items-center justify-center">
            <h2 class="text-display-24 lg:text-display-42 font-bold pb-[20px] lg:pb-[10px] lg:w-[40%] mx-auto text-center"><?php echo esc_html($group["fact_main_title"]); ?></h2>
            <h6 class="flex text-display-14 lg:text-display-18 justify-center items-center text-center w-[100%]"><?php echo esc_html($group["fact_main_description"]) ?></h6>
        </div>
        <div class="pt-[50px]">
            <?php if (!empty($content_group)) : ?>
                <div class="grid grid-cols-1 grid-cols-2 lg:grid-cols-4 gap-[30px]">
                    <?php foreach ($content_group as $content) : ?>
                        <div class="flex flex-col text-center justify-center items-center">
                            <img class="w-[56px] h-[56px]" src="<?php echo esc_url($content["fact_icon"]); ?>" alt="">
                            <div class="flex flex-col justify-center">
                                <div class="flex justify-center">
                                    <h6 class="text-[#ceab23] font-bold text-[22px]"><?php echo esc_html($content["fact_title"]); ?></h6>
                                    <h6 class="text-[#ceab23] font-bold text-[22px]"><?php echo esc_html($content["fact_figure"]); ?></h6>
                                    <h6 class="text-[#ceab23] font-bold text-[22px]"><?php echo esc_html($content["fact_unit"]); ?></h6>
                                </div>
                                <p class="text-[#ffffff] pb-[10px] text-[14px] text-center"><?php echo esc_html($content["fact_description"]); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
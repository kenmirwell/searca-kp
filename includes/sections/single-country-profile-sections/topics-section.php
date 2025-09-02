<?php 
    $content_repeater = get_field("country_content");
?>

<div id="country-profile-topic" class="bg-[#096936]">
    <div class="w-[90%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto">
        <div class="flex justify-between items-center">
             <?php foreach ($content_repeater as $index => $topic) : ?>
                <div id="profile-<?php echo $index ?>" data-index=<?php echo $index ?> class="country-topic-category <?php echo esc_html($topic["topic_category"]); ?> cursor-pointer text-[#ffffff] flex items-center justify-center py-[20px] w-full transition-all duration-200 ease ">
                    <p class="text-display-14 lg:text-[18px] text-center w-[100%]"><?php echo esc_html($topic["topic_title"]); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

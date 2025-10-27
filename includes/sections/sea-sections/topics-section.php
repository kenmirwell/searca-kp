<?php 
    $group = get_field("topics");

    $topic_group = $group["topic"];
?>
<div id="sea-topic-profile" class="bg-[#B59637] overflow-x-scroll">
    <div class="w-[100%] w-[1024px] xl:w-[1280px] mx-auto">
        <div class="flex flex-row justify-between items-center">
            <div id="profile-0" data-index="0" class="topic-category geographic-profile cursor-pointer text-[#ffffff] flex items-center justify-center py-[10px] md:py-[20px] w-full transition-all duration-200 ease ">
                <p class="text-display-14 lg:text-[18px] text-center w-[100%]">Geographic Profile</p>
            </div>
            <div id="profile-1" data-index="1" class="topic-category demographic-profile cursor-pointer text-[#ffffff] flex items-center justify-center py-[10px] md:py-[20px] w-full transition-all duration-200 ease ">
                <p class="text-display-14 lg:text-[18px] text-center w-[100%]">Demographic Profile</p>
            </div>
            <div id="profile-2" data-index="2" class="topic-category economic-profile cursor-pointer text-[#ffffff] flex items-center justify-center py-[10px] md:py-[20px] w-full transition-all duration-200 ease ">
                <p class="text-display-14 lg:text-[18px] text-center w-[100%]">Economic Profile</p>
            </div>
            <div id="profile-3" data-index="3" class="topic-category main-products cursor-pointer text-[#ffffff] flex items-center justify-center py-[10px] md:py-[20px] w-full transition-all duration-200 ease ">
                <p class="text-display-14 lg:text-[18px] text-center w-[100%]">Main Products</p>
            </div>
            <div id="profile-4" data-index="4" class="topic-category current-concerns cursor-pointer text-[#ffffff] flex items-center justify-center py-[10px] md:py-[20px] w-full transition-all duration-200 ease ">
                <p class="text-display-14 lg:text-[18px] text-center w-[100%]">Current Concerns</p>
            </div>
        </div>
    </div>
</div>

<?php if (!empty($topic_group)) : ?>
    <?php foreach ($topic_group as $index => $topic) : 
        
    ?>
        <div class="topic-content bg-[#ffffff] py-[60px] md:py-[100px]" data-index="<?php echo $index ?>">
            <div class="w-[90%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto">
                <div class="flex flex-col gap-[20px]">
                    <div class="text-[#000000] flex flex-col">
                        <h2 class="text-display-24 lg:text-display-42 font-bold pb-[20px] lg:pb-[10px] text-left"><?php echo esc_html($topic["topic_title"]); ?></h2>
                    </div>
                    <?php 
                        $subtopic_group = $topic["subtopics"];
                        if (!empty($subtopic_group)) : 
                    ?>
                        <?php 
                            foreach ($subtopic_group as $subtopic) : 
                                $sub_topics_description = $subtopic["sub_topics_description"];
                                $type = $sub_topics_description['bullet_type'];
                                $color = $sub_topics_description['bullet_color'] ?? '#096936'; 
                        ?>
                                <div class="text-[#000000] flex flex-col">
                                    <h6 class="text-display-18 lg:text-display-24 font-bold w-[40%] mr-auto text-left"><?php echo esc_html($subtopic["sub_topics_title"]); ?></h6>
                                    <ul class="flex flex-col w-full gap-[5px] lg:gap-[20px] agpractices-list">
                                        <li class="flex flex-col items-start gap-[10px]">
                                            <div class="flex gap-[10px] items-center">
                                                <?php bullet_template('bullet-template', compact('type', 'color')); ?>
                                            </div>
                                            <div class="text-display-14 md:text-display-16">
                                                <?php if (!empty($sub_topics_description["flex_std_content"])) :  
                                                    $flex_std_content = $sub_topics_description["flex_std_content"]
                                                ?>
                                                    <div class="flex flex-col">
                                                        <?php foreach($flex_std_content as $content) : ?>
                                                            <p><?php echo esc_html($content["flexy_std_text_group"]["flex_std_content_text"]); ?></p>
                                                        <?php endforeach ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
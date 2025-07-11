<?php 
    $group = get_field("topics");

    $topic_group = $group["topic"];
?>
<div class="bg-[#B59637]">
    <div class="w-[90%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto">
        <div class="flex justify-between items-center">
            <div id="geographic-profile" class="text-[#ffffff] flex items-center justify-center py-[20px] w-full bg-[#B59637] hover:bg-[#096936] transition-all duration-200 ease ">
                <p class="text-display-14 lg:text-[18px] text-center w-[100%]">Geographic Profile</p>
            </div>
            <div id="demographic-profile" class="text-[#ffffff] flex items-center justify-center py-[20px] w-full bg-[#B59637] hover:bg-[#096936] transition-all duration-200 ease ">
                <p class="text-display-14 lg:text-[18px] text-center w-[100%]">Demographic Profile</p>
            </div>
            <div id="economic-profile" class="text-[#ffffff] flex items-center justify-center py-[20px] w-full bg-[#B59637] hover:bg-[#096936] transition-all duration-200 ease ">
                <p class="text-display-14 lg:text-[18px] text-center w-[100%]">Economic Profile</p>
            </div>
            <div id="main-products" class="text-[#ffffff] flex items-center justify-center py-[20px] w-full bg-[#B59637] hover:bg-[#096936] transition-all duration-200 ease ">
                <p class="text-display-14 lg:text-[18px] text-center w-[100%]">Main Products</p>
            </div>
            <div id="current-concerns" class="text-[#ffffff] flex items-center justify-center py-[20px] w-full bg-[#B59637] hover:bg-[#096936] transition-all duration-200 ease ">
                <p class="text-display-14 lg:text-[18px] text-center w-[100%]">Current Concerns</p>
            </div>
        </div>
    </div>
</div>

<?php if (!empty($topic_group)) : ?>
    <?php foreach ($topic_group as $topic) : ?>
        <div class="bg-[#ffffff] py-[100px]">
            <div class="w-[90%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto">
                <div id="<?php echo esc_html($topic["topic_title"]); ?>">
                    <div class="text-[#000000] flex flex-col items-center justify-center">
                        <h2 class="text-display-24 lg:text-display-42 font-bold pb-[20px] lg:pb-[10px] w-[40%] mx-auto text-center"><?php echo esc_html($topic["topic_title"]); ?></h2>
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
                                <div class="text-[#000000] flex flex-col items-center justify-center">
                                    <h6 class="text-display-18 lg:text-display-24 font-bold pb-[20px] lg:pb-[10px] w-[40%] mx-auto text-center"><?php echo esc_html($subtopic["sub_topics_title"]); ?></h6>
                                    <ul class="flex flex-col w-full gap-[5px] lg:gap-[20px] py-[20px] lg:pt-[30px] agpractices-list">
                                        <li class="flex flex-col items-start gap-[10px]">
                                            <div class="flex gap-[10px] items-center">
                                                <?php bullet_template('bullet-template', compact('type', 'color')); ?>
                                            </div>
                                            <div class="text-display-14 md:text-display-16">
                                                <?php echo wp_kses_post($sub_topics_description['sub_topics_description_content']); ?>
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
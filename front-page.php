<?php 
    get_header();

    while (have_posts()) {
        the_post();
?>
    <div>
        <div class="w-[1400px] mx-auto py-[50px]">
            <div class="pb-[40px]">
                <div class="text-[40px]">
                    <h2>Thematic Areas</h2>
                </div>
                <div>
                    <p>Knowledge products by thematic areas from the research initiatives and various activities of SEARCA and its partners</p>
                </div>
            </div>
            <div class="flex items-center gap-[20px]">
                <?php 
                    $thematic_areas = new WP_Query(array(
                        "post_type" => "thematic-area",
                        "post_per_page" => 10
                    ));

                    if ($thematic_areas->have_posts()) {
                        while ($thematic_areas->have_posts()){
                            $thematic_areas->the_post();

                            $logo_url = get_field("thematic_logo");

                            $card_color = get_field("thematic_color")
                ?>
                <div class="w-[330px] h-[500px]">
                    <div class="h-[50%] overflow-hidden rounded-t-xl relative bg-[#ffffff]">
                        <div class="bg-black opacity-10 w-[100%] h-[100%] absolute top-0 left-0"></div>
                        <div class="w-[100%] h-[100%] absolute top-0 left-0">
                            <?php
                                if ( has_post_thumbnail() ) {
                                    $thumbnail_url = get_the_post_thumbnail_url();
                            ?>
                                <img class="w-full h-full object-cover" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title(); ?>">
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <div style="background-color: <?php echo esc_attr($card_color); ?>" class="rounded-b-xl z-10 rounded-tr-[80px] h-[400px] mt-[-80px] relative flex flex-col justify-between">
                        <div class="flex flex-col">
                            <div class="flex justify-center z-10 mt-[-30px]">
                                <div class="rounded-full flex justify-between h-[80px] w-[80px]">
                                    <img class="w-[100%] h-[100%]" src="<?php echo esc_url($logo_url); ?>" alt="<?php the_title(); ?> logo">
                                </div>
                            </div>
                            <div class="flex flex-col gap-[20px] items-center text-center w-[200px] mx-auto">
                                <div class="text-[18px] font-bold pt-[10px] text-[#ffffff]">
                                    <h4><?php the_title()?></h4>
                                </div>
                                <div class="pt-[10px] font-extralight text-[14px] text-[#ffffff]">
                                    <?php the_content()?>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center mb-[50px] text-white">
                            <a href="<?php echo get_permalink(get_the_ID()) ?>" class="rounded-lg border border-2 border-white px-[20px] py-[10px]">Learn More</a>
                        </div>
                    </div>
                </div>
                <?php } } ?>
            </div>
        </div>
    </div>
<?php 
    }
    get_footer();
?>

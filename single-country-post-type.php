<?php 
get_header();

while (have_posts()) {
    the_post();

    $map = get_field("map");

    $quick_facts = get_field("quick_facts");

    $quick_facts_item = [];

    for ($i = 1; $i <= 4; $i++) {
      $quick_facts_item[$i] = $quick_facts["fact_$i"];
    }

?>
    <div class="bg-[#196129] pt-[70px]">
        <div class="flex w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto pt-[50px] pb-[10px] font-light">
            <div class="w-[50%]">
                <div class="flex gap-[5px] text-[#ffffff] text-[14px] font-extralight">
                    <p class="cursor-pointer"><a href="/">Home | Agricultural Statistics Data |</a></p>
                    <p class="cursor-pointer"><?php the_title()?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-[#196129]">
        <div class="flex w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto pb-[50px] font-light">
            <div class="text-[#F7D671] w-[50%] pb-[20px] my-[20px]">
                <h1 class="cursor-pointer text-[45px] font-[500]"><?php the_title() ?></h1>
                <div class="flex flex-col gap-[2px] pt-[20px]">
                    <?php for ($i = 1; $i <= 4; $i++): ?>
                        <div class="">
                            <p class="text-[#ffffff]"><?php echo $quick_facts_item[$i]; ?></p>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="flex flex-col w-[50%]">
                <div class="relative h-[600px] w-[100%]">
                    <!-- <img class="absolute w-full h-full object-cover rounded-xl z-[2]" src="<?php //echo esc_url($map); ?>" alt="<?php //the_title(); ?>"> -->
                    <?php
                        if ( has_post_thumbnail() && $banner_alignment !== "center-align" ) {
                            $thumbnail_url = get_the_post_thumbnail_url();
                    ?>
                      <img class="absolute w-full h-full object-cover rounded-xl z-[2]" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title(); ?>">
                    <?php } ?>
                    <div class="bg-[#ffffff] opacity-25 w-[100%] h-[100%] absolute top-0 left-0 z-[1] rounded-xl"></div>
                </div>
                <!-- <div class="flex flex-col gap-[2px] pt-[20px]">
                    <?php //for ($i = 1; $i <= 4; $i++): ?>
                        <div class="">
                            <p class="text-[#ffffff]"><?php //echo $quick_facts_item[$i]; ?></p>
                        </div>
                    <?php //endfor; ?>
                </div> -->
            </div>
        </div>
    </div>
<?php 
}
get_footer();
?>

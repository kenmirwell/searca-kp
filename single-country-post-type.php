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
        <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[50px] font-light">
            <div>
                <div class="flex gap-[5px] text-[#ffffff] text-[14px] font-extralight">
                    <p class="cursor-pointer"><a href="/">Home |</a></p>
                    <p class="cursor-pointer"><?php the_title()?></p>
                </div>
            </div>
            <div class="border-b-[1px] border-[#F7D671] text-[#F7D671] text-[45px] pb-[20px] my-[20px]">
                <h1 class="cursor-pointer"><?php the_title() ?></h1>
            </div>
            <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto font-light">
              <div class="flex flex-col gap-[5px]">
                    <?php for ($i = 1; $i <= 4; $i++): ?>
                        <div class="">
                            <p class="pb-[10px] text-[#ffffff]"><?php echo $quick_facts_item[$i]; ?></p>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>
<?php 
}
get_footer();
?>

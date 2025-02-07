<?php 
get_header();

while (have_posts()) {
    the_post();
?>
    <div class="bg-[#196129]">
        <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[10px] font-light">
            <div>
                <div class="flex gap-[5px] text-[#ffffff] text-[14px] font-extralight">
                    <p class="cursor-pointer"><a href="/">Home |</a></p>
                    <p class="cursor-pointer"><?php the_title()?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-[#196129]">
        <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[50px] font-light">
            <h2 class="text-[32px] text-[#ffffff]"><?php the_title()?></h2>
        </div>
    </div>
<?php 
}
get_footer();
?>

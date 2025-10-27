<?php 
get_header();

while ( have_posts() ) {
  the_post();
?>

<div class="py-[150px]">
  <div class="felx gap-[20px] w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto">
    <?php get_template_part("includes/sections/page-samples/worldbank-climatechange"); ?>
  </div>
</div>


<?php
} // end while
get_footer();
?>

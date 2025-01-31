<?php 
    get_header();

    while (have_posts()) {
        the_post();
    
        // Get ACF fields
        $text_content = get_field("text_content");
?>

<div class="content">
    <?php the_content(); ?>
</div>

    <?php  
       $thematic_areas = new WP_Query(array(
        "post_type" => "thematic-area",
        "post_per_page" => 10
    ));

    if ($thematic_areas->have_posts()) {
        while ($thematic_areas->have_posts()){
            $thematic_areas->the_post();

            $logo_url = get_field("thematic_logo");

            $card_color = get_field("thematic_color");

            $aspiring_outcome = get_field("aspirational_outcome");

            $expected_output = get_field("expected_output");
        
        ?>
        <div>
            <h4><?php the_title();?></h4>
        </div>
    <?php } } ?>

<?php } get_footer(); ?>

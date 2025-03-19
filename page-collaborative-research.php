<?php 
    get_header();

    while (have_posts()) {
        the_post();
        
?>
    <div>
        <?php get_template_part("includes/section/common-hero"); ?>
        <?php get_template_part("includes/section/boxed-three-column"); ?>
        <?php 
            $button_color = 'green_to_gold';
            
            set_query_var('button_color', $button_color);
        ?>
        <?php get_template_part("includes/section/common-two-column"); ?>
    </div>
<?php 
    }
    get_footer()
?>
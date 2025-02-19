<div class="bg-[#196129] h-[650px]">
    <?php
        $home_banner = new WP_Query(array(
            "post_type" => "home-banner",
            "posts_per_page" => 10
        ));
    ?>
    <div class="banner-slider h-[100%]">
        <?php
            if ($home_banner->have_posts()) {
                while ($home_banner->have_posts()) {
                    $home_banner->the_post();

                    $banner_alignment = get_field("banner_alignment");
                    $banner_background = get_field("banner_background");
                    $button_link = get_field("button_url");
                    $button_name = get_field("button_name");
                    $thumbnail_url = get_the_post_thumbnail_url();

                    set_query_var('thumbnail_url', $thumbnail_url);
                    set_query_var('banner_alignment', $banner_alignment);
                    set_query_var('banner_background', $banner_background);
                    set_query_var('button_name', $button_name);
        ?>  
            <div class="slide-container">
                <?php
                    if (has_post_thumbnail()) {
                        if ($banner_alignment !== "text-center") {
                            get_template_part("includes/banner/thumbnail", "left-right");
                        } else {
                            get_template_part("includes/banner/thumbnail", "center");
                        }
                    } else {
                        get_template_part("includes/banner/nothumbnail");
                    }
                ?>
            </div>
        <?php }} 
        
        wp_reset_postdata(); ?>
    </div>
</div>

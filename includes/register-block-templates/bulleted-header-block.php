<div class="flex gap-[10px] items-start pb-[20px]">
    <?php if (get_field('bullet_icon')) : ?>
        <div class="relative w-[100px]">
            <img class="w-full h-full" src="<?php echo esc_url(get_field('bullet_icon')); ?>" alt="">
        </div>
    <?php else : ?>
        <?php if (get_field('bullet_label')) : ?>
            <div class="">
                <?php if (get_field("heading_tag") === "h1") : ?> 
                    <div class="flex items-center justify-center relative w-[50px] min-w-[50px] h-[50px] min-h-[50px]" 
                        style="background-color: <?php echo esc_html(get_field('bullet_background_color')); ?>; 
                        border-radius: <?php echo esc_html(get_field('border_radius')); ?>px">
                        
                        <p class="absolute text-left text-[14px] md:text-[16px]" 
                            style="color: <?php echo esc_html(get_field('bullet_label_color')); ?>">
                            <?php echo esc_html(get_field('bullet_label')); ?>
                        </p>
                    </div>
                <?php endif; ?>    
                <?php if (get_field("heading_tag") === "h2") : ?> 
                    <div class="flex items-center justify-center relative w-[40px] min-w-[40px] h-[40px] min-h-[40px]" 
                        style="background-color: <?php echo esc_html(get_field('bullet_background_color')); ?>; 
                        border-radius: <?php echo esc_html(get_field('border_radius')); ?>px">
                        
                        <p class="absolute text-left text-[14px] md:text-[16px]" 
                            style="color: <?php echo esc_html(get_field('bullet_label_color')); ?>">
                            <?php echo esc_html(get_field('bullet_label')); ?>
                        </p>
                    </div>
                <?php endif; ?> 
                <?php if (get_field("heading_tag") === "h3") : ?> 
                    <div class="flex items-center justify-center relative w-[30px] min-w-[30px] h-[30px] min-h-[30px]" 
                        style="background-color: <?php echo esc_html(get_field('bullet_background_color')); ?>; 
                        border-radius: <?php echo esc_html(get_field('border_radius')); ?>px">
                        
                        <p class="absolute text-left text-[14px] md:text-[16px]" 
                            style="color: <?php echo esc_html(get_field('bullet_label_color')); ?>">
                            <?php echo esc_html(get_field('bullet_label')); ?>
                        </p>
                    </div>
                <?php endif; ?> 
                <?php if (get_field("heading_tag") === "h4") : ?> 
                    <div class="flex items-center justify-center relative w-[30px] min-w-[30px] h-[30px] min-h-[30px]" 
                        style="background-color: <?php echo esc_html(get_field('bullet_background_color')); ?>; 
                        border-radius: <?php echo esc_html(get_field('border_radius')); ?>px">
                        
                        <p class="absolute text-left text-[14px] md:text-[16px]" 
                            style="color: <?php echo esc_html(get_field('bullet_label_color')); ?>">
                            <?php echo esc_html(get_field('bullet_label')); ?>
                        </p>
                    </div>
                <?php endif; ?> 
                <?php if (get_field("heading_tag") === "h5") : ?> 
                    <div class="flex items-center justify-center relative w-[30px] min-w-[30px] h-[30px] min-h-[30px]" 
                        style="background-color: <?php echo esc_html(get_field('bullet_background_color')); ?>; 
                        border-radius: <?php echo esc_html(get_field('border_radius')); ?>px">
                        
                        <p class="absolute text-left text-[14px] md:text-[16px]" 
                            style="color: <?php echo esc_html(get_field('bullet_label_color')); ?>">
                            <?php echo esc_html(get_field('bullet_label')); ?>
                        </p>
                    </div>
                <?php endif; ?> 
            </div>
        <?php else : ?>
            <p class="" style="color: <?php echo esc_html(get_field('bullet_label_color')); ?>">•</p>
        <?php endif; ?> 


        <?php if (get_field("heading_tag") === "h6") : ?> 
            <div class="flex items-center justify-center relative w-[30px] min-w-[30px] h-[30px] min-h-[30px]" 
                style="background-color: <?php echo esc_html(get_field('bullet_background_color')); ?>; 
                border-radius: <?php echo esc_html(get_field('border_radius')); ?>px">
                
                <p class="absolute text-left text-[14px] md:text-[16px]" 
                    style="color: <?php echo esc_html(get_field('bullet_label_color')); ?>">
                    <?php echo esc_html(get_field('bullet_label')); ?>
                </p>
            </div>
        <?php endif; ?> 
    <?php endif; ?>
    <?php if (get_field("text")) : ?> 
        <?php if (get_field("heading_tag") === "h1") : ?> 
            <div class="text-[#000000] w-[100%] text-display-42 font-semibold">
                <h1><?php echo get_field("text"); ?></h1>
            </div>
        <?php endif; ?>    
        <?php if (get_field("heading_tag") === "h2") : ?> 
            <div class="text-[#000000] w-[100%] text-display-32 font-semibold">
                <h2><?php echo get_field("text"); ?></h2>
            </div>
        <?php endif; ?> 
        <?php if (get_field("heading_tag") === "h3") : ?> 
            <div class="text-[#000000] w-[100%] text-display-24 font-semibold">
                <h3><?php echo get_field("text"); ?></h3>
            </div>
        <?php endif; ?> 
        <?php if (get_field("heading_tag") === "h4") : ?> 
            <div class="text-[#000000] w-[100%] text-display-18 font-semibold">
                <h4><?php echo get_field("text"); ?></h4>
            </div>
        <?php endif; ?> 
        <?php if (get_field("heading_tag") === "h5") : ?> 
            <div class="text-[#000000] w-[100%] text-display-16 font-semibold">
                <h5><?php echo get_field("text"); ?></h5>
            </div>
        <?php endif; ?> 
        <?php if (get_field("heading_tag") === "h6") : ?> 
            <div class="text-[#000000] w-[100%] text-display-14 font-semibold">
                <h6><?php echo get_field("text"); ?></h6>
            </div>
        <?php endif; ?> 
    <?php endif; ?>    

</div>
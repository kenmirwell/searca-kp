<?php 
    $page_id = get_query_var('page_id');

    $group = get_field('cta_section_group');
?>

<div class="py-[50px] lg:py-[100px] bg-[#096936] relative">
    <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">

        <!-- Header -->
        <div class="flex flex-col items-center justify-center pb-[50px]">
            <div class="flex flex-col justify-between items-center gap-[20px] text-center pb-[20px]">
                <?php if (!empty($group['cta_section_title'])) : ?>
                    <div class="font-bold">
                        <h2 class="w-[100%] text-display-24 lg:text-display-42 text-[#ffffff] pb-[10px]">
                            <?php echo esc_html($group['cta_section_title']); ?>
                        </h2>
                    </div>
                <?php endif; ?>

                <?php if (!empty($group['cta_section_description'])) : ?>
                    <div class="w-[70%] mx-auto">
                        <p class="text-[#ffffff]">
                            <?php echo esc_html($group['cta_section_description']); ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Button -->
            <div class="flex relative z-[2]">
                <?php
                    button_template('common-button', array(
                        'title' => "Register for Free",
                        'url' => "/agricultural-digital-tools",
                        'color' => 'gold_to_white'
                    ));
                ?>
            </div>
        </div>      
    </div>
    <img class="absolute w-full h-full object-cover top-0" src="https://cadre.searca.org/wp-content/uploads/2025/07/image-390.png" alt="<?php the_title(); ?>">
</div>

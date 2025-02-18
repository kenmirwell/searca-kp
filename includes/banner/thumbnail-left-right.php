<?php 
    $banner_alignment = get_query_var('banner_alignment');
    $banner_background = get_query_var('banner_background');
    $thumbnail_url = get_query_var('thumbnail_url');
    $button_name = get_query_var('button_name');

    $items_alignment = ""; // Corrected variable name (spelling)

    if ($banner_alignment === "text-left") {
        $items_alignment = "items-baseline";
    } elseif ($banner_alignment === "text-right") {
        $items_alignment = "items-end";
    } else {
        $items_alignment = "items-center";
    }
?>

<div class="center-align slide-content h-[100%] w-[100%] relative">
    <div class="flex flex-col-reverse md:flex-row gap-[20px] mx-auto w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px]">
        <div class="<?php echo esc_attr($items_alignment); ?> text-container w-[100%] xl:w-[50%] mx-auto z-[2]">
            <div class="<?php echo esc_attr($banner_alignment); ?> w-[100%] leading-[1.2]">
                <h1><?php the_title(); ?></h1>
            </div>
            <div class="<?php echo esc_attr($banner_alignment); ?> w-[100%] tracking-wide leading-relaxed">
                <?php the_content(); ?>
            </div>
            <div class="w-auto">
                <div class="flex gap-[20px] py-[5px] pl-[20px] pr-[5px] bg-[#2a7f3d] rounded-full">
                    <button><?php echo esc_html($button_name); ?></button>
                    <div class="bg-[#ceab23] rounded-full p-[15px]">
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.10042 21.8995L21.8994 2.10051M21.8994 2.10051H2.10042M21.8994 2.10051V21.8995" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-[200px] md:h-[320px] lg:h-[450px] rounded-lg overflow-hidden z-[2] relative">
            <div class="bg-[#4b584e] opacity-40 w-[100%] h-[100%] absolute top-0 left-0 z-[1]"></div>
            <img class="w-full h-full object-cover" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title(); ?>">
        </div>
    </div>
    <div class="bg-[#4b584e] opacity-80 w-[100%] h-[100%] absolute top-0 left-0 z-[1]"></div>
    <img class="absolute w-full h-full object-cover" src="<?php echo esc_url($banner_background); ?>" alt="<?php the_title(); ?>">
</div>
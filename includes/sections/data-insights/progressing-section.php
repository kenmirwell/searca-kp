<?php 
    $page_id = get_query_var('page_id');
    $images = [];
?>

<div class="py-[50px] lg:py-[100px]">
    <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
        <div class="relative flex flex-col items-center justify-center h-[500px] w-[100%] border-[1px] border">
            <div class="relative z-[3] flex flex-col pb-[50px] items-center justify-center w-[70%] mx-auto text-center">
                <?php if($page_id && get_field("progress_section_title", $page_id)) : ?>
                    <div class="font-bold">
                        <h6 class="w-[100%] text-display-18 md:text-display-24 text-[#ffffff] pb-[10px]">
                            <?php echo get_field("progress_section_title", $page->ID); ?>
                        </h6>
                    </div>
                <?php endif; ?>

                <?php if($page_id && get_field("progress_section_description", $page_id)) : ?>
                    <div>
                        <p class="text-[#ffffff] text-display-14 md:text-display-16 font-[200]">
                            <?php echo get_field("progress_section_description", $page_id); ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
            <img class="z-[1] image_background_here absolute top-0 w-full h-full object-cover" src="" alt="Background Image">
            <div class="bg-black opacity-50 w-[100%] h-[100%] absolute top-0 left-0 z-[2]"></div>
        </div>

        <?php if (have_rows('progressing_section')): ?>
            <div class="flex justify-between gap-[30px] progressing-section-items pt-[20px]">
                <?php $index = 0; ?>
                <?php while (have_rows('progressing_section')): the_row(); 
                    $title = get_sub_field('progress_title');
                    $description = get_sub_field('progress_description');
                    $image = get_sub_field('progress_image');
                    $image_url = is_array($image) ? $image['url'] : $image;
                    $images[] = $image_url;
                ?>
                    <div class="flex flex-col progressing-item" data-index="<?php echo $index; ?>">
                        <div class="w-full h-[4px] bg-gray-300 overflow-hidden mb-[10px]">
                            <div class="progress-bar h-full bg-[#096936]" style="width: 0%"></div>
                        </div>
                        <h6 class="text-[#1F1F1F] font-bold text-[22px]"><?php echo esc_html($title); ?></h6>
                        <p class="text-[#1f1f1f] pb-[10px] text-[14px]"><?php echo esc_html($description); ?></p>
                    </div>
                    <?php $index++; ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const items = document.querySelectorAll('.progressing-item');
        const imageElement = document.querySelector('.image_background_here');
        const imageSources = <?php echo json_encode($images); ?>;
        const progressBars = document.querySelectorAll('.progress-bar');
        let currentIndex = 0;
        const intervalTime = 3000;

        function resetAllBars() {
            progressBars.forEach(bar => {
                bar.style.width = '0%';
                bar.style.transition = 'none';
            });
        }

        function activateItem(index) {
            resetAllBars();
            const bar = progressBars[index];
            setTimeout(() => {
                bar.style.transition = 'width 3s linear';
                bar.style.width = '100%';
            }, 50); // slight delay to trigger transition

            // Update image
            if (imageSources[index] && imageElement) {
                imageElement.src = imageSources[index];
            }
        }

        // Initial activation
        activateItem(currentIndex);

        // Loop every 3 seconds
        setInterval(() => {
            currentIndex = (currentIndex + 1) % items.length;
            activateItem(currentIndex);
        }, intervalTime);
    });
</script>

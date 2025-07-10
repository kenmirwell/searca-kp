<div id="consorInteractive">
    <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[60px]">
        <?php if (have_rows('interactive_section')): ?>
            <?php while (have_rows('interactive_section')): the_row(); ?>
                <div class="text-left flex flex-col gap-[10px] pb-[50px] text-[#1F1F1F]">
                    <h2 class="text-display-24 lg:text-display-42 font-bold"><?php the_sub_field('title'); ?></h2>
                    <p><?php the_sub_field('subtext'); ?></p>
                </div>

                <?php 
                    // Store key_points in an array to prevent multiple loops
                    $key_points = get_sub_field('key_points');
                    if ($key_points): 
                ?>
                    <div class="flex flex-col-reverse lg:flex-row items-center justify-between gap-[50px]">
                        <!-- Key Points Section -->
                        <div class="flex flex-col gap-[20px] items-start justify-between w-[100%]">
                            <?php foreach ($key_points as $index => $point): ?>
                                <div class="key-point cursor-pointer text-[#1F1F1F] rounded-xl w-[100%] p-[20px] border-[1px]" data-index="<?php echo $index; ?>">
                                    <div>
                                        <h6 class="font-[600] text-display-20 lg:text-display-24"><?php echo $point['title']; ?></h6>
                                        <p class="text-display-14 lg:text-display-16"><?php echo $point['subtext']; ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Images Section -->
                        <div class="relative flex gap-[20px] items-center justify-between pt-[50px] w-[100%] lg:w-[50%] h-[300px]">
                            <?php foreach ($key_points as $index => $point): ?>
                                <div class="image-wrapper absolute inset-0 flex w-[100%] h-[100%]" data-index="<?php echo $index; ?>" style="opacity: 0; transition: opacity 0.3s ease-in-out;">
                                    <div class="relative rounded-xl overflow-hidden w-[100%] h-[100%]">
                                        <img 
                                            class="absolute w-full h-full object-cover z-[0]"
                                            src="<?php echo esc_url($point['image']); ?>" 
                                            alt="<?php echo esc_attr($point['title']); ?>"
                                        >
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>
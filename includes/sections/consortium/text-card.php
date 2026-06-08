<?php 
$page_id = get_query_var('page_id');

if (have_rows('text_card')): ?>
    <div class="w-[90%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[60px]">

        <!-- Section Header -->
        <div class="text-center flex flex-col gap-[10px] pb-[50px] text-[#1F1F1F]">
            <h2 class="text-display-24 lg:text-display-42 font-bold"><?php the_sub_field('title'); ?></h2>
            <p><?php the_sub_field('subtext'); ?></p>
        </div>

        <!-- Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-[20px]">
            <?php while (have_rows('text_card')): the_row(); 
                $title       = get_sub_field('title');
                $description = get_sub_field('description');
                $tags        = get_sub_field('tag_repeater');
                $url         = get_sub_field('url');
            ?>
                <div class="flex flex-col gap-[15px] bg-[#F5F8FC] border-[1px] border-[#E0E8F0] rounded-[20px] p-[30px] justify-between">
                    
                    <!-- Tags -->
                    <?php if (!empty($tags)): ?>
                        <div class="flex flex-wrap gap-[8px]">
                            <?php foreach ($tags as $tag): ?>
                                <span class="text-[#008c67] bg-[#E0F2EE] text-display-12 md:text-display-14 px-[12px] py-[5px] rounded-full">
                                    <?php echo esc_html($tag['tag']); ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Title & Description -->
                    <div class="flex flex-col gap-[10px]">
                        <?php if (!empty($title)): ?>
                            <h6 class="font-[700] text-display-18 md:text-display-24"><?php echo esc_html($title); ?></h6>
                        <?php endif; ?>
                        <?php if (!empty($description)): ?>
                            <p class="text-display-14 md:text-display-16 text-[#4a4a4a]"><?php echo esc_html($description); ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Learn More -->
                    <?php if (!empty($url)): ?>
                        <a href="<?php echo esc_url($url); ?>" class="flex items-center gap-[8px] text-[#B59637] text-display-14 md:text-display-16 font-[500] group w-fit">
                            Learn More
                            <span class="group-hover:translate-x-[4px] transition-all duration-200 ease">→</span>
                        </a>
                    <?php endif; ?>

                </div>
            <?php endwhile; ?>
        </div>

    </div>
<?php endif; ?>
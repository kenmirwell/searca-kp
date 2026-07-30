<!-- bulleted section -->
<div class="pt-[40px]">
        <?php if (have_rows('flexicon_section_repeater')) : ?>
            <div class="flex justify-between gap-[20px]">
                <?php while (have_rows('flexicon_section_repeater')) : the_row(); ?>
                    <?php if (get_sub_field('section_name') === 'Key Policy Messages') : ?>
                        <?php if (have_rows('flexicon_repeater')) : ?>
                            <div>
                                <?php while (have_rows('flexicon_repeater')) : the_row(); ?>
                                     <?php if (get_sub_field('section_class_name') === 'green-number-bullet') : ?>
                                        <?php if (have_rows('insights_flexicon')): ?>
                                            <div class="bg-[#EBF2EC] rounded-2xl border-[1px] border-[#D3DBD5] pl-[40px] pr-[80px] py-[40px]">
                                                <?php while (have_rows('insights_flexicon')): the_row(); 
                                                    $layout = get_row_layout();
                                                ?>
                                                    <?php if ($layout === 'title_layout') : ?>
                                                        <div class="pb-[20px]">
                                                            <h3 class="text-display-24">
                                                                <?php echo esc_html(get_sub_field('title')); ?>
                                                            </h3>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if ($layout === 'bulleted_section_layout') : ?>
                                                        <?php if (have_rows('bulleted_repeater')) : ?>
                                                            <div class="flex flex-col gap-[20px]">
                                                                <?php while (have_rows('bulleted_repeater')) : the_row(); ?>
                                                                    <div class="flex flex-col gap-[5px] pb-[20px] border-b-[0.1px] border-b-[#000000]">
                                                                        <div class="flex gap-[10px] items-center">
                                                                            <div>
                                                                                <?php if (get_sub_field('icon')) : ?>
                                                                                    <img src="<?php echo esc_url(get_sub_field('icon')); ?>" alt="hero background" class="w-full h-full object-cover">
                                                                                <?php endif; ?>
                                                                                <?php if (get_sub_field('bullet')) : ?>
                                                                                    <div class="h-[30px] w-[30px] bg-[#008C67] rounded-lg flex justify-center items-center">
                                                                                        <span class="text-white font-semibold"><?php echo esc_html(get_sub_field('bullet')); ?></span>
                                                                                    </div>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                            <?php if (get_sub_field('title')) : ?>
                                                                                <h6 class="font-semibold"><?php echo esc_html(get_sub_field('title')); ?></h6>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                        <?php if (have_rows('description_repeater')) : ?>
                                                                            <?php while (have_rows('description_repeater')) : the_row(); ?>
                                                                                <div class="pl-[40px]">
                                                                                    <?php if (get_sub_field('description')) : ?>
                                                                                    <p class="font-light"><?php echo esc_html(get_sub_field('description')); ?></p>
                                                                                <?php endif; ?>
                                                                                </div>
                                                                            <?php endwhile; ?>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                <?php endwhile; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php endwhile; ?>
                                            </div>
                                        <?php endif; ?>    
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
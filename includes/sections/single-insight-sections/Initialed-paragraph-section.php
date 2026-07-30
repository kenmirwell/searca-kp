<div class="pt-[40px]">
    <?php if (have_rows('flexicon_section_repeater')) : ?>
        <div class="flex justify-between gap-[20px]">
            <?php while (have_rows('flexicon_section_repeater')) : the_row(); ?>
                <?php if (get_sub_field('section_name') === 'Executive Summary') : ?>
                    <?php if (have_rows('flexicon_repeater')) : ?>
                        <div>
                            <?php while (have_rows('flexicon_repeater')) : the_row(); ?>
                                <?php if (get_sub_field('section_class_name') === 'initialed-paragraph') : ?>
                                    <?php if (have_rows('insights_flexicon')): ?>
                                        <div class="py-[40px]">
                                            <div class="flow-root pb-[40px]">
                                                <?php while (have_rows('insights_flexicon')): the_row();
                                                    $layout = get_row_layout();
                                                ?>
                                                    <?php if ($layout === 'title_layout') : ?>
                                                        <div class="pb-[20px]">
                                                            <h3 class="font-semibold text-display-24">
                                                                <?php echo esc_html(get_sub_field('title')); ?>
                                                            </h3>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if ($layout === 'initial_layout') : ?>
                                                        <?php if (get_sub_field('initial')) : ?>
                                                            <p class="font-bold text-display-42 float-left pr-3">
                                                                <?php echo esc_html(get_sub_field('initial')); ?>
                                                            </p>
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                    <?php if ($layout === 'wysiwyg_layout') : ?>
                                                        <?php if (get_sub_field('wysiwyg')) : ?>
                                                            <div class="[&_p]:mb-4 font-light">
                                                                <?php echo wp_kses_post(get_sub_field('wysiwyg')); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php endwhile; ?>
                                            </div>
                                            <div>
                                                <?php while (have_rows('insights_flexicon')): the_row();
                                                    $layout = get_row_layout();
                                                ?>
                                                    <?php if ($layout === 'image_layout') : ?>
                                                        <div class="rounded-2xl overflow-hidden">
                                                            <?php if (get_sub_field('image')) : ?>
                                                                <img src="<?php echo esc_url(get_sub_field('image')); ?>" alt="image" class="w-full h-[475px] object-cover">
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endwhile; ?>
                                            </div>
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
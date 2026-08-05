<div class="pt-[40px]">
    <?php if (have_rows('flexicon_section_repeater')) : ?>
        <div class="flex justify-between gap-[20px]">
            <?php while (have_rows('flexicon_section_repeater')) : the_row(); ?>
                <?php if (get_sub_field('section_name') === 'Introduction: Why SOFI 2026 Matters') : ?>
                    <?php if (have_rows('flexicon_repeater')) : ?>
                        <div>
                            <?php while (have_rows('flexicon_repeater')) : the_row(); ?>
                                <?php if (get_sub_field('section_class_name') === 'simple-text-section') : ?>
                                    <?php if (have_rows('insights_flexicon')): ?>
                                        <div class="py-[20px] md:py-[40px]">
                                            <div class="pb-[20px] md:pb-[40px]">
                                                <?php while (have_rows('insights_flexicon')): the_row();
                                                    $layout = get_row_layout();
                                                ?>
                                                    <?php if ($layout === 'title_layout') : ?>
                                                        <div class="pb-[20px]">
                                                            <h3 class="font-semibold text-display-24 md:text-display-32">
                                                                <?php echo esc_html(get_sub_field('title')); ?>
                                                            </h3>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if ($layout === 'wysiwyg_layout') : ?>
                                                        <?php if (get_sub_field('wysiwyg')) : ?>
                                                            <div class="[&_p]:mb-4 text-display-14 md:text-display-16">
                                                                <?php echo wp_kses_post(get_sub_field('wysiwyg')); ?>
                                                            </div>
                                                        <?php endif; ?>
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
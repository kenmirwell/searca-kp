<div class="">
    <div>
        <div class="pb-[20px]">
            <p>ON THIS PAGE</p>
        </div>
        <ul class="font-light">
            <?php if (have_rows('flexicon_section_repeater')) : ?>
                <?php while (have_rows('flexicon_section_repeater')) : the_row(); ?>
                    <?php
                        $section_class = get_sub_field('section_name');
                        $section_id    = get_sub_field('id');
                    ?>
                    <?php if ($section_class) : ?>
                        <li class="toc-item font-light pl-[20px] py-[10px] border-l-[2px] border-[#D9D9D9]">
                            <a href="#<?php echo esc_html($section_id); ?>" 
                               class="toc-link" 
                               data-target="<?php echo esc_html($section_id); ?>">
                                <?php echo esc_html($section_class); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </ul>
    </div>
</div>
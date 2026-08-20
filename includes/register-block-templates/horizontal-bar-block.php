<div class="py-[20px]">
    <?php if (have_rows('bar_meter_repeater')) : ?>
        <div class="font-light flex flex-col gap-[24px] py-[30px] px-[20px] rounded-xl border-[1px] border-[#D3D3D3] mb-[20px]">
            <?php while (have_rows('bar_meter_repeater')) : the_row(); 
                $title         = get_sub_field('title');
                $bar_unit     = get_sub_field('bar_unit');
                $bar_value     = get_sub_field('bar_value');
            ?>
                <div>
                    <div class="flex justify-between text-[14px] mb-[8px]">
                        <span><?php echo esc_html($title); ?></span>
                        <div class="flex gap-[5px]">
                          <span class="font-medium"><?php echo esc_html($bar_value); ?></span>
                          <span class="font-medium"><?php echo esc_html($bar_unit); ?></span>
                        </div>
                    </div>
                    <div class="w-full h-[6px] bg-[#E5E3DA] rounded-full overflow-hidden">
                        <div class="h-full bg-[#B59637] rounded-full" style="width: <?php echo esc_attr($bar_value); ?>%"></div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</div>
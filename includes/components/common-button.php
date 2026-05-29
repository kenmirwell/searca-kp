<?php if (!empty($url)): ?>
<a href="<?php echo esc_url($url); ?>" class="w-auto group cursor-pointer">
<?php else: ?>
<a href="/" class="w-auto group cursor-pointer">
<?php endif; ?>

    <?php if($color == 'gold_to_green'): ?>
        <div class="flex items-center gap-[20px] py-[5px] pl-[20px] pr-[5px] bg-[#B59637] group-hover:bg-[#008c67] transition-all duration-200 ease rounded-full">
    <?php elseif($color == 'green_to_gold'): ?>
        <div class="flex items-center gap-[20px] py-[5px] pl-[20px] pr-[5px] bg-[#008c67] group-hover:bg-[#B59637] transition-all duration-200 ease rounded-full">
    <?php elseif($color == 'gold_to_white'): ?>
        <div class="flex items-center gap-[20px] py-[5px] pl-[20px] pr-[5px] bg-[#B59637] group-hover:bg-[#ffffff] transition-all duration-200 ease rounded-full">
    <?php elseif($color == 'green_to_white'): ?>
        <div class="flex items-center gap-[20px] py-[5px] pl-[20px] pr-[5px] bg-[#096936] group-hover:bg-[#ffffff] transition-all duration-200 ease rounded-full">
    <?php else: ?>
        <div class="flex items-center gap-[20px] py-[5px] pl-[20px] pr-[5px] bg-[#008c67] group-hover:bg-[#B59637] transition-all duration-200 ease rounded-full">
    <?php endif; ?>

        <?php if (!empty($title)): ?>
            <p class="w-max <?php 
                if($color == 'gold_to_white' || $color == 'green_to_white') {
                    echo 'text-[#ffffff] group-hover:text-[#000000]';
                } else {
                    echo 'text-[#ffffff]';
                }
            ?>"><?php echo esc_html($title); ?></p>
        <?php else: ?>
            <p class="w-max <?php 
                if($color == 'gold_to_white' || $color == 'green_to_white') {
                    echo 'text-[#ffffff] group-hover:text-[#000000]';
                } else {
                    echo 'text-[#ffffff]';
                }
            ?>">Learn More</p>
        <?php endif; ?>

        <?php if($color == 'gold_to_green'): ?>
            <div class="bg-[#096936] group-hover:bg-[#008c67] rounded-full p-[15px] transition-all duration-200 ease">
        <?php elseif($color == 'green_to_gold'): ?>
            <div class="bg-[#B59637] group-hover:bg-[#008c67] rounded-full p-[15px] transition-all duration-200 ease">
        <?php elseif($color == 'gold_to_white'): ?>
            <div class="bg-[#008c67] group-hover:bg-[#000000] rounded-full p-[15px] transition-all duration-200 ease">
        <?php elseif($color == 'green_to_white'): ?>
            <div class="bg-[#B59637] group-hover:bg-[#000000] rounded-full p-[15px] transition-all duration-200 ease">
        <?php else: ?>
            <div class="bg-[#008c67] group-hover:bg-[#B59637] rounded-full p-[15px] transition-all duration-200 ease">
        <?php endif; ?>
            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.10042 21.8995L21.8994 2.10051M21.8994 2.10051H2.10042M21.8994 2.10051V21.8995" 
                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            </div>
        </div>

<?php if (!empty($url)): ?>
</a>
<?php else: ?>
</a>
<?php endif; ?>
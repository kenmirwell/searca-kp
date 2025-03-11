<?php if (!empty($url)): ?>
<a href="<?php echo esc_url($url); ?>" class="w-auto group cursor-pointer">
<?php else: ?>
<a href="/" class="w-auto group cursor-pointer">
<?php endif; ?>

    <div class="flex items-center gap-[20px] py-[5px] pl-[20px] pr-[5px] <?php echo $color == 'gold' ? 'bg-[#ceab23] group-hover:bg-[#2a7f3d]' : 'bg-[#2a7f3d] group-hover:bg-[#ceab23]'; ?> transition-all duration-200 ease rounded-full">
        <?php if (!empty($title)): ?>
            <p class="text-[#ffffff]"><?php echo esc_html($title); ?></p>
        <?php else: ?>
            <p class="text-[#ffffff]">Learn More</p>
        <?php endif; ?>
        <div class="<?php echo $color == 'gold' ? 'bg-[#2a7f3d] group-hover:bg-[#ceab23]' : 'bg-[#ceab23] group-hover:bg-[#2a7f3d]'; ?> rounded-full p-[15px] transition-all duration-200 ease">
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



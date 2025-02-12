<div class="flex w-[100%]">
    <?php if (isset($button_bg)): ?>
    <div class="flex gap-[20px] py-[5px] pl-[20px] pr-[5px] bg-[<?php echo esc_html($button_bg); ?>] rounded-full">
    <?php endif; ?>

        <?php if (isset($title)): ?>
        <button class="text-[#ffffff]"><?php echo esc_html($title); ?></button>
        <?php endif; ?>

        <?php if (isset($ar_bg)): ?>
        <div class="bg-[<?php echo esc_html($ar_bg); ?>] rounded-full p-[10px]">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.10042 21.8995L21.8994 2.10051M21.8994 2.10051H2.10042M21.8994 2.10051V21.8995" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <?php endif; ?>

    <?php if (isset($button_bg)): ?>
    </div>
    <?php endif; ?>
</div>

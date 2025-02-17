<?php if (isset($root_url)): ?>
    <a href="<?php echo esc_url($root_url) ?>" class="flex w-[100%] group">
<?php endif; ?>
    <?php if (isset($button_class)): ?>
        <div class="<?php echo esc_html($button_class); ?> flex gap-[20px] py-[5px] pl-[20px] pr-[5px] rounded-full transition-all duration-200 ease">
    <?php endif; ?>

        <?php if (isset($title)): ?>
            <button class="text-[#ffffff]"><?php echo esc_html($title); ?></button>
        <?php endif; ?>

        <div class="arrow-bg rounded-full p-[15px] transition-all duration-200 ease">
            <svg class="scale-[1] group-hover:scale-[1.5] transition-all duration-200 ease" width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.10042 21.8995L21.8994 2.10051M21.8994 2.10051H2.10042M21.8994 2.10051V21.8995" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>

    <?php if (isset($button_bg)): ?>
        </div>
    <?php endif; ?>
</a>

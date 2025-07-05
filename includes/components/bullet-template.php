<?php if ($type !== "none"): ?>
    <?php if ($type === "check") : ?>
        <!-- CHECK ICON -->
        <svg width="21" height="11" viewBox="0 0 36 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M34 2L12 24L2 14" stroke="<?php echo esc_attr($color); ?>" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    <?php elseif ($type === "dot") : ?>
        <div class="pt-[10px]">
            <svg width="7" height="7" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="13.5" cy="13.5" r="13.5" fill="<?php echo esc_attr($color); ?>"/>
            </svg>
        </div>
    <?php elseif ($type === "checkbox") : ?>
        <!-- CHECKBOX ICON -->
        <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0)">
                <path d="M18 1.14H5C2.65 1.14 0.75 3.04 0.75 5.39V18.39C0.75 20.74 2.65 22.64 5 22.64H18C20.35 22.64 22.25 20.74 22.25 18.39V5.39C22.25 3.04 20.35 1.14 18 1.14Z"
                    stroke="<?php echo esc_attr($color); ?>" stroke-width="1.5" />
                <path d="M9.84 15.7L6.25 12.13L7.04 10.58L10.22 12.99L15.38 7.83L16.95 8.61L10.61 15.7Z"
                    fill="<?php echo esc_attr($color); ?>" />
            </g>
            <defs>
                <clipPath id="clip0">
                    <rect width="23" height="23" fill="white" transform="translate(0 0.39)" />
                </clipPath>
            </defs>
        </svg>
    <?php endif; ?>
<?php endif; ?>

<?php
$section_name = get_field('section_name');
$section_id = $section_name ? sanitize_title($section_name) : '';
?>
<?php if ($section_id): ?>
    <span id="<?php echo esc_attr($section_id); ?>" class="block scroll-mt-20"></span>
<?php endif; ?>
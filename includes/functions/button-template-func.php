<?php
function get_button_data($template_name, $data = array()) {
    $title = $data['title'] ?? null;
    $button_class = $data['button_class'] ?? null;
    $ar_bg = $data['ar_bg'] ?? null;
    $button_bg = $data['button_bg'] ?? null;
    $root_url = $data['root_url'] ?? null;

    include locate_template("includes/components/{$template_name}.php");
}
?>

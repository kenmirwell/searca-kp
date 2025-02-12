<?php
function get_button_data($template_name, $data = array()) {
    $title = $data['title'] ?? null;
    $ar_bg = $data['ar_bg'] ?? null;
    $button_bg = $data['button_bg'] ?? null;

    include locate_template("includes/components/{$template_name}.php");
}
?>

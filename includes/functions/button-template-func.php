<?php
function get_button_data($template_name, $data = array()) {
    $title = $data['title'] ?? null;
    $root_url = $data['root_url'] ?? null;
    $alignment = $data['alignment'] ?? null;

    include locate_template("includes/components/{$template_name}.php");
}
?>

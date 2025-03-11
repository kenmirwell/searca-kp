<?php
    function button_template($template_name, $data = array()) {
        $title = $data['title'] ?? null;
        $url = $data['url'] ?? null;
        $color =$data['color'] ?? null;

        include locate_template("includes/components/{$template_name}.php");
    }
?>

<?php
    function bullet_template($template_name, $data = array()) {
        $type = $data['type'] ?? null;
        $color =$data['color'] ?? null;

        include locate_template("includes/components/{$template_name}.php");
    }
?>
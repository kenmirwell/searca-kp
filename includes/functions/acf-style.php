<?php 
    function my_acf_admin_styles() {
        echo '<style>
            .acf-field.bg-[#ffe0e0] { 
                background: #ffe0e0; 
            }
            .acf-field.bg-[#0073aa] { 
                background: #0073aa; 
            }
        </style>';
    }

    add_action('admin_head', 'my_acf_admin_styles');
    
?>
<?php 
    function common_hero_styles() {
         echo '<style>
            #acf-group_68629292cad22 {
                background-color:rgb(202, 224, 205);
            }
        </style>';
    }

    add_action('admin_head', 'common_hero_styles');

    function about_styles() {
         echo '<style>
            #acf-group_68628e29169af {
                background-color:rgb(202, 212, 224);
            }
        </style>';
    }

    add_action('admin_head', 'about_styles');

    function resources_styles() {
         echo '<style>
            #acf-group_686787be65ee5 {
                background-color:rgb(202, 212, 224) !important;
            }
            
            #acf-group_686787be65ee5 .acf-field {
                background-color:rgb(202, 212, 224) !important;
            }
        </style>';
    }

    add_action('admin_head', 'resources_styles');

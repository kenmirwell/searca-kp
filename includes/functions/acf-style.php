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

    
function sea_agri_profile_styles() {
        echo '<style>
            #acf-group_686dd5b3dd1a9 .postbox-header {
                background-color:rgb(202, 212, 224) !important;
            }

            .acf-field-686dd64b1db3c {
                background-color:rgb(202, 212, 224) !important;
            }

            .acf-field-68707fdd5cbdc {
                background-color:rgb(224, 222, 202) !important;
            }

             .acf-field-68708124c515d {
                border: 2px solid rgb(224, 222, 202) !important;
            }

            .acf-field-68708124c515d .acf-row:nth-child(odd) {
                background-color: rgb(196, 204, 218) !important;
            }

            .acf-field-68708124c515d .acf-row:nth-child(even) {
                background-color: rgb(215, 212, 221) !important;
            }

            .acf-field-68708124c515d .acf-row:nth-child(odd) td {
                background-color: rgb(196, 204, 218) !important;
            }

            .acf-field-68708124c515d .acf-row:nth-child(even) td {
                background-color: rgb(215, 212, 221) !important;
            }

        </style>';
    }

    add_action('admin_head', 'sea_agri_profile_styles');



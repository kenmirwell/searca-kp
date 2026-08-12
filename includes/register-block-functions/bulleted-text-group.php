<?php 
    add_action('acf/init', function() {
        if( function_exists('acf_register_block_type') ) {
            acf_register_block_type([
                'name'            => 'bulleted_text_group',
                'title'           => __('Bulleted Text Group'),
                'description'     => __('Bulleted group composed of titles, icons and repeaters'),
                'render_template' => get_template_directory() . '/includes/register-block-templates/bulleted-text-group.php',
                'category'        => 'formatting',
                'icon'            => [
                                        'background' => '#c1c9ad',
                                        'foreground' => '#008C67',
                                        'src' => 'list-view',
                                    ],
                'keywords'        => ['policy', 'messages', 'list'],
                'supports'        => [
                    'align' => false,
                    'anchor' => true,
                ],
            ]);
        }
    });

    add_action('enqueue_block_editor_assets', function() {
        echo '<style>
            .wp-block-acf-bulleted-text-group {
                background-color: #008C67;
                border: 3px dashed #008C67;
                padding: 16px;
                border-radius: 8px;
            }
        </style>';
    });
?>
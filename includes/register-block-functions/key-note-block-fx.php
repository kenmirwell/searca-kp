<?php 
    add_action('acf/init', function() {
        if( function_exists('acf_register_block_type') ) {
            acf_register_block_type([
                'name'            => 'key-note-block',
                'title'           => __('key-note-block'),
                'description'     => __('Key notes'),
                'render_template' => get_template_directory() . '/includes/register-block-templates/key-note-block.php',
                'category'        => 'formatting',
                'icon'            => [
                                        'background' => '#c1c9ad',
                                        'foreground' => '#0b4133',
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

    add_action('enqueue_block_assets', function() {
        wp_register_style('key-note-block-style', false);
        wp_enqueue_style('key-note-block-style');
        wp_add_inline_style('key-note-block-style', '
            .wp-block-acf-key-note-block {
                background-color: #0b4133;
                border: 3px dashed #0b4133;
                padding: 16px;
                border-radius: 8px;
            }
        ');
    });

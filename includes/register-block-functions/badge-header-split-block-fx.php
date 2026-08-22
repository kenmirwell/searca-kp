<?php 
    add_action('acf/init', function() {
        if( function_exists('acf_register_block_type') ) {
            acf_register_block_type([
                'name'            => 'badge-header-split-block',
                'title'           => __('Badge Header Split Block'),
                'description'     => __('header with bullet'),
                'render_template' => get_template_directory() . '/includes/register-block-templates/badge-header-split-block.php',
                'category'        => 'formatting',
                'icon'            => [
                                        'background' => '#c1c9ad',
                                        'foreground' => '#d6ae5f',
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
        wp_register_style('badge-header-split-block-editor-style', false);
        wp_enqueue_style('badge-header-split-block-editor-style');
        wp_add_inline_style('badge-header-split-block-editor-style', '
            .wp-block-acf-badge-header-split-block {
                background-color: #d6ae5f;
                border: 3px dashed #d6ae5f;
                padding: 16px;
                border-radius: 8px;
            }
        ');
    });
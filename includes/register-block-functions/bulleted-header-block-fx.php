<?php 
    add_action('acf/init', function() {
        if( function_exists('acf_register_block_type') ) {
            acf_register_block_type([
                'name'            => 'bulleted_header_block',
                'title'           => __('Bulleted header block'),
                'description'     => __('header with bullet'),
                'render_template' => get_template_directory() . '/includes/register-block-templates/bulleted-header-block.php',
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
        wp_register_style('bulleted-header-block-editor-style', false);
        wp_enqueue_style('bulleted-header-block-editor-style');
        wp_add_inline_style('bulleted-header-block-editor-style', '
            .wp-block-acf-bulleted-header-block {
                background-color: #5fd6b6;
                border: 3px dashed #5fd6b6;
                padding: 16px;
                border-radius: 8px;
            }
        ');
    });
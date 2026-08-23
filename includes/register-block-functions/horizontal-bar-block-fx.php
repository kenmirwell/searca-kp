<?php 
    add_action('acf/init', function() {
        if( function_exists('acf_register_block_type') ) {
            acf_register_block_type([
                'name'            => 'horizontal_bar_block',
                'title'           => __('Horizontal Bar Block'),
                'description'     => __('for dynamic bar'),
                'render_template' => get_template_directory() . '/includes/register-block-templates/horizontal-bar-block.php',
                'category'        => 'formatting',
                'icon'            => [
                                        'background' => '#c1c9ad',
                                        'foreground' => '#83008c',
                                        'src' => 'chart-bar',
                                    ],
                'keywords'        => [],
                'supports'        => [
                    'align' => false,
                    'anchor' => true,
                ],
            ]);
        }
    });

    add_action('enqueue_block_assets', function() {
        wp_register_style('horizontal-bar-block-editor-style', false);
        wp_enqueue_style('horizontal-bar-block-editor-style');
        wp_add_inline_style('horizontal-bar-block-editor-style', '
            .wp-block-acf-horizontal-bar-block {
                background-color: #83008c;
                border: 3px dashed #83008c;
                padding: 16px;
                border-radius: 8px;
            }
        ');
    });

<?php 
    add_action('acf/init', function() {
        if( function_exists('acf_register_block_type') ) {
            acf_register_block_type([
                'name'            => 'card_block',
                'title'           => __('Card Block'),
                'description'     => __('Image block that covers full width'),
                'render_template' => get_template_directory() . '/includes/register-block-templates/card-block.php',
                'category'        => 'formatting',
                'icon'            => [
                                        'background' => '#c1c9ad',
                                        'foreground' => '#008c6b',
                                        'src' => 'format-image',
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
        wp_register_style('card-block-editor-style', false);
        wp_enqueue_style('card-block-editor-style');
        wp_add_inline_style('card-block-editor-style', '
            .wp-block-acf-card-block {
                background-color: #939ef1;
                border: 3px dashed #939ef1;
                padding: 16px;
                border-radius: 8px;
            }
        ');
    });

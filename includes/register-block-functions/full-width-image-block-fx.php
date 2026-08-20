<?php 
    add_action('acf/init', function() {
        if( function_exists('acf_register_block_type') ) {
            acf_register_block_type([
                'name'            => 'full_width_image_block',
                'title'           => __('Full Width Image Block'),
                'description'     => __('Image block that covers full width'),
                'render_template' => get_template_directory() . '/includes/register-block-templates/full-width-image-block.php',
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

    add_action('enqueue_block_editor_assets', function() {
        wp_register_style('full-width-image-block-editor-style', false);
        wp_enqueue_style('full-width-image-block-editor-style');
        wp_add_inline_style('full-width-image-block-editor-style', '
            .wp-block-acf-full-width-image-block {
                background-color: #008c6b;
                border: 3px dashed #008c6b;
                padding: 16px;
                border-radius: 8px;
            }
        ');
    });
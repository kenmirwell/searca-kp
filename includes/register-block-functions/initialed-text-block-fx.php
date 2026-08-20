<?php 
    add_action('acf/init', function() {
        if( function_exists('acf_register_block_type') ) {
            acf_register_block_type([
                'name'            => 'initialed_text_block',
                'title'           => __('Initial Text Block'),
                'description'     => __('Text block composed of WYSIWYG builder and text field for Capital Letter'),
                'render_template' => get_template_directory() . '/includes/register-block-templates/initialed-text-block.php',
                'category'        => 'formatting',
                'icon'            => [
                                        'background' => '#c1c9ad',
                                        'foreground' => '#838c00',
                                        'src' => 'editor-textcolor',
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
        wp_register_style('initialed-text-block-editor-style', false);
        wp_enqueue_style('initialed-text-block-editor-style');
        wp_add_inline_style('initialed-text-block-editor-style', '
            .wp-block-acf-initialed-text-block {
                background-color: #838c00;
                border: 3px dashed #838c00;
                padding: 16px;
                border-radius: 8px;
            }
        ');
    });
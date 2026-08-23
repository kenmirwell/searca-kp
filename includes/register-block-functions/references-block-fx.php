<?php 
    add_action('acf/init', function() {
        if( function_exists('acf_register_block_type') ) {
            acf_register_block_type([
                'name'            => 'references_block',
                'title'           => __('References Block'),
                'description'     => __('contain of links'),
                'render_template' => get_template_directory() . '/includes/register-block-templates/references-block.php',
                'category'        => 'formatting',
                'icon'            => [
                                        'background' => '#c1c9ad',
                                        'foreground' => '#04fff7',
                                        'src' => 'admin-links',
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
        wp_register_style('references-block-editor-style', false);
        wp_enqueue_style('references-block-editor-style');
        wp_add_inline_style('references-block-editor-style', '
            .wp-block-acf-references-block {
                background-color: #04fff7;
                border: 3px dashed #04fff7;
                padding: 16px;
                border-radius: 8px;
            }
        ');
    });

<?php 
    add_action('acf/init', function() {
        if( function_exists('acf_register_block_type') ) {
            acf_register_block_type([
                'name'            => 'bulleted-htag-block',
                'title'           => __('bulleted-htag-block'),
                'description'     => __('Bulleted group composed of titles, icons and repeaters'),
                'render_template' => get_template_directory() . '/includes/register-block-templates/bulleted-htag-block.php',
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

    add_action('enqueue_block_assets', function() {
        wp_register_style('bulleted-htag-block-editor-style', false);
        wp_enqueue_style('bulleted-htag-block-editor-style');
        wp_add_inline_style('bulleted-htag-block-editor-style', '
            .wp-block-acf-bulleted-htag-block {
                background-color: #008C67;
                border: 3px dashed #008C67;
                padding: 16px;
                border-radius: 8px;
            }
        ');
    });

<?php 
    add_action('acf/init', function() {
        if( function_exists('acf_register_block_type') ) {
            acf_register_block_type([
                'name'            => 'quotes_block',
                'title'           => __('Quotes Block'),
                'description'     => __('text with back ground image that is blur'),
                'render_template' => get_template_directory() . '/includes/register-block-templates/quotes-block.php',
                'category'        => 'formatting',
                'icon'            => [
                                        'background' => '#c1c9ad',
                                        'foreground' => '#818381',
                                        'src' => 'text-page',
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
        wp_register_style('quotes-block-editor-style', false);
        wp_enqueue_style('quotes-block-editor-style');
        wp_add_inline_style('quotes-block-editor-style', '
            .wp-block-acf-quotes-block {
                background-color: #818381;
                border: 3px dashed #818381;
                padding: 16px;
                border-radius: 8px;
            }
        ');
    });

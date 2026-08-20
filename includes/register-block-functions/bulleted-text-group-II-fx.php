<?php 
    add_action('acf/init', function() {
        if( function_exists('acf_register_block_type') ) {
            acf_register_block_type([
                'name'            => 'bulleted_text_group_II',
                'title'           => __('Bulleted Text Group II'),
                'description'     => __('Bulleted group composed of titles, icons and repeaters but in column format'),
                'render_template' => get_template_directory() . '/includes/register-block-templates/bulleted-text-group-II.php',
                'category'        => 'formatting',
                'icon'            => [
                                        'background' => '#c1c9ad',
                                        'foreground' => '#bff10d',
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
        wp_register_style('bulleted-text-group-II-editor-style', false);
        wp_enqueue_style('bulleted-text-group-II-editor-style');
        wp_add_inline_style('bulleted-text-group-II-editor-style', '
            .wp-block-acf-bulleted-text-group-II {
                background-color: #bff10d;
                border: 3px dashed #bff10d;
                padding: 16px;
                border-radius: 8px;
            }
        ');
    });
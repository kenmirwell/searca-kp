<?php 
    add_action('acf/init', function() {
      if( function_exists('acf_register_block_type') ) {
          acf_register_block_type([
              'name'            => 'section_name',
              'title'           => __('Section Name'),
              'description'     => __('Invisible anchor point for sidebar navigation — does not display on the front end.'),
              'render_template' => get_template_directory() . '/includes/register-block-templates/section-name-block.php',
              'category'        => 'formatting',
              'icon'            => [
                                    'background' => '#c1c9ad',
                                    'foreground' => '#ff0000',
                                    'src' => 'admin-links',
              ],
              'keywords'        => ['section', 'anchor', 'id', 'nav'],
              'supports'        => [
                  'align'  => false,
                  'anchor' => false,
              ],
          ]);
      }
  });

    add_action('enqueue_block_editor_assets', function() {
        wp_register_style('section-name-editor-style', false);
        wp_enqueue_style('section-name-editor-style');
        wp_add_inline_style('section-name-editor-style', '
            .wp-block-acf-section-name {
                background-color: #000000;
                border: 3px dashed #000000;
                padding: 16px;
                border-radius: 8px;
            }
        ');
    });
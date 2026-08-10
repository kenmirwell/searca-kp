<?php 
    add_action('acf/init', function() {
        if( function_exists('acf_register_block_type') ) {
            acf_register_block_type([
                'name'            => 'key_policy_messages',
                'title'           => __('Key Policy Messages'),
                'description'     => __('A numbered list of policy messages with action implications.'),
                'render_template' => 'template-parts/blocks/key-policy-messages.php',
                'category'        => 'formatting',
                'icon'            => 'megaphone',
                'keywords'        => ['policy', 'messages', 'list'],
                'supports'        => [
                    'align' => false,
                    'anchor' => true,
                ],
            ]);
        }
    });
?>
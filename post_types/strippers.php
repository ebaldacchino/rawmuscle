<?php 
     
    function strippers_post_type() {
    register_post_type('stripper',
        array(
        'rewrite' => array('slug' => 'strippers'),
        'labels' => array(
            'name' => 'Strippers',
            'singular_name' => 'Stripper',
            'add_new_item' => 'Add New Stripper',
            'edit_item' => 'Edit Stripper'
        ),
        'menu_icon' => 'dashicons-universal-access',
        'public' => true,
        'has_archive' => true,
        'supports' => array(
            'title', 'thumbnail', 'editor'
        )
        )
        );
    }

    add_action('init', 'strippers_post_type');

?>
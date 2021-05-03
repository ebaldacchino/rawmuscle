<?php 
    function stripper_custom_meta_boxes( $post_type, $post ) {
    add_meta_box(
        'stripper-meta-box',
        __( 'Secondary Image' ),
        'render_stripper_meta_box',
        array('stripper'), //post types here
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'stripper_custom_meta_boxes', 10, 2 );
 
function render_stripper_meta_box($post) {
    $image = get_post_meta($post->ID, '_stripper_custom_image', true);
    ?> 
        <style>
            .form-control {
                display: flex;
            }
            .form-control > input {
                height: 1rem;
            }
        </style>
        <div class="form-control">
            <a href="#" class="stripper_upload_image_button button button-secondary"><?php _e('Upload Image'); ?></a>  
            
            <input type="text" name="_stripper_custom_image" id="_stripper_custom_image" value="<?php echo $image; ?>" style="width:500px;max-width: 100%;" />  
        </div>   
    <?php
}

function stripper_include_script() {
 
    if ( ! did_action( 'wp_enqueue_media' ) ) {
        wp_enqueue_media();
    }
  
    wp_enqueue_script( 'awscript', get_stylesheet_directory_uri() . '/post_types/awscript.js', array('jquery'), null, false );
}
add_action( 'admin_enqueue_scripts', 'stripper_include_script' );

function stripper_save_postdata($post_id)
{
    if (array_key_exists('_stripper_custom_image', $_POST)) {
        update_post_meta(
            $post_id,
            '_stripper_custom_image',
            $_POST['_stripper_custom_image']
        );
    }
}
add_action('save_post', 'stripper_save_postdata');
?> 

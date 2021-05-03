<?php 
    
function events_post_type() {
  register_post_type('event',
    array(
      'rewrite' => array('slug' => 'events'),
      'labels' => array(
        'name' => 'Events',
        'singular_name' => 'Event',
        'add_new_item' => 'Add New Event',
        'edit_item' => 'Edit Event'
      ),
      'menu_icon' => 'dashicons-tickets-alt',
      'public' => true,
      'has_archive' => true,
      'supports' => array(
        'title'
      ),
      'register_meta_box_cb' => 'event_add_meta_boxes'
    )
  );
}

add_action('init', 'events_post_type');
 
function event_add_meta_boxes( $post ){
	add_meta_box( 'event_meta_box', __( 'Event Info', 'sitepoint' ), 'event_build_meta_box', 'event', 'normal', 'high' ); 
}

add_action( 'add_meta_boxes_event', 'event_add_meta_boxes' );

function event_build_meta_box( $post ) {
   // Add a nonce field so we can check for it later.
    wp_nonce_field( 'event_meta_box_nonce', 'event_meta_box_nonce' );

    $current_date = get_post_meta( $post->ID, '_event_date', true );

    $current_link = get_post_meta( $post->ID, '_event_link', true );

    $current_town = get_post_meta( $post->ID, '_event_town', true );
  
    $current_state = get_post_meta( $post->ID, '_event_state', true ); 

    $states = ['vic', 'qld', 'nsw','act','wa','sa','tas','nt','nz'];
?>
    
    <style> 
      .w100 {
        width: 100%;
      }
      label {
        font-size: 1rem;
        font-weight: 600;
        text-transform: capitalize;
      }
      input {
        margin-bottom: 0.5rem;
      }
      input, select {
        margin-top: 0.25rem;
      }
      select, option {
        text-transform: uppercase;
      }
    </style>
  
    <div class="inside">

      <label for="date">Date</label>
      <input class="w100" type="date" id="date" name="date" value="<?php echo $current_date; ?>" requiredes/>

      <label for="link">Link</label>
      <input class="w100" type="url" id="link" name="link" value="<?php echo $current_link; ?>" required/>

      <label for="town">Town</label>
      <input class="w100" type="text" id="town" name="town" value="<?php echo $current_town; ?>" required/>

      <label for="state">State</label>
      <select class="w100" name="state" id="state" required>  
        <option value="" <?php echo !$current_state ? 'selected' : ''; ?>></option>  
    <?php  
          foreach ($states as $state) {
            $selected = $state === $current_state ? 'selected' : ''; 
            
            echo '<option value="' . $state. '"' . $selected . '>' . $state. '</option>';
          } 
    ?>
      </select>
    </div>
<?php

}

function event_save_meta_boxes_data( $post_id ){
	// verify taxonomies meta box nonce
	// if ( !isset( $_POST['event_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['event_meta_box_nonce'], basename( __FILE__ ) ) ){
	// 	return;
	// }

	// return if autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return;
	}

	// // Check the user's permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ){
		return;
	}

	// store custom fields values 
	if ( isset( $_REQUEST['date'] ) ) {
		update_post_meta( $post_id, '_event_date', sanitize_text_field( $_POST['date'] ) );
	}
	
	if ( isset( $_REQUEST['link'] ) ) {
		update_post_meta( $post_id, '_event_link', sanitize_text_field( $_POST['link'] ) );
	}
	
  if ( isset( $_REQUEST['town'] ) ) {
		update_post_meta( $post_id, '_event_town', sanitize_text_field( $_POST['town'] ) );
	}

  if ( isset( $_REQUEST['state'] ) ) {
		update_post_meta( $post_id, '_event_state', sanitize_text_field( $_POST['state'] ) );
	}
}
add_action( 'save_post_event', 'event_save_meta_boxes_data', 10, 2 );

?>
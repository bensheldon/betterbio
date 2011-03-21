<?php

$prefix = "wb_";

/**
 * Post type and meta boxes for event type.
 *
 * @author Mark Henderson
 */
add_action( 'init', 'create_event_type' );
add_action( 'init', 'create_event_taxonomies', 0 );

function create_event_type() {
  register_post_type( 'events',
    array(
      'labels' => array(
        'name' => __( "Events" ),
        'singular_name' => __( "Post" ),
      ),
      'public' => true,
      'show_ui' => true,
      'capability_type' => 'post',
      'taxonomies' => array("event_categories"),
      'supports' => array('event_categories','title','editor','thumbnail','custom-fields','comments','revisions')
    )
  );
  flush_rewrite_rules();
}

function create_event_taxonomies() 
{
  $labels = array(
    'name' => _x( 'Categories', 'Event Categories' ),
    'singular_name' => _x( 'Category', 'Event singular name' ),
    'search_items' =>  __( 'Search Event Categories' ),
    'all_items' => __( 'All Event Categories' ),
    'parent_item' => __( 'Parent Category' ),
    'parent_item_colon' => __( 'Parent Category:' ),
    'edit_item' => __( 'Edit Category' ), 
    'update_item' => __( 'Update Category' ),
    'add_new_item' => __( 'Add New Category' ),
    'new_item_name' => __( 'New Category' ),
    'menu_name' => __( 'Categories' ),
  ); 	

  register_taxonomy('event_categories',array('event_category'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'event_category' ),
  ));
}

function save_event_details($post_id) {
  global $post;
  
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
    return $post_id;
      
  if(isset($_POST['post_type']) && ($_POST['post_type'] == "drugs")) {
       $featured = $_POST['featured-post'];
       update_post_meta($post_id, 'featured-post', $featured);
  }
}
add_action("save_post", "save_event_details");
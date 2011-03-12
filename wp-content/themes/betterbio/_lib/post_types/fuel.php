<?php

$prefix = "wb_";

/**
 * Post type and meta boxes for inventory type.
 *
 * @author Mark Henderson
 */
add_action( 'init', 'create_fuel_type' );
add_action( 'init', 'create_fuel_taxonomies', 0 );

function create_fuel_type() {
  register_post_type( 'fuel',
    array(
      'labels' => array(
        'name' => __( "Fuel" ),
        'singular_name' => __( "Post" ),
      ),
      'public' => true,
      'show_ui' => true,
      'capability_type' => 'post',
      'taxonomies' => array("fuel_categories"),
      'supports' => array('fuel_categories','title','editor','thumbnail','custom-fields','comments','revisions')
    )
  );
  flush_rewrite_rules();
}

function create_fuel_taxonomies() 
{
  $labels = array(
    'name' => _x( 'Categories', 'Fuel Categories' ),
    'singular_name' => _x( 'Category', 'Fuel singular name' ),
    'search_items' =>  __( 'Search Fuel Categories' ),
    'all_items' => __( 'All Fuel Categories' ),
    'parent_item' => __( 'Parent Category' ),
    'parent_item_colon' => __( 'Parent Category:' ),
    'edit_item' => __( 'Edit Category' ), 
    'update_item' => __( 'Update Category' ),
    'add_new_item' => __( 'Add New Category' ),
    'new_item_name' => __( 'New Category' ),
    'menu_name' => __( 'Categories' ),
  ); 	

  register_taxonomy('fuel_categories',array('fuel_category'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'fuel_category' ),
  ));
}

function save_fuel_details($post_id) {
  global $post;
  
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
    return $post_id;
      
  if(isset($_POST['post_type']) && ($_POST['post_type'] == "fuel")) {
       $featured = $_POST['featured-post'];
       update_post_meta($post_id, 'featured-post', $featured);
  }
}
add_action("save_post", "save_fuel_details");
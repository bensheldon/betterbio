<?php

require_once("_global_content.php");

$prefix = "wb_";

/**
 * Post type and meta boxes for inventory type.
 *
 * @author Mark Henderson
 */
add_action( 'init', 'create_food_type' );
add_action( 'init', 'create_food_taxonomies', 0 );

function create_food_type() {
  register_post_type( 'food',
    array(
      'labels' => array(
        'name' => __( "Food" ),
        'singular_name' => __( "Post" ),
      ),
      'public' => true,
      'show_ui' => true,
      'capability_type' => 'post',
      'taxonomies' => array("food_categories"),
      'supports' => array('food_categories','author','title','editor','thumbnail','custom-fields','comments','revisions')
    )
  );
  flush_rewrite_rules();
}

function create_food_taxonomies() 
{
  $labels = array(
    'name' => _x( 'Categories', 'Food Categories' ),
    'singular_name' => _x( 'Category', 'Food singular name' ),
    'search_items' =>  __( 'Search Food Categories' ),
    'all_items' => __( 'All food Categories' ),
    'parent_item' => __( 'Parent Category' ),
    'parent_item_colon' => __( 'Parent Category:' ),
    'edit_item' => __( 'Edit Category' ), 
    'update_item' => __( 'Update Category' ),
    'add_new_item' => __( 'Add New Category' ),
    'new_item_name' => __( 'New Category' ),
    'menu_name' => __( 'Categories' ),
  ); 	

  register_taxonomy('food_categories', array('food_category'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'food_category' ),
  ));
}

function save_food_details($post_id) {
  global $post;
  
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
    return $post_id;
      
  if(isset($_POST['post_type']) && ($_POST['post_type'] == "food")) {
       $featured = $_POST['featured-post'];
       update_post_meta($post_id, 'featured-post', $featured);
  }
}
add_action("save_post", "save_Food_details");
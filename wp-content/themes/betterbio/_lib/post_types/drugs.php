<?php

$prefix = "wb_";

/**
 * Post type and meta boxes for drugs type.
 *
 * @author Mark Henderson
 */
add_action( 'init', 'create_drug_type' );
add_action( 'init', 'create_drug_taxonomies', 0 );

function create_drug_type() {
  register_post_type( 'drugs',
    array(
      'labels' => array(
        'name' => __( "Drugs" ),
        'singular_name' => __( "Post" ),
      ),
      'public' => true,
      'show_ui' => true,
      'capability_type' => 'post',
      'taxonomies' => array("drug_categories"),
      'supports' => array('drug_categories','title','editor','thumbnail','custom-fields','comments','revisions')
    )
  );
  flush_rewrite_rules();
}

function create_drug_taxonomies() 
{
  $labels = array(
    'name' => _x( 'Categories', 'Drug Categories' ),
    'singular_name' => _x( 'Category', 'Drug singular name' ),
    'search_items' =>  __( 'Search Drug Categories' ),
    'all_items' => __( 'All Drug Categories' ),
    'parent_item' => __( 'Parent Category' ),
    'parent_item_colon' => __( 'Parent Category:' ),
    'edit_item' => __( 'Edit Category' ), 
    'update_item' => __( 'Update Category' ),
    'add_new_item' => __( 'Add New Category' ),
    'new_item_name' => __( 'New Category' ),
    'menu_name' => __( 'Categories' ),
  ); 	

  register_taxonomy('drug_categories',array('drug_category'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'drug_category' ),
  ));
}

function save_drugs_details($post_id) {
  global $post;
  
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
    return $post_id;
      
  if(isset($_POST['post_type']) && ($_POST['post_type'] == "drugs")) {
       $featured = $_POST['featured-post'];
       update_post_meta($post_id, 'featured-post', $featured);
  }
}
add_action("save_post", "save_drugs_details");
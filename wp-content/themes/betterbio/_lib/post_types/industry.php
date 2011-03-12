<?php

$prefix = "wb_";

/**
 * Post type and meta boxes for inventory type.
 *
 * @author Mark Henderson
 */
add_action( 'init', 'create_industry_type' );
add_action( 'init', 'create_industry_taxonomies', 0 );

function create_industry_type() {
  register_post_type( 'industry',
    array(
      'labels' => array(
        'name' => __( "Industry" ),
        'singular_name' => __( "Post" ),
      ),
      'public' => true,
      'show_ui' => true,
      'capability_type' => 'post',
      'taxonomies' => array("industry_categories"),
      'supports' => array('industry_categories','title','editor','thumbnail','comments','custom-fields','revisions')
    )
  );
  flush_rewrite_rules();
}

function create_industry_taxonomies() 
{
  $labels = array(
    'name' => _x( 'Categories', 'Industry Categories' ),
    'singular_name' => _x( 'Category', 'Industry singular name' ),
    'search_items' =>  __( 'Search Industry Categories' ),
    'all_items' => __( 'All Industry Categories' ),
    'parent_item' => __( 'Parent Category' ),
    'parent_item_colon' => __( 'Parent Category:' ),
    'edit_item' => __( 'Edit Category' ), 
    'update_item' => __( 'Update Category' ),
    'add_new_item' => __( 'Add New Category' ),
    'new_item_name' => __( 'New Category' ),
    'menu_name' => __( 'Categories' ),
  ); 	

  register_taxonomy('industry_categories',array('industry_category'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'industry_category' ),
  ));
}

function save_industry_details($post_id) {
  global $post;
  
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
    return $post_id;
      
  if(isset($_POST['post_type']) && ($_POST['post_type'] == "industry")) {
       $featured = $_POST['featured-post'];
       update_post_meta($post_id, 'featured-post', $featured);
  }
}
add_action("save_post", "save_industry_details");
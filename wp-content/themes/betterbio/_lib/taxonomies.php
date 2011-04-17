<?php

function build_taxonomies() {
    register_taxonomy(
    'target',
    array('post', 'article'),
    array(
      'hierarchical' => true,
      'label' => 'Target Area',
      'query_var' => true,
      'rewrite' => true,
    )
  );
  
  register_taxonomy(
    'impact',
    array('post', 'article'),
    array(
      'hierarchical' => true,
      'label' => 'Impact Area',
      'query_var' => true,
      'rewrite' => true,
    )
  );

  // Hide the default category
  register_taxonomy(
    'category',
    array()
  );
  
  // Add Tags to Articles
  register_taxonomy(
    'post_tag',
    array('post','article'),
    array(
      'hierarchical' => false,
      'label' => 'Tags',
      'query_var' => true,
      'rewrite' => true,
    )
  );


}

add_action( 'init', 'build_taxonomies', 0 ); 

/**
 * Unregister the default categories & Tags
 */
// function unregister_taxonomy($taxonomy){
// 	global $wp_taxonomies;
// 	if ( taxonomy_exists( $taxonomy))
// 		unset( $wp_taxonomies[$taxonomy]);
// }
// 
// function remove_default_taxonomies() {
//   unregister_taxonomy('category');
//   unregister_taxonomy('post_tag');
// }
// add_action( 'init', 'remove_default_taxonomies');

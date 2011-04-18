<?php

add_action( 'init', 'build_taxonomies', 0 ); 
function build_taxonomies() {
  
  // Create our 2 new taxonomies
  register_taxonomy(
    'target',
    array('post'),
    array(
      'hierarchical' => true,
      'label' => 'Target Area',
      'query_var' => true,
      'rewrite' => true,
    )
  );
  register_taxonomy(
    'impact',
    array('post'),
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
    array('post','blog'),
    array(
      'hierarchical' => false,
      'label' => 'Tags',
      'query_var' => true,
      'rewrite' => true,
    )
  );
}


/**
 * Add the permalinks
 */
add_filter('post_link', 'permalink_taxonomy_target', 10, 3);
add_filter('post_type_link', 'permalink_taxonomy_target', 10, 3);
function permalink_taxonomy_target($permalink, $post_id, $leavename) {
	
	// try to first get the target category
	if (strpos($permalink, '%target%') === FALSE) {
	  return $permalink;
	}
 
  // Get post
  $post = get_post($post_id);
  //if (!$post) return $permalink;

  // Get taxonomy terms target
  $terms = wp_get_object_terms($post->ID, 'target');	
  if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0])) {
    $taxonomy_target_slug = $terms[0]->slug;
  }
  else {
    $taxonomy_target_slug = 'general';
  }
  
  $terms = wp_get_object_terms($post->ID, 'impact');	
  if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0])) {
    $taxonomy_impact_slug = $terms[0]->slug;
  }
  else {
    $taxonomy_impact_slug = 'general';
  }

	$permalink = str_replace('%target%', $taxonomy_target_slug, $permalink);
	$permalink = str_replace('%impact%', $taxonomy_impact_slug, $permalink);
	return $permalink;
}

/**
 * Define default terms for custom taxonomies in WordPress 3.0.1
 *
 * @author    Michael Fields     http://wordpress.mfields.org/
 * @props     John P. Bloch      http://www.johnpbloch.com/
 *
 * @since     2010-09-13
 * @alter     2010-09-14
 *
 * @license   GPLv2
 */
function mfields_set_default_object_terms( $post_id, $post ) {
    if ( 'publish' === $post->post_status ) {
        $defaults = array(
            'target' => array( 'general' ),
            'impact' => array( 'general' ),
            );
        $taxonomies = get_object_taxonomies( $post->post_type );
        foreach ( (array) $taxonomies as $taxonomy ) {
            $terms = wp_get_post_terms( $post_id, $taxonomy );
            if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
                wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );
            }
        }
    }
}
add_action( 'save_post', 'mfields_set_default_object_terms', 100, 2 );


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

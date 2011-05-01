<?php

$prefix = "wb_";

/**
 * Post type and meta boxes for inventory type.
 *
 * @author Mark Henderson
 */
add_action( 'init', 'create_article_type', 1);
function create_article_type() {
  register_post_type( 'article',
    array(
    'label' => 'News Articles',
    'singular_label' => 'Article',
    'description' => 'News articles by reporters.',
    'public' => TRUE,
    'publicly_queryable' => TRUE,
    'show_ui' => TRUE,
    'query_var' => TRUE,
    'rewrite' => TRUE,
    'capability_type' => 'post',
    'hierarchical' => TRUE,
    'menu_position' => NULL,
    'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'revisions'),
    'menu_position' => 5,
    'rewrite' => false, // define it below
  ));
  
  // Rewrite code taken from here:
  // http://madpress.org/display-date-in-custom-post-type-permalinks/564/
  
  global $wp_rewrite;
  $permalink = 'articles/%author%/%year%/%monthnum%/%article%';
  $wp_rewrite->add_rewrite_tag("%article%", '([^/]+)', "article=");
  $wp_rewrite->add_permastruct('article', $permalink, false);
  
  flush_rewrite_rules();
}

add_filter('post_type_link', 'article_permalink', 10, 3);	  
function article_permalink($permalink, $post_id, $leavename) {
    $post = get_post($post_id);
    $rewritecode = array(
      '%year%',
      '%monthnum%',
      '%day%',
      '%hour%',
      '%minute%',
      '%second%',
      $leavename? '' : '%postname%',
      '%post_id%',
      '%category%',
      '%author%',
      $leavename? '' : '%pagename%',
    );
   
    if ( '' != $permalink && !in_array($post->post_status, array('draft', 'pending', 'auto-draft')) ) {
      $unixtime = strtotime($post->post_date);
   
      $category = '';
      if ( strpos($permalink, '%category%') !== false ) {
        $cats = get_the_category($post->ID);
        if ( $cats ) {
          usort($cats, '_usort_terms_by_ID'); // order by ID
          $category = $cats[0]->slug;
          if ( $parent = $cats[0]->parent )
            $category = get_category_parents($parent, false, '/', true) . $category;
        }
        if ( empty($category) ) {
          $default_category = get_category( get_option( 'default_category' ) );
          $category = is_wp_error( $default_category ) ? '' : $default_category->slug;
        }
      }
   
      $author = '';
      if ( strpos($permalink, '%author%') !== false ) {
        $authordata = get_userdata($post->post_author);
        $author = $authordata->user_nicename;
      }
   
      $date = explode(" ",date('Y m d H i s', $unixtime));
      $rewritereplace =
      array(
        $date[0],
        $date[1],
        $date[2],
        $date[3],
        $date[4],
        $date[5],
        $post->post_name,
        $post->ID,
        $category,
        $author,
        $post->post_name,
      );
      $permalink = str_replace($rewritecode, $rewritereplace, $permalink);
    } else { 
	}
	return $permalink;
}
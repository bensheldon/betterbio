<?php

$prefix = "wb_";

/**
 * Post type and meta boxes for inventory type.
 *
 * @author Mark Henderson
 */

function create_article_type() {
  register_post_type( 'article',
    array(
      'labels' => array(
        'name' => __( "News Articles" ),
        'singular_name' => __( "Article" ),
      ),
      'public' => true,
      'show_ui' => true,
      'capability_type' => 'post',
      'supports' => array('','title','editor','thumbnail','custom-fields','comments','revisions'),
      'menu_position' => 5,
    )
  );
  flush_rewrite_rules();
}

add_action( 'init', 'create_article_type', 1);

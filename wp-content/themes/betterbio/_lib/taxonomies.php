<?php

function build_taxonomies() {
    register_taxonomy(
    'target',
    array('post', 'event'),
    array(
      'hierarchical' => true,
      'label' => 'Target Area',
      'query_var' => true,
      'rewrite' => true,
    )
  );
  
  register_taxonomy(
    'impact',
    array('post', 'event'),
    array(
      'hierarchical' => true,
      'label' => 'Impact Area',
      'query_var' => true,
      'rewrite' => true,
    )
  );
}

add_action( 'init', 'build_taxonomies', 0 ); 
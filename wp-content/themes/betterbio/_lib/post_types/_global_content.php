<?php

function add_featured_boxen() {
  add_meta_box("featured-post", "Feature this post", "bb_featured_post", "food", "normal", "high");
}

function bb_featured_post(){
  global $post;
  
  $meta_value = get_post_meta($post->ID, 'featured-post', true);
  $checked = ($meta_value === "on") ? "checked" : "";
  
  echo "<input type='checkbox' id='featured' name='featured-post' {$checked} />";
  echo '<label for="featured"> Check here to feature this post on the front page slider</label>';
}

if (is_admin() && current_user_can('feature_posts')) add_action('admin_menu', 'add_featured_boxen');
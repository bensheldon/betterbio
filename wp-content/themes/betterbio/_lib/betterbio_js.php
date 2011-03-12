<?php
//function wp_register_script( $handle, $src, $deps = array(), $ver = false, $in_footer = false ) {
//function wp_enqueue_script( $handle, $src = false, $deps = array(), $ver = false, $in_footer = false ) {

//TODO: Refactor the Arthemia JS to in here.
//$javascripts = array("");

if(is_admin()) {
  wp_register_script("bb-admin", get_bloginfo('template_url').DIRECTORY_SEPARATOR.'js'.DIRECTORY_SEPARATOR."bb-admin.js");
  wp_enqueue_script("bb-admin");
}
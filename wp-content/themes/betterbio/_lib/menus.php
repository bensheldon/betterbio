<?php 

  add_action('init', 'register_custom_menu');

  function register_custom_menu() {
    register_nav_menu('top_navigation', __('Top Navigation'));
  }
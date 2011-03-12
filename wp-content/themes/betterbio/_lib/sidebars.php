<?php

if ( function_exists('register_sidebar') ) 
{     
  register_sidebar(array('name' => 'Sidebar Top','before_widget' => '','after_widget' => '','before_title' => '<h3>','after_title' => '</h3>'));     
  register_sidebar(array('name' => 'Sidebar Left','before_widget' => '','after_widget' => '','before_title' => '<h3>','after_title' => '</h3>')); 
  register_sidebar(array('name' => 'Sidebar Right','before_widget' => '','after_widget' => '','before_title' => '<h3>','after_title' => '</h3>'));   
  register_sidebar(array('name' => 'Sidebar Bottom','before_widget' => '','after_widget' => '','before_title' => '<h3>','after_title' => '</h3>'));    
  register_sidebar(array('name' => 'Footer Left','before_widget' => '','after_widget' => '','before_title' => '<h3>','after_title' => '</h3>'));
  register_sidebar(array('name' => 'Footer Center','before_widget' => '','after_widget' => '','before_title' => '<h3>','after_title' => '</h3>')); 
  register_sidebar(array('name' => 'Footer Right','before_widget' => '','after_widget' => '','before_title' => '<h3>','after_title' => '</h3>')); 
}
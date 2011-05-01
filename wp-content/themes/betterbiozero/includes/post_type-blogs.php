<?php

/**
 * Be very specific about Blog Posts
 */

function change_post_menu_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'Blog Posts';
	$submenu['edit.php'][5][0] = 'Blog Posts';
	$submenu['edit.php'][10][0] = 'Add Post';
	echo '';
}
function change_post_object_label() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'Blog Posts';
	$labels->singular_name = 'Blog Post';
	$labels->add_new = 'Add Blog Post';
	$labels->add_new_item = 'Add Post';
	$labels->edit_item = 'Edit Post';
	$labels->new_item = 'Blog Post';
	$labels->view_item = 'View posts';
	$labels->search_items = 'Search Blog Posts';
	$labels->not_found = 'No Blog Posts found';
	$labels->not_found_in_trash = 'No Blog Posts found in Trash';

}
add_action( 'init', 'change_post_object_label',0 );
add_action( 'admin_menu', 'change_post_menu_label',0 );

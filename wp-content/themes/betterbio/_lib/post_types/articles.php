<?php

/**
 * Rename the default 'Posts' to be News Articles
 */

function change_post_menu_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'News Articles';
	$submenu['edit.php'][5][0] = 'News Articles';
	$submenu['edit.php'][10][0] = 'Add Article';
	echo '';
}
function change_post_object_label() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'News Articles';
	$labels->singular_name = 'News Article';
	$labels->add_new = 'Add Article';
	$labels->add_new_item = 'Add Article';
	$labels->edit_item = 'Edit Article';
	$labels->new_item = 'Article';
	$labels->view_item = 'View articles';
	$labels->search_items = 'Search News Articles';
	$labels->not_found = 'No Articles found';
	$labels->not_found_in_trash = 'No Articles found in Trash';

}
add_action( 'init', 'change_post_object_label',0 );
add_action( 'admin_menu', 'change_post_menu_label',0 );

<?php
/**
 * Here's what we're aiming for. Note that there's
 * a bit of room to grow.
 * 
 * Admin            Level 10
 * Senior Editor    Level 9
 * -------          Level 8
 * Content Editor   Level 7
 * Content Author   Level 6
 * ????????         Level 5
 * Media Editor     Level 4
 * Media Author     Level 3
 * News Contributor Level 2
 * ?????????        Level 1
 * Subscriber       Level 0
 *
 * ----------------
 * For your health:
 * ----------------
 * I don't know what rights will be added with future updates 
 * and I would like the other roles' rights to "trickle down" 
 * from admin and have the admin retain default rights from 
 * WordPress itself and be updated accordingly. However, the 
 * default administrator rights will look something like below:
 *
 * $capabilities = array( 
 *  "switch_themes" => true,
 *  "edit_themes" => true,
 *  "activate_plugins" => true,
 *  "edit_plugins" => true,
 *  "edit_users" => true,
 *  "edit_files" => true,
 *  "manage_options" => true,
 *  "moderate_comments" => true,
 *  "manage_categories" => true,
 *  "manage_links" => true,
 *  "upload_files" => true,
 *  "import" => true,
 *  "unfiltered_html" => true,
 *  "edit_posts" => true,
 *  "edit_others_posts" => true,
 *  "edit_published_posts" => true,
 *  "publish_posts" => true,
 *  "edit_pages" => true,
 *  "read" => true,
 *  "level_10" => true,
 *  "level_9" => true,
 *  "level_8" => true,
 *  "level_7" => true,
 *  "level_6" => true,
 *  "level_5" => true,
 *  "level_4" => true,
 *  "level_3" => true,
 *  "level_2" => true,
 *  "level_1" => true,
 *  "level_0" => true,
 *  "edit_others_pages" => true,
 *  "edit_published_pages" => true,
 *  "publish_pages" => true,
 *  "delete_pages" => true,
 *  "delete_others_pages" => true,
 *  "delete_published_pages" => true,
 *  "delete_posts" => true,
 *  "delete_others_posts" => true,
 *  "delete_published_posts" => true,
 *  "delete_private_posts" => true,
 *  "edit_private_posts" => true,
 *  "read_private_posts" => true,
 *  "delete_private_pages" => true,
 *  "edit_private_pages" => true,
 *  "read_private_pages" => true,
 *  "delete_users" => true,
 *  "create_users" => true,
 *  "unfiltered_upload" => true,
 *  "edit_dashboard" => true,
 *  "update_plugins" => true,
 *  "delete_plugins" => true,
 *  "install_plugins" => true,
 *  "update_themes" => true,
 *  "install_themes" => true,
 *  "update_core" => true,
 *  "list_users" => true,
 *  "remove_users" => true,
 *  "add_users" => true,
 *  "promote_users" => true,
 *  "edit_theme_options" => true,
 *  "delete_themes" => true,
 *  "export" => true,
 *  "feature_posts" => true
 * );
**/
  
if(isset($_GET['flush_user_roles']) && is_admin()) {
  
  // Strategy: start with the admin rights and whittle down.
  $default_capabilities = get_option("wp_user_roles");
  $capabilities = $default_capabilities['administrator']['capabilities'];
  
  // Helper function to help with the whittling.
  if(!function_exists("forbid_user_capabilities")) {
    function forbid_user_capabilities($default_capabilities, $forbidden_capabilities = array()) {
      foreach($forbidden_capabilities as $forbid) {
        unset($default_capabilities[$forbid]);
      }

      return $default_capabilities;
    }    
  }
  
  
  // Add some custom roles to the admin.
  $wp_roles = new WP_Roles();
  $wp_roles->add_cap( 'administrator', 'feature_posts' );
 
  // Remove the generic editor/author/contributor roles.
  // Note that subscriber gets left alone in all of this.
  remove_role('editor');
  remove_role('author');
  remove_role('contributor');

  // Removing these so we can re-add them.
  remove_role('senior_editor');
  remove_role('content_editor');
  remove_role('content_author');
  remove_role('media_editor');
  remove_role('media_author');
  remove_role('news_contributor');

  // Senior Editors should be able to do everything that the admin can
  // except for editing the blog layout and editing other users
  $senior_editor_forbidden = array("switch_themes", "edit_themes", "activate_plugins",
                                   "edit_plugins", "edit_users", "manage_options", "level_10",
                                   "delete_users", "create_users", "edit_dashboard", "update_plugins",
                                   "delete_plugins", "install_plugins", "update_themes", "install_themes",
                                   "update_core", "remove_users", "add_users", "promote_users",
                                   "edit_theme_options", "delete_themes");
  $capabilities = forbid_user_capabilities($capabilities, $senior_editor_forbidden);
  add_role( 'senior_editor', 'Senior Editor', $capabilities );
  
  // Remember, we're trickling down from the above capabilities
  $content_editor_forbidden = array("manage_links", "import", "export", "level_9", "level_8", "edit_pages",
                                    "edit_others_pages", "edit_published_pages", "publish_pages", "delete_pages",
                                    "delete_others_pages", "delete_published_pages", "edit_private_pages",
                                    "feature_posts", "delete_private_pages", "unfiltered_upload");
  $capabilities = forbid_user_capabilities($capabilities, $content_editor_forbidden);
  add_role( 'content_editor', 'Content Editor', $capabilities );

  add_role( 'media_editor', 'Media Editor', $capabilities );

  $content_author_forbidden = array("edit_files", "moderate_comments", "manage_categories", "unfiltered_html",
                                    "edit_others_posts", "edit_published_posts", "publish_posts", "level_7",
                                    "delete_others_posts", "delete_published_posts", "delete_private_posts",
                                    "read_private_posts", "edit_private_posts", "list_users", "read_private_pages");
  $capabilities = forbid_user_capabilities($capabilities, $content_author_forbidden);
  add_role( 'content_author', 'Content Author', $capabilities );
  
  add_role( 'media_author', 'Media Author', $capabilities );

  $news_contributor_forbidden = array("level_3", "upload_files", "delete_posts");
  $capabilities = forbid_user_capabilities($capabilities, $content_author_forbidden);
  add_role( 'news_contributor', 'News Contributor', $capabilities );

  header("Location:/wp-admin");
}

// Hiding posts from everybody but the current author for 
function posts_for_current_author($query) {
	global $current_user;

  if($query->is_admin && (isset($current_user->caps["content_author"]) 
                          || isset($current_user->caps["media_author"]) 
                          || isset($current_user->caps["news_contributor"]))) {
		global $user_ID;
		$query->set('author',  $user_ID);
		unset($user_ID);
	}
	unset($user_level);

	return $query;
}
add_filter('pre_get_posts', 'posts_for_current_author');
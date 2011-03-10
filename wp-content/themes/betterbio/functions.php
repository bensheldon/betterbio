<?php 

require_once("lib/betterbio_roles.php");
require_once("lib/post_types/industry.php");
require_once("lib/post_types/drugs.php");
require_once("lib/post_types/food.php");
require_once("lib/post_types/fuel.php");
require_once("lib/post_types/blogs.php");
require_once("lib/post_types/podcast.php");

error_reporting(0);
$ThemeName = "Arthemia Premium";

// sidebar stuff
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

// WP bug workaround to get W3C compliant
remove_filter('term_description','wpautop');


// excerpt
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'custom_trim_excerpt');

function custom_trim_excerpt($text) { // Fakes an excerpt if needed
global $post;
	if ( '' == $text ) {
		$text = get_the_content('');

		$text = strip_shortcodes( $text );

		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]&gt;', $text);
		$text = strip_tags($text);
		$excerpt_length = apply_filters('excerpt_length', 35);
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words) > $excerpt_length) {
			array_pop($words);
			array_push($words, '...');
			$text = implode(' ', $words);
		}
	}
	return $text;
}

// manual timthumb
function timthumb($atts) {

//Check if custom field key "Image" has a value
$values = get_post_custom_values("Image");

extract(shortcode_atts(array(
		"width" => '150',
		"height" => '150',
		"quality" => '90',
		"orientation" => 'left'
	), $atts));

$home = get_option('home');
$images = $values[0];
$bloginfo = get_bloginfo('template_url');
$alt = the_title("","",false);

if (isset($values[0])) {
$thumb .= '<img src="'.$bloginfo.'/scripts/timthumb.php?src='.$home.'/'.$images.'&amp;w='.$width.'&amp;h='.$height.'&amp;zc=1&amp;q='.$quality.'" width="'.$width.'px" height="'.$height.'px" class="'.$orientation.'" alt="'.$alt.'" />';
	}

return $thumb;

}

add_shortcode("thumb", "timthumb");


// offset and pagination
function my_post_limit($limit) {
	global $paged, $myOffset;
	if (empty($paged)) {
			$paged = 1;
	}
	$postperpage = intval(get_option('posts_per_page'));
	$pgstrt = ((intval($paged) -1) * $postperpage) + $myOffset . ', ';
	$limit = 'LIMIT '.$pgstrt.$postperpage;
	return $limit;
}

include("lib/themepage.php");

// Plugin by Steve Smith - http://orderedlist.com/wordpress-plugins/feedburner-plugin/ and feedburner - http://www.feedburner.com/fb/a/help/wordpress_quickstart
function feed_redirect() {

	global $wp, $feed, $withcomments;
	
	$newURL1 = trim( get_settings( "cp_feedlinkURL" ) );
	$newURL2 = trim( get_settings( "cp_feedlinkComments" ) );
	
	if( is_feed() ) {

		if ( $feed != 'comments-rss2' 
				&& !is_single() 
				&& $wp->query_vars[ 'category_name' ] == ''
				&& !is_author() 
				&& ( $withcomments != 1 )
				&& $newURL1 != '' ) {
		
			if ( function_exists( 'status_header' ) ) { status_header( 302 ); }
			header( "Location:" . $newURL1 );
			header( "HTTP/1.1 302 Temporary Redirect" );
			exit();
			
		} elseif ( ( $feed == 'comments-rss2' || $withcomments == 1 ) && $newURL2 != '' ) {
	
			if ( function_exists( 'status_header' ) ) { status_header( 302 ); }
			header( "Location:" . $newURL2 );
			header( "HTTP/1.1 302 Temporary Redirect" );
			exit();
			
		}
	
	}

}

function feed_check_url() {

	switch ( basename( $_SERVER[ 'PHP_SELF' ] ) ) {
		case 'wp-rss.php':
		case 'wp-rss2.php':
		case 'wp-atom.php':
		case 'wp-rdf.php':
		
			$newURL = trim( get_settings( "cp_feedlinkURL" ) );
			
			if ( $newURL != '' ) {
				if ( function_exists('status_header') ) { status_header( 302 ); }
				header( "Location:" . $newURL );
				header( "HTTP/1.1 302 Temporary Redirect" );
				exit();
			}
			
			break;
			
		case 'wp-commentsrss2.php':
		
			$newURL = trim( get_settings( "cp_feedlinkComments" ) );
			
			if ( $newURL != '' ) {
				if ( function_exists('status_header') ) { status_header( 302 ); }
				header( "Location:" . $newURL );
				header( "HTTP/1.1 302 Temporary Redirect" );
				exit();
			}
			
			break;
	}
}

if (!preg_match("/feedburner|feedvalidator/i", $_SERVER['HTTP_USER_AGENT'])) {
	add_action('template_redirect', 'feed_redirect');
	add_action('init','feed_check_url');
}
add_action( 'admin_menu', 'cp_addThemePage' );

add_action( 'wp_print_scripts', 'arthemia_add_javascript' );
function arthemia_add_javascript( ) {
	if (is_home()) {
		wp_enqueue_script('jquery');
		wp_enqueue_script( 'jquery.jcarousel.pack', get_bloginfo('template_directory').'/scripts/jquery.jcarousel.pack.js', array( 'jquery' ) ); }
	}

?>
<!doctype html>
<!--

Theme: HTML5 Bolierplate WordPress Theme
Original Author: Jeffrey Sambells
URL: http://github.com/iamamused/wp-theme-html5-boilerplate

Like this theme? Want to "borrow" aspects of it? No Problem!

This theme is based on the http://html5boilerplate.com project and can
be found in my github repos over at http://github.com/iamamused

I'd kindly ask that if you're going to "borrow" it, please change up
the CSS and design so it's at least not identical to my site.

Thanks,

Jeffrey 

-->
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ --> 
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html <?php language_attributes(); ?> class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

  <title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
  <meta name="description" content="<?php bloginfo('tagline'); ?>">
  <meta name="author" content="">

  <!--  Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.pngx">
  <link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/apple-touch-icon.pngx ">


  <!-- CSS : implied media="all" -->
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?v=1">

  <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
  <script src="<?php bloginfo('template_url'); ?>/js/modernizr-1.5.min.js"></script>


  <!-- Pingback url -->
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

  <!-- wp_head() content added by plugins etc. -->	
  <?php wp_head(); ?>
  
</head>

<body <?php body_class(); ?>>


  <div id="wrapper">
  
    <header id="header" role="banner" class="clearfix"> 
        <h1 id="site-title"><a href="/">BetterBio</a><h1>
        
        <div id="site-description"> 
          <p>BetterBio reinforces the intimate connection between life and science.</p> 
        </div>
        
        <nav id="secondary-nav" role="navigation"> 
          <div class="skip-link screen-reader-text"><a href="#content" title="Skip to content">Skip to content</a></div>
          <ul> 
            <li><a href="home">About Us</a></li> 
            <li><a href="http://billybrown.tumblr.com">Contact</a></li> 
            <li><a href="more">Donate</a></li> 
          </ul> 
        </nav>
        
      <nav id="primary-nav" role="navigation">
				<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
      </nav>
        
      </header> 
     
    <div id="main">
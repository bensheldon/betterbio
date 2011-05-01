<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<div id="container">
		  <div id="front">
		    
		    <div id="recent-articles">
		      <?php get_template_part( 'loop', 'front-carousel' ); ?>
        </div>
		  
		  	<div id="front-featured">
		  	  <h1>Featured News</h1>
		      <?php get_template_part( 'loop', 'front-featured' ); ?>
		    </div><!-- #front-featured -->
		  
		    <div id="front-blogs">
		      <h1>Community Blogs</h1>
		      <?php get_template_part( 'loop', 'front-blogs' ); ?>
		    <div><!-- #front-blogs -->		  
		  </div><!-- #front -->
		</div><!-- #container -->


<?php get_footer(); ?>

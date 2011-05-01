 <?php 
  $blogs_query = new WP_Query( array ( 
//       'category_name' => 'The Category Name', 
      'posts_per_page' => 3,
      'post_type' => 'post' ) );
?>
 
 <?php while( $blogs_query->have_posts() ) : $blogs_query->the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
      <?php print get_avatar($user->ID, $size = '60') ?>
      <div class="entry-content">
            <h1 class="entry-title">
              <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
<span class="author"><?php the_author() ?></span> &mdash; <?php the_title(); ?></a>
            </h1>
          
          <?php the_flexible_excerpt(30, 'Read the rest of this entry &raquo;', '', 'span'); ?>
        </div>
		</article>


 <!-- Stop The Loop (but note the "else:" - see next line). -->
 <?php endwhile; wp_reset_postdata(); ?>

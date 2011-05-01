 <?php 
  $featured_query = new WP_Query( array ( 
//       'author_name' => 'admin', 
      'posts_per_page' => 6 ) );
?>
 

 
  <ul id="article-carousel" class="jcarousel-skin-tango">
 
 <?php while( $featured_query->have_posts() ) : $featured_query->the_post(); ?>

    <li>
        <?php //print get_avatar($user->ID, $size = '60') ?>
        <?php the_title(); ?>
    </li>

 <!-- Stop The Loop (but note the "else:" - see next line). -->
<?php endwhile; wp_reset_postdata(); ?>
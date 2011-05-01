 <?php 
  $featured_query = new WP_Query( array ( 
//       'author_name' => 'admin',
      'post_type' => 'article',
      'posts_per_page' => 6 ) );
?>
 

 
  <ul id="article-carousel" class="jcarousel-skin-tango">
 
 <?php while( $featured_query->have_posts() ) : $featured_query->the_post(); ?>

    <li>
      <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
        <?php the_post_thumbnail( 'carousel-thumb' ); ?> 
        <div class="carousel-title"><?php the_title(); ?></div>
      </a>
    </li>

 <!-- Stop The Loop (but note the "else:" - see next line). -->
<?php endwhile; wp_reset_postdata(); ?>
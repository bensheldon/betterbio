 <?php 
  $featured_query = new WP_Query( array ( 
      'author_name' => 'khadijah', 
      'posts_per_page' => 1,
      'post_type' => 'post' ) );
?>
 
 <?php while( $featured_query->have_posts() ) : $featured_query->the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('featured'); ?>>
      <?php print get_avatar($user->ID, $size = '60') ?>
      <div class="entry-content">
            <h1 class="entry-title">
              <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
<span class="author"><?php the_author() ?></span> &mdash; <?php the_title(); ?></a>
            </h1>
          
          <?php the_flexible_excerpt(20, 'Read the rest of this entry &raquo;', '', 'span'); ?>
        </div>
		</article>

    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras volutpat ante eget nulla iaculis consequat. Praesent accumsan, justo vel ullamcorper elementum, metus orci rutrum dui, non tincidunt augue justo et nunc. Duis ut ipsum id massa hendrerit commodo quis non neque. Mauris ultrices nibh in ipsum ullamcorper vehicula. Phasellus in dui augue. Vestibulum condimentum lobortis laoreet. Maecenas non erat sit amet arcu vulputate accumsan. Donec quis lorem nisl. Nulla dictum enim id velit consectetur nec placerat tellus condimentum. Donec non ipsum quis est adipiscing faucibus ac at massa.

 <!-- Stop The Loop (but note the "else:" - see next line). -->
<?php endwhile; wp_reset_postdata(); ?>
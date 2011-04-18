<?php
  //TODO: Move queries up here
  $first_post = new WP_Query(array(
    'post_type' => array( 'post' ),
    'showposts' => 1
  ));
  
  $front_listing = new WP_Query(array(
    'post_type' => array( 'post' ),
		'offset' => 1,
		'paged' => $paged,
		'showposts' => 10
  ));
?>
<?php get_header(); ?>

	<div id="bottom" class="clearfloat">
		<div id="bottom-left">
      <?php if(!is_paged()) { ?>	
        <div id="front-list">
	        <?php while ($first_post->have_posts()) : $first_post->the_post(); ?>		
            <?php global $ar_ID; global $post; $ar_ID[] = $post->ID; ?>
	          <div class="clearfloat">
	            <h3 class="cat_title"><a href="/<?php echo $post->post_type; ?>"><?php echo ucfirst($post->post_type); ?> &raquo;</a></h3>
	            <span class="title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></span>
	            <div class="meta">
	              <?php the_time(get_option('date_format')); ?> &#150;
	              <?php the_time(); ?> |
	              <?php comments_popup_link(__('No Comment','arthemia'), __('One Comment','arthemia'), __('% Comments','arthemia'));?>
	            </div>		
	
              <?php $status = get_option ( "cp_postThumb" ); ?>
		          <?php if ($status != "no" ): ?>
              <p>
	              <?php the_post_thumbnail("listing_thumb", array("class" => "left")); ?>
	            </p>
	            <?php endif; ?>

	            <?php the_content(__('Read the full story &raquo;','arthemia')); ?>
	          </div>
      	<?php endwhile; ?>
	    </div>
	  <?php } ?>

	  <?php $column = get_option ( "cp_status_Column" ); ?>
		<?php if ( $column != "one" ) { ?>	

	    <div id="paged-list">
	      <?php add_filter('post_limits', 'my_post_limit'); ?>
	      <?php if ($front_listing->have_posts()) : ?>
		      <?php $i = 1; ?>
          
          <?php while ($front_listing->have_posts()) : $front_listing->the_post(); ?>	
            <?php global $ar_ID; global $post; $ar_ID[] = $post->ID; ?>
            
            <?php if( $odd = $i%2 ) { echo '<div class="clearfloat">'; } ?>
              <div class="tanbox <?php if( $odd = $i%2 ) { echo 'left'; } else { echo 'right'; } ?>">
		            <span class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></span>
		            <div class="meta"><?php the_time(get_option('date_format')); ?> &#150; <?php the_time(); ?> | <?php comments_popup_link(__('No Comment','arthemia'), __('One Comment','arthemia'), __('% Comments','arthemia'));?></div>
	
	              <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
	                <?php the_post_thumbnail("tiny_thumb", array("class" => "left")); ?>
	              </a>

		            <?php $status = get_option ( "cp_excerptColumn" );		if ( $status != "no" ) { ?>
		              <?php the_excerpt() ?>
		            <?php } ?>
	            </div>
	          <?php if( $odd = $i%2 ) { } else { echo '</div>'; } ?>
          <?php $i++; endwhile; ?>
	      
	        <?php if( $odd = $i%2 ) { } else { echo '</div>'; } ?>
		      <div id="navigation">
	          <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
          </div>
	      <?php endif; ?>
	    </div>

	  <?php } else { ?>
    
	    <div id="paged-list">	
	      <?php add_filter('post_limits', 'my_post_limit'); ?>
	    
	      <?php if ($front_listing->have_posts()) : ?>
        
	      	<?php while ($front_listing->have_posts()) : $front_listing->the_post(); ?>	
	          <?php global $ar_ID; global $post; $ar_ID[] = $post->ID; ?>
              
	      	  <div class="onecolumn clearfloat">
	      	    <span class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></span>
	      	    <div class="meta"><?php the_time(get_option('date_format')); ?> &#150; <?php the_time(); ?> | <?php comments_popup_link(__('No Comment','arthemia'), __('One Comment','arthemia'), __('% Comments','arthemia'));?></div>
	      
	            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
                <?php the_post_thumbnail("onecol_tiny_thumb", array("class" => "left")); ?>
              </a>
        
	      	    <?php $status = get_option ( "cp_excerptColumn" );		if ( $status != "no" ) { ?>
	      	      <?php the_excerpt() ?>
	      	    <?php } ?>
	      	  </div>
	      	<?php endwhile; ?>
	      		
	      	<div id="navigation">
	      	  <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
	      	</div>
        
	      <?php endif; ?>
	    </div>
	  
	  <?php } ?>	

	  <?php $wp_query = null; $wp_query = $temp;?>
	  <?php remove_filter('post_limits', 'my_post_limit'); ?>

	</div>
	<?php get_sidebar(); ?>

</div>	

<?php get_footer(); ?>

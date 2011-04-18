<?php
  $featured = new WP_Query(array(
    'showposts' => 1,
    'post_type' => array('industry', 'food', 'fuel', 'drugs') 
  ));
  
  //TODO: Blogs Query stuff and avatars
?>

<div id="top" class="clearfloat">
	<?php if (is_home() && !is_paged()) { ?>
		<div id="headline">
		  <?php while ($featured->have_posts()) : $featured->the_post(); ?>	
	      <div class="label">
  		    <a href="<?php the_post_type_permalink(); ?>"><?php echo ucfirst($post->post_type); ?> &raquo;</a>
  		  </div> 
	      
	      <div class="clearfloat">
          <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
            <?php the_post_thumbnail('front_featured', array("class" => "left")); ?>
            <?php /* ?><img src="<?php echo bloginfo('template_url'); ?>/scripts/timthumb.php?src=<?php
            $values = get_post_custom_values("Image"); echo $values[0]; ?>&amp;w=<?php echo $width; ?>&amp;h=<?php echo $height; ?>&amp;zc=1&amp;q=100"
            alt="<?php the_title(); ?>" class="left" <?php if ($style != "wide") { } else { echo "style=\"margin-bottom:10px;padding:0px;\""; } ?> width="<?php echo $width; ?>px" height="<?php echo $height; ?>px"  /> */ ?>
          </a>
	
	        <div class="title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></div>
	        <div class="meta"><?php the_time(get_option('date_format')); ?> &#150; <?php the_time(); ?> | <?php comments_popup_link(__('No Comment','arthemia'), __('One Comment','arthemia'), __('% Comments','arthemia'));?></div>	
		      <?php the_excerpt() ?>
	        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php _e('Read the full story &raquo;','arthemia');?></a>
	      </div>
	    <?php endwhile; ?>
	  </div>
    
    <div id="featured">
	
	<?php
		//Get value from Admin Panel
			$cp_categories = get_categories('hide_empty=0');
			$ar_featured = get_option( "ar_featured" );
		 	?>

	<div class="label"><a href="<?php echo get_category_link($ar_featured);?>">Blogs &raquo;</a></div>
	
	<ul id="mycarousel" class="jcarousel-skin-arthemia">
    <?php foreach($ar_featured as $user): 
      $userdata = get_userdata($user); 
      
      $full_name = $userdata->first_name.' '.$userdata->last_name;
    ?>
      <li>
	      <div class="clearfloat">
          <?php if (isset($values[0])): ?>
            <a href="/author/<?php echo $userdata->user_nicename; ?>" rel="bookmark" title="Permanent Link to <?php echo $full_name; ?>">
              <?php echo get_avatar( $user, $size = '96', $default = '<path_to_url>' ); ?>
            </a>
	        <?php endif ?>
	        
	          <div class="info">
	            <a href="/author/<?php echo $userdata->user_nicename; ?>" rel="bookmark" class="title"><?php echo $full_name; ?></a>
              <div class="meta"><?php the_time(get_option('date_format')); ?> &#150; <?php the_time('G:i') ?> | <?php comments_popup_link('No Comment', 'One Comment', '% Comments');?></div>	
          </div>
    	</div>
	  </li>
      <?php endforeach; ?>

	<?php wp_reset_query(); ?>

    </ul>
    
	</div>

	</div>

	<?php } ?>
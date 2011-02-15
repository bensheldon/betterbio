<?php
  // Move query options up here.
?>

<div id="top" class="clearfloat">
	<?php if (is_home() && !is_paged()) { ?>
		<div id="headline">
		  <?php
		    query_posts( array(
		      'showposts' => 1,
		      'post_type' => 'industry') 
		    );
		  ?>
		  <?php while (have_posts()) : the_post(); ?>	
	      <div class="label">
  		    <?php /* ?><a href="<?php echo get_category_link(0);?>"><?php single_cat_title(); ?> &raquo;</a> */ ?>
  		  </div> 
	      
	      <div class="clearfloat">
	<?php $style = get_settings ( "cp_styleHead" );
        if ( $style != "wide" ) { $width = 200; $height = 225; }
		else { $width = 550; $height = 230; }
	?>
	<?php $status = get_settings ( "cp_thumbAuto" );
		if ( $status != "first" ) { ?>
	<?php $values = get_post_custom_values("Image");
	if (isset($values[0])) { ?>
 	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
<img src="<?php echo bloginfo('template_url'); ?>/scripts/timthumb.php?src=<?php
$values = get_post_custom_values("Image"); echo $values[0]; ?>&amp;w=<?php echo $width; ?>&amp;h=<?php echo $height; ?>&amp;zc=1&amp;q=100"
alt="<?php the_title(); ?>" class="left" <?php if ($style != "wide") { } else { echo "style=\"margin-bottom:10px;padding:0px;\""; } ?> width="<?php echo $width; ?>px" height="<?php echo $height; ?>px"  /></a>
 	<?php } ?>
	<?php } else { ?>
	<?php $id =$post->ID;
$the_content =$wpdb->get_var("SELECT post_content FROM $wpdb->posts WHERE ID = $id");
$pattern = '!<img.*?src="(.*?)"!';
preg_match_all($pattern, $the_content, $matches);
$image_src = $matches['1'][0]; ?>
	<?php if($image_src != '') { ?><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
<img src="<?php echo bloginfo('template_url'); ?>/scripts/timthumb.php?src=<?php echo $image_src; ?>&amp;w=<?php echo $width; ?>&amp;h=<?php echo $height; ?>&amp;zc=1&amp;q=100"
    alt="<?php the_title(); ?>" class="left" <?php if ($style != "wide") { } else { echo "style=\"margin-bottom:10px;padding:0px;\""; } ?> width="<?php echo $width; ?>px" height="<?php echo $height; ?>px"  /></a><?php } ?>
	<?php } ?>
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
			$ar_featured = get_settings( "ar_featured" );
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

	<?php } else { ?>
	<?php 	//Get value from Admin Panel
			$cp_categories = get_categories('hide_empty=0');
			$ar_headline = get_settings( "ar_headline" );
			if( $ar_headline == 0 ) { $ar_headline = $cp_categories[0]->cat_ID; }
			
            $showheadline1 = get_settings ( "cp_showpostheadline" );
            $showheadline2 = get_settings ( "cp_showarchiveheadline" );
            if ( (is_home() && is_paged()) || (is_search() && $showheadline2 != "no") || (is_archive() && $showheadline2 != "no") || (is_single() && $showheadline1 != "no") ) {
          
            query_posts( 'showposts=1&cat=' . $ar_headline ); ?>
          
	<?php while (have_posts()) : the_post(); ?>	
	<div id="single_head">
	<?php $status = get_settings ( "cp_thumbAuto" );
		if ( $status != "first" ) { ?>

	<?php $values = get_post_custom_values("Image");
	if (isset($values[0])) { ?>
	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
<img src="<?php echo bloginfo('template_url'); ?>/scripts/timthumb.php?src=<?php
$values = get_post_custom_values("Image"); echo $values[0]; ?>&amp;w=175&amp;h=150&amp;zc=1&amp;q=100"
alt="<?php the_title(); ?>" class="left" width="175px" height="150px"  /></a>
	<?php } ?>
	<?php } else { ?>
	<?php $id =$post->ID;
$the_content =$wpdb->get_var("SELECT post_content FROM $wpdb->posts WHERE ID = $id");
$pattern = '!<img.*?src="(.*?)"!';
preg_match_all($pattern, $the_content, $matches);
$image_src = $matches['1'][0]; ?>
				
	<?php if($image_src != '') { ?><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
<img src="<?php echo bloginfo('template_url'); ?>/scripts/timthumb.php?src=<?php echo $image_src; ?>&amp;w=175&amp;h=150&amp;zc=1&amp;q=100"
    alt="<?php the_title(); ?>" class="left" width="175px" height="150px"  /></a><?php } ?>

	<?php } ?>
	</div>
	<div id="single_desc">
	<div class="label"><a href="<?php echo get_category_link($ar_headline);?>"><?php single_cat_title(); ?> &raquo;</a></div>
	<div class="cleafloat"><div class="title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></div>
	<div class="meta"><?php the_time(get_option('date_format')); ?> &#150; <?php the_time(); ?> | <?php comments_popup_link(__('No Comment','arthemia'), __('One Comment','arthemia'), __('% Comments','arthemia'));?></div>	
	<?php the_excerpt(); ?>
	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php _e('Read the full story &raquo;','arthemia');?></a>
   	</div></div>
    <?php endwhile; ?>
	<?php wp_reset_query(); ?>
<?php } ?>
</div>
<!--</div>-->

<?php } ?>
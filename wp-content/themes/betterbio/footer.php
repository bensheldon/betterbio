<?php wp_reset_query(); ?>
<?php if (!is_home()) { ?></div><?php } ?>

</div>

<?php $showgallery1 = get_option ( "cp_showpostgallery" );
      $showgallery2 = get_option ( "cp_showarchivegallery" );
	$showgallery3 = get_option ( "cp_showindexgallery" );

		  if ( (is_home() && $showgallery3 != "no") || (is_search() && $showgallery2 != "no") || (is_archive() && $showgallery2 != "no") || (is_single() && $showgallery1 != "no") ) { ?>
          
<div id="gallery" class="clearfloat">
    
    <div id="random">
    <h3><?php _e('Random Posts','arthemia');?></h3>
    
    <?php $width = get_option ( "cp_thumbWidth_Gallery" );
		$height = get_option ( "cp_thumbHeight_Gallery" );
		if ( $width == 0 ) { $width = 80; }
		if ( $height == 0 ) { $height = 80; }
        $status = get_option ( "cp_thumbAuto" );
	?>
    
    <?php $randompost = $wpdb->get_results("SELECT ID FROM $wpdb->posts WHERE post_status = 'publish' ORDER BY RAND() LIMIT 12"); 

		foreach ($randompost as $post) { 	
			$ID = $post->ID;
            $postid = get_post($post->ID); 
            $title = $postid->post_title;
            $values = $wpdb->get_var("SELECT meta_value FROM $wpdb->postmeta WHERE post_id = $ID AND meta_key = 'Image' ");
            ?>	
    
    <?php if ( $status != "first" ) { ?>

	<?php
	if (isset($values)) {
	?>
		<a href="<?php echo get_permalink($postid); ?>" rel="bookmark" title="<?php echo $title; ?>"><img src="<?php echo bloginfo('template_url'); ?>/scripts/timthumb.php?src=<?php
echo $values; ?>&amp;w=<?php echo $width; ?>&amp;h=<?php echo $height; ?>&amp;zc=1&amp;q=100"
alt="<?php echo $title; ?>" class="left" width="<?php echo $width; ?>px" height="<?php echo $height; ?>px"  /></a>
		<?php } ?>

	<?php } else { ?>

	<?php $id =$post->ID;
$the_content =$wpdb->get_var("SELECT post_content FROM $wpdb->posts WHERE ID = $id");
$home = get_option('home');
$pattern = '!<img.*?src="'.$home.'(.*?)"!';
preg_match_all($pattern, $the_content, $matches);
$image_src = $matches['1'][0]; ?>
				
	<?php if($image_src != '') { ?><a href="<?php echo get_permalink($postid); ?>" rel="bookmark" title="<?php echo $title; ?>">
<img src="<?php echo bloginfo('template_url'); ?>/scripts/timthumb.php?src=<?php echo $image_src; ?>&amp;w=<?php echo $width; ?>&amp;h=<?php echo $height; ?>&amp;zc=1&amp;q=100"
    alt="<?php echo $title; ?>" class="left" width="<?php echo $width; ?>px" height="<?php echo $height; ?>px"  /></a><?php } ?>

	<?php } ?>
        
		<?php } ?>
    <div class="more" style="margin-top:-10px;padding-right:15px;font-weight:bold;float:right;"><a href="javascript:location.reload()" target="_self"><?php _e('(refresh random posts)','arthemia');?></a></div>
        
    </div>
    
    <div id="video">
    
        <?php $ar_video = get_option( "ar_video" );
			if( $ar_video == 0 ) { $ar_video = $cp_categories[0]->cat_ID; } 
            query_posts( 'showposts=1&post_type=' . $ar_video ); ?>
        
       <h3 class="cat_title"><a href="<?php ?>"><?php _e('Latest Video Post','arthemia');?></a></h3>
        
        <?php while (have_posts()) : the_post(); ?>		

        <?php $video = get_post_meta($post->ID, 'Video', $single=true); ?>
        
        <div style="height:187px;width:281px;">
        <?php if($video !== '') { ?>
        
        <?php $the_video = $video . '"';
        $pattern = '!http://.*?v=(.*?)"!';
        preg_match_all($pattern, $the_video, $matches);
        $video_src = $matches['1'][0]; ?>
        
        <object width="281" height="187" type="application/x-shockwave-flash" data="http://www.youtube.com/v/<?php echo $video_src; ?>">
        <param name="movie" value="http://www.youtube.com/v/<?php echo $video_src; ?>"></param>
        <param name="allowFullScreen" value="true"></param>
        
        </object>
                
        <!--<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/mediaplayer/swfobject.js"></script>
 
        <div id="footplayer"><div style="border:1px solid #ececec;padding:10px;">Adobe Flash Plugin is required to see this video. Click <a href="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" style="text-decoration:underline;">here</a> to download the latest version of Adobe Flash Player Plugin.</div></div>
        <script type="text/javascript">
        var s0 = new SWFObject('<?php bloginfo('template_url'); ?>/mediaplayer/mediaplayer.swf','mpl','281','187','8');
        s0.addParam('allowscriptaccess','always');
        s0.addParam('allowfullscreen','true');
        s0.addVariable('height','187');
        s0.addVariable('width','281');
        s0.addVariable('file','<?php echo $video; ?>');
        s0.addVariable('image','<?php echo get_option('home'); ?>/<?php $values = get_post_custom_values("Image"); echo $values[0]; ?>');
        s0.write('footplayer');
        </script>-->
        
        <?php } ?>
        </div>
        <div class="more" style="margin-top:5px;font-weight:bold;"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></div>
        
        
        <?php endwhile; ?>

        
        </div>
          
</div>
<?php } ?>
          
<div id="front-popular" class="clearfloat">

<div id="recentpost" class="clearfloat">
<?php 	/* Widgetized sidebar, if you have the plugin installed. */ 					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(5) ) : ?>
<h3><?php _e('Recent Posts','arthemia');?></h3>
<ul>
 <?php $the_query = new WP_Query('showposts=5&orderby=post_date&order=desc');	
         while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID; ?>
        <li><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
        <?php endwhile; ?>	
</ul>
<?php endif; ?></div> 		

<div id="mostcommented" class="clearfloat">
<?php 	/* Widgetized sidebar, if you have the plugin installed. */ 					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(6) ) : ?>		
<h3><?php _e('Most Commented','arthemia');?></h3>
<ul><?php $result = $wpdb->get_results("
	SELECT comment_count,ID,post_title
    FROM $wpdb->posts
    ORDER BY comment_count DESC
    LIMIT 0 , 5"); 	
    
    foreach ($result as $topfive) {
        $postid = $topfive->ID; 	
        $title = $topfive->post_title;
        $commentcount = $topfive->comment_count;
        if ($commentcount != 0) { ?><li><a href="<?php echo get_permalink($postid); ?>" title="<?php echo $title ?>"><?php echo $title ?></a></li><?php } } ?>
</ul>
<?php endif; ?>
</div>

<div id="recent_comments" class="clearfloat">
<?php 	/* Widgetized sidebar, if you have the plugin installed. */ 					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(7) ) : ?> 		
<?php if (function_exists('akpc_most_popular')): ?>
<h3><?php _e('Most Popular','arthemia');?></h3>
<ul>
   <?php akpc_most_popular($limit = 5, $before = '<li>', $after = '</li>'); ?>
</ul>
<?php endif; ?>
<?php endif; ?>
</div>
</div>

<div id="footer"> All Material Copyright © 2010-<?php echo date("Y"); ?> BetterBio | <?php wp_footer(); ?> <?php if ( is_user_logged_in() ) { ?> <?php wp_register('', ''); ?> | <?php } ?> <?php wp_loginout(); ?> | <a href="<?php bloginfo('rss2_url'); ?>"><?php _e('Entries (RSS)','arthemia');?></a> | <a href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e('Comments (RSS)','arthemia');?></a></a>

<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->

</div>

<script src="<?php bloginfo('template_url'); ?>/js/scripts.js"></script>
<?php
	$cp_analytics = get_option( "cp_analytics" );
	if( $cp_analytics != "" ) { 
?>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>

<script type="text/javascript">
var pageTracker = _gat._getTracker("<?php echo $cp_analytics; ?>");
pageTracker._initData();
pageTracker._trackPageview();
</script>
	
<?php } ?>


</body>
</html>
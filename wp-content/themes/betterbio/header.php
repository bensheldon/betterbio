<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/madmenu.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/buttons.css" type="text/css" media="screen" />
<!--[if IE 6]>
    <style type="text/css"> 
    body {
        behavior:url("<?php bloginfo('template_url'); ?>/scripts/csshover2.htc");
    }
    </style>
<![endif]-->

<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php $cp_iIcon = get_settings( "cp_favICON" ); 
		if( $cp_iIcon != "" ) { 
		?>
<link rel="icon" href="<?php bloginfo('template_url'); ?>/images/icons/<?php echo $cp_iIcon; ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/icons/<?php echo $cp_iIcon; ?>" />
	<?php	} ?>

<?php if (is_home()) { ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/jquery.jcarousel.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/skin.css" />
<?php } ?>

<style type="text/css">
<?php 
$cp_max = 10;
$cp_categories = get_categories('');
$postcat = get_settings( "ar_categories" );

if( is_array( $postcat ) ) {
	foreach ( $cp_categories as $b ) {
		$cp_max ++;
	}	
}

for( $cp_i = 1; $cp_i <= $cp_max; $cp_i ++ ) {
	$cp_catCol = get_settings( "cp_catColor" );
    $cp_iCol = get_settings( "cp_hexColor_" . $cp_i );
    $cp_tCol = get_settings( "cp_textColor_" . $cp_i );
    $cp_hCol = get_settings( "cp_hoverColor_" . $cp_i );
		 if( ($cp_iCol != "") || ($cp_tCol != "")  ) { ?>
    /* category bar */
    #cat-<?php echo get_settings( "cp_colorCategory_" . $cp_i ); ?> { border-top:8px solid <?php echo $cp_iCol ?>; color:<?php echo $cp_tCol ?>; }
    #cat-<?php echo get_settings( "cp_colorCategory_" . $cp_i ); ?>:hover { background:<?php echo $cp_iCol ?>; color:<?php echo $cp_hCol ?>; }
    /* sidebar */
    #sidebar h3.catt-<?php echo get_settings( "cp_colorCategory_" . $cp_i ); ?>  {background:<?php echo $cp_iCol ?>; color:<?php echo $cp_catCol ?>; }
    #sidebar h3.catt-<?php echo get_settings( "cp_colorCategory_" . $cp_i ); ?> a { color:<?php echo $cp_catCol ?>; }
		
<?php } } ?>

<?php if (is_home()) { $style = get_settings ( "cp_styleHead" );
        if ( $style != "wide" ) { $height = 257; $clip_height = 237; $feat_height = 282; }
		else { $height = 422; $clip_height = 395; $feat_height = 446; } ?>
.jcarousel-skin-arthemia .jcarousel-container-vertical { width: 310px; height: <?php echo $height; ?>px; padding: 0px; }
.jcarousel-skin-arthemia .jcarousel-clip-vertical { width: 310px; height: <?php echo $clip_height; ?>px; }
#featured { height: <?php echo $feat_height; ?>px; overflow:hidden; } 

<?php } ?>

</style>

<?php load_theme_textdomain('arthemia');?>

<?php if (is_singular()) wp_enqueue_script('comment-reply'); wp_head(); ?>

<?php if (is_home()) { 

$speed = get_settings ( "cp_ScrollSpeed" );
$scroll = get_settings ( "cp_autoScroll" );
if ( $speed != "" ) { $speed = $speed/1000;  } else { $speed = 2; }
if ( $scroll != "No" ) { } else { $speed = 0;  } ?>

<script type="text/javascript">
function mycarousel_initCallback(carousel)
{
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });
    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};

jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
        auto: <?php echo $speed; ?>,
        scroll: 1,
        wrap: 'last',
        vertical: true,
        initCallback: mycarousel_initCallback
    });
});

</script>
<?php } ?>
</head>

<body>


<div id="head" class="clearfloat">

<div class="clearfloat">
	<div id="logo" class="left">
	
	<?php $cp_iLogo = get_settings( "cp_logo" ); 
		if( $cp_iLogo != "" ) { 
		?>
	<a href="<?php echo get_option('home'); ?>">
	<img src="<?php bloginfo('template_url'); ?>/images/logo/<?php echo $cp_iLogo; ?>" alt="" height="90px" /></a>
	<?php	} ?>

	</div>
	
	<div class="right">
	  <button class="slick-black donate"><span class="sumTotal">...</span> of $30,000 raised so far!<br /> <span class="green">Please Donate!</a></button> 

    <aside> 
      <div class="addthis_toolbox addthis_pill_combo"> 
        <a class="addthis_button_tweet" tw:count="horizontal"></a> 
        <a class="addthis_button_facebook_like"></a> 
        <a class="addthis_counter addthis_pill_style"></a> 
      </div> 
    </aside>
  
	<?php  /* $cp_i = 1; $cp_iAd = get_settings( "cp_adImage_" . $cp_i ); ?>
	
	<?php if(($cp_iAd != "") && ($cp_iAd != "Adsense")) { ?>
	<a href="<?php echo get_settings( "cp_adURL_" . $cp_i ); ?>">
	<img src="<?php bloginfo('template_url'); ?>/images/ads/<?php echo $cp_iAd; ?>" alt="" width="728px" height="90px" /></a>
	<?php } else { ?>

	<?php if( $cp_iAd != "") { ?>
	
	<?php $cp_iAdcode = get_settings( "cp_adAdsenseCode_" . $cp_i ); 
		if( $cp_iAdcode != "" ) { 
		?>
	
	<script type="text/javascript"><!--
google_ad_client = "<?php echo get_settings( "cp_adGoogleID" ); ?>";
google_ad_slot = "<?php echo get_settings( "cp_adAdsenseCode_" . $cp_i ); ?>";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

	<?php	} } ?>
	<?php } */ ?>

	
	</div>

</div>

</div>

<div id="navbar" class="clearfloat">

<div id="madmenu">
<ul>

<li class="first"><a href="<?php echo get_option('home'); ?>/" class="purple"><?php _e('Home','arthemia');?></a></li>

<li><a href="/drugs/" class="orange">Drugs</a></li>
<li><a href="/food/" class="green">Food</a></li>
<li><a href="/fuel/" class="yellow">Fuel</a></li>
<li><a href="/blogs/" class="grey">Blogs</a></li>


<?php wp_list_pages('title_li=&sort_column=menu_order'); ?> 


</ul>

<?php include (TEMPLATEPATH . '/searchform.php'); ?>

</div> 
</div>

<div id="top" class="clearfloat">
	<?php if (is_home() && !is_paged()) { ?>
		<div id="headline">
		<?php
		//Get value from Admin Panel
			$cp_categories = get_categories('hide_empty=0');
			$ar_headline = get_settings( "ar_headline" );
			if( $ar_headline == 0 ) { $ar_headline = $cp_categories[0]->cat_ID; }
			query_posts( 'showposts=1&cat=' . $ar_headline );
		 	?>
		<div class="label"><a href="<?php echo get_category_link($ar_headline);?>"><?php single_cat_title(); ?> &raquo;</a></div>
		<?php while (have_posts()) : the_post(); ?>	
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
			if( $ar_featured == 0 ) { $ar_featured = $cp_categories[0]->cat_ID; }
			$num = get_settings( "cp_numFeatured" );
			if( $num == 0 ) { $num = 10; }
			query_posts( 'showposts=' . $num . '&cat=' . $ar_featured );
		 	?>

	<div class="label"><a href="<?php echo get_category_link($ar_featured);?>"><?php single_cat_title(); ?> &raquo;</a></div>
	<ul id="mycarousel" class="jcarousel-skin-arthemia">

      <?php while (have_posts()) : the_post(); ?>
      <li>
	<div class="clearfloat">

	<?php $status = get_settings ( "cp_thumbAuto" );
		if ( $status != "first" ) { ?>

	<?php	$values = get_post_custom_values("Image");
	if (isset($values[0])) { ?>
      <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
	<img src="<?php echo bloginfo('template_url'); ?>/scripts/timthumb.php?src=<?php
$values = get_post_custom_values("Image"); echo $values[0]; ?>&amp;w=100&amp;h=65&amp;zc=1&amp;q=100"
alt="<?php the_title(); ?>" class="left" width="100px" height="65px"  /></a><?php } ?>

	<?php } else { ?>

	<?php $id =$post->ID;
$the_content =$wpdb->get_var("SELECT post_content FROM $wpdb->posts WHERE ID = $id");
$pattern = '!<img.*?src="(.*?)"!';
preg_match_all($pattern, $the_content, $matches);
$image_src = $matches['1'][0]; ?>
				
	<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
<img src="<?php echo bloginfo('template_url'); ?>/scripts/timthumb.php?src=<?php if($image_src != '') { echo $image_src; } ?>&amp;w=100&amp;h=65&amp;zc=1&amp;q=100"
alt="<?php the_title(); ?>" class="left" width="100px" height="65px"  /></a>

	<?php } ?>

	<div class="info"><a href="<?php the_permalink() ?>" rel="bookmark" class="title"><?php the_title(); ?></a>
<div class="meta"><?php the_time(get_option('date_format')); ?> &#150; <?php the_time('G:i') ?> | <?php comments_popup_link('No Comment', 'One Comment', '% Comments');?></div>	

</div>

    	</div>
	  </li>
      <?php endwhile; ?>

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
	<?php $showcatbar1 = get_settings ( "cp_showpostcatbar" );
            $showcatbar2 = get_settings ( "cp_showarchivecatbar" );
		$showcatbar3 = get_settings ( "cp_showindexcatbar" );
	
		  if ( (is_home() && $showcatbar3 != "no") ||  (is_search() && $showcatbar2 != "no") || (is_archive() && $showcatbar2 != "no") || (is_single() && $showcatbar1 != "no") ) { ?>
	
	<div id="middle" class="clearfloat"><?php 
	  $post_types = get_settings( "ar_categories" );
	  $post_types = array_slice($post_types, 0, 5);
    
    $i = 1;
	  foreach ($postcat as $key => $cp_pC ) { ?>
	    <?php $post_type = get_post_type_object( $cp_pC ); ?>
	    <div id="cat-<?php echo $cp_pC; ?>" class="category" onclick="window.location.href='<?php echo get_category_link($cp_pC);?>';">
		    <span class="cat_title"><?php echo $post_type->name ?></span>
		    <p><?php echo get_settings('cp_descText_'.$i); $i++; ?></p>
	    </div>
	  <?php } ?>
    <?php wp_reset_query(); ?>
  </div>

	
	<?php } ?>

    

	<div id="page" class="clearfloat">
    <?php if (!is_home()) { ?><div id="inner" class="clearfloat"><?php } ?>

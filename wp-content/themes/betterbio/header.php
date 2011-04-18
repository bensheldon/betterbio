<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
  <head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

    <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>

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

    <link rel="icon" href="<?php bloginfo('template_url'); ?>/images/icons/<?php echo get_option( "cp_favICON" ); ?>" />
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/icons/<?php echo get_option( "cp_favICON" ); ?>" />

    <?php if (is_home()) { ?>
      <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/jquery.jcarousel.css" />
      <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/skin.css" />
    <?php } ?>

    <style type="text/css">
      <?php 
        $cp_max = 10;
        $cp_categories = get_categories('');
        $postcat = get_option( "ar_categories" );

        if( is_array( $postcat ) ) {
	        foreach ( $cp_categories as $b ) {
		        $cp_max ++;
	        }	
        }

        for( $cp_i = 1; $cp_i <= $cp_max; $cp_i ++ ) {
        	$cp_catCol = get_option( "cp_catColor" );
            $cp_iCol = get_option( "cp_hexColor_" . $cp_i );
            $cp_tCol = get_option( "cp_textColor_" . $cp_i );
            $cp_hCol = get_option( "cp_hoverColor_" . $cp_i );
        		if( ($cp_iCol != "") || ($cp_tCol != "")  ) { ?>
        		   
              /* category bar */
              #cat-<?php echo get_option( "cp_colorCategory_" . $cp_i ); ?> { border-top:8px solid <?php echo $cp_iCol ?>; color:<?php echo $cp_tCol ?>; }
              #cat-<?php echo get_option( "cp_colorCategory_" . $cp_i ); ?>:hover { background:<?php echo $cp_iCol ?>; color:<?php echo $cp_hCol ?>; }
              /* sidebar */
              #sidebar h3.catt-<?php echo get_option( "cp_colorCategory_" . $cp_i ); ?>  {background:<?php echo $cp_iCol ?>; color:<?php echo $cp_catCol ?>; }
              #sidebar h3.catt-<?php echo get_option( "cp_colorCategory_" . $cp_i ); ?> a { color:<?php echo $cp_catCol ?>; }
		
        <?php } } ?>

        <?php if (is_home()): ?>
          <?php 
            $style = get_option ( "cp_styleHead" );
            if ( $style != "wide" ) { $height = 257; $clip_height = 237; $feat_height = 282; }
		          else { $height = 422; $clip_height = 395; $feat_height = 446; } ?>
		      
            .jcarousel-skin-arthemia .jcarousel-container-vertical { width: 310px; height: <?php echo $height; ?>px; padding: 0px; }
            .jcarousel-skin-arthemia .jcarousel-clip-vertical { width: 310px; height: <?php echo $clip_height; ?>px; }
            #featured { height: <?php echo $feat_height; ?>px; overflow:hidden; } 
        <?php endif; ?>
        
        <?php //I hate writing CSS with PHP, but while we are here... -MRH
          $colors = array("Industry" => "#C994C0",
                          "Drugs" => "#F09E66",
                          "Food" => "#95B665",
                          "Fuel" => "#FEDFA6",
                          "Events" => "#a1a1a1");
          $menu_items = new WP_Query(array("post_type" => "nav_menu_item", "showposts" => 50));
          while($menu_items->have_posts()): $menu_items->the_post();
            echo "/* {$post->pos} */";
            if(array_key_exists($post->post_title, $colors)): ?>
              #madmenu #menu-item-<?php echo $post->ID ?> a { color: <?php echo $colors[$post->post_title] ?> !important; }
        <?php endif; endwhile; ?>
    </style>

    <?php load_theme_textdomain('arthemia');?>
    <?php 
      if (is_singular()) wp_enqueue_script('comment-reply'); 
      wp_head(); 
    ?>

    <?php if (is_home()): ?>
    <?php
      $speed = get_option ( "cp_ScrollSpeed" );
      $scroll = get_option ( "cp_autoScroll" );
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
      
      jQuery(document).ready(function($) {
          $('#mycarousel').jcarousel({
              auto: <?php echo $speed; ?>,
              scroll: 1,
              wrap: 'last',
              vertical: true,
              initCallback: mycarousel_initCallback
          });
      });
    </script>
    
    <?php endif; ?>
    
  </head>
  <body>
    <div id="head" class="clearfloat">
      <div class="clearfloat">
	      <div id="logo" class="left">
	        <?php $cp_iLogo = get_option( "cp_logo" ); 
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
  
            	<?php  /* $cp_i = 1; $cp_iAd = get_option( "cp_adImage_" . $cp_i ); ?>
            	
            	<?php if(($cp_iAd != "") && ($cp_iAd != "Adsense")) { ?>
            	<a href="<?php echo get_option( "cp_adURL_" . $cp_i ); ?>">
            	<img src="<?php bloginfo('template_url'); ?>/images/ads/<?php echo $cp_iAd; ?>" alt="" width="728px" height="90px" /></a>
            	<?php } else { ?>
            
            	<?php if( $cp_iAd != "") { ?>
            	
            	<?php $cp_iAdcode = get_option( "cp_adAdsenseCode_" . $cp_i ); 
            		if( $cp_iAdcode != "" ) { 
            		?>
            	
            	<script type="text/javascript"><!--
            google_ad_client = "<?php echo get_option( "cp_adGoogleID" ); ?>";
            google_ad_slot = "<?php echo get_option( "cp_adAdsenseCode_" . $cp_i ); ?>";
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
        <?php wp_nav_menu(array('menu' => 'top_navigation',
                                "container" => null)); ?>
        <?php include (TEMPLATEPATH . '/searchform.php'); ?>
      </div>
    </div>

    <?php include(TEMPLATEPATH . '/partials/front.php'); ?>

	  <?php 
	    if ( (is_home() && get_option ( "cp_showindexcatbar" ) != "no") || 
		       (is_search() && get_option ( "cp_showarchivecatbar" ) != "no") || 
		       (is_archive() && get_option ( "cp_showarchivecatbar" ) != "no") || 
		       (is_single() && get_option ( "cp_showpostcatbar" ) != "no") ): ?>
	

	         <div id="middle" class="clearfloat"><?php 
	           $post_types = get_option( "ar_categories" );
	           $post_types = array_slice($post_types, 0, 5);
             
             $i = 1;
	           foreach ($postcat as $key => $cp_pC ) { ?>
	             <?php $post_type = get_post_type_object( $cp_pC ); ?>
	             <a href="/<?php echo $cp_pC; ?>">
	               <div id="cat-<?php echo $cp_pC; ?>" class="category">
	         	      <span class="cat_title"><?php echo $post_type->name ?></span>
	         	      <p><?php echo get_option('cp_descText_'.$i); $i++; ?></p>
	               </div>
	             </a>
	           <?php } ?>
             <?php wp_reset_query(); ?>
           </div>


	  <?php endif; ?>

	<div id="page" class="clearfloat">
    <?php if (!is_home()): ?><div id="inner" class="clearfloat"><?php endif; ?>
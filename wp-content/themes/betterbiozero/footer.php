
	</div> <!-- end of #main  -->
    
  </div> <!-- end of #container -->
  
  <!-- Javascript at the bottom for fast page loading -->
  
    <!-- Grab Google CDN's jQuery. fall back to local if necessary -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script>!window.jQuery && document.write('<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.4.2.min.js"><\/script>')</script>
  

    <script src="<?php bloginfo('template_url'); ?>/js/plugins.js?v=1"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/script.js?v=1"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.jcarousel.min.js?v=1"></script>

    <!--[if lt IE 7 ]>
      <script src="js/dd_belatedpng.js?v=1"></script>
    <![endif]-->
  
  	<!-- wp_footer() content added by plugins -->
  	<!-- Do not remove this, it's required for certain plugins which generally use this hook to reference JavaScript files. -->
		
	<?php wp_footer(); ?>

	<script>
	 var _gaq = [['_setAccount', 'UA-870047-1'], ['_trackPageview']];
	 (function(d, t) {
		var g = d.createElement(t),
				s = d.getElementsByTagName(t)[0];
		g.async = true;
		g.src = ('https:' == location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g, s);
	 })(document, 'script');
	</script>

</body>
</html>

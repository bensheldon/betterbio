<!doctype html>  

<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Better Bio - Knowledge in Action</title>
  <meta name="description" content="BetterBio will provide the forum and tools for in-depth, investigative biotechnology reporting and analysis, empowering communities to discuss, dissect and analyze the economic, environmental and cultural effects of the biotech industry.">
  <meta name="author" content="">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">

  <link rel="stylesheet" href="css/style.css?v=2">
  <script src="js/libs/modernizr-1.6.min.js"></script>

</head>

<body>

  <div id="container">
    <header>
      <img src="images/logo.jpg" alt="" />
      <nav>
        <ul class="clearfix">
          <li class="first"><a href="/">home</a></li>
          <li><a href="#">med</a></li>
          <li><a href="#">food</a></li>
          <li><a href="#">fuel</a></li>
          <li><a href="#">blog</a></li>
          <li class="right"><a href="#">about</a></li>
          <li><a href="#">join</a></li>
          <li class="last">
              <form id="mailchimp" action="">
                <input type="text" id="email" class="email" value="" />
                <button>Subscribe</button>
              </form>
          </li>
        </ul>
      </nav>
    </header>
    
    <div id="main">
      <nav>
        <ul class="clearfix">
          <li class="box"><a class="green" href="#quiz" title="Science &amp; You">Why BetterBio?</a></li>
          <li class="box "><a class="yellow" href="#promise" title="Our Promise">Our Promise</a></li>
          <li class="box"><a class="orange" href="#role" title="Your Role">Your Role</a></li>
          <li class="box"><a class="purple" href="#story" title="Your Story">Share Your Story</a></li>
        </ul>
      </nav>
    </div>
    
    <footer>
      <ul class="clearfix">
        <li>All Materials Copyright &copy;2010 Better Bio</li>
        <li class="right">For more information, email <a href="mailto:info@betterbio.org">info@betterbio.org</a></li>
      <ul>
    </footer>
  </div> <!-- end of #container -->
  
  <div class="slidercontent" id="quiz">
    <?php 
      $quiz_num = rand(1,4);
      include('quizzes/' . $quiz_num . '.php')
    ?>
    <div id="answer"></div>
  </div>
  
  
  <div class="slidercontent" id="promise">
    <video width="590" height="332" controls>
    	<!-- MP4 must be first for iPad! -->
    	<source src="mov/pitch_1.mp4" type="video/mp4" /><!-- WebKit video    -->
    	<!-- <source src="__VIDEO__.OGV" type="video/ogg" /><!-- Firefox / Opera -->
    	<!-- fallback to Flash: -->
    	<!-- <object width="640" height="360" type="application/x-shockwave-flash" data="__FLASH__.SWF">
    		<param name="movie" value="__FLASH__.SWF" />
    		<param name="flashvars" value="controlbar=over&amp;image=__POSTER__.JPG&amp;file=__VIDEO__.MP4" />
    		<img src="__VIDEO__.JPG" width="640" height="360" alt="__TITLE__"
    		     title="No video playback capabilities, please download the video below" />
    	</object> -->
    </video>
    
    <span id="sumTotal"><img src="images/loading.gif" alt="" /></span> / $30,000<br />
    <a href="https://www.indiegogo.com/projects/5764/pledges/new">Donate to BetterBio!</a>
  </div>
  
  <div class="slidercontent" id="role">
    Coming Soon.
    <!-- (Small Headshot Picture of Me)
    *Animation.*

    In order to get a job in this "innovation economy," you need real reporting that goes beyond soundbites.

    In order to secure the health of your family and community, you need real answers, not press releases.

    And in order lead a talented team of journalists so they can provide you with the news you need, I need you.

    *End animation*

    How can a nonprofit, independent news outlet provide in-depth, accessible reporting on these complex issues, especially when conventional media providers have abandoned biotech coverage?

    It can't, unless you help us out.  And it must, because the mainstream media won't.

    Please donate today and become part of the solution.  Before the end of this year, we need 500 people to step up and say yes, I will support BetterBio. Will you be one of them? We know some of you are struggling just to make ends meet, so remember: even a gift of $5 will make a difference. Donate the most you can, and we will put it to its maximum use.  Click here to help us get started.

    Because our work is sponsored by a 501(c)(3) nonprofit, your donation is tax deductible - so don't wait to receive your tax benefit - donate now.  

    If you can't afford to donate but believe in what we're doing, please make a pledge or join our referral program, in which we thank you for your hard fundraising work with prizes for referring in donations at different levels.  See our fundraising campaign site for more details.
    However you participate, know how grateful we are to have you involved, and how committed we are to delivering on our promise.

    Thank you for helping us make life better - for all of us.
    -Khadijah Britton, Founder. -->
  </div>
  <div class="slidercontent" id="story">
    <form action="http://twitter.us2.list-manage.com/subscribe/post?u=9465fda86f56b60a2ec4a6d79&amp;id=a5774e0fac" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
    	<fieldset>
    	  <legend style="white-space:normal">
    	    Share Your Story Idea and Stay in the Loop!
    	    <span class="required">* indicates required</span>
    	  </legend>
        
        <div class="leftSide">  
          <p>
            <label for="mce-EMAIL">Email Address<strong class="required">*</strong></label>
            <input type="text" value="" name="EMAIL" class="email" id="mce-EMAIL">
          </p>
          <p>
            <label for="mce-FNAME">First Name </label>
            <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
          </p>
          <p>
            <label for="mce-LNAME">Last Name </label>
            <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
          <p>

          <p>
            <label class="input-group-label">Please keep me in the loop on... </label>
            <ul>
              <li><input type="checkbox" value="1" name="group[1]" id="mce-group-1-0"><label for="mce-group-1-0">News</label></li>
              <li><input type="checkbox" value="2" name="group[2]" id="mce-group-1-1"><label for="mce-group-1-1">Events and Trainings</label></li>
              <li><input type="checkbox" value="4" name="group[4]" id="mce-group-1-2"><label for="mce-group-1-2">Volunteer Opportunities</label></li>
              <li><input type="checkbox" value="8" name="group[8]" id="mce-group-1-3"><label for="mce-group-1-3">Jobs and Internships</label></li>
              <li><input type="checkbox" value="16" name="group[16]" id="mce-group-1-4"><label for="mce-group-1-4">Media &amp; Speaking Opportunities</label></li>
            </ul>
          </p>
          
          <p>
      		  <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn">
      		</p>
        </div>
        
        <div class="rightSide">          
          <label for="mce-MMERGE3">The Story You Want Told</label>
          <textarea type="text" value="" name="MMERGE3" class="" id="mce-MMERGE3"></textarea>
          
          
        </div>
        
        <div id="mce-responses">
    			<div class="response" id="mce-error-response" style="display:none"></div>
    			<div class="response" id="mce-success-response" style="display:none"></div>
    		</div>
    		
    	</fieldset>	
    </form>
  </div>
  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>
  <script>!window.jQuery && document.write(unescape('%3Cscript src="js/libs/jquery-1.4.2.js"%3E%3C/script%3E'))</script>
  <script type="text/javascript" src="http://downloads.mailchimp.com/js/jquery.validate.js"></script>
  <script type="text/javascript" src="http://downloads.mailchimp.com/js/jquery.form.js"></script>
  <script type="text/javascript">
  // delete this script tag and use a "div.mce_inline_error{ XXX !important}" selector
  // or fill this in and it will be inlined when errors are generated
  
  </script>
  <script type="text/javascript">
  
  </script>
  
  <!-- scripts concatenated and minified via ant build script-->
  <script src="js/plugins.js"></script>
  <script src="js/script.js"></script>
  <!-- end concatenated and minified scripts-->
  
  
  <!--[if lt IE 7 ]>
    <script src="js/libs/dd_belatedpng.js"></script>
    <script> DD_belatedPNG.fix('img, .png_bg'); </script>
  <![endif]-->

  <!-- yui profiler and profileviewer - remove for production -->
  <script src="js/profiling/yahoo-profiling.min.js"></script>
  <script src="js/profiling/config.js"></script>
  <!-- end profiling code -->


  <!-- change the UA-XXXXX-X to be your site's ID -->
  <script>
   var _gaq = [['_setAccount', 'UA-XXXXX-X'], ['_trackPageview']];
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
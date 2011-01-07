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
      <a href="/"><img src="images/logo.jpg" alt="" /></a>
      
      <button class="slick-black donate"><span class="sumTotal">...</span> of $30,000 raised so far!<br /> <span class="green">Please Donate!</a></button>
      
      <aside>
        <div class="addthis_toolbox addthis_pill_combo">
          <a class="addthis_button_tweet" tw:count="horizontal"></a>
          <a class="addthis_button_facebook_like"></a>
          <a class="addthis_counter addthis_pill_style"></a>
        </div>
      </aside>
      
      <nav>
        <ul class="clearfix">
          <li class="first"><a href="/">Home</a></li>
          <li><a class="orange" href="#quiz">Our Role</a></li>
          <li><a class="green" href="#role">Your Role</a></li>
          <li><a class="purple" href="#promise">Our Story</a></li>
          <li><a class="yellow" href="#story">Your Story</a></li>
        </ul>
      </nav>
    </header>
    
    <div id="main">
      <nav>
        <ul class="clearfix">
          <li class="box"><a class="orange" href="#quiz" title="Science &amp; You">Our Role</a></li>
          <li class="box"><a class="green" href="#role" title="Your Role">Your Role</a></li>
          <li class="box "><a class="purple" href="#promise" title="Our Promise">Our Story</a></li>
          <li class="box"><a class="yellow" href="#story" title="Your Story">Your Story</a></li>
        </ul>
      </nav>
    </div>
    
    <footer class="clearfix">
      <ul class="clearfix">
        <li>All Materials Copyright &copy;2010 Better Bio</li>
        <li class="right">For more information, email <a href="mailto:info@betterbio.org">info@betterbio.org</a></li>
      <ul>
    </footer>
  </div> <!-- end of #container -->
  
  
  <!-- Slider Content -->
  <div class="slidercontent" id="quiz">
    <?php 
      $quiz_num = rand(1,4);
      include('quizzes/' . $quiz_num . '.php')
    ?>
    <div id="answer"></div>
    <div id="social">
      <a href="javascript:void(0);" id="fb-share" onclick="_gaq.push(['_trackEvent', 'Social', 'Click', 'Share on Facbook']);">Share on Facebook</a> &bull;
      <a href="http://twitter.com/?status=I just took the Better Bio quiz - how much do you know about the biosciences? http://bit.ly/hcftB0" title="Share this quiz with your followers." onclick="_gaq.push(['_trackEvent', 'Social', 'Click', 'Share on Twitter']);" target="_blank">Share on Twitter</a>
    </div>
  </div>
  
  <div class="slidercontent" id="promise">
    <iframe src="http://player.vimeo.com/video/18301431" width="590" height="332" frameborder="0"></iframe>
    <p class="visuallyhidden">
      Hi, I'm Khadijah M. Britton, founder of BetterBio.  I wanted to share a little about why we're here and what we will achieve if you give us your support.
      I started BetterBio because I was frustrated.  Despite the fact that Americans are nearly unanimous in our agreement that knowledge of science is "essential" to healthcare, our global reputation and the economy, it turns out only one in three of us understands the scientific method.  Ten years ago, the United States government added "biotechnology" to its curriculum requirements for public schools, inspiring countries across the world to follow suit, yet less than one third of Americans know that DNA is a basic building block of life (in fact, when asked, some guessed it stood for "Drug and Narcotics Agency.")
      Yet, with or without our understanding, scientific research is driving the economy, access to energy, our food supply and our healthcare system.
      So, it came to me.  BetterBio: biotech news for the rest of us.  Not just scientists who wanted to see what the competition looked like.  Not just investors in the next new biotech start-up.  All of us.  Patients.  Parents.  Students.  Teachers.  Whomever was impacted by the decisions made in these scientific industries.  My idea was, and is, that by connecting the boardroom and research lab to the community at large, BetterBio would help us separate fact from fiction and make better choices for our lives.
      We will do everything in our power to deliver the most meaningful, information-rich, and accessible news about  biotechnology and its impact on our lives.  At the end of the day, journalism only means something if it's news you can use.  Our end goal is to build bridges between industry, academy and community that help citizens become engaged participants in biomedical policy-making.  We will create the forum for you to enter the conversation – all you have to do is show up.
      However, before we can do all of this – we need your help.  Please get involved however you can: Join the BetterBio community, donate as generously as you can, refer friends and share your story ideas.
      Bio is the greek root for life.  And we truly are here to make life better – for all of us – through the power of information.  Hence the name, BetterBio.  We hope you will join us, and I look forward to hearing from you soon!
    </p>
    <p>Now that we have told you our story, let's make it your story.</p>
    <p>Get involved so you can tell everyone you were a part of it from the beginning.</p>
    <p>Because it's your world, your body, your story.</p>
    <p><a href="https://www.indiegogo.com/betterbio">Spread the word about BetterBio!</a></p>
  </div>
  
  <div class="slidercontent" id="role">
    <iframe src="http://player.vimeo.com/video/18301496" width="590" height="332" frameborder="0"></iframe>
    <p class="visuallyhidden">
      In order to get a job in this "innovation economy," you need real reporting that goes beyond soundbites.
      In order to secure the health of your family and community, you need real answers, not press releases.
      And in order lead a talented team of journalists so they can provide you with the news you need, I need you.
      How can a nonprofit, independent news outlet provide in-depth, accessible reporting on these complex issues, especially when conventional media providers have abandoned biotech coverage?
      It can't, unless you help us out.  And it must, because the mainstream media won't.
      Please donate today and become part of the solution.  
      Thank you for helping us make life better - for all of us.
    </p>
    <p>Right now, we've raised <span class="sumTotal"><img src="images/loading.gif" alt="" /></span> of our $30,000 goal.</p>
    <p>We need your support today - even a donation of $5 will make all the difference.</p>
    <p><a class="donate" target="_blank" href="https://www.indiegogo.com/projects/5764/pledges/new">Please donate now.</a></p>
    <p>Thank you!</p>
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
  <div id="fb-root"></div>
  <script>
    window.fbAsyncInit = function() {
      FB.init({appId: '115422611864623', status: true, cookie: true,
               xfbml: true});
    };
    (function() {
      var e = document.createElement('script'); e.async = true;
      e.src = document.location.protocol +
        '//connect.facebook.net/en_US/all.js';
      document.getElementById('fb-root').appendChild(e);
    }());
  </script>
  <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=aphelionz"></script>
  
  <!-- scripts concatenated and minified via ant build script-->
  <script src="js/plugins.js"></script>
  <script src="js/script.js"></script>
  <!-- end concatenated and minified scripts-->
  
  
  <!--[if lt IE 7 ]>
    <script src="js/libs/dd_belatedpng.js"></script>
    <script> DD_belatedPNG.fix('img, .png_bg'); </script>
  <![endif]-->

<?php if($_SERVER['SERVER_NAME'] === "betterbio.dev"): ?>
  <!-- yui profiler and profileviewer - remove for production -->
  <script src="js/profiling/yahoo-profiling.min.js"></script>
  <script src="js/profiling/config.js"></script>
  <!-- end profiling code -->
<?php endif; ?>

  <script>
   var _gaq = [['_setAccount', 'UA-19424667-1'], ['_trackPageview']];
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
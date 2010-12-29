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
          <li class="box"><a class="purple" href="#story" title="Your Story">Your Story</a></li>
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
    <!-- TODO: Replace this with an AJAX call -->
    <?php include("lib/indiegogo_scrape.php"); ?><br />
    <a href="https://www.indiegogo.com/projects/5764/pledges/new">Donate to BetterBio!</a>
  </div>
  <div class="slidercontent" id="role">
    (Small Headshot Picture of Me)
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
    -Khadijah Britton, Founder.
  </div>
  <div class="slidercontent" id="story">
    <form action="http://twitter.us2.list-manage.com/subscribe/post?u=9465fda86f56b60a2ec4a6d79&amp;id=a5774e0fac" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
    	<fieldset>
    	  <legend style="white-space:normal"><span>Share Your Story Idea and Stay in the Loop!</span></legend>
        <div class="indicate-required">* indicates required</div>
        <div class="mc-field-group">
          <label for="mce-EMAIL">Email Address <strong class="note-required">*</strong></label>
          <input type="text" value="" name="EMAIL" class="required email" id="mce-EMAIL">
          <label for="mce-FNAME">First Name </label>
          <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
          <label for="mce-LNAME">Last Name </label>
          <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
        </div>
        <div class="mc-field-group">
          <label class="input-group-label">Please keep me in the loop on... </label>
          <div class="input-group">
            <ul>
              <li><input type="checkbox" value="1" name="group[1]" id="mce-group-1-0"><label for="mce-group-1-0">News</label></li>
              <li><input type="checkbox" value="2" name="group[2]" id="mce-group-1-1"><label for="mce-group-1-1">Events and Trainings</label></li>
              <li><input type="checkbox" value="4" name="group[4]" id="mce-group-1-2"><label for="mce-group-1-2">Volunteer Opportunities</label></li>
              <li><input type="checkbox" value="8" name="group[8]" id="mce-group-1-3"><label for="mce-group-1-3">Jobs and Internships</label></li>
              <li><input type="checkbox" value="16" name="group[16]" id="mce-group-1-4"><label for="mce-group-1-4">Media and Speaking Opportunities</label></li>
            </ul>
          </div>
          <div class="mc-field-group">
            <label for="mce-MMERGE3">The Story You Want Told </label>
            <input type="text" value="" name="MMERGE3" class="" id="mce-MMERGE3">
          </div>
        </div>
    		
    		<div id="mce-responses">
    			<div class="response" id="mce-error-response" style="display:none"></div>
    			<div class="response" id="mce-success-response" style="display:none"></div>
    		</div>
    		<div><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn"></div>
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
  var mc_custom_error_style = '';
  </script>
  <script type="text/javascript">
  /*var fnames = new Array();var ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='MMERGE3';ftypes[3]='text';var err_style = '';
  try{
      err_style = mc_custom_error_style;
  } catch(e){
      err_style = 'margin: 1em 0 0 0; padding: 1em 0.5em 0.5em 0.5em; background: ERROR_BGCOLOR none repeat scroll 0% 0%; font-weight: bold; float: left; z-index: 1; width: 80%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial; color: ERROR_COLOR;';
  }
  var mce_jQuery = jQuery.noConflict();
  mce_jQuery(document).ready( function($) {
    var options = { errorClass: 'mce_inline_error', errorElement: 'div', errorStyle: err_style, onkeyup: function(){}, onfocusout:function(){}, onblur:function(){}  };
    var mce_validator = mce_jQuery("#mc-embedded-subscribe-form").validate(options);
    options = { url: 'http://twitter.us2.list-manage.com/subscribe/post-json?u=9465fda86f56b60a2ec4a6d79&id=a5774e0fac&c=?', type: 'GET', dataType: 'json', contentType: "application/json; charset=utf-8",
                  beforeSubmit: function(){
                      mce_jQuery('#mce_tmp_error_msg').remove();
                      mce_jQuery('.datefield','#mc_embed_signup').each(
                          function(){
                              var txt = 'filled';
                              var fields = new Array();
                              var i = 0;
                              mce_jQuery(':text', this).each(
                                  function(){
                                      fields[i] = this;
                                      i++;
                                  });
                              mce_jQuery(':hidden', this).each(
                                  function(){
                                  	if ( fields[0].value=='MM' && fields[1].value=='DD' && fields[2].value=='YYYY' ){
                                  		this.value = '';
  									} else if ( fields[0].value=='' && fields[1].value=='' && fields[2].value=='' ){
                                  		this.value = '';
  									} else {
  	                                    this.value = fields[0].value+'/'+fields[1].value+'/'+fields[2].value;
  	                                }
                                  });
                          });
                      return mce_validator.form();
                  }, 
                  success: mce_success_cb
              };
    mce_jQuery('#mc-embedded-subscribe-form').ajaxForm(options);

  });
  function mce_success_cb(resp){
      mce_jQuery('#mce-success-response').hide();
      mce_jQuery('#mce-error-response').hide();
      if (resp.result=="success"){
          mce_jQuery('#mce-'+resp.result+'-response').show();
          mce_jQuery('#mce-'+resp.result+'-response').html(resp.msg);
          mce_jQuery('#mc-embedded-subscribe-form').each(function(){
              this.reset();
      	});
      } else {
          var index = -1;
          var msg;
          try {
              var parts = resp.msg.split(' - ',2);
              if (parts[1]==undefined){
                  msg = resp.msg;
              } else {
                  i = parseInt(parts[0]);
                  if (i.toString() == parts[0]){
                      index = parts[0];
                      msg = parts[1];
                  } else {
                      index = -1;
                      msg = resp.msg;
                  }
              }
          } catch(e){
              index = -1;
              msg = resp.msg;
          }
          try{
              if (index== -1){
                  mce_jQuery('#mce-'+resp.result+'-response').show();
                  mce_jQuery('#mce-'+resp.result+'-response').html(msg);            
              } else {
                  err_id = 'mce_tmp_error_msg';
                  html = '<div id="'+err_id+'" style="'+err_style+'"> '+msg+'</div>';

                  var input_id = '#mc_embed_signup';
                  var f = mce_jQuery(input_id);
                  if (ftypes[index]=='address'){
                      input_id = '#mce-'+fnames[index]+'-addr1';
                      f = mce_jQuery(input_id).parent().parent().get(0);
                  } else if (ftypes[index]=='date'){
                      input_id = '#mce-'+fnames[index]+'-month';
                      f = mce_jQuery(input_id).parent().parent().get(0);
                  } else {
                      input_id = '#mce-'+fnames[index];
                      f = mce_jQuery().parent(input_id).get(0);
                  }
                  if (f){
                      mce_jQuery(f).append(html);
                      mce_jQuery(input_id).focus();
                  } else {
                      mce_jQuery('#mce-'+resp.result+'-response').show();
                      mce_jQuery('#mce-'+resp.result+'-response').html(msg);
                  }
              }
          } catch(e){
              mce_jQuery('#mce-'+resp.result+'-response').show();
              mce_jQuery('#mce-'+resp.result+'-response').html(msg);
          }
      }
  } */
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
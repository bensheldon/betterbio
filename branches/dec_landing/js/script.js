/* Author: Mark Henderson

*/

var mc_custom_error_style = '';
var fnames = new Array();
var ftypes = new Array();
  fnames[0]='EMAIL';
  ftypes[0]='email';
  fnames[1]='FNAME';
  ftypes[1]='text';
  fnames[2]='LNAME';
  ftypes[2]='text';
  fnames[3]='MMERGE3';
  ftypes[3]='text';
var err_style = '';

try{
    err_style = mc_custom_error_style;
} catch(e){
    err_style = 'margin: 1em 0 0 0; padding: 1em 0.5em 0.5em 0.5em; background: ERROR_BGCOLOR none repeat scroll 0% 0%; font-weight: bold; float: left; z-index: 1; width: 80%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial; color: ERROR_COLOR;';
}

$(document).ready(function() {
  //Hiding some elements
  $('.slidercontent').hide();
  
  $("#container header nav a").click(function() {
    var linkClass = ".box ." + $(this).attr("class");
    $(linkClass).click();
  });
  
  // Main slider animation 
  $("#main nav li").find("a").click(function(e) {
    var boxClass = ".box ." + $(this).attr("class");
    
    $(".boxContent").remove();
    $(".box a:not(" + boxClass +")").animate({'width': "50px", 'height': "400px"}, 500)
                                        .css("text-indent", "-9999px");

    setTimeout(function() {
      var showDiv = $(boxClass).attr("href");
      
      $(boxClass).animate({'height': "2em", 'width': "810px", "line-height": "2em"}, 500, 'linear', 
        function() { $(boxClass).css("text-indent", "0px"); $(".boxContent").show(); })
        .parent().append('<div class="boxContent">xx</div>');
        
        $(".boxContent").html($(showDiv).html()).addClass("clearfix");
        window.location.hash = showDiv.substr(1);
        
        if(showDiv === "#quiz") {
          $(".boxContent").attr("id", "visibleQuiz");
          $("#visibleQuiz dd").hide();
          
          $("#visibleQuiz dt").click(function() {
            $("#visibleQuiz dt").css("backgroundColor", "#fff");
            $(this).css("backgroundColor", "#e9ffca");
            $("#visibleQuiz #answer").html($(this).next("dd").html()).animate({"opacity": "1"}, 500);
            $("#visibleQuiz dt").unbind('click');
          });
        }
        
        if(showDiv === "#promise") { 
          $(".boxContent").attr("id", "visiblePromise");
        }
        
        if(showDiv === "#role") { 
          $(".boxContent").attr("id", "visibleRole");
          $.ajax({ 
            "url": "lib/indiegogo_scrape.php",
            "success": function(data) {
              $("#sumTotal").html(data);
            }})
        }
        
        if(showDiv === "#story") {
          $(".boxContent").attr("id", "visibleStory");
          $("#mce-EMAIL").focus();
        }
    }, 501);
    
    return false;
  });
  
  if(window.location.hash !== "") { $("a[href=" + window.location.hash + "]").click(); }
  
  //Mailchimp stuff
  var options = { errorClass: 'mce_inline_error', 
                  errorElement: 'div', 
                  errorStyle: err_style, 
                  onkeyup: function(){}, 
                  onfocusout:function(){}, 
                  onblur:function(){}  };
  var mce_validator = $("#mc-embedded-subscribe-form").validate(options);
  
  options = { url: 'http://twitter.us2.list-manage.com/subscribe/post-json?u=9465fda86f56b60a2ec4a6d79&id=a5774e0fac&c=?', 
              type: 'GET', 
              dataType: 'json', 
              contentType: "application/json; charset=utf-8",
              beforeSubmit: function(){
                alert("x");
                $('#mce_tmp_error_msg').remove();
                $('.datefield','#mc_embed_signup').each(function(){
                  var txt = 'filled';
                  var fields = new Array();
                  var i = 0;
                  $(':text', this).each(function(){
                    fields[i] = this;
                    i++;
                  });
                  $(':hidden', this).each(function(){
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
  $('#mc-embedded-subscribe-form').ajaxForm(options);
});

function mce_success_cb(resp){
    $('#mce-success-response').hide();
    $('#mce-error-response').hide();
    if (resp.result=="success"){
        $('#mce-'+resp.result+'-response').show();
        $('#mce-'+resp.result+'-response').html(resp.msg);
        $('#mc-embedded-subscribe-form').each(function(){
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
                $('#mce-'+resp.result+'-response').show();
                $('#mce-'+resp.result+'-response').html(msg);            
            } else {
                err_id = 'mce_tmp_error_msg';
                html = '<div id="'+err_id+'" style="'+err_style+'"> '+msg+'</div>';

                var input_id = '#mc_embed_signup';
                var f = $(input_id);
                if (ftypes[index]=='address'){
                    input_id = '#mce-'+fnames[index]+'-addr1';
                    f = $(input_id).parent().parent().get(0);
                } else if (ftypes[index]=='date'){
                    input_id = '#mce-'+fnames[index]+'-month';
                    f = $(input_id).parent().parent().get(0);
                } else {
                    input_id = '#mce-'+fnames[index];
                    f = $().parent(input_id).get(0);
                }
                if (f){
                    $(f).append(html);
                    $(input_id).focus();
                } else {
                    $('#mce-'+resp.result+'-response').show();
                    $('#mce-'+resp.result+'-response').html(msg);
                }
            }
        } catch(e){
            $('#mce-'+resp.result+'-response').show();
            $('#mce-'+resp.result+'-response').html(msg);
        }
    }
}
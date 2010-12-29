/* Author: Mark Henderson

*/

$(document).ready(function() {
  //Hiding some elements
  $('.slidercontent').hide();
  
  // Main slider animation 
  $("#main nav li").find("a").click(function(e) {
    var boxClass = "." + $(this).attr("class");
    
    $(".boxContent").remove();
    $(".box a:not(" + boxClass +")").animate({'width': "50px", 'height': "400px"}, 500)
                                        .css("text-indent", "-9999px");

    setTimeout(function() {
      var showDiv = $(boxClass).attr("href");
      
      $(boxClass).animate({'height': "2em", 'width': "810px", "line-height": "2em"}, 500, 'linear', 
        function() { $(boxClass).css("text-indent", "0px"); $(".boxContent").show(); })
        .parent().append('<div class="boxContent">xx</div>');
        
        $(".boxContent").html($(showDiv).html());
        
        if(showDiv === "#quiz") {
          $(".boxContent dd").hide();
        }
    }, 501);
    
    return false;
  });
});
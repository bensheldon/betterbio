jQuery(document).ready(function($) {
  $.ajax({ 
      "url": "/wp-content/themes/arthemia-premium/scripts/indiegogo_scrape.php",
      "success": function(data) {
        $(".sumTotal").html(data);
      }});
});
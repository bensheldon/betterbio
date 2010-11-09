/* Author: 

*/

$(document).ready(function() {
  $("#email").defaultvalue("Enter your email for (minimal) updates");
  $('#mailchimp').validate({
    errorPlacement: function(error, element) {
         error.prependTo( "#mailchimp" );
    },
    debug:true
  });
   
  $("#main button").click(function() {
    var email = $("#email").val();
    var toMailChimp = {
      "apikey": "ee671ba6d275dec8b7dbccf679a27e58-us2",
      "id": "a5774e0fac",
      "merge_vars": "",
      "email_address": email,
      "output": "json"
    }
    var dataJSON = "";
    
    if(!$("#email").hasClass("error")) {       
      $.ajax({
        url: 'mailchimp.php',
        data: toMailChimp,
        success: function(data) {
          if(data === "true") {
            alert("Thank you for subscribing! We will be in touch soon.");
          } else {
            dataJSON = $.parseJSON(data);
            alert(dataJSON.error);
          }
        }
      });
    }
    return false;
  });
});























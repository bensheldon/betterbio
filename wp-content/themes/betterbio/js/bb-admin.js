jQuery(document).ready(function($) {
  $(".categorychecklist input").click(function() {
    if($(this).parent().html().indexOf("Universal") !== -1) {
      if(true === $(this).attr("checked")) {
        $(".categorychecklist input").attr("checked", false);
        $(this).attr("checked", true);
      }
    } else {
      $(".categorychecklist label:contains('Universal')").find("input").attr("checked", false);
    }
  });
});
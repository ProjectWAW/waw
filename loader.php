<div id="spinner"><div id="loader"></div></div>
<script>
$('body,html').css("overflow","hidden");
$(window).on("load", function() {
  $("#spinner").fadeOut("slow");
  $('body,html').css("overflow","visible");
});
</script>

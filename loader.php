<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
<div id="spinner"><div id="loader"></div></div>
<script>
$('body,html').css("overflow","hidden");
$(window).load(function() {
  $("#spinner").fadeOut("slow");
  $('body,html').css("overflow","visible");
});
</script>
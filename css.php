<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
if (localStorage.getItem("dark-mode") !== "on") {
  $('head').append('<link rel="stylesheet" type="text/css" href="../../all.css">');
} else {
  $('head').append('<link rel="stylesheet" type="text/css" href="../../dark.css">');
}
</script>
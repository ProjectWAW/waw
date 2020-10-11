<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto&display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
if (localStorage.getItem("dark-mode") !== "on") {
  $('head').append('<link rel="stylesheet" type="text/css" href="/css/all.css">');
} else {
  $('head').append('<link rel="stylesheet" type="text/css" href="/css/dark.css">');
}
</script>
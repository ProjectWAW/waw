<html>
<head>
<?php include 'page_head.php';?>
<script>
function checkNightMode() {
  if (localStorage.getItem("dark-mode") !== "on") {
    $('head').append('<link rel="stylesheet" type="text/css" href="all.css">');
  } else {
    $('head').append('<link rel="stylesheet" type="text/css" href="dark.css">');
  }
}
</script>
<title>Settings - Project: World at War</title>
</head>
<body>
<label class="switch">
  <input name="night-mode" id="night-mode" type="checkbox" onclick="toggleDark()">
  <span class="slider round"></span>
</label>
<script>
if (localStorage.getItem("dark-mode") == "on") {
  document.getElementById("night-mode").checked = true;
} else {
  document.getElementById("night-mode").checked = false;
}
function toggleDark() {
if (localStorage.getItem("dark-mode") !== "on") {
  localStorage.setItem("dark-mode", "on");
} else {
  localStorage.setItem("dark-mode", "off");
}
checkNightMode();
}
</script>
</body>
</html>
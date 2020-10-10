<html>
<head>
<?php include 'page_head.php';?>
<script>
function checkNightMode() {
  if (localStorage.getItem("dark-mode") !== "on") {
    $('head').append('<link rel="stylesheet" type="text/css" href="css/all.css">');
  } else {
    $('head').append('<link rel="stylesheet" type="text/css" href="css/dark.css">');
  }
}
</script>
<title>Settings - Project: World at War</title>
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}
.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: 0.4s;
  transition: 0.4s;
}
.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: #fff;
  -webkit-transition: 0.4s;
  transition: 0.4s;
}
input:checked + .slider {
  background-color: #2196F3;
}
input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}
input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}
.slider.round {
  border-radius: 34px;
}
.slider.round:before {
  border-radius: 50%;
}
</style>
</head>
<body>
<?php include 'loader.php';
require 'navbar.php';
?>
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
<html>
<head>
</head>
<body>
<label class="switch">
  <input name="checkbox2" id="checkbox2" type="checkbox" onclick="toggleDark()">
  <span class="slider round"></span>
</label>
<script>
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
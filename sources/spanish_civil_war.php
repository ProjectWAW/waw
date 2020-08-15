<html>
<head>
<?php include $_SERVER['DOCUMENT_ROOT'].'/page_head.php';?>
<link rel="stylesheet" type="text/css" href="sources.css">
<title>Spanish Civil War Sources - Project: World at War</title>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'].'/loader.php';
require $_SERVER['DOCUMENT_ROOT'].'/navbar.php';
?>
<div class="container">

<h1>Spanish Civil War Sources for Markers</h1>

<h3>17 July 1936</h3>
<h4 id="1936_07_17_1"><a href="/index.php?d=1936_07_17&m=1936_07_17_1">Marker 1</a> - Hurtado, Víctor, and Martín Ramos José Luis. La Sublevación: Atlas De La Guerra Civil Española. DAU, 2011.</h4>
<h4 id="1936_07_17_2"><a href="/index.php?d=1936_07_17&m=1936_07_17_2">Marker 2</a> - Beevor, Anthony. The Battle for Spain the Spanish Civil War 1936-1939. Phoenix, 2007.</h4>

</div>
<script src="sources.js"></script>
<?php
if (isset($_GET['i'])) {
  $marker = $_GET['i'];
  echo '<script>infoClicked = document.getElementById("'.$marker.'");
  onClick2();</script>';
}
?>
</body>
</html>
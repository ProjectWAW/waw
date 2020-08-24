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
<h4 id="1936_07_17_3"><a href="/index.php?d=1936_07_17&m=1936_07_17_3">Marker 3</a> - Hurtado, Víctor, and Martín Ramos José Luis. La Sublevación: Atlas De La Guerra Civil Española. DAU, 2011.</h4>
<h4 id="1936_07_17_4"><a href="/index.php?d=1936_07_17&m=1936_07_17_4">Marker 4</a> - “Anexo:Cronología De La Guerra Civil Española.” Wikipedia, Wikimedia Foundation, 28 July 2020, es.wikipedia.org/wiki/Anexo%3ACronolog%C3%ADa_de_la_guerra_civil_espa%C3%B1ola.</h4>
<h4 id="1936_07_17_5"><a href="/index.php?d=1936_07_17&m=1936_07_17_5">Marker 5</a> - Villalba, Juan Ortiz. Del Golpe Militar a La Guerra Civil: Sevilla 1936. RDeditores, 2013.</h4>
<h4 id="1936_07_17_6"><a href="/index.php?d=1936_07_17&m=1936_07_17_6">Marker 6</a> - Hurtado, Víctor, and Martín Ramos José Luis. La Sublevación: Atlas De La Guerra Civil Española. DAU, 2011.</h4>
<h4 id="1936_07_17_7"><a href="/index.php?d=1936_07_17&m=1936_07_17_7">Marker 7</a> - Hurtado, Víctor, and Martín Ramos José Luis. La Sublevación: Atlas De La Guerra Civil Española. DAU, 2011.</h4>

</div>
<script src="sources.js"></script>
<?php
if (isset($_GET['i'])) {
  $marker = $_GET['i'];
  echo '<script>infoClicked = document.getElementById("'.$marker.'");
  infoClicked.classList.add("info-clicked");</script>';
}
?>
</body>
</html>
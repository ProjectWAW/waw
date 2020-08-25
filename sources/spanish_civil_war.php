<html>
<head>
<?php include $_SERVER['DOCUMENT_ROOT'].'/page_head.php';?>
<link rel="stylesheet" type="text/css" href="sources.css">
<title>Spanish Civil War Sources - Project: World at War</title>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'].'/loader.php';
require $_SERVER['DOCUMENT_ROOT'].'/navbar.php';
require 'variables.php';
?>
<div class="container">

<h1>Spanish Civil War Sources for Markers</h1>

<h3>17 July 1936</h3>
<h4 id="1936_07_17_1"><a href="/index.php?d=1936_07_17&m=1936_07_17_1">Marker 1</a> - <?php echo $hurtado_guerra_civil_espanola;?></h4>
<h4 id="1936_07_17_2"><a href="/index.php?d=1936_07_17&m=1936_07_17_2">Marker 2</a> - <?php echo $beevor_spanish_civil_war;?></h4>
<h4 id="1936_07_17_3"><a href="/index.php?d=1936_07_17&m=1936_07_17_3">Marker 3</a> - <?php echo $hurtado_guerra_civil_espanola;?></h4>
<h4 id="1936_07_17_4"><a href="/index.php?d=1936_07_17&m=1936_07_17_4">Marker 4</a> - <?php echo $thomas_spanish_civil_war;?></h4>
<h4 id="1936_07_17_5"><a href="/index.php?d=1936_07_17&m=1936_07_17_5">Marker 5</a> - <?php echo $villalba_golpe_militar_sevilla;?></h4>
<h4 id="1936_07_17_6"><a href="/index.php?d=1936_07_17&m=1936_07_17_6">Marker 6</a> - <?php echo $hurtado_guerra_civil_espanola;?></h4>
<h4 id="1936_07_17_7"><a href="/index.php?d=1936_07_17&m=1936_07_17_7">Marker 7</a> - <?php echo $hurtado_guerra_civil_espanola;?></h4>

<h3>18 July 1936</h3>
<h4 id="1936_07_18_10"><a href="/index.php?d=1936_07_18&m=1936_07_18_10">Marker 1</a> - <?php echo $thomas_spanish_civil_war;?></h4>
<h4 id="1936_07_18_8"><a href="/index.php?d=1936_07_18&m=1936_07_18_8">Marker 2</a> - <?php echo $hurtado_guerra_civil_espanola;?></h4>
<h4 id="1936_07_18_9"><a href="/index.php?d=1936_07_18&m=1936_07_18_9">Marker 3</a> - <?php echo $wikipedia_scw_timeline;?></h4>

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
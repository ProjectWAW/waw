<!DOCTYPE html>
<html>
<head>
<?php include $_SERVER['DOCUMENT_ROOT'].'/page_head.php';?>
<link rel="stylesheet" type="text/css" href="sources.css">
<title>Spanish Civil War Sources - Project: World at War</title>
</head>
<body>
<?php 
require $_SERVER['DOCUMENT_ROOT'].'/navbar.php';
include $_SERVER['DOCUMENT_ROOT'].'/loader.php';
require 'variables.php';
?>
<div class="container">

<h1>Spanish Civil War Sources for Markers</h1>

<h3>17 July 1936</h3>
<h4><a id="1936_07_17_1" href="/index.php?d=1936_07_17&m=1936_07_17_1">Marker 1</a> - <?php echo $hurtado_guerra_civil_espanola;?></h4>
<h4><a id="1936_07_17_2" href="/index.php?d=1936_07_17&m=1936_07_17_2">Marker 2</a> - <?php echo $beevor_spanish_civil_war;?></h4>
<h4><a id="1936_07_17_3" href="/index.php?d=1936_07_17&m=1936_07_17_3">Marker 3</a> - <?php echo $hurtado_guerra_civil_espanola;?></h4>
<h4><a id="1936_07_17_4" href="/index.php?d=1936_07_17&m=1936_07_17_4">Marker 4</a> - <?php echo $thomas_spanish_civil_war;?></h4>
<h4><a id="1936_07_17_5" href="/index.php?d=1936_07_17&m=1936_07_17_5">Marker 5</a> - <?php echo $villalba_golpe_militar_sevilla;?></h4>
<h4><a id="1936_07_17_6" href="/index.php?d=1936_07_17&m=1936_07_17_6">Marker 6</a> - <?php echo $hurtado_guerra_civil_espanola;?></h4>
<h4><a id="1936_07_17_7" href="/index.php?d=1936_07_17&m=1936_07_17_7">Marker 7</a> - <?php echo $hurtado_guerra_civil_espanola;?></h4>

<h3>18 July 1936</h3>
<h4><a id="1936_07_18_10" href="/index.php?d=1936_07_18&m=1936_07_18_10">Marker 1</a> - <?php echo $thomas_spanish_civil_war;?></h4>
<h4><a id="1936_07_18_8" href="/index.php?d=1936_07_18&m=1936_07_18_8">Marker 2</a> - <?php echo $hurtado_guerra_civil_espanola;?></h4>
<h4><a id="1936_07_18_9" href="/index.php?d=1936_07_18&m=1936_07_18_9">Marker 3</a> - <?php echo $wikipedia_scw_timeline;?></h4>
<h4><a id="1936_07_18_7" href="/index.php?d=1936_07_18&m=1936_07_18_7">Marker 4</a> - <?php echo $beevor_spanish_civil_war;?></h4>
<h4><a id="1936_07_18_1" href="/index.php?d=1936_07_18&m=1936_07_18_1">Marker 5</a> - <?php echo $beevor_spanish_civil_war;?></h4>
<h4><a id="1936_07_18_3" href="/index.php?d=1936_07_18&m=1936_07_18_3">Marker 6</a> - <?php echo $thomas_spanish_civil_war;?></h4>
<h4><a id="1936_07_18_14" href="/index.php?d=1936_07_18&m=1936_07_18_14">Marker 7</a> - <?php echo $thomas_spanish_civil_war;?></h4>
<h4><a id="1936_07_18_6" href="/index.php?d=1936_07_18&m=1936_07_18_6">Marker 8</a> - <?php echo $beevor_spanish_civil_war;?></h4>
<h4><a id="1936_07_18_2" href="/index.php?d=1936_07_18&m=1936_07_18_2">Marker 9</a> - <?php echo $thomas_spanish_civil_war;?></h4>
<h4><a id="1936_07_18_15" href="/index.php?d=1936_07_18&m=1936_07_18_15">Marker 10</a> - <?php echo $villalba_golpe_militar_sevilla;?></h4>
<h4><a id="1936_07_18_4" href="/index.php?d=1936_07_18&m=1936_07_18_4">Marker 11</a> - <?php echo $beevor_spanish_civil_war;?></h4>
<h4><a id="1936_07_18_5" href="/index.php?d=1936_07_18&m=1936_07_18_5">Marker 12</a> - <?php echo $beevor_spanish_civil_war;?></h4>
<h4><a id="1936_07_18_11" href="/index.php?d=1936_07_18&m=1936_07_18_11">Marker 13</a> - <?php echo $thomas_spanish_civil_war;?></h4>
<h4><a id="1936_07_18_12" href="/index.php?d=1936_07_18&m=1936_07_18_12">Marker 14</a> - <?php echo $hurtado_guerra_civil_espanola;?></h4>
<h4><a id="1936_07_18_13" href="/index.php?d=1936_07_18&m=1936_07_18_13">Marker 15</a> - <?php echo $hurtado_guerra_civil_espanola;?></h4>

<h4><a id="1936_07_18_16" href="/index.php?d=1936_07_18&m=1936_07_18_16">Marker 16</a> - <?php echo $hurtado_guerra_civil_espanola;?></h4>
<h4><a id="1936_07_18_17" href="/index.php?d=1936_07_18&m=1936_07_18_17">Marker 17</a> - <?php echo $hurtado_guerra_civil_espanola;?></h4>
<h4><a id="1936_07_18_18" href="/index.php?d=1936_07_18&m=1936_07_18_18">Marker 18</a> - <?php echo $hurtado_guerra_civil_espanola;?></h4>
</div>
<?php
if (isset($_GET['i'])) {
  $marker = $_GET['i'];
  echo '<script>infoClicked = document.getElementById("'.$marker.'");
  infoClicked.classList.add("info-clicked");
  setTimeout( function() { infoClicked.scrollIntoView(); }, 500);
  </script>';
}
?>
</body>
</html>
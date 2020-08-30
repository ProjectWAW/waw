<!DOCTYPE html>
<html>
<head>
<?php include $_SERVER['DOCUMENT_ROOT'].'/page_head.php';?>
<link rel="stylesheet" type="text/css" href="sources.css">
<title>Geman Invasion Of Poland Sources - Project: World at War</title>
</head>
<body>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/navbar.php';
include $_SERVER['DOCUMENT_ROOT'].'/loader.php';
require 'variables.php';
?>
<div class="container">

<h1>Geman Invasion Of Poland Sources for Markers</h1>

<h3>25 August 1939</h3>
<h4><a id="1939_08_25_1" href="/index.php?d=1939_08_25&m=1939_08_25_1">Marker 1</a> - <?php echo $wikipedia_jablunca_pass;?></h4>
<h4><a id="1939_08_25_2" href="/index.php?d=1939_08_25&m=1939_08_25_2">Marker 2</a> - <?php echo $chroniknet_1939_08_25;?></h4>
<h4><a id="1939_08_25_3" href="/index.php?d=1939_08_25&m=1939_08_25_3">Marker 3</a> - <?php echo $qwe_poland_uk_alliance;?></h4>
<h4><a id="1939_08_25_5" href="/index.php?d=1939_08_25&m=1939_08_25_5">Marker 4</a> - <?php echo $chroniknet_1939_08_25;?></h4>
<h4><a id="1939_08_25_7" href="/index.php?d=1939_08_25&m=1939_08_25_7">Marker 5</a> - <?php echo $chroniknet_1939_08_25;?></h4>
<h4><a id="1939_08_25_8" href="/index.php?d=1939_08_25&m=1939_08_25_8">Marker 6</a> - <?php echo $chroniknet_1939_08_25;?></h4>
<h4><a id="1939_08_25_10" href="/index.php?d=1939_08_25&m=1939_08_25_10">Marker 7</a> - <?php echo $chroniknet_1939_08_25;?></h4>

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

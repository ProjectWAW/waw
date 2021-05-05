<?php
$geojsondata = $_POST['gdata'];
$country = $_POST['country'];
$date = $_POST['date'];
$file = "geojson_files/$date/$country.geojson";
file_put_contents($file, $geojsondata);
?>
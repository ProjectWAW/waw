<?php
$geojsondata = $_POST['gdata'];
$country = $_POST['country'];
$file = "geojson_files/1936_01_12/$country.geojson";
file_put_contents($file, $geojsondata);
?>
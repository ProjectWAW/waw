<?php
$geojsondata = $_POST['gdata'];
$country = $_POST['country'];
$file = "geojson_files/1941-04-17/$country.geojson";
file_put_contents($file, $geojsondata);
?>
<?php
$geojsondata = $_POST['gdata'];
$country = $_POST['country'];
$file = "geojson_files/1936_04_29/$country.geojson";
file_put_contents($file, $geojsondata);
?>
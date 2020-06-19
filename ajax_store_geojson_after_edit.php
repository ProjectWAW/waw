<?php
$geojsondata = $_POST['gdata'];
$country = $_POST['country'];
$file = "geojson_files/1936_03_28/$country.geojson";
file_put_contents($file, $geojsondata);
?>
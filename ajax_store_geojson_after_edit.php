<?php
$geojsondata = $_POST['gdata'];
$country = $_POST['country'];
$file = "geojson_files/1935_10_02/$country.geojson"; 
file_put_contents($file, $geojsondata);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require 'page_head.php';?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
<title>Map - Project: World at War</title>
<style>
.navbar {
  position: fixed;
  margin-bottom: 0;
  z-index: 999;
  width: 100%;
  box-shadow: 0 0 0;
  -webkit-box-shadow: 0 0 0;
}
</style>
</head>
<body>
<?php include 'loader.php';
require 'navbar.php';
?>
<div id='map' style='width:100%;height:100%;position:absolute;'></div>
<script>
var mymap = L.map('map').setView([52.713, 7.198], 10);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
  attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
  maxZoom: 14,
  id: 'mapbox/light-v10',
  tileSize: 512,
  zoomOffset: -1,
  accessToken: 'pk.eyJ1IjoiYW50aXNvY2lhbGVsZXBoYW50IiwiYSI6ImNrOHg4bXJ1NzAzcXYzZWs0cnpyem16OWUifQ.o7KFeNSG2NkS1vdRt9TIew'
}).addTo(mymap);

/************** AXIS **************/
var germany = [
  /* netherlands */
  [53.242, 7.209],
  [53.006, 7.214],
  [52.846, 7.092],
  [52.6397, 7.054],
  [52.644, 6.750],
  [52.486125, 6.69857],
  [52.458938, 6.773415],
  [52.437176, 6.938553],
  [52.468979, 6.986618],
  [52.422942, 7.021294],
  [52.400, 7.056],
  [52.353, 7.072],
  [52.290423, 7.025757],
  [52.242097, 7.063522],
]

var germany1 = L.polygon(germany, {color: 'black'}).addTo(mymap);

/************* ALLIES *************/
var gb = [
  [51.162552, 1.39904],
  [51.179343, 1.405048],
  [51.232365, 1.403847],
  [51.326214, 1.369514],
  [51.33029, 1.42436]
]

var gb1 = L.polygon(gb, {color: 'dodgerblue'}).addTo(mymap);

/************ COMINTERN ***********/
var ussr = [
  [41.523487, 41.547546],
  [41.432431, 41.84143],
  [41.522973, 41.959534]
]

var gb1 = L.polygon(ussr, {color: 'red'}).addTo(mymap);


var popup = L.popup();
function onMapClick(e) {
  popup
    .setLatLng(e.latlng)
    .setContent("You clicked the map at " + e.latlng.toString())
    .openOn(mymap);
}

mymap.on('click', onMapClick);
</script>
</body>
</html>
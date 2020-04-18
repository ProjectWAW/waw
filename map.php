<?php
if (isset($_GET['d'])) {
  $date = $_GET['d'];
} else {
  $date = "1936.07.16";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require 'page_head.php'; ?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
  <link rel="stylesheet" href="http://xguaita.github.io/Leaflet.MapCenterCoord/dist/L.Control.MapCenterCoord.min.css" />
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
  <script src="http://xguaita.github.io/Leaflet.MapCenterCoord/dist/L.Control.MapCenterCoord.min.js"></script>
  <script src="http://localhost/waw/js/leaflet.ajax.min.js"></script>


  <title>Map - Project: World at War</title>
  <style>
    .navbar {
      position: fixed;
      margin-bottom: 0;
      z-index: 500;
      width: 100%;
      box-shadow: 0 0 0;
      -webkit-box-shadow: 0 0 0;
    }

    #map {
      width: 100%;
      height: 100%;
      position: absolute;
    }
  </style>
</head>

<body>
  <?php include 'loader.php';
  require 'navbar.php';
  ?>







  <!--<a href="map.php?d=1936.07.16">s</a>-->
  <div id='map'></div>
  <script>
    var mymap = L.map('map').setView([40.85563, 20.982513], 10);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      minZoom: 3,
      maxZoom: 14,
      id: 'mapbox/light-v10',
      tileSize: 512,
      fullscreenControl: true,
      zoomOffset: -1,
      accessToken: 'pk.eyJ1IjoiYW50aXNvY2lhbGVsZXBoYW50IiwiYSI6ImNrOHg4bXJ1NzAzcXYzZWs0cnpyem16OWUifQ.o7KFeNSG2NkS1vdRt9TIew',
      zoomControl: true,
      noWrap: true,
      bounds: [
        [-90, -180],
        [90, 180]
      ]
    }).addTo(mymap);


    function add_geojson_layer(name, color="red") {

      var ll = new L.GeoJSON.AJAX("/waw/geojson_files/1936_07_16/"+name+".geojson");
    console.log(ll);
    ll.on('data:loaded', function() {
      ll.setStyle({
        color: color
      });
      ll.addTo(mymap);
    });
    }

        /***** COLORS *****/
        var axis = 'black';
    var axis_puppet = 'gray';
    var axis_occupied = '#a1a1a1';

    var allies = 'dodgerblue';

    var comintern = 'red';

    var finland = 'purple';
    var finland_occupied = '#ac68cc';

    var neutral = '#ffca8a';


    var countries = [
      ["andorra", axis],
      ["albania",axis],
      ["bahrain",axis],
      ["bermuda",axis],
      ["bhutan",axis],
      ["british_africa",axis],
      ["british_somaliland",axis],
      ["cyprus",axis],
      ["czechoslovakia",axis],
      ["djibouti",axis],
      ["eritrea",axis],
      ["france",axis],
      ["gambia",axis],
      ["german_prussia",axis],
      ["germany",axis],
      ["gibraltar",axis],
      ["greece",allies],
      ["iraq",axis],
      ["italian_dodecanese",axis],
      ["kuwait",axis],
      ["libya",axis],
      ["lichtenstein",axis],
      ["luxembourg",axis],
      ["malta",axis],
      ["neutral_zone_iraq",axis],
      ["poland",axis],
      ["portugal",axis],
      ["quatar",axis],
      ["romania",axis],
      ["south_georgia",axis],
      ["spanish_africa",axis],
      ["spanish_sahara",axis],
      ["swaziland",axis],
      ["turkey",axis],
      ["uk",axis],
      ["yugoslavia", axis]
    ]

    for (country of countries){
      console.log(country);
      add_geojson_layer(country[0], country[1]);
    }

    L.control.mapCenterCoord({
      icon: false,
      position: 'bottomright'
    }).addTo(mymap);

    L.control.scale({
      position: 'bottomright'
    }).addTo(mymap);

    mymap.zoomControl.setPosition('bottomleft');




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
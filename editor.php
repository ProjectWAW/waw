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
<?php require 'page_head.php';?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
<link rel="stylesheet" href="http://xguaita.github.io/Leaflet.MapCenterCoord/dist/L.Control.MapCenterCoord.min.css" />
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
<script src="http://xguaita.github.io/Leaflet.MapCenterCoord/dist/L.Control.MapCenterCoord.min.js"></script>
<script src="http://localhost/waw/js/leaflet.ajax.min.js"></script>
<link rel="stylesheet" href="http://localhost/waw/js/leaflet-geoman.css" />
<script src="http://localhost/waw/js/leaflet-geoman.min.js"></script>
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
select {
  z-index: 9999;
}
</style>
</head>
<body>
<?php include 'loader.php';
require 'navbar.php';
?>
<br><br><br>
<select id="countries_dropdown" onchange="start(this.value)">
  <option value="a">a</option>
  <option value="andorra">andorra</option>
  <option value="albania">albania</option>
  <option value="bahrain">bahrain</option>
  <option value="bermuda">bermuda</option>
  <option value="bhutan">bhutan</option>
  <option value="british_africa">british_africa</option>
  <option value="british_somaliland">british_somaliland</option>
  <option value="cyprus">cyprus</option>
  <option value="czechoslovakia">czechoslovakia</option>
  <option value="danzig">danzig</option>
  <option value="djibouti">djibouti</option>
  <option value="eritrea">eritrea</option>
  <option value="finland">finland</option>
  <option value="france">france</option>
  <option value="french_syria">french_syria</option>
  <option value="gambia">gambia</option>
  <option value="german_prussia">german_prussia</option>
  <option value="germany">germany</option>
  <option value="gibraltar">gibraltar</option>
  <option value="greece">greece</option>
  <option value="iraq">iraq</option>
  <option value="italian_dodecanese">italian_dodecanese</option>
  <option value="kuwait">kuwait</option>
  <option value="libya">libya</option>
  <option value="lichtenstein">lichtenstein</option>
  <option value="luxembourg">luxembourg</option>
  <option value="malta">malta</option>
  <option value="mongolia">mongolia</option>
  <option value="neutral_zone_iraq">neutral_zone_iraq</option>
  <option value="poland">poland</option>
  <option value="portugal">portugal</option>
  <option value="qatar">qatar</option>
  <option value="romania">romania</option>
  <option value="south_georgia">south_georgia</option>
  <option value="spanish_africa">spanish_africa</option>
  <option value="spanish_sahara">spanish_sahara</option>
  <option value="swaziland">swaziland</option>
  <option value="tannu_tuva">tannu_tuva</option>>
  <option value="turkey">turkey</option>
  <option value="uk">uk</option>
  <option value="ussr">ussr</option>
  <option value="yugoslavia">yugoslavia</option>
  <option value="zara">zara</option>
  </select>
  <br>
  <br>
  <!--<a href="map.php?d=1936.07.16">s</a>-->
  <div id='map'></div>
  <script>
    var mymap = L.map('map').setView([40.85563, 20.982513], 10);
    
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors</a>',
      minZoom: 3,
      maxZoom: 14,
      fullscreenControl: true,
      zoomControl: true
    }).addTo(mymap);

    /***** COLORS *****/
    var axis = 'black'
    var axis_puppet = 'gray'
    var axis_occupied = '#a1a1a1'

    var allies = '#296d98'
    var allies_puppet = '#3792cb'
    var allies_occupied = '#45b6fe'

    var comintern = '#B30000'
    var comintern_puppet = 'red'
    var comintern_occupied = '#ff7f7f'

    var finland = 'purple'
    var finland_occupied = '#ac68cc'

    var neutral = '#ffca8a'

    /*
    mymap.eachLayer(function(layer) {
      console.log(layer);
    });
*/
    country = "france";

    function start(val) {

      country = val;
      console.log(country);

      var geojsonLayer = new L.GeoJSON.AJAX("geojson_files/1936_07_16/" + country + ".geojson");

      geojsonLayer.on('data:loaded', function() {
        geojsonLayer.addTo(mymap);
      });
      geojsonLayer.on('pm:update', e => {
        var geoJSONData = JSON.stringify(geojsonLayer.toGeoJSON());
        var data = new FormData();
        console.log(country + " was edited");
        data.append('country', country);
        data.append('gdata', geoJSONData);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', "ajax_store_geojson_after_edit.php", true);
        xhr.onload = function() {
          console.log(this.response);
        };
        console.log("before sending data");
        xhr.send(data);

      })

    }


    L.control.mapCenterCoord({
      icon: false,
      position: 'bottomright'
    }).addTo(mymap);

    L.control.scale({
      position: 'bottomright'
    }).addTo(mymap);

    mymap.zoomControl.setPosition('bottomleft');


    mymap.pm.addControls({

      editPolygon: true,

    });
  </script>
</body>
</html>
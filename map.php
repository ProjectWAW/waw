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
<link rel="stylesheet" href="http://xguaita.github.io/Leaflet.MapCenterCoord/dist/L.Control.MapCenterCoord.min.css"/>
<link rel="stylesheet" href="https://ppete2.github.io/Leaflet.PolylineMeasure/Leaflet.PolylineMeasure.css" />
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
<script src="http://xguaita.github.io/Leaflet.MapCenterCoord/dist/L.Control.MapCenterCoord.min.js"></script>
<script src="https://ppete2.github.io/Leaflet.PolylineMeasure/Leaflet.PolylineMeasure.js"></script>
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
.nav>li>a {
  color: #777;
}
.nav>li>a:hover {
  background-color: transparent;
  color: #333;
}
.nav>li>a:focus {
  background-color: transparent;
  color: #333;
}
#map {
  width: 80%;
  height: 100%;
  position: absolute;
}
#sidebar {
  width: 20%;
  position: absolute;
  right: 0;
  top: 50px;
}
.sidebar-nav {

}
</style>
</head>
<body>
<?php include 'loader.php';
require 'navbar.php';
?>
<!--<a href="map.php?d=1936.07.16">s</a>-->
  <div id='map'></div>
  <!--<div class="sidebar-nav">
    <ul class="nav navbar-nav">
      <li><a href="#">Info</a></li>
      <li><a href="#">Keys</a></li>
      <li><a href="#">Date</a></li>
    </ul>
  </div>-->
  <div id="sidebar">
    <div class="sidebar-nav">
      <ul class="nav navbar-nav">
      <div class="row">
      <div class="col-sm-4">
        <li><a href="#" onclick="openHelp(event, 'Info')" id="defaultOpen">Info</a></li>
      </div>
      <div class="col-sm-4">
        <li><a href="#" onclick="openHelp(event, 'Date')">Date</a></li>
      </div>
      <div class="col-sm-4">
        <li><a href="#" onclick="openHelp(event, 'Keys')">Keys</a></li>
      </div>
      </div>
      </ul>
      <div id="Info" class="tabcontent">

      </div>
      <div id="Date" class="tabcontent">

      </div>
      <div id="Keys" class="tabcontent">

      </div>
    </div>
  </div>
  <script>
    var mymap = L.map('map').setView([40.85563, 20.982513], 10);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors</a>',
      minZoom: 3,
      maxZoom: 14,
      fullscreenControl: true,
      zoomControl: true
    }).addTo(mymap);

    function add_geojson_layer(name, color="red") {

      var ll = new L.GeoJSON.AJAX("geojson_files/1936_07_16/"+name+".geojson");

    ll.on('data:loaded', function() {
      ll.setStyle({
        color: color
      });
      ll.addTo(mymap);
    });
    }

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
    var neutral_zone = 'white'


    var countries = [
      ["neutral_zone_iraq", neutral_zone],

      ["andorra", neutral],
      ["albania", neutral],
      ["bhutan", neutral],
      ["czechoslovakia", neutral],
      ["finland", neutral],
      ["danzig", neutral],
      ["greece", neutral],
      ["iraq", neutral],
      ["lichtenstein", neutral],
      ["luxembourg", neutral],
      ["poland", neutral],
      ["portugal", neutral],
      ["romania", neutral],
      ["spanish_africa", neutral],
      ["spanish_sahara", neutral],
      ["turkey", neutral],
      ["yugoslavia", neutral],

      ["bahrain", allies_puppet],
      ["bermuda", allies_puppet],
      ["british_africa", allies_puppet],
      ["british_somaliland", allies_puppet],
      ["cyprus", allies_puppet],
      ["djibouti", allies_puppet],
      ["france", allies],
      ["french_syria", allies_puppet],
      ["gambia", allies_puppet],
      ["gibraltar", allies_puppet],
      ["kuwait", allies_puppet],
      ["malta", allies_puppet],
      ["qatar", allies_puppet],
      ["south_georgia", allies_puppet],
      ["swaziland", allies_puppet],
      ["uk", allies],

      ["mongolia", comintern_puppet],
      ["tannu_tuva", comintern_puppet],
      ["ussr", comintern],

      ["eritrea", axis],
      ["german_prussia", axis],
      ["germany", axis],
      ["italian_dodecanese", axis],
      ["libya", axis],
      ["zara", axis]
    ]

    for (country of countries) {
      add_geojson_layer(country[0], country[1]);
    }

    L.control.mapCenterCoord({
      icon: false,
      position: 'bottomright',
      latlngFormat: 'DMS'
    }).addTo(mymap);

    L.control.scale({
      position: 'bottomright'
    }).addTo(mymap);

    mymap.zoomControl.setPosition('bottomleft');

    L.control.polylineMeasure({
      position: 'bottomleft'
    }).addTo(mymap);

    var southWest = L.latLng(-90, -180), northEast = L.latLng(90, 180);
    var bounds = L.latLngBounds(southWest, northEast);

    mymap.setMaxBounds(bounds);

    mymap.on('drag', function() {
	    mymap.panInsideBounds(bounds, { animate: false });
    });
    var popup = L.popup();

    function onMapClick(e) {
      popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(mymap);
    }

    mymap.on('click', onMapClick);
</script>
<script>
var elem = document.documentElement;
function hideSidebar() {
  var sidebar = document.getElementById("sidebar");
  var leafletmap = document.getElementById('map');
  if (sidebar.style.display === "none") {
    sidebar.style.display = "block";
    leafletmap.style.width = "80%";
    $("#map").load(location.href+" #map>*","");
  } else {
    sidebar.style.display = "none";
    leafletmap.style.width = "100%";
    $("#map").load(location.href+" #map>*","");
  }
}
function openFullscreen() {
  if((window.fullScreen) || (window.innerWidth == screen.width && window.innerHeight == screen.height)) {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    }
  } else {
    if (elem.requestFullscreen) {
      elem.requestFullscreen();
    } else if (elem.mozRequestFullScreen) {
      elem.mozRequestFullScreen();
    } else if (elem.webkitRequestFullscreen) {
      elem.webkitRequestFullscreen();
    } else if (elem.msRequestFullscreen) {
      elem.msRequestFullscreen();
    }
  }
}
function openHelp(evt, contentName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(contentName).style.display = "block";
  evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen").click();
</script>
</body>
</html>
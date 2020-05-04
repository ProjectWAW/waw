<?php
if (isset($_GET['d'])) {
  $date = $_GET['d'];
  if (strpos($date, '_01_') !== false) {
    $date_month = "January";
  } elseif (strpos($date, '_02_') !== false) {
    $date_month = "February";
  } elseif (strpos($date, '_03_') !== false) {
    $date_month = "March";
  } elseif (strpos($date, '_04_') !== false) {
    $date_month = "April";
  } elseif (strpos($date, '_05_') !== false) {
    $date_month = "May";
  } elseif (strpos($date, '_06_') !== false) {
    $date_month = "June";
  } elseif (strpos($date, '_07_') !== false) {
    $date_month = "July";
  } elseif (strpos($date, '_08_') !== false) {
    $date_month = "August";
  } elseif (strpos($date, '_09_') !== false) {
    $date_month = "September";
  } elseif (strpos($date, '_10_') !== false) {
    $date_month = "October";
  } elseif (strpos($date, '_11_') !== false) {
    $date_month = "November";
  } else {
    $date_month = "Decmber";
  }
  $date_year = substr($date, 0, 4);
  $date_day = substr($date, 8, 10);
  $date_info = "".$date_day." ".$date_month." ".$date_year."";
} else {
  $date = "1935_10_03";
  $date_info = "03 October 1935";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require 'page_head.php';?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
<link rel="stylesheet" href="http://xguaita.github.io/Leaflet.MapCenterCoord/dist/L.Control.MapCenterCoord.min.css"/>
<link rel="stylesheet" href="server/L.Icon.FontAwesome.css"/>
<script src="https://kit.fontawesome.com/02faa02085.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
<script src="http://xguaita.github.io/Leaflet.MapCenterCoord/dist/L.Control.MapCenterCoord.min.js"></script>
<script src="https://ppete2.github.io/Leaflet.PolylineMeasure/Leaflet.PolylineMeasure.js"></script>
<script src="server/L.Icon.FontAwesome.js"></script>
<script src="js/leaflet.ajax.min.js"></script>
<title>Map - Project: World at War</title>
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
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
.sidebar-nav ul li {
  float: left;
  width: 33%;
  text-align: center;
}
.sidebar-links-nav {
  color: #777;
  background-color: #f8f8f8;
  margin: 0;
  width: 100%;
  float: left;
}
.sidebar-links {
  border-bottom: 2px solid #e7e7e7;
}
#map {
  width: auto;
  height: 100%;
  position: absolute;
  left: 0;
  right: 399px;
}
#sidebar {
  width: 399px;
  position: fixed;
  overflow-y: auto;
  right: 0;
  bottom: 0;
  top: 52px;
  background-color: white;
}
.sidebar-nav {
  position: -webkit-sticky;
  position: sticky;
  top: 0px;
  z-index: 200;
  box-sizing: border-box;
}
.mobile-active {
  color: dodgerblue;
  border-bottom: 2px solid dodgerblue;
}
.tabcontent {
  padding: 8px;
  width: 100%;
}
#mobile-nav {
  display: none;
}
.mobile-nav-button {
  height: 100%;
  width: 50%;
  float: left;
  border: 0;
  color: #777;
  background-color: #f8f8f8;
  border-bottom: 2px solid #e7e7e7;
}
.mobile-nav-button:focus, .mobile-nav-button:active {
  outline: none;
}
hr { 
	height: 1px;
  background-color: lightgray;
	border: none;
  margin-top: 18px;
  margin-bottom: 18px;
}
h4 {
  text-align: center;
  margin-top: 60px;
}
b {
  padding-left: 4px;
  font-size: 20px;
}
.info-content {
  padding-left: 5px;
  padding-right: 5px;
  font-size: 17px;
  font-family: 'Roboto', sans-serif;
}
.fas.fa-bullhorn {
  font-size: 18px;
}
.circle-fa {
  display: inline-block;
  border-radius: 60px;
  box-shadow: 0px 0px 2px #888;
  padding: 0.5em 0.6em;
}
.circle-fa:hover {
  cursor: pointer;
}
.info-clicked {
  border-left: 2px solid dodgerblue;
  padding-left: 6px;
}
@media screen and (max-width: 767px) {
  #mobile-nav {
    display: block;
    z-index: 499;
    position: fixed;
    width: 100%;
    height: 28px;
    top: 52px;
  }
  #map {
    width: 100%;
    z-index: 498;
    right: 0;
  }
  #sidebar {
    top: 78px;
    bottom: 0;
    margin: 0;
    position: fixed;
    width: 100%;
    z-index: 1;
    background-color: white;
  }
  .mobile-active {
    color: dodgerblue;
    border-bottom: 2px solid dodgerblue;
  }
}
</style>
</head>
<body>
<noscript>This website requires javascript to run properly.</noscript>
<?php include 'loader.php';
require 'navbar.php';
?>
<!--<a href="map.php?d=1936.07.16">s</a>-->
<div id="mobile-nav">
  <button id="showMap" class="mobile-nav-button mobile-active" onClick="showMap()">Map</button>
  <button id="showSidebar" class="mobile-nav-button" onClick="showSidebar()">Sidebar</button>
</div>
<div id='map'></div>
<div id="sidebar">
  <div class="sidebar-nav">
    <ul class="nav navbar-nav sidebar-links-nav">
      <li><a id="info-button" style="padding-top:15px;padding-bottom:15px;" class="sidebar-links mobile-active" href="#" onclick="openHelp(event, 'Info');showInfo();" id="defaultOpen">Info</a></li>
      <li><a id="date-button" style="padding-top:15px;padding-bottom:15px;" class="sidebar-links" href="#" onclick="openHelp(event, 'Date');showDate();">Date</a></li>
      <li><a id="keys-button" style="padding-top:15px;padding-bottom:15px;" class="sidebar-links" href="#" onclick="openHelp(event, 'Keys');showKeys();">Keys</a></li>
    </ul>
  </div>

  <div id="Info" class="tabcontent">
    <h4><?php echo $date_info; ?></h4>
    <hr>
    <?php include 'map/'.$date.'.php';?>
  </div>

  <div id="Date" class="tabcontent" style="display:none">
  <div class="date-selection">
    <div class="year">1935</div>

    <div class="year">1936</div>

    <div class="year">1937</div>

    <div class="year">1938</div>

    <div class="year">1939</div>

    <div class="year">1940</div>

    <div class="year">1941</div>

    <div class="year">1942</div>

    <div class="year">1943</div>

    <div class="year">1944</div>

    <div class="year">1945</div>
  </div>
  </div>
  <div id="Keys" class="tabcontent" style="display:none">
a   
  </div>
</div>
<script>
  var mymap = L.map('map').setView([49.75288, 12.216797], 5);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors</a>',
    minZoom: 3,
    maxZoom: 14,
    zoomControl: true
  }).addTo(mymap);

  function add_geojson_layer(name, color) {

  var ll = new L.GeoJSON.AJAX("geojson_files/1935_10_03/"+name+".geojson");

  ll.on('data:loaded', function() {
    ll.setStyle({
      color: color
    });
    ll.addTo(mymap);
  });
  }

  /***** COLORS *****/
  var axis = 'black'
  var axis_puppet = '#666666'
  var axis_occupied = '#a1a1a1'

  var allies = '#296d98'
  var allies_puppet = '#3792cb'
  var allies_occupied = '#45b6fe'

  var comintern = '#B30000'
  var comintern_puppet = 'red'
  var comintern_occupied = '#ff7f7f'

  var finland = 'purple'
  var finland_occupied = '#ac68cc'

  var neutral = '#ffad46' //'#ffb961' //'#ffc176' //'#ffca8a'
  var neutral_zone = 'white'

  var countries = [
    ["poland", neutral],
    ["turkey", neutral],
    ["spain", neutral],

    ["neutral_zone_iraq", neutral_zone],

    ["andorra", neutral],
    ["albania", neutral],
    ["austria", neutral],
    ["belgium", neutral],
    ["bhutan", neutral],
    ["bulgaria", neutral],
    ["czechoslovakia", neutral],
    ["finland", neutral],
    ["danzig", neutral],
    ["denmark", neutral],
    ["estonia", neutral],
    ["greece", neutral],
    ["hungary", neutral],
    ["iraq", neutral],
    ["ireland", neutral],
    ["latvia", neutral],
    ["lichtenstein", neutral],
    ["lithuania", neutral],
    ["luxembourg", neutral],
    ["monaco", neutral],
    ["netherlands", neutral],
    ["norway", neutral],
    /*["poland", neutral],*/
    ["portugal", neutral],
    ["romania", neutral],
    ["san_marino", neutral],
    /*["spain", neutral],*/
    ["spanish_africa", neutral],
    ["spanish_sahara", neutral],
    ["sweden", neutral],
    ["switzerland", neutral],
    /*["turkey", neutral],*/
    ["vatican", neutral],
    ["yugoslavia", neutral],

    ["bahrain", allies_puppet],
    ["bermuda", allies_puppet],
    ["british_africa", allies_puppet],
    ["british_somaliland", allies_puppet],
    ["cyprus", allies_puppet],
    ["djibouti", allies_puppet],
    ["france", allies],
    ["french_africa", allies_puppet],
    ["french_syria", allies_puppet],
    ["gambia", allies_puppet],
    ["gibraltar", allies_puppet],
    ["isle_of_man", allies],
    ["kuwait", allies_puppet],
    ["malta", allies_puppet],
    ["northern_ireland", allies],
    ["qatar", allies_puppet],
    ["south_georgia", allies_puppet],
    ["swaziland", allies_puppet],
    ["uk", allies],

    ["mongolia", comintern_puppet],
    ["tannu_tuva", comintern_puppet],
    ["ussr", comintern],

    ["eritrea", axis_puppet],
    ["german_prussia", axis],
    ["germany", axis],
    ["italian_dodecanese", axis],
    ["italy", axis],
    ["libya", axis_puppet],
    ["zara", axis]
  ]

  for (country of countries) {
    add_geojson_layer(country[0], country[1]);
  }

<?php include 'map_markers/'.$date.'.js'; ?>

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

    /*var myButtonOptions = {
    'text': 'MyButton',  // string
    'iconUrl': 'radar2.png',  // string
    'onClick': closeIcons,  // callback function
    'hideText': true,  // bool
    'maxWidth': 30,  // number
    'doToggle': false,  // bool
    'toggleStatus': false  // bool
  }   

  var myButton = new L.Control.Button(myButtonOptions).addTo(mymap);*/

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

  var radar = L.icon({
    iconUrl: 'radar2.png',
    iconSize: [20, 20],
    iconAnchor: [20, 20],
    popupAnchor: [-10, -15],
    /*shadowUrl: 'my-icon-shadow.png',*/
    shadowSize: [20, 20],
    shadowAnchor: [20, 20]
  });

/*var radars = L.layerGroup([]);*/

var elem = document.documentElement;
function hideSidebar() {
  var sidebar = document.getElementById("sidebar");
  var leafletmap = document.getElementById('map');
  if (sidebar.style.display === "none") {
    sidebar.style.display = "block";
    leafletmap.style.right = "399px";
    mymap.invalidateSize();
  } else {
    sidebar.style.display = "none";
    leafletmap.style.right= "0";
    mymap.invalidateSize();
  }
}


function showMap() {
  var sidebarButton = document.getElementById("showSidebar");
  sidebarButton.classList.remove("mobile-active");
  var mapButton = document.getElementById("showMap");
  mapButton.classList.add("mobile-active");
  var sidebar = document.getElementById("sidebar");
  var leafletmap = document.getElementById('map');
  sidebar.style.display = "block";
  leafletmap.style.zIndex = 200;
}
function showSidebar() {
  var sidebarButton = document.getElementById("showMap");
  sidebarButton.classList.remove("mobile-active");
  var mapButton = document.getElementById("showSidebar");
  mapButton.classList.add("mobile-active");
  var sidebar = document.getElementById("sidebar");
  var leafletmap = document.getElementById('map');
  sidebar.style.display = "block";
  leafletmap.style.zIndex = 1;
}



function showInfo() {
  var infoButton = document.getElementById("info-button");
  infoButton.classList.add("mobile-active");
  var dateButton = document.getElementById("date-button");
  dateButton.classList.remove("mobile-active");
  var keysButton = document.getElementById("keys-button");
  keysButton.classList.remove("mobile-active");
}
function showDate() {
  var infoButton = document.getElementById("info-button");
  infoButton.classList.remove("mobile-active");
  var dateButton = document.getElementById("date-button");
  dateButton.classList.add("mobile-active");
  var keysButton = document.getElementById("keys-button");
  keysButton.classList.remove("mobile-active");
}
function showKeys() {
  var infoButton = document.getElementById("info-button");
  infoButton.classList.remove("mobile-active");
  var dateButton = document.getElementById("date-button");
  dateButton.classList.remove("mobile-active");
  var keysButton = document.getElementById("keys-button");
  keysButton.classList.add("mobile-active");
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
/*function closeIcons() {
    event.preventDefault();
    if(map.hasLayer(radars)) {
        $(this).removeClass('selected');
        map.removeLayer(radars);
    } else {
        map.addLayer(radars);        
        $(this).addClass('selected');
   }
}*/
window.onresize = function() {
  mymap.invalidateSize();
}
</script>
</body>
</html>
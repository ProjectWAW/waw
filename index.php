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
    $date_month = "December";
  }
  $date_year = substr($date, 0, 4);
  $date_day = substr($date, 8, 10);
  $date_info = "".$date_day." ".$date_month." ".$date_year."";
} else {
  $date = "1935_10_03";
  $date_info = "03 October 1935";
  $date_year = substr($date, 0, 4);
  $date_month2 = substr($date, 4,4);
  $date_day = substr($date, 8, 10);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require 'page_head.php';?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="">
<link rel="stylesheet" href="https://xguaita.github.io/Leaflet.MapCenterCoord/dist/L.Control.MapCenterCoord.min.css">
<link rel="stylesheet" href="https://ppete2.github.io/Leaflet.PolylineMeasure/Leaflet.PolylineMeasure.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.css">
<link rel="stylesheet" href="server/L.Icon.FontAwesome.css">
<link rel="stylesheet" href="style.css">
<script>
function checkNightMode() {
  if (localStorage.getItem("dark-mode") !== "on") {
    $('head').append('<link rel="stylesheet" type="text/css" href="all.css">');
  } else {
    $('head').append('<link rel="stylesheet" type="text/css" href="dark.css">');
  }
}
function getCookie(name) {
  const value = `; ${document.cookie}`;
  const parts = value.split(`; ${name}=`);
  if (parts.length === 2) return parts.pop().split(';').shift();
}
</script>
<script src="https://kit.fontawesome.com/02faa02085.js"></script>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
<script src="https://teastman.github.io/Leaflet.pattern/leaflet.pattern.js"></script>
<script src="https://xguaita.github.io/Leaflet.MapCenterCoord/dist/L.Control.MapCenterCoord.min.js"></script>
<script src="https://ppete2.github.io/Leaflet.PolylineMeasure/Leaflet.PolylineMeasure.js"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.js"></script>
<script src="server/L.Icon.FontAwesome.js"></script>
<script src="js/leaflet.ajax.min.js"></script>
<title>Project: World at War</title>
<style>
#overlay{
  position: fixed;
  z-index: 99999;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  background: rgba(0,0,0,0.9);
  transition: 1s 0.4s;
}
#progress-container {
  height: 13px;
  border: 1px solid #fff;
  top: 50%;
  left: 5%;
  right: 5%;
  position: absolute;
}
#progress{
  height: 11px;
  background: #fff;
  width: 0;
  transition: 1s;
}
#progstat{
  font-size: 2em;
  position: absolute;
  top: 50%;
  margin-top: -45px;
  width: 100%;
  text-align: center;
  color: #fff;
}
.navbar {
  -webkit-box-shadow: 0 0 0;
  box-shadow: 0 0 0;
}
.nav>li>a:hover, .nav>li>a:focus {
  background-color: transparent;
}
#map {
  position: absolute;
  top: 50px;
  bottom: 0;
  left: 0;
  right: 399px;
}
#sidebar {
  width: 399px;
  position: fixed;
  overflow-y: auto;
  right: 0;
  bottom: 50px;
  top: 100px;
  background-color: #fafaf5;
}
#sidebar ul {
  height: 50px;
}
#sidebar ul li {
  float: left;
  width: 33%;
  text-align: center;
}
#sidebar ul li a {
  height: 50px;
  line-height: 22px;
  color: #ffffff;
}
.sidebar-links-nav {
  background-color: #bba58e;
  margin: 0;
  float: left;
  width: 399px;
}
.sidebar-links {
  border-bottom: 2px solid #e7e7e7;
  background-color: #bba58e;
}
.sidebar-links:focus, .sidebar-links:active, .sidebar-links:hover {
  outline: none;
}
.sidebar-nav {
  position: -webkit-fixed;
  position: fixed;
  z-index: 200;
  box-sizing: border-box;
  top: 50px;
  width: 399px;
}
.sidebar-bottom-nav {
  position: fixed;
  bottom: 0px;
  width: 399px;
  box-sizing: border-box;
}
.sidebar-bottom-links-nav {
  width: 100%;
  line-height: normal;
}
.tabcontent {
  padding: 10px;
}
#Keys {
  margin-bottom: 20px;
}
#mobile-nav {
  display: none;
}
.mobile-nav-button {
  height: 100%;
  width: 50%;
  float: left;
  border: 0;
  color: #fff;
  background-color: #bba58e;
  border-bottom: 2px solid #e7e7e7;
}
.mobile-nav-button:focus, .mobile-nav-button:active {
  outline: none;
}
.mobile-active {
  border-bottom: 2px solid #6b553b;
}
hr {
	height: 1px;
  background-color: darkgray;
	border: none;
  margin-top: 18px;
  margin-bottom: 18px;
}
.key-hr {
  background-color: #DEDEDE;
}
h4 {
  text-align: center;
}
.country-name {
  padding-left: 4px;
  font-size: 20px;
}
.info-content {
  font-size: 17px;
  padding-top: 3px;
  font-family: 'Roboto', sans-serif;
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
  padding-left: 9px;
}
.territories {
  font-size: 18px;
  text-align: center;
}
.keys-content {
  margin-bottom: 5px;
}
.key-header {
  font-size: 18px;
  padding-bottom: 5px;
}
.key-color {
  width: 35%;
  float: left;
  height: 40px;
}
.key-color-inner {
  height: 100%;
}
.key-description {
  width: 65%;
  float: left;
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 5px;
  padding-right: 5px;
}
.icon-gun-left, .icon-gun-right, .icon-artillery-left, .icon-artillery-right {
  font-weight: 900;
  font-size: 19px;
}
.fas, .far {
  font-size: 19px;
}
.fa-satellite {
  margin-left: -20%;
  margin-top: 23%;
}
.fa-moon {
  margin-left: -15%;
  margin-top: 15%;
}
.keys-icon {
  float: left;
  font-size: 35px;
  margin-right: 7px;
}
.keys-icon-desc {
  padding-top: 6px;
  margin-left: 50px;
}
.date-change {
  float: left;
  width: 50px;
  text-align: center;
}
@media screen and (max-width: 920px) {
  h4 {
    margin-top: 10px;
  }
  #mobile-nav {
    display: block;
    z-index: 499;
    position: fixed;
    width: 100%;
    height: 32px;
    top: 50px;
  }
  #toggleSidebar {
    display: none;
  }
  #map {
    width: 100%;
    z-index: 498;
    right: 0;
  }
  #sidebar {
    top: 132px;
    margin: 0;
    position: fixed;
    width: 100%;
    z-index: 1;
    background-color: white;
  }
  #sidebar ul li a {
    line-height: 28px;
  }
  .sidebar-nav {
    top: 74px;
    width: 100%;
  }
  .sidebar-bottom-nav {
    width: 100%;
  }
  .sidebar-links-nav {
    width: 100%;
  }
  .navbar-nav {
    margin: 0;
  }
  .navbar-header {
    float: none;
  }
  .navbar-left,.navbar-right {
    float: none !important;
  }
  .navbar-toggle {
    display: block;
  }
  .navbar-collapse {
    border-top: 1px solid transparent;
    box-shadow: inset 0 1px 0 rgba(255,255,255,0.1);
  }
  .navbar-fixed-top {
    top: 0;
    border-width: 0 0 1px;
  }
  .navbar-collapse.collapse {
    display: none!important;
  }
  .navbar-nav {
    float: none!important;
    margin-top: 7.5px;
  }
  .navbar-nav>li {
    float: none;
  }
  .navbar-nav>li>a {
    padding-top: 10px;
    padding-bottom: 10px;
  }
  .collapse.in{
    display: block !important;
  }
}
</style>
</head>
<body>
<?php require 'navbar.php';?>
<noscript>This website requires javascript to run properly.</noscript>
<script>
(function(){
  function id(v) {
    return document.getElementById(v);
  }
  function loadbar() {
    var ovrl = id("overlay"),
    prog = id("progress"),
    stat = id("progstat"),
    img = document.images,
    c = 0,
    tot = img.length;
    if (tot == 0) return doneLoading();
    function imgLoaded() {
      c += 1;
      var perc = ((100/tot*c) << 0) +"%";
      prog.style.width = perc;
      stat.innerHTML = "Loading: "+ perc;
      if(c===tot) return doneLoading();
    }
    function doneLoading() {
      ovrl.style.opacity = 0;
      setTimeout(function(){ 
        ovrl.style.display = "none";
      }, 1200);
    }
    for(var i=0; i<tot; i++) {
      var tImg = new Image();
      tImg.onload = imgLoaded;
      tImg.onerror = imgLoaded;
      tImg.src = img[i].src;
    }    
  }
  document.addEventListener('DOMContentLoaded', loadbar, false);
}());
</script>
<div id="overlay">
  <div id="progstat">Loading: 0%</div>
  <div id="progress-container"><div id="progress"></div></div>
</div>
<div id="mobile-nav">
  <button id="showMap" class="mobile-nav-button mobile-active" onClick="showMap()">Map</button>
  <button id="showSidebar" class="mobile-nav-button" onClick="showSidebar()">Sidebar</button>
</div>
<div id='map'></div>
<div id="sidebar">
  <div class="sidebar-nav">
    <ul class="nav navbar-nav sidebar-links-nav">
      <li><a id="info-button" class="sidebar-links mobile-active" href="#" onclick="openHelp(event, 'Info');showInfo();">Info</a></li>
      <li><a id="date-button" class="sidebar-links" href="#" onclick="openHelp(event, 'Date');showDate();">Date</a></li>
      <li style="width:34%;"><a id="keys-button" class="sidebar-links" href="#" onclick="openHelp(event, 'Keys');showKeys();">Keys</a></li>
    </ul>
  </div>
  <div class="sidebar-bottom-nav">
    <ul class="nav navbar-nav sidebar-bottom-links-nav">
      <li style="background-color:#7289DA;"><a id="info-button" href="https://discord.gg/qftqDpY" target="_blank"><i class="fab fa-discord"></i> Discord</a></li>
      <li style="background-color:#f96854;"><a id="date-button" href="#" target="_blank"><i class="fab fa-patreon"></i> Patreon</a></li>
      <li style="width:34%;background-color:#1DA1F2;"><a id="keys-button" href="#" target="_blank"><i class="fab fa-twitter"></i> Twitter</a></li>
    </ul>
  </div>
  <div id="Info" class="tabcontent">
    <h4 id="date_info"><?php echo $date_info; ?></h4>
    <hr>
    <div id="date_info_content">
      <?php include 'map/'.$date.'.php';?><span class="icon-tank"></span>
    </div>
  </div>
  <div id="Date" class="tabcontent" style="display:none">
    <h4>Date Selection</h4>
    <hr>
    <div class="date-selection">
      <h4>placeholder</h4>
      <div style="border: 2px solid black;
    width: 281px;
    position: absolute;
    margin-left: 50px;">
        <div class="date-change" id="change-backward"><i style="font-size:40px;" class="fas fa-chevron-left"></i></div>
        <h4 style="float:left;width:177px;font-weight:bold;margin-top:11px;" id="date_info_2"><?php echo $date_info; ?></h4>
        <div class="date-change" id="change-forward"><i style="font-size:40px;" class="fas fa-chevron-right"></i></div>
      </div>
      <h4 style="margin-top:75px">Jump to date</h4>
      <!--<div class="year">1935</div>

    <div class="year">1936</div>

    <div class="year">1937</div>

    <div class="year">1938</div>

    <div class="year">1939</div>

    <div class="year">1940</div>

    <div class="year">1941</div>

    <div class="year">1942</div>

    <div class="year">1943</div>

    <div class="year">1944</div>

    <div class="year">1945</div>-->
    </div>
  </div>
  <div id="Keys" class="tabcontent" style="display:none">
    <h4>Map Keys</h4>
    <hr>
    <div class="keys-content" id="keys-content">
    <?php
      if ($date_year == "1935" && strpos($date, '12_25') === false && strpos($date, '12_26') === false && strpos($date, '12_27') === false && strpos($date, '12_28') === false && strpos($date, '12_29') === false && strpos($date, '12_30') === false && strpos($date, '12_31') === false) {
        include 'keys/keys_1.php';
      } elseif (strpos($date, '1936_01') || strpos($date, '1936_02') || strpos($date, '1936_03') || strpos($date, '1936_04') || strpos($date, '1936_05') || strpos($date, '1936_06') || strpos($date, '1936_07_0') || strpos($date, '1936_07_17') === false || strpos($date, '1936_07_18') === false || strpos($date, '1936_07_19') === false) {
        include 'keys/keys_2.php';
      } elseif (strpos($date, '1936_07_17') || strpos($date, '1936_07_18') || strpos($date, '1936_07_19') || strpos($date, '1936_07_2') || strpos($date, '1936_07_3') || strpos($date, '1936_08')) {
        include 'keys/keys_3.php';
      }
    ?>
    </div>
    <hr>
    <h4>Event Icons</h4>
    <i class="fas fa-plane keys-icon"></i><div class="keys-icon-desc"> - &nbsp; Aerial Battle</div><br>
    <i class="icon-bomb keys-icon" style="padding-left:2px;"></i><div class="keys-icon-desc"> - &nbsp; Air Raid</div><br>
    <i class="fas fa-ambulance keys-icon"></i><div class="keys-icon-desc"> - &nbsp; Ambulance</div><br>
    <i class="fas fa-bullhorn keys-icon"></i><div class="keys-icon-desc"> - &nbsp; Announcement / Declaration / Proclamation</div><br>
    <i class="icon-artillery-left keys-icon" style="font-size:45px;"></i><div class="keys-icon-desc"> - &nbsp; Artillery Attack</div><br>
    <i class="fas fa-crosshairs keys-icon" style="padding-left:3px;"></i><div class="keys-icon-desc"> - &nbsp; Assasination</div><br>
    <i class="fas fa-atom keys-icon" style="padding-left:4px;"></i><div class="keys-icon-desc"> - &nbsp; Atomic Research</div><br>
    <i class="fas fa-drafting-compass keys-icon"></i><div class="keys-icon-desc"> - &nbsp; Battle Plans</div><br>
    <i class="fas fa-biohazard keys-icon"></i><div class="keys-icon-desc"> - &nbsp; Chemical Attack</div><br>
    <i class="far fa-flag keys-icon"  style="padding-left:1px;"></i><div class="keys-icon-desc"> - &nbsp; City Captured</div><br>
    <i class="fas fa-truck keys-icon"></i><div class="keys-icon-desc"> - &nbsp; Convoy</div><br>
    <i class="fas fa-chart-line keys-icon"  style="padding-left:3px;"></i><div class="keys-icon-desc"> - &nbsp; Economy</div><br>
    <i class="fas fa-virus keys-icon" style="padding-left:3px;"></i><div class="keys-icon-desc"> - &nbsp; Epidemic</div><br>
    <i class="fas fa-skull-crossbones keys-icon" style="padding-left:3px;font-size:40px;"></i><div class="keys-icon-desc"> - &nbsp; Executions / Massacres / Concentration Camps</div><br>
    <i class="fas fa-bahai keys-icon" style="padding-left:3px;"></i><div class="keys-icon-desc"> - &nbsp; Explosion</div><br>
    <i class="fas fa-fire-alt keys-icon" style="padding-left:3px;"></i><div class="keys-icon-desc"> - &nbsp; Fire</div><br>
    <i class="icon-gun-right keys-icon"></i><div class="keys-icon-desc"> - &nbsp; Gun</div><br>
    <i class="fas fa-anchor keys-icon"></i><div class="keys-icon-desc"> - &nbsp; Naval Battle</div><br>
    <i class="icon-tank-right keys-icon"></i><div class="keys-icon-desc"> - &nbsp; Tank Battle</div><br>
    <hr>
    <h4>Copyright</h4>
    <a href="https://fontawesome.com/" target="_blank">https://fontawesome.com/</a> Icons designed by FontAwesome<br>
    <a href="http://cliparts101.com/" target="_blank">http://cliparts101.com/</a> Artillery icon designed by Cliparts101<br>
    <a href="http://getdrawings.com/" target="_blank">http://getdrawings.com/</a> Bomb icon designed by GetDrawings<br>
    <a href="https://creazilla.com/" target="_blank">https://creazilla.com/</a> Tank icon designed by Creazilla<br>
    Gun icon designed by Nestor
  </div>
</div>
<script id="scripts">
var mymap = L.map('map');

var normal = L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager_labels_under/{z}/{x}/{y}{r}.png', { // https://tiles.stadiamaps.com/tiles/outdoors/{z}/{x}/{y}{r}.png // https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png
  attribution: ' Map data &copy; <a href="">PWAW</a> &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
	subdomains: 'abcd',
  minZoom: 3,
  maxZoom: 13,
  zoomControl: true
});

var sattelite = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', { // https://server.arcgisonline.com/ArcGIS/rest/services/World_Physical_Map/MapServer/tile/{z}/{y}/{x} // https://server.arcgisonline.com/ArcGIS/rest/services/World_Terrain_Base/MapServer/tile/{z}/{y}/{x}
  attribution: ' Map data &copy; <a href="">PWAW</a> &copy; Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community',
  minZoom: 3,
  maxZoom: 13,
  zoomControl: true
});

normal.addTo(mymap);

date = '<?php echo $date;?>';

if (date.substr(0, 4) == "1935" || date.substr(0, 7) == "1936_01" || date.substr(0, 7) == "1936_02" || date.substr(0, 7) == "1936_03" || date.substr(0, 7) == "1936_04" || date.substr(0, 7) == "1936_05" || date.substr(0, 7) == "1936_06" || date.substr(0, 9) == "1936_07_0" || date.substr(0, 10) == "1936_07_11" || date.substr(0, 10) == "1936_07_12" || date.substr(0, 10) == "1936_07_13" || date.substr(0, 10) == "1936_07_14") {
  mymap.setView([9.013776, 38.754616], 5);
} else if (date.substr(0, 10) == "1936_07_15" || date.substr(0, 10) == "1936_07_16" || date.substr(0, 10) == "1936_07_17" || date.substr(0, 10) == "1936_07_18" || date.substr(0, 10) == "1936_07_19" || date.substr(0, 9) == "1936_07_2"  || date.substr(0, 9) == "1936_07_3" || date.substr(0, 7) == "1936_08") {
  mymap.setView([40.418201, -3.704109], 6);
} else {
  mymap.setView([40.418201, -3.704109], 6);
}

function onMapClick(e) {
  popup
    .setLatLng(e.latlng)
    .setContent(e.latlng.toString())
    .openOn(mymap);
}

var popup = L.popup();

mymap.on('click', onMapClick);

function forEachFeature(feature, layer) {
  var popupContent = "<b>Name</b>: "+feature.properties.Name+"<br><b>Status</b>: "+feature.properties.Status+"<br><b>Government</b>: "+feature.properties.Government+"<br><b>Ruling Party</b>: "+feature.properties.Party+"<br><b>Head of Government</b>: "+feature.properties.HoG+"";
  layer.bindPopup(popupContent);
}

/***** COLORS *****/
var axis = 'black'
var axis_puppet = '#4d4d4d'
var axis_occupied = '#8f8f8f'

var allies = '#296d98'
var allies_puppet = '#3792cb'
var allies_occupied = '#45b6fe'

var uf = '#7f7f00'
var uf_puppet = '#b2b200'
var uf_occupied = '#e5e500'

var comintern = '#b30000'
var comintern_puppet = 'red'
var comintern_occupied = '#ff7f7f'

var finland = 'purple'
var finland_occupied = '#ac68cc'

var italy = 'green'
var italy_puppet = '#66a103'
var italy_occupied = '#80c904'

var neutral = '#ffad46'
var neutral_zone = 'white'


var orangeMarkerColor = '#ff981a'
var orangeMarkerStroke = '#e67e00'

var yellowMarkerColor = ''
var yellowMarkerStroke = ''

var blueMarkerColor = '#1500FF'
var blueMarkerStroke = '#150055'

var redMarkerColor = '#a50000'
var redMarkerStroke = '#800000'

var purpleMarkerColor = '#800080'
var purpleMarkerStroke = '#5f005f'

var greenMarkerColor = '#25790b'
var greenMarkerStroke = '#1e580d'

var blackMarkerColor = '#3f3f3f'
var blackMarkerStroke = '#262626'


var ambulance = 'fas fa-ambulance'
var anchor = 'fas fa-anchor'
var artillery_left = 'icon-artillery-left'
var artillery_right = 'icon-artillery-right'
var atom = 'fas fa-atom'
var bahai = 'fas fa-bahai'
var biohazard = 'fas fa-biohazard'
var bomb = 'icon-bomb'
var bullhorn = 'fas fa-bullhorn'
var chart_line = 'fas fa-chart-line'
var crosshairs = 'fas fa-crosshairs'
var drafting_compass = 'fas fa-drafting-compass'
var fire_alt = 'fas fa-fire-alt'
var flag = 'fas fa-flag'
var gun_left = 'icon-gun-left'
var gun_right = 'icon-gun-right'
var helmet = 'icon-helmet'
var plane = 'fas fa-plane'
var plane_slash = 'fas fa-plane-slash'
var skull_crossbones = 'fas fa-skull-crossbones'
var tank_left = 'icon-tank-left'
var tank_right = 'icon-tank-right'
var truck = 'fas fa-truck'
var virus = 'fas fa-virus'

var iconColor = '#FFF'
var markerStrokeWidth = 1

var stripes_axis = new L.StripePattern({weight: 5, color: 'black', spaceWeight: 5, angle: 45});
var stripes_comintern = new L.StripePattern({weight: 5, color: '#b30000', spaceWeight: 5, angle: 45});
var stripes_finland = new L.StripePattern({weight: 5, color: 'purple', spaceWeight: 5, angle: 45});
var stripes_neutral = new L.StripePattern({weight: 5, color: '#ffad46', spaceWeight: 5, angle: 45});

stripes_axis.addTo(mymap);
stripes_comintern.addTo(mymap);
stripes_finland.addTo(mymap);
stripes_neutral.addTo(mymap);

<?php include 'markers.js';?>

mymap.createPane('neutral_zone');
mymap.createPane('neutral');
mymap.createPane('uf_occupied');
mymap.createPane('uf_puppet');
mymap.createPane('uf');
mymap.createPane('allies_occupied');
mymap.createPane('allies_puppet');
mymap.createPane('allies');
mymap.createPane('comintern_occupied');
mymap.createPane('comintern_puppet');
mymap.createPane('comintern');
mymap.createPane('finland_occupied');
mymap.createPane('finland');
mymap.createPane('italy_occupied');
mymap.createPane('italy_puppet');
mymap.createPane('italy');
mymap.createPane('axis_occupied');
mymap.createPane('axis_puppet');
mymap.createPane('axis');

mymap.getPane('neutral_zone').style.zIndex = 252;
mymap.getPane('neutral').style.zIndex = 253;
mymap.getPane('uf_occupied').style.zIndex = 254;
mymap.getPane('uf_puppet').style.zIndex = 255;
mymap.getPane('uf').style.zIndex = 256;
mymap.getPane('allies_occupied').style.zIndex = 257;
mymap.getPane('allies_puppet').style.zIndex = 258;
mymap.getPane('allies').style.zIndex = 259;
mymap.getPane('comintern_occupied').style.zIndex = 260;
mymap.getPane('comintern_puppet').style.zIndex = 261;
mymap.getPane('comintern').style.zIndex = 262;
mymap.getPane('finland_occupied').style.zIndex = 263;
mymap.getPane('finland').style.zIndex = 264;
mymap.getPane('italy_occupied').style.zIndex = 265;
mymap.getPane('italy_puppet').style.zIndex = 266;
mymap.getPane('italy').style.zIndex = 267;
mymap.getPane('axis_occupied').style.zIndex = 268;
mymap.getPane('axis_puppet').style.zIndex = 269;
mymap.getPane('axis').style.zIndex = 270;

<?php include 'map/'.$date.'.js';?>

for (let country of countries) {
  country_layers = L.layerGroup();
  $.getJSON('geojson_files/'+country[2]+'/'+country[0]+'.geojson', function(data) {
    sites = L.geoJson(data, {
      //"onEachFeature": forEachFeature,
      "style": {color: country[1], fillPattern: country[4]},
      "pane": country[3]
    });
    sites.addTo(country_layers);
    mymap.addLayer(country_layers);
  });
}

<?php
if (isset($_GET['m'])) {
  $marker = $_GET['m'];
  echo 'infoClicked = document.getElementById("'.$marker.'");
  onClick2();
  zoom'.$marker.'();';
}
?>

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

var number = 1;
var number_map = 1;

L.easyButton({
  id: 'toggle-markers',
  position: 'bottomleft',
  type: 'replace',
  leafletClasses: true,
  states:[{
    stateName: 'get-center',
    onClick: function(button, map){
      if (number == 1) {
        if (typeof marker_group !== 'undefined') {
          marker_group.remove();
        }
        number = 2;
      } else {
        if (typeof marker_group !== 'undefined') {
          marker_group.addTo(mymap);
        }
        number = 1;
      }
    },
    title: 'Hide / show events on the map',
    icon: '<img src="marker.png" style="background-size:50%;max-width:100%;max-height:100%;margin-bottom:50%;">'
  }]
}).addTo(mymap);

L.easyButton({
  id: 'change-map',
  position: 'bottomleft',
  type: 'replace',
  leafletClasses: true,
  states:[{
    stateName: 'get-center',
    onClick: function(button, map){
      if (number_map == 1) {
        map.removeLayer(normal);
        map.addLayer(sattelite);
        number_map = 2;
      } else {
        map.removeLayer(sattelite);
        map.addLayer(normal);
        number_map = 1;
      }
    },
    title: 'Toggle between the political map and the satellite map',
    icon: '<i class="fas fa-satellite"></i>'
  }]
}).addTo(mymap);

L.easyButton({
  id: 'change-night',
  position: 'bottomleft',
  type: 'replace',
  leafletClasses: true,
  states:[{
    stateName: 'get-center',
    onClick: function() {
      if (localStorage.getItem("dark-mode") !== "on") {
        localStorage.setItem("dark-mode", "on");
      } else {
        localStorage.setItem("dark-mode", "off");
      }
      checkNightMode();
    },
    title: 'Toggle between the light mode and the dark mode',
    icon: '<i class="fas fa-moon"></i>'
  }]
}).addTo(mymap);

var southWest = L.latLng(-90, -168), northEast = L.latLng(90, 192);
var bounds = L.latLngBounds(southWest, northEast);

mymap.setMaxBounds(bounds);

mymap.on('drag', function() {
  mymap.panInsideBounds(bounds, { animate: false });
});

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
  var dateButton = document.getElementById("date-button");
  dateButton.classList.remove("mobile-active");
  var keysButton = document.getElementById("keys-button");
  keysButton.classList.remove("mobile-active");
}
function showDate() {
  var infoButton = document.getElementById("info-button");
  infoButton.classList.remove("mobile-active");
  var keysButton = document.getElementById("keys-button");
  keysButton.classList.remove("mobile-active");
}
function showKeys() {
  var infoButton = document.getElementById("info-button");
  infoButton.classList.remove("mobile-active");
  var dateButton = document.getElementById("date-button");
  dateButton.classList.remove("mobile-active");
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
    tablinks[i].className = tablinks[i].className.replace(" mobile-active", "");
  }
  document.getElementById(contentName).style.display = "block";
  evt.currentTarget.className += " mobile-active";
}

window.onresize = function() {
  mymap.invalidateSize();
}

$(function() {
  $('#change-forward').click(function() {
    country_layers.remove();
    marker_group.remove();
    date_year = date.substr(0, 4);
    date_month = date.substr(5, 2);
    date_day = date.substr(8, 7);
    if (date == "1945_09_02") {

    } else if (date.substr(5, 5) == "01_31" || date == "1937_02_28" || date == "1938_02_28" || date == "1939_02_28" || date == "1941_02_28" || date == "1942_02_28" || date == "1943_02_28" || date == "1945_02_28" || date.substr(5, 5) == "02_29" || date.substr(5, 5) == "03_31" || date.substr(5, 5) == "04_30" || date.substr(5, 5) == "05_31" || date.substr(5, 5) == "06_30" || date.substr(5, 5) == "07_31" || date.substr(5, 5) == "08_31" || date.substr(5, 5) == "09_30" || date.substr(5, 5) == "10_31" || date.substr(5, 5) == "11_30") {
      date_day = '01';
      if (date_month == "01") {
        date_month = "02";
        info_month = "February";
      } else if (date_month == "02") {
        date_month = "03";
        info_month = "March";
      } else if (date_month == "03") {
        date_month = "04";
        info_month = "April";
      } else if (date_month == "04") {
        date_month = "05";
        info_month = "May";
      } else if (date_month == "05") {
        date_month = "06";
        info_month = "June";
      } else if (date_month == "06") {
        date_month = "07";
        info_month = "July";
      } else if (date_month == "07") {
        date_month = "08";
        info_month = "August";
      } else if (date_month == "08") {
        date_month = "09";
        info_month = "September";
      } else if (date_month == "09") {
        date_month = "10";
        info_month = "October";
      } else if (date_month == "10") {
        date_month = "11";
        info_month = "November";
      } else if (date_month == "11") {
        date_month = "12";
        info_month = "December";
      }
    } else if (date.substr(5, 5) == "12_31") {
      date_year++;
      date_month = "01";
      info_month = "January";
      date_day = "01";
    } else {
      if (date_day == "01") {
        date_day = "02";
      } else if (date_day == "02") {
        date_day = "03";
      } else if (date_day == "03") {
        date_day = "04";
      } else if (date_day == "04") {
        date_day = "05";
      } else if (date_day == "05") {
        date_day = "06";
      } else if (date_day == "06") {
        date_day = "07";
      } else if (date_day == "07") {
        date_day = "08";
      } else if (date_day == "08") {
        date_day = "09";
      } else if (date_day == "09") {
        date_day = "10";
      } else if (date_day == "10") {
        date_day = "11";
      } else if (date_day == "11") {
        date_day = "12";
      } else if (date_day == "12") {
        date_day = "13";
      } else if (date_day == "13") {
        date_day = "14";
      } else if (date_day == "14") {
        date_day = "15";
      } else if (date_day == "15") {
        date_day = "16";
      } else if (date_day == "16") {
        date_day = "17";
      } else if (date_day == "17") {
        date_day = "18";
      } else if (date_day == "18") {
        date_day = "19";
      } else if (date_day == "19") {
        date_day = "20";
      } else if (date_day == "20") {
        date_day = "21";
      } else if (date_day == "21") {
        date_day = "22";
      } else if (date_day == "22") {
        date_day = "23";
      } else if (date_day == "23") {
        date_day = "24";
      } else if (date_day == "24") {
        date_day = "25";
      } else if (date_day == "25") {
        date_day = "26";
      } else if (date_day == "26") {
        date_day = "27";
      } else if (date_day == "27") {
        date_day = "28";
      } else if (date_day == "28") {
        date_day = "29";
      } else if (date_day == "29") {
        date_day = "30";
      } else if (date_day == "30") {
        date_day = "31";
      }
    }
    if (date_month == "01") {
      info_month = "January";
    } else if (date_month == "02") {
      info_month = "February";
    } else if (date_month == "03") {
      info_month = "March";
    } else if (date_month == "04") {
      info_month = "April";
    } else if (date_month == "05") {
      info_month = "May";
    } else if (date_month == "06") {
      info_month = "June";
    } else if (date_month == "07") {
      info_month = "July";
    } else if (date_month == "08") {
      info_month = "August";
    } else if (date_month == "09") {
      info_month = "September";
    } else if (date_month == "10") {
      info_month = "October";
    } else if (date_month == "11") {
      info_month = "November";
    } else if (date_month == "12") {
      info_month = "December";
    }

    date = date_year+"_"+date_month+"_"+date_day;

    document.getElementById("date_info").innerHTML = date_day+" "+info_month+" "+date_year;
    document.getElementById("date_info_2").innerHTML = date_day+" "+info_month+" "+date_year;
    document.getElementById("date_info_content").innerHTML = "";
    $.getScript('map/'+date+'_def.js')
    $('#date_info_content').load('map/'+date+'.php');

    document.getElementById("keys-content").innerHTML = "";
    if (date.substr(0, 4) == "1935") {
      $('#keys-content').load('keys/keys_1.php');
    }

    $.getScript('map/'+date+'.js', function() {
      for (let country of countries) {
        country_layers = L.layerGroup();
        $.getJSON('geojson_files/'+country[2]+'/'+country[0]+'.geojson', function(data) {
          sites = L.geoJson(data, {
            "onEachFeature": forEachFeature,
            "style": {color: country[1], fillPattern: country[4]},
            "pane": country[3]
          });
          sites.addTo(country_layers);
          mymap.addLayer(country_layers);
        });
      }
    });
  });
});
$(function() {
  $('#change-backward').click(function() {
    country_layers.remove();
    marker_group.remove();
    date_year = date.substr(0, 4);
    date_month = date.substr(5, 2);
    date_day = date.substr(8, 7);
    if (date == "1935_10_03") {

    } else if (date_day == "01") {
      if (date_month == "02") {
        date_month = "01";
        date_day = "31";
      } else if (date_month == "03") {
        date_month = "02";
        if (date_year == "1936" || date_year == "1940" || date_year == "1944") {
          date_day = "29";
        } else {
          date_day = "28";
        }
      } else if (date_month == "04") {
        date_month = "03";
        date_day = "31";
      } else if (date_month == "05") {
        date_month = "04";
        date_day = "30";
      } else if (date_month == "06") {
        date_month = "05";
        date_day = "31";
      } else if (date_month == "07") {
        date_month = "06";
        date_day = "30";
      } else if (date_month == "08") {
        date_month = "07";
        date_day = "31";
      } else if (date_month == "09") {
        date_month = "08";
        date_day = "31";
      } else if (date_month == "10") {
        date_month = "09";
        date_day = "30";
      } else if (date_month == "11") {
        date_month = "10";
        date_day = "31";
      } else if (date_month == "12") {
        date_month = "11";
        date_day = "30";
      } else if (date_month == "01") {
        date_year--;
        date_month = "12";
        date_day = "31";
      }
    } else {
      if (date_day == "31") {
        date_day = "30";
      } else if (date_day == "30") {
        date_day = "29";
      } else if (date_day == "29") {
        date_day = "28";
      } else if (date_day == "28") {
        date_day = "27";
      } else if (date_day == "27") {
        date_day = "26";
      } else if (date_day == "26") {
        date_day = "25";
      } else if (date_day == "25") {
        date_day = "24";
      } else if (date_day == "24") {
        date_day = "23";
      } else if (date_day == "23") {
        date_day = "22";
      } else if (date_day == "22") {
        date_day = "21";
      } else if (date_day == "21") {
        date_day = "20";
      } else if (date_day == "20") {
        date_day = "19";
      } else if (date_day == "19") {
        date_day = "18";
      } else if (date_day == "18") {
        date_day = "17";
      } else if (date_day == "17") {
        date_day = "16";
      } else if (date_day == "16") {
        date_day = "15";
      } else if (date_day == "15") {
        date_day = "14";
      } else if (date_day == "14") {
        date_day = "13";
      } else if (date_day == "13") {
        date_day = "12";
      } else if (date_day == "12") {
        date_day = "11";
      } else if (date_day == "11") {
        date_day = "10";
      } else if (date_day == "10") {
        date_day = "09";
      } else if (date_day == "09") {
        date_day = "08";
      } else if (date_day == "08") {
        date_day = "07";
      } else if (date_day == "07") {
        date_day = "06";
      } else if (date_day == "06") {
        date_day = "05";
      } else if (date_day == "05") {
        date_day = "04";
      } else if (date_day == "04") {
        date_day = "03";
      } else if (date_day == "03") {
        date_day = "02";
      } else if (date_day == "02") {
        date_day = "01";
      }
    }
    if (date_month == "01") {
      info_month = "January";
    } else if (date_month == "02") {
      info_month = "February";
    } else if (date_month == "03") {
      info_month = "March";
    } else if (date_month == "04") {
      info_month = "April";
    } else if (date_month == "05") {
      info_month = "May";
    } else if (date_month == "06") {
      info_month = "June";
    } else if (date_month == "07") {
      info_month = "July";
    } else if (date_month == "08") {
      info_month = "August";
    } else if (date_month == "09") {
      info_month = "September";
    } else if (date_month == "10") {
      info_month = "October";
    } else if (date_month == "11") {
      info_month = "November";
    } else if (date_month == "12") {
      info_month = "December";
    }

    date = date_year+"_"+date_month+"_"+date_day;

    document.getElementById("date_info").innerHTML = date_day+" "+info_month+" "+date_year;
    document.getElementById("date_info_2").innerHTML = date_day+" "+info_month+" "+date_year;
    document.getElementById("date_info_content").innerHTML = "";
    $('#date_info_content').load('map/'+date+'.php');

    document.getElementById("keys-content").innerHTML = "";
    if (date.substr(0, 4) == "1935") {
      $('#keys-content').load('keys/keys_1.php');
    }

    $.getScript('map/'+date+'.js', function() {
      for (let country of countries) {
        country_layers = L.layerGroup();
        $.getJSON('geojson_files/'+country[2]+'/'+country[0]+'.geojson', function(data) {
          sites = L.geoJson(data, {
            "onEachFeature": forEachFeature,
            "style": {color: country[1], fillPattern: country[4]},
            "pane": country[3]
          });
          sites.addTo(country_layers);
          mymap.addLayer(country_layers);
        });
      }
    });
  });
});
</script>
</body>
</html>
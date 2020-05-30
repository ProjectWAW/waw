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
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
<link rel="stylesheet" href="http://xguaita.github.io/Leaflet.MapCenterCoord/dist/L.Control.MapCenterCoord.min.css"/>
<link rel="stylesheet" href="https://ppete2.github.io/Leaflet.PolylineMeasure/Leaflet.PolylineMeasure.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.css">
<link rel="stylesheet" href="server/L.Icon.FontAwesome.css"/>
<script src="https://kit.fontawesome.com/02faa02085.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
<script src="http://xguaita.github.io/Leaflet.MapCenterCoord/dist/L.Control.MapCenterCoord.min.js"></script>
<script src="https://ppete2.github.io/Leaflet.PolylineMeasure/Leaflet.PolylineMeasure.js"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.js"></script>
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
  top: 50px;
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
  color: #777;
}
.sidebar-links-nav {
  background-color: #fafaf5;
  margin: 0;
  width: 100%;
  float: left;
}
.sidebar-links {
  border-bottom: 2px solid #e7e7e7;
}
.sidebar-nav {
  position: -webkit-sticky;
  position: sticky;
  z-index: 200;
  box-sizing: border-box;
}
.sidebar-bottom-nav {
  position: fixed;
  padding-top:12px;
  bottom: 0px;
  width: 399px;
  box-sizing: border-box;
  background-color: #f8f8f8;
  border-bottom: 2px solid #e7e7e7;
}
.sidebar-bottom-links-nav {
  width: 100%;
}
.sidebar-nav {
  position: -webkit-sticky;
  position: sticky;
  top: 0px;
  z-index: 200;
  box-sizing: border-box;
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
  background-color: #fafaf5;
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
.key-hr {
  background-color: #DEDEDE;
}
h4 {
  text-align: center;
  margin-top: 60px;
}
.mobile-active {
  border-bottom: 2px solid seagreen;
}
.country-name {
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
.territories {
  font-size: 18px;
  text-align: center;
}
.keys-content {
  padding-left: 5px;
  padding-right: 5px;
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
@media screen and (max-width: 767px) {
  
}
@media screen and (max-width: 882px) {
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
  #map {
    width: 100%;
    z-index: 498;
    right: 0;
  }
  #sidebar {
    top: 66px;
    bottom: 0;
    margin: 0;
    position: fixed;
    width: 100%;
    z-index: 1;
    background-color: white;
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
<?php include 'loader.php';
require 'navbar.php';
?>
<noscript>This website requires javascript to run properly.</noscript>
<!--<a href="map.php?d=1935_10_03">s</a>-->
<div id="mobile-nav">
  <button id="showMap" class="mobile-nav-button mobile-active" onClick="showMap()">Map</button>
  <button id="showSidebar" class="mobile-nav-button" onClick="showSidebar()">Sidebar</button>
</div>
<div id='map'></div>
<div id="sidebar">
  <div class="sidebar-nav">
    <ul class="nav navbar-nav sidebar-links-nav">
      <li><a id="info-button" class="sidebar-links mobile-active" href="#" onclick="openHelp(event, 'Info');showInfo();" id="defaultOpen">Info</a></li>
      <li><a id="date-button" class="sidebar-links" href="#" onclick="openHelp(event, 'Date');showDate();">Date</a></li>
      <li style="width:34%;"><a id="keys-button" class="sidebar-links" href="#" onclick="openHelp(event, 'Keys');showKeys();">Keys</a></li>
    </ul>
  </div>
  <div class="sidebar-bottom-nav">
    <ul class="nav navbar-nav sidebar-bottom-links-nav">
      <li><a id="info-button" class="sidebar-links" href="https://discord.gg/qftqDpY" target="_blank">Discord</a></li>
      <li><a id="date-button" class="sidebar-links" href="#" target="_blank">Patreon</a></li>
      <li style="width:34%"><a id="keys-button" class="sidebar-links" href="#" target="_blank">Twitter</a></li>
    </ul>
  </div>
  <div id="Info" class="tabcontent">
    <h4><?php echo $date_info; ?></h4>
    <hr>
    <?php include 'map/'.$date.'.php';?>
  </div>

  <div id="Date" class="tabcontent" style="display:none">
    <h4>Date Selection</h4>
    <hr>
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
    <div onClick="changeLayer();">here</div>
    </div>
  </div>
  <div id="Keys" class="tabcontent" style="display:none">
    <h4>Map Keys</h4>
    <hr>
    <div class="keys-content">
      <h5 class="territories">Territories</h5>
      <br>
      <div class="key-header">Neutral</div>
        <div class="key-row">
          <div class="key-color">
            <div class="key-color-inner" style="background-color:#ffad46;">
            </div>
          </div>
          <div class="key-description">
            - Neutral Countries
          </div>
        </div>
      </div>


     <br><br><br><br><hr class="key-hr" style="margin-top:-20px;">
      <div class="key-header">Finland</div>
        <div class="key-row">
          <div class="key-color">
            <div class="key-color-inner" style="background-color:purple;">
            </div>
          </div>
          <div class="key-description">
            - Mainland Finland
          </div>
        </div>
        <div class="key-row">
          <div class="key-color">
            <div class="key-color-inner" style="background-color:#ac68cc;">
            </div>
          </div>
          <div class="key-description">
            - Finnish Occupied Territory
          </div>
        </div>


      <br><br><br><br><hr class="key-hr" style="margin-top:10px;">
      <div class="key-header">Axis</div>
        <div class="key-row">
          <div class="key-color">
            <div class="key-color-inner" style="background-color:black;">
            </div>
          </div>
          <div class="key-description">
            - Axis Members
          </div>
        </div>
        <div class="key-row">
          <div class="key-color">
            <div class="key-color-inner" style="background-color:#666666;">
            </div>
          </div>
          <div class="key-description">
            - Axis Puppets / Colonies
          </div>
        </div>
        <div class="key-row">
          <div class="key-color">
            <div class="key-color-inner" style="background-color:#a1a1a1;">
            </div>
          </div>
          <div class="key-description">
            - Axis Occupied Territory
          </div>
        </div>
        

      <br><br><br><br><hr class="key-hr" style="margin-top:60px;">
      <div class="key-header">Allies</div>
        <div class="key-row">
          <div class="key-color">
            <div class="key-color-inner" style="background-color:#296d98;">
            </div>
          </div>
          <div class="key-description">
            - Allied Members
          </div>
        </div>
        <div class="key-row">
          <div class="key-color">
            <div class="key-color-inner" style="background-color:#3792cb;">
            </div>
          </div>
          <div class="key-description">
            - Allied Puppets / Colonies
          </div>
        </div>
        <div class="key-row">
          <div class="key-color">
            <div class="key-color-inner" style="background-color:#45b6fe;">
            </div>
          </div>
          <div class="key-description">
            - Allied Occupied Territory
          </div>
        </div>
        <br><br><br><br><hr class="key-hr" style="margin-top:60px;">
      
      
      <div class="key-header">Comintern</div>
        <div class="key-row">
          <div class="key-color">
            <div class="key-color-inner" style="background-color:#B30000;">
            </div>
          </div>
          <div class="key-description">
            - Comintern Members
          </div>
        </div>
        <div class="key-row">
          <div class="key-color">
            <div class="key-color-inner" style="background-color:red;">
            </div>
          </div>
          <div class="key-description">
            - Comintern Puppets / Colonies
          </div>
        </div>
        <div class="key-row" style="margin-bottom:105px;">
          <div class="key-color">
            <div class="key-color-inner" style="background-color:#ff7f7f;">
            </div>
          </div>
          <div class="key-description">
            - Comintern Occupied Territory
          </div>
        </div>

      <br><br>
    </div>
  </div>
</div>
<script id="scripts">
var mymap = L.map('map');

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors</a>',
  minZoom: 3,
  maxZoom: 14,
  zoomControl: true
}).addTo(mymap);

function onMapClick(e) {
  popup
    .setLatLng(e.latlng)
    .setContent("You clicked the map at " + e.latlng.toString())
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

var italy = 'green'
var italy_puppet = '#66a103'
var italy_occupied = '#80c904'

var neutral = '#ffad46'
var neutral_zone = 'white'

var date = "<?php echo $date;?>";

var orangeMarkerColor = ''
var orangeMarkerStroke = ''

var blueMarkerColor = ''
var blueMarkerStroke = ''

var redMarkerColor = ''
var redMarkerStroke = ''

var greenMarkerColor = ''
var greenMarkerStroke = ''

var purpleMarkerColor = ''
var purpleMarkerStroke = ''

var blackMarkerColor = '#474747'
var blackMarkerStroke = '#2e2e2e'

/*country_layers_neutral_zone = L.layerGroup();
country_layers_neutral = L.layerGroup();
country_layers_allies_occupied = L.layerGroup();
country_layers_allies_puppet = L.layerGroup();
country_layers_allies = L.layerGroup();
country_layers_comintern_occupied = L.layerGroup();
country_layers_comintern_puppet = L.layerGroup();
country_layers_comintern = L.layerGroup();
country_layers_finland_occupied = L.layerGroup();
country_layers_finland = L.layerGroup();
country_layers_italy_occupied = L.layerGroup();
country_layers_italy_puppet = L.layerGroup();
country_layers_italy = L.layerGroup();
country_layers_axis_occupied = L.layerGroup();
country_layers_axis_puppet = L.layerGroup();
country_layers_axis = L.layerGroup();

country_layers_neutral_zone.setZIndex(695);
country_layers_neutral.setZIndex(700);
country_layers_allies_occupied.setZIndex(705);
country_layers_allies_puppet.setZIndex(706);
country_layers_allies.setZIndex(707);
country_layers_comintern_occupied.setZIndex(711);
country_layers_comintern_puppet.setZIndex(712);
country_layers_comintern.setZIndex(713);
country_layers_finland_occupied.setZIndex(716);
country_layers_finland.setZIndex(717);
country_layers_italy_occupied.setZIndex(720);
country_layers_italy_puppet.setZIndex(721);
country_layers_italy.setZIndex(722);
country_layers_axis_occupied.setZIndex(720);
country_layers_axis_puppet.setZIndex(721);
country_layers_axis.setZIndex(722);*/

<?php include 'map/'.$date.'.js';?>

for (let country of countries) {
country_layers = L.layerGroup();
$.getJSON('geojson_files/'+country[2]+'/'+country[0]+'.geojson', function(data) {
  sites = L.geoJson(data, {
    //"onEachFeature": forEachFeature,
    "style": {color: country[1]}
  });
  sites.addTo(country_layers);
  mymap.addLayer(country_layers);
});
}

/*for (let country of countries) {
//if (typeof country_layers == 'undefined') {
  
/*} else {
  delete country_layers;
  country_layers_neutral = L.layerGroup();
  country_layers_neutral.setZIndex(700);
}
$.getJSON('geojson_files/'+country[2]+'/'+country[0]+'.geojson', function(data) {
  sites = L.geoJson(data, {
    "onEachFeature": forEachFeature,
    "style": {color: country[1]}
  });
  if (country[1] == neutral_zone) {
    sites.addTo(country_layers_neutral_zone);
    mymap.addLayer(country_layers_neutral_zone);
  } else if (country[1] == neutral) {
    sites.addTo(country_layers_neutral);
    mymap.addLayer(country_layers_neutral);
  } else if (country[1] == allies_occupied) {
    sites.addTo(country_layers_allies_occupied);
    mymap.addLayer(country_layers_allies_occupied);
  } else if (country[1] == allies_puppet) {
    sites.addTo(country_layers_allies_puppet);
    mymap.addLayer(country_layers_allies_puppet);
  } else if (country[1] == allies) {
    sites.addTo(country_layers_allies);
    mymap.addLayer(country_layers_allies);
  } else if (country[1] == comintern_occupied) {
    sites.addTo(country_layers_comintern_occupied);
    mymap.addLayer(country_layers_comintern_occupied);
  } else if (country[1] == comintern_puppet) {
    sites.addTo(country_layers_comintern_puppet);
    mymap.addLayer(country_layers_comintern_puppet);
  } else if (country[1] == comintern) {
    sites.addTo(country_layers_comintern);
    mymap.addLayer(country_layers_comintern);
  } else if (country[1] == finland_occupied) {
    sites.addTo(country_layers_finland_occupied);
    mymap.addLayer(country_layers_finland_occupied);
  } else if (country[1] == finland) {
    sites.addTo(country_layers_finland);
    mymap.addLayer(country_layers_finland);
  } else if (country[1] == italy_occupied) {
    sites.addTo(country_layers_italy_occupied);
    mymap.addLayer(country_layers_italy_occupied);
  } else if (country[1] == italy_puppet) {
    sites.addTo(country_layers_italy_puppet);
    mymap.addLayer(country_layers_italy_puppet);
  } else if (country[1] == italy) {
    sites.addTo(country_layers_italy);
    mymap.addLayer(country_layers_italy);
  } else if (country[1] == axis_occupied) {
    sites.addTo(country_layers_axis_occupied);
    mymap.addLayer(country_layers_axis_occupied);
  } else if (country[1] == axis_puppet) {
    sites.addTo(country_layers_axis_puppet);
    mymap.addLayer(country_layers_axis_puppet);
  } else if (country[1] == axis) {
    sites.addTo(country_layers_axis);
    mymap.addLayer(country_layers_axis);
  }
});
}*/

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

/*var toggle = L.easyButton ( {
  position: 'bottomleft', // topleft, topright, bottomleft, bottomright
  icon: '<img src="marker.png" style="background-size:50%;max-width:100%;max-height:100%;margin-bottom:50%;">',
  title: 'load image'
});

toggle.addTo(mymap);*/
/*L.easyButton({
  id: 'toggle-markers',  // an id for the generated button
  position: 'bottomleft',      // inherited from L.Control -- the corner it goes in
  //type: 'replace',          // set to animate when you're comfy with css
  leafletClasses: true,     // use leaflet classes to style the button?
  states:[{                 // specify different icons and responses for your button
    stateName: 'get-center',
    onClick: function(button, map){
      alert('Map is centered at: ' + map.getCenter().toString());
    },
    title: 'show me the middle',
    icon: 'fa-crosshairs'
  }]
});*/

/*L.easyButton('<img src="marker.png" style="background-size:50%;max-width:100%;max-height:100%;margin-bottom:50%;">', function(btn, map){
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
}).addTo(mymap);

/*L.easyButton({
  id: 'toggle-markers',  // an id for the generated button
  position: 'bottomleft',      // inherited from L.Control -- the corner it goes in
  //type: 'replace',          // set to animate when you're comfy with css
  leafletClasses: true,     // use leaflet classes to style the button?
});*/

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

/*var customControl = L.Control.extend({        
  options: {
    position: 'bottomleft'
  },
  onAdd: function (mymap) {
    var container = L.DomUtil.create('div');
    container.innerHTML = '<a style="background-image: url(marker.png); background-size:50%;"></a>';
    container.title="Hide / show events from the map";
    container.classList.add("leaflet-bar");
    var number = 1;
    container.onclick = function(){
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
    }
    container.onmouseover = function(){
      container.style.cursor = 'pointer'; 
    }
    return container;
  }
});
//var readyState = function(e){
  mymap.addControl(new customControl());
/*}

window.addEventListener('DOMContentLoaded', readyState);*/

var southWest = L.latLng(-90, -180), northEast = L.latLng(90, 180);
var bounds = L.latLngBounds(southWest, northEast);

mymap.setMaxBounds(bounds);

mymap.on('drag', function() {
  mymap.panInsideBounds(bounds, { animate: false });
});

function changeLayer() {
  /*country_layers_neutral_zone.remove();
  country_layers_neutral.remove();
  country_layers_allies_occupied.remove();
  country_layers_allies_puppet.remove();
  country_layers_allies.remove();
  country_layers_comintern_occupied.remove();
  country_layers_comintern_puppet.remove();
  country_layers_comintern.remove();
  country_layers_finland_occupied.remove();
  country_layers_finland.remove();
  country_layers_italy_occupied.remove();
  country_layers_italy_puppet.remove();
  country_layers_italy.remove();
  country_layers_axis_occupied.remove();
  country_layers_axis_puppet.remove();
  country_layers_axis.remove();*/
  country_layers.remove();
  var date = '<?php echo $date ?>';
  $.ajax({ url: 'ajax_map.php',
         data: {date: date},
         type: 'post',
         success: function(output) {
              $("#scripts").html(output);
                  }
});
}

var radar = L.icon({
  iconUrl: 'radar2.png',
  iconSize: [20, 20],
  iconAnchor: [20, 20],
  popupAnchor: [-10, -15],
  //shadowUrl: 'my-icon-shadow.png',
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

window.onresize = function() {
  mymap.invalidateSize();
}
</script>
</body>
</html>
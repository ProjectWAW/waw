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
#sidebar ul li {
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
  background-color: #fafaf5;
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
.key-hr {
  background-color: #DEDEDE;
}
h4 {
  text-align: center;
  margin-top: 60px;
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
<script>

  var mymap = L.map('map').setView([49.75288, 12.216797], 5);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors</a>',
    minZoom: 3,
    maxZoom: 14,
    zoomControl: true
  }).addTo(mymap);

  function forEachFeature(feature, layer) {
  var popupContent = "<b>Name</b>: "+feature.properties.Name+"<br><b>Status</b>: "+feature.properties.Status+"<br><b>Government</b>: "+feature.properties.Government+"<br><b>Head of State</b>: "+feature.properties.HoS+"<br><b>Head of Government</b>: "+feature.properties.HoG+"";

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

<?php include 'map/'.$date.'.js';?>

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

 /*function onMapClick(e) {
    popup
      .setLatLng(e.latlng)
      .setContent("You clicked the map at " + e.latlng.toString())
      .openOn(mymap);
  }

  mymap.on('click', onMapClick);*/

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
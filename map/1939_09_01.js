




// Germany declares war on Poland
var i1939_09_01_1 = L.icon.fontAwesome({
  iconClasses: "fas fa-bullhorn",
  markerColor: blackMarkerColor,
  markerStrokeWidth: 1,
  markerStrokeColor: blackMarkerStroke,
  iconColor: "#FFF",
  iconSize: [15, 15],
  iconXOffset: -2.5,
  iconYOffset: 0
});
var info_1 = "<?php echo $info_1; ?>";
var marker1_location = [52.518623, 13.376198];
var marker1 = L.marker(marker1_location, {
  icon: i1939_09_01_1,
  title: info_1,
  id: "marker1"
});

marker_group = new L.FeatureGroup();
marker_group.addLayer(marker1)
mymap.addLayer(marker_group);

marker1.on("click", function () {
  if ($(window).width() < 768) {
    showSidebar();
  }
  if($('#sidebar').css('display') == 'none') {
    hideSidebar();
  }
  showInfo();
  document.getElementById('Info').style.display = "block";
  document.getElementById('Date').style.display = "none";
  document.getElementById('Keys').style.display = "none";
  location.href='#1939_09_01_1';
  var infoClicked = document.getElementById("1939_09_01_1");
  infoClicked.classList.add("info-clicked");
  setTimeout(function () {
    infoClicked.classList.remove("info-clicked");
  }, 5000);
});


function zoom1939_09_01_1() {
  mymap.setView(marker1_location);
}
function onClick1 () {
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
}
function onClick2() {
  infoClicked.classList.add("info-clicked");
  setTimeout(function () {
    infoClicked.classList.remove("info-clicked");
  }, 5000);
}

black_bullhorn = L.icon.fontAwesome({
  iconClasses: bullhorn,
  markerColor: blackMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: blackMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -2.5,
  iconYOffset: 0
});
black_tank_left = L.icon.fontAwesome({
  iconClasses: tank_left,
  markerColor: blackMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: blackMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -2.5,
  iconYOffset: 0
});
black_tank_right = L.icon.fontAwesome({
  iconClasses: tank_right,
  markerColor: blackMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: blackMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -2.5,
  iconYOffset: 0
});
black_truck = L.icon.fontAwesome({
  iconClasses: truck,
  markerColor: blackMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: blackMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -2.5,
  iconYOffset: 0
});
black_virus = L.icon.fontAwesome({
  iconClasses: virus,
  markerColor: blackMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: blackMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -2.5,
  iconYOffset: 0
});

green_bullhorn = L.icon.fontAwesome({
  iconClasses: bullhorn,
  markerColor: greenMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: greenMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -2.5,
  iconYOffset: 0
});
green_gun_left = L.icon.fontAwesome({
  iconClasses: gun_left,
  markerColor: greenMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: greenMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -2.5,
  iconYOffset: 0
});
green_gun_right = L.icon.fontAwesome({
  iconClasses: gun_right,
  markerColor: greenMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: greenMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -2.5,
  iconYOffset: 0
});

purple_bullhorn = L.icon.fontAwesome({
  iconClasses: bullhorn,
  markerColor: purpleMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: purpleMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -2.5,
  iconYOffset: 0
});
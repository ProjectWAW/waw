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


blue_bullhorn = L.icon.fontAwesome({
  iconClasses: bullhorn,
  markerColor: blueMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: blueMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -2.5,
  iconYOffset: 0
});


red_bullhorn = L.icon.fontAwesome({
  iconClasses: bullhorn,
  markerColor: redMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: redMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -2.5,
  iconYOffset: 0
});
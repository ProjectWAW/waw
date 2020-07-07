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

black_ambulance = L.icon.fontAwesome({
  iconClasses: ambulance,
  markerColor: blackMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: blackMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -2.5,
  iconYOffset: 0
});
black_anchor = L.icon.fontAwesome({
  iconClasses: anchor,
  markerColor: blackMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: blackMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -2.5,
  iconYOffset: 0
});
black_artillery_left = L.icon.fontAwesome({
  iconClasses: artillery_left,
  markerColor: blackMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: blackMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -2.5,
  iconYOffset: 0
});
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
black_gun_left = L.icon.fontAwesome({
  iconClasses: gun_left,
  markerColor: blackMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: blackMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -2.5,
  iconYOffset: 0
});
black_gun_right = L.icon.fontAwesome({
  iconClasses: gun_right,
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
red_gun_right = L.icon.fontAwesome({
  iconClasses: gun_right,
  markerColor: redMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: redMarkerStroke,
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

orange_bullhorn = L.icon.fontAwesome({
  iconClasses: bullhorn,
  markerColor: orangeMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: orangeMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -2.5,
  iconYOffset: 0
});
orange_drafting_compass = L.icon.fontAwesome({
  iconClasses: drafting_compass,
  markerColor: orangeMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: orangeMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -2.5,
  iconYOffset: 0
});
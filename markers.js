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
black_artillery_right = L.icon.fontAwesome({
  iconClasses: artillery_right,
  markerColor: blackMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: blackMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -2.5,
  iconYOffset: 0
});
black_atom = L.icon.fontAwesome({
  iconClasses: atom,
  markerColor: blackMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: blackMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -2.5,
  iconYOffset: 0
});
black_bahai = L.icon.fontAwesome({
  iconClasses: bahai,
  markerColor: blackMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: blackMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -1,
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
black_info = L.icon.fontAwesome({
  iconClasses: info,
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
black_flag = L.icon.fontAwesome({
  iconClasses: flag,
  markerColor: blackMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: blackMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: 0,
  iconYOffset: 0
});
black_plane = L.icon.fontAwesome({
  iconClasses: plane,
  markerColor: blackMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: blackMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: 0,
  iconYOffset: 0
});

red_anchor = L.icon.fontAwesome({
  iconClasses: anchor,
  markerColor: redMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: redMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -2.5,
  iconYOffset: 0
});
red_bomb = L.icon.fontAwesome({
  iconClasses: bomb,
  markerColor: redMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: redMarkerStroke,
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
red_info = L.icon.fontAwesome({
  iconClasses: info,
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
green_skull_crossbones = L.icon.fontAwesome({
  iconClasses: skull_crossbones,
  markerColor: greenMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: greenMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: 0,
  iconYOffset: 0
});
green_flag = L.icon.fontAwesome({
  iconClasses: flag,
  markerColor: greenMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: greenMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: 0,
  iconYOffset: 0
});
green_truck = L.icon.fontAwesome({
  iconClasses: truck,
  markerColor: greenMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: greenMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -2.5,
  iconYOffset: 0
});
green_bomb = L.icon.fontAwesome({
  iconClasses: bomb,
  markerColor: greenMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: greenMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -1.5,
  iconYOffset: 0
});
green_biohazard = L.icon.fontAwesome({
  iconClasses: biohazard,
  markerColor: greenMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: greenMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -1.5,
  iconYOffset: 0
});


purple_gun_right = L.icon.fontAwesome({
  iconClasses: gun_right,
  markerColor: purpleMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: purpleMarkerStroke,
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
purple_flag = L.icon.fontAwesome({
  iconClasses: flag,
  markerColor: purpleMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: purpleMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -1.5,
  iconYOffset: 0
});
purple_truck = L.icon.fontAwesome({
  iconClasses: truck,
  markerColor: purpleMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: purpleMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -2.5,
  iconYOffset: 0
});

orange_ambulance = L.icon.fontAwesome({
  iconClasses: ambulance,
  markerColor: orangeMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: orangeMarkerStroke,
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
orange_flag = L.icon.fontAwesome({
  iconClasses: flag,
  markerColor: orangeMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: orangeMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: 0,
  iconYOffset: 0
});
orange_gun_right = L.icon.fontAwesome({
  iconClasses: gun_right,
  markerColor: orangeMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: orangeMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -2.5,
  iconYOffset: 0
});

blue_ambulance = L.icon.fontAwesome({
  iconClasses: ambulance,
  markerColor: blueMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: blueMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: 0,
  iconYOffset: 0
});
blue_flag = L.icon.fontAwesome({
  iconClasses: flag,
  markerColor: blueMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: blueMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: 0,
  iconYOffset: 0
});
blue_gun_right = L.icon.fontAwesome({
  iconClasses: gun_right,
  markerColor: blueMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: blueMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -2.5,
  iconYOffset: 0
});
blue_bomb = L.icon.fontAwesome({
  iconClasses: bomb,
  markerColor: blueMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: blueMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -1,
  iconYOffset: 0
});
blue_truck = L.icon.fontAwesome({
  iconClasses: truck,
  markerColor: blueMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: blueMarkerStroke,
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
blue_bahai = L.icon.fontAwesome({
  iconClasses: bahai,
  markerColor: blueMarkerColor,
  markerStrokeWidth: markerStrokeWidth,
  markerStrokeColor: blueMarkerStroke,
  iconColor: iconColor,
  iconSize: [15, 15],
  iconXOffset: -1,
  iconYOffset: 0
});

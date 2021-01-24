countries = []

markers = []

info_1941_11-05-1 = getCookie("info_1941_11-05-1");
marker1941_11-05-1_location = [12.306409, 37.604032];
marker1941_11-05-1 = L.marker(marker1941_11-05-1_location, {
  id: "marker1941_11-05-1",
  icon: blue_gun_right,
  title: info_1941_11-05-1
});

marker_group.addLayer(marker1941_11-05-1);

mymap.addLayer(marker_group);

marker1941_11-05-1.on("click", function () {
  onClick1();
  location.href='#1941_11-05-1';
  infoClicked = document.getElementById("1941_11-05-1");
  onClick2();
});

function zoom1941_11-05-1() {
  mymap.setView(marker1941_11-05-1_location);
}

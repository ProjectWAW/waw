countries = []

markers = []

info_1941-10-18_1 = getCookie("info_1941-10-18_1");
marker1941-10-18_1_location = [12.291206, 37.611692];
marker1941-10-18_1 = L.marker(marker1941-10-18_1_location, {
  id: "marker1941-10-18_1",
  icon: black_gun_right,
  title: info_1941-10-18_1
});

marker_group.addLayer(marker1941-10-18_1);

mymap.addLayer(marker_group);

marker1941-10-18_1.on("click", function () {
  onClick1();
  location.href='#1941-10-18_1';
  infoClicked = document.getElementById("1941-10-18_1");
  onClick2();
});

function zoom1941-10-18_1() {
  mymap.setView(marker1941-10-18_1_location);
}

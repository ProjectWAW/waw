countries = []

markers = []

info_1941-11-15_1 = getCookie("info_1941-11-15_1");
marker1941-11-15_1_location = [12.306409, 37.604032];
marker1941-11-15_1 = L.marker(marker1941-11-15_1_location, {
  id: "marker1941-11-15_1",
  icon: blue_bomb,
  title: info_1941-11-15_1
});

marker_group.addLayer(marker1941-11-15_1);

mymap.addLayer(marker_group);

marker1941-11-15_1.on("click", function () {
  onClick1();
  location.href='#1941-11-15_1';
  infoClicked = document.getElementById("1941-11-15_1");
  onClick2();
});

function zoom1941-11-15_1() {
  mymap.setView(marker1941-11-15_1_location);
}

countries = []

markers = []

marker_group = new L.FeatureGroup();

info_1941_09_15_1 = getCookie("info_1941_09_15_1");
marker1941_09_15_1_location = [9.030392, 38.764603];
marker1941_09_15_1 = L.marker(marker1941_09_15_1_location, {
  id: "marker1941_09_15_1",
  icon: black_bahai,
  title: info_1941_09_15_1
});

marker_group.addLayer(marker1941_09_15_1);

mymap.addLayer(marker_group);

marker1941_09_15_1.on("click", function () {
  onClick1();
  location.href='#1941_09_15_1';
  infoClicked = document.getElementById("1941_09_15_1");
  onClick2();
});

function zoom1941_09_15_1() {
  mymap.setView(marker1941_09_15_1_location);
}

countries = []

markers = []

marker_group = new L.FeatureGroup();

info_1939_09_07_1 = getCookie("info_1939_09_07_1");
marker1939_09_07_1_location = [54.406543, 18.67384];
marker1939_09_07_1 = L.marker(marker1939_09_07_1_location, {
  id: "marker1939_09_07_1",
  icon: black_flag,
  title: info_1939_09_07_1
});

marker_group.addLayer(marker1939_09_07_1);

mymap.addLayer(marker_group);

marker1939_09_07_1.on("click", function () {
  onClick1();
  location.href='#1939_09_07_1';
  infoClicked = document.getElementById("1939_09_07_1");
  onClick2();
});

function zoom1939_09_07_1() {
  mymap.setView(marker1939_09_07_1_location);
}

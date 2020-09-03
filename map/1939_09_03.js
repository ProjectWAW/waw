countries = []

marker_group = new L.FeatureGroup();

info_1939_09_03_1 = getCookie("info_1939_09_03_1");
marker1939_09_03_1_location = [51.116907, 18.868843];
marker1939_09_03_1 = L.marker(marker1939_09_03_1_location, {
  id: "marker1939_09_03_1",
  icon: black_flag,
  title: info_1939_09_03_1
});

marker_group.addLayer(marker1939_09_03_1);

mymap.addLayer(marker_group);

marker1939_09_03_1.on("click", function () {
  onClick1();
  location.href='#1939_09_03_1';
  infoClicked = document.getElementById("1939_09_03_1");
  onClick2();
});


function zoom1939_09_03_1() {
  mymap.setView(marker1939_09_03_1_location);
}

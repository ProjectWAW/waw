countries = []

markers = []

marker_group = new L.FeatureGroup();

info_1943_09_17_1 = getCookie("info_1943_09_17_1");
marker1943_09_17_1_location = [12.509087, 39.519568];
marker1943_09_17_1 = L.marker(marker1943_09_17_1_location, {
  id: "marker1943_09_17_1",
  icon: blue_truck,
  title: info_1943_09_17_1
});

marker_group.addLayer(marker1943_09_17_1);

mymap.addLayer(marker_group);

marker1943_09_17_1.on("click", function () {
  onClick1();
  location.href='#1943_09_17_1';
  infoClicked = document.getElementById("1943_09_17_1");
  onClick2();
});

function zoom1943_09_17_1() {
  mymap.setView(marker1943_09_17_1_location);
}

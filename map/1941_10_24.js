countries = []

marker_group = new L.FeatureGroup();

info_1941_10_24_1 = getCookie("info_1941_10_24_1");
marker1941_10_24_1_location = [12.306409, 37.604032];
marker1941_10_24_1 = L.marker(marker1941_10_24_1_location, {
  id: "marker1941_10_24_1",
  icon: black_plane,
  title: info_1941_10_24_1
});

marker_group.addLayer(marker1941_10_24_1);

mymap.addLayer(marker_group);

marker1941_10_24_1.on("click", function () {
  onClick1();
  location.href='#1941_10_24_1';
  infoClicked = document.getElementById("1941_10_24_1");
  onClick2();
});

function zoom1941_10_24_1() {
  mymap.setView(marker1941_10_24_1_location);
}

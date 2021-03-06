countries = []

marker_group = new L.FeatureGroup();

info_1941_08_01_1 = getCookie("info_1941_08_01_1");
marker1941_08_01_1_location = [15.608837, 39.451775];
marker1941_08_01_1 = L.marker(marker1941_08_01_1_location, {
  id: "marker1941_08_01_1",
  icon: black_bahai,
  title: info_1941_08_01_1
});

marker_group.addLayer(marker1941_08_01_1);

mymap.addLayer(marker_group);

marker1941_08_01_1.on("click", function () {
  onClick1();
  location.href='#1941_08_01_1';
  infoClicked = document.getElementById("1941_08_01_1");
  onClick2();
});

function zoom1941_08_01_1() {
  mymap.setView(marker1941_08_01_1_location);
}

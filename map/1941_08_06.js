countries = []

marker_group = new L.FeatureGroup();

info_1941_08_06_1 = getCookie("info_1941_08_06_1");
marker1941_08_06_1_location = [12.306409, 37.604032];
marker1941_08_06_1 = L.marker(marker1941_08_06_1_location, {
  id: "marker1941_08_06_1",
  icon: black_truck,
  title: info_1941_08_06_1
})
info_1941_08_06_2 = getCookie("info_1941_08_06_1");
marker1941_08_06_2_location = [12.266791, 37.550596];
marker1941_08_06_2 = L.marker(marker1941_08_06_2_location, {
  id: "marker1941_08_06_2",
  icon: black_truck,
  title: info_1941_08_06_1
});

marker_group.addLayer(marker1941_08_06_1);
marker_group.addLayer(marker1941_08_06_2);

mymap.addLayer(marker_group);

marker1941_08_06_1.on("click", function () {
  onClick1();
  location.href='#1941_08_06_1';
  infoClicked = document.getElementById("1941_08_06_1");
  onClick2();
})
marker1941_08_06_2.on("click", function () {
  onClick1();
  location.href='#1941_08_06_2';
  infoClicked = document.getElementById("1941_08_06_2");
  onClick2();
});

function zoom1941_08_06_1() {
  mymap.setView(marker1941_08_06_1_location);
}
function zoom1941_08_06_2() {
  mymap.setView(marker1941_08_06_2_location);
}

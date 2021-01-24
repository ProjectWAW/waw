countries = []

markers = []

info_1941_08-06-1 = getCookie("info_1941_08-06-1");
marker1941_08-06-1_location = [12.306409, 37.604032];
marker1941_08-06-1 = L.marker(marker1941_08-06-1_location, {
  id: "marker1941_08-06-1",
  icon: black_truck,
  title: info_1941_08-06-1
})
info_1941_08-06-2 = getCookie("info_1941_08-06-1");
marker1941_08-06-2_location = [12.266791, 37.550596];
marker1941_08-06-2 = L.marker(marker1941_08-06-2_location, {
  id: "marker1941_08-06-2",
  icon: black_truck,
  title: info_1941_08-06-1
});

marker_group.addLayer(marker1941_08-06-1);
marker_group.addLayer(marker1941_08-06-2);

mymap.addLayer(marker_group);

marker1941_08-06-1.on("click", function () {
  onClick1();
  location.href='#1941_08-06-1';
  infoClicked = document.getElementById("1941_08-06-1");
  onClick2();
})
marker1941_08-06-2.on("click", function () {
  onClick1();
  location.href='#1941_08-06-2';
  infoClicked = document.getElementById("1941_08-06-2");
  onClick2();
});

function zoom1941_08-06-1() {
  mymap.setView(marker1941_08-06-1_location);
}
function zoom1941_08-06-2() {
  mymap.setView(marker1941_08-06-2_location);
}

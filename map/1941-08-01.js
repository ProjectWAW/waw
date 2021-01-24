countries = []

markers = []

info_1941_08-01-1 = getCookie("info_1941_08-01-1");
marker1941_08-01-1_location = [15.608837, 39.451775];
marker1941_08-01-1 = L.marker(marker1941_08-01-1_location, {
  id: "marker1941_08-01-1",
  icon: black_bahai,
  title: info_1941_08-01-1
});

marker_group.addLayer(marker1941_08-01-1);

mymap.addLayer(marker_group);

marker1941_08-01-1.on("click", function () {
  onClick1();
  location.href='#1941_08-01-1';
  infoClicked = document.getElementById("1941_08-01-1");
  onClick2();
});

function zoom1941_08-01-1() {
  mymap.setView(marker1941_08-01-1_location);
}

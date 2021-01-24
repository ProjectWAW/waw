countries = []

markers = []

info_1939-08-28_1 = getCookie("info_1939-08-28_1");
marker1939-08-28_1_location = [48.828566, 8.113403];
marker1939-08-28_1 = L.marker(marker1939-08-28_1_location, {
  id: "marker1939-08-28_1",
  icon: black_bullhorn,
  title: info_1939-08-28_1
});

marker_group.addLayer(marker1939-08-28_1);

mymap.addLayer(marker_group);

marker1939-08-28_1.on("click", function () {
  onClick1();
  location.href='#1939-08-28_1';
  infoClicked = document.getElementById("1939-08-28_1");
  onClick2();
});


function zoom1939-08-28_1() {
  mymap.setView(marker1939-08-28_1_location);
}

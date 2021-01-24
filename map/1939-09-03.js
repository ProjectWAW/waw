countries = []

markers = []

info_1939-09-03-1 = getCookie("info_1939-09-03-1");
marker1939-09-03-1_location = [51.116907, 18.868843];
marker1939-09-03-1 = L.marker(marker1939-09-03-1_location, {
  id: "marker1939-09-03-1",
  icon: black_flag,
  title: info_1939-09-03-1
});

marker_group.addLayer(marker1939-09-03-1);

mymap.addLayer(marker_group);

marker1939-09-03-1.on("click", function () {
  onClick1();
  location.href='#1939-09-03-1';
  infoClicked = document.getElementById("1939-09-03-1");
  onClick2();
});


function zoom1939-09-03-1() {
  mymap.setView(marker1939-09-03-1_location);
}

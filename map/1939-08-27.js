countries = []

markers = []

info_1939-08-27_1 = getCookie("info_1939-08-27_1");
marker1939-08-27_1_location = [52.518715, 13.376125];
marker1939-08-27_1 = L.marker(marker1939-08-27_1_location, {
  id: "marker1939-08-27_1",
  icon: black_bullhorn,
  title: info_1939-08-27_1
});
info_1939-08-27_2 = getCookie("info_1939-08-27_2");
marker1939-08-27_2_location = [52.520608, 13.408127];
marker1939-08-27_2 = L.marker(marker1939-08-27_2_location, {
  id: "marker1939-08-27_2",
  icon: black_chart_line,
  title: info_1939-08-27_2
});
info_1939-08-27_3 = getCookie("info_1939-08-27_3");
marker1939-08-27_3_location = [54.073000, 12.044200];
marker1939-08-27_3 = L.marker(marker1939-08-27_3_location, {
  id: "marker1939-08-27_3",
  icon: black_plane,
  title: info_1939-08-27_3
});

marker_group.addLayer(marker1939-08-27_1);
marker_group.addLayer(marker1939-08-27_2);
marker_group.addLayer(marker1939-08-27_3);

mymap.addLayer(marker_group);

marker1939-08-27_1.on("click", function () {
  onClick1();
  location.href='#1939-08-27_1';
  infoClicked = document.getElementById("1939-08-27_1");
  onClick2();
});
marker1939-08-27_2.on("click", function () {
  onClick1();
  location.href='#1939-08-27_2';
  infoClicked = document.getElementById("1939-08-27_2");
  onClick2();
});
marker1939-08-27_3.on("click", function () {
  onClick1();
  location.href='#1939-08-27_3';
  infoClicked = document.getElementById("1939-08-27_3");
  onClick2();
});


function zoom1939-08-27_1() {
  mymap.setView(marker1939-08-27_1_location);
}
function zoom1939-08-27_2() {
  mymap.setView(marker1939-08-27_2_location);
}
function zoom1939-08-27_3() {
  mymap.setView(marker1939-08-27_3_location);
}

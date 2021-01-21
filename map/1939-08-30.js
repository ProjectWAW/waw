countries = []

markers = []

info_1939_08_30_1 = getCookie("info_1939_08_30_1");
marker1939_08_30_1_location = [52.518715, 13.376125];
marker1939_08_30_1 = L.marker(marker1939_08_30_1_location, {
  id: "marker1939_08_30_1",
  icon: black_drafting_compass,
  title: info_1939_08_30_1
});
info_1939_08_30_2 = getCookie("info_1939_08_30_2");
marker1939_08_30_2_location = [52.231656, 21.006048];
marker1939_08_30_2 = L.marker(marker1939_08_30_2_location, {
  id: "marker1939_08_30_2",
  icon: blue_drafting_compass,
  title: info_1939_08_30_2
});
info_1939_08_30_3 = getCookie("info_1939_08_30_3");
marker1939_08_30_3_location = [35.685385, 139.753128];
marker1939_08_30_3 = L.marker(marker1939_08_30_3_location, {
  id: "marker1939_08_30_3",
  icon: black_bullhorn,
  title: info_1939_08_30_3
});
info_1939_08_30_4 = getCookie("info_1939_08_30_4");
marker1939_08_30_4_location = [46.946531, 7.444256];
marker1939_08_30_4 = L.marker(marker1939_08_30_4_location, {
  id: "marker1939_08_30_4",
  icon: orange_bullhorn,
  title: info_1939_08_30_4
});

marker_group.addLayer(marker1939_08_30_1);
marker_group.addLayer(marker1939_08_30_2);
marker_group.addLayer(marker1939_08_30_3);
marker_group.addLayer(marker1939_08_30_4);

mymap.addLayer(marker_group);

marker1939_08_30_1.on("click", function () {
  onClick1();
  location.href='#1939_08_30_1';
  infoClicked = document.getElementById("1939_08_30_1");
  onClick2();
});
marker1939_08_30_2.on("click", function () {
  onClick1();
  location.href='#1939_08_30_2';
  infoClicked = document.getElementById("1939_08_30_2");
  onClick2();
});
marker1939_08_30_3.on("click", function () {
  onClick1();
  location.href='#1939_08_30_3';
  infoClicked = document.getElementById("1939_08_30_3");
  onClick2();
});
marker1939_08_30_4.on("click", function () {
  onClick1();
  location.href='#1939_08_30_4';
  infoClicked = document.getElementById("1939_08_30_4");
  onClick2();
});


function zoom1939_08_30_1() {
  mymap.setView(marker1939_08_30_1_location);
}
function zoom1939_08_30_2() {
  mymap.setView(marker1939_08_30_2_location);
}
function zoom1939_08_30_2() {
  mymap.setView(marker1939_08_30_2_location);
}
function zoom1939_08_30_2() {
  mymap.setView(marker1939_08_30_2_location);
}

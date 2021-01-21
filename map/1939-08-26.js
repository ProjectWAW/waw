countries = []

markers = []

info_1939_08_26_1 = getCookie("info_1939_08_26_1");
marker1939_08_26_1_location = [52.518715, 13.376125];
marker1939_08_26_1 = L.marker(marker1939_08_26_1_location, {
  id: "marker1939_08_26_1",
  icon: black_bullhorn,
  title: info_1939_08_26_1
});
info_1939_08_26_2 = getCookie("info_1939_08_26_2");
marker1939_08_26_2_location = [52.520608, 13.408127];
marker1939_08_26_2 = L.marker(marker1939_08_26_2_location, {
  id: "marker1939_08_26_2",
  icon: black_bullhorn,
  title: info_1939_08_26_2
});
info_1939_08_26_3 = getCookie("info_1939_08_26_3");
marker1939_08_26_3_location = [41.901651, 12.478760];
marker1939_08_26_3 = L.marker(marker1939_08_26_3_location, {
  id: "marker1939_08_26_3",
  icon: orange_bullhorn,
  title: info_1939_08_26_3
});
info_1939_08_26_4 = getCookie("info_1939_08_26_4");
marker1939_08_26_4_location = [44.811520, 20.465733];
marker1939_08_26_4 = L.marker(marker1939_08_26_4_location, {
  id: "marker1939_08_26_4",
  icon: orange_bullhorn,
  title: info_1939_08_26_4
});

marker_group.addLayer(marker1939_08_26_1);
marker_group.addLayer(marker1939_08_26_2);
marker_group.addLayer(marker1939_08_26_3);
marker_group.addLayer(marker1939_08_26_4);

mymap.addLayer(marker_group);

marker1939_08_26_1.on("click", function () {
  onClick1();
  location.href='#1939_08_26_1';
  infoClicked = document.getElementById("1939_08_26_1");
  onClick2();
});
marker1939_08_26_2.on("click", function () {
  onClick1();
  location.href='#1939_08_26_2';
  infoClicked = document.getElementById("1939_08_26_2");
  onClick2();
});
marker1939_08_26_3.on("click", function () {
  onClick1();
  location.href='#1939_08_26_3';
  infoClicked = document.getElementById("1939_08_26_3");
  onClick2();
});
marker1939_08_26_4.on("click", function () {
  onClick1();
  location.href='#1939_08_26_4';
  infoClicked = document.getElementById("1939_08_26_4");
  onClick2();
});


function zoom1939_08_26_1() {
  mymap.setView(marker1939_08_26_1_location);
}
function zoom1939_08_26_2() {
  mymap.setView(marker1939_08_26_2_location);
}
function zoom1939_08_26_3() {
  mymap.setView(marker1939_08_26_3_location);
}
function zoom1939_08_26_4() {
  mymap.setView(marker1939_08_26_4_location);
}

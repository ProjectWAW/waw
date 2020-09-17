countries = []

markers = []

info_1939_08_25_1 = getCookie("info_1939_08_25_1");
marker1939_08_25_1_location = [49.512071, 18.751848];
marker1939_08_25_1 = L.marker(marker1939_08_25_1_location, {
  id: "marker1939_08_25_1",
  icon: black_gun_right,
  title: info_1939_08_25_1
});
info_1939_08_25_2 = getCookie("info_1939_08_25_2");
marker1939_08_25_2_location = [54.412613, 18.658447];
marker1939_08_25_2 = L.marker(marker1939_08_25_2_location, {
  id: "marker1939_08_25_2",
  icon: black_anchor,
  title: info_1939_08_25_2
});
info_1939_08_25_3 = getCookie("info_1939_08_25_3");
marker1939_08_25_3_location = [51.499621, -0.124795];
marker1939_08_25_3 = L.marker(marker1939_08_25_3_location, {
  id: "marker1939_08_25_3",
  icon: blue_bullhorn,
  title: info_1939_08_25_3
});
info_1939_08_25_4 = getCookie("info_1939_08_25_3");
marker1939_08_25_4_location = [52.231656, 21.006048];
marker1939_08_25_4 = L.marker(marker1939_08_25_4_location, {
  id: "marker1939_08_25_3",
  icon: blue_bullhorn,
  title: info_1939_08_25_3
});
info_1939_08_25_5 = getCookie("info_1939_08_25_5");
marker1939_08_25_5_location = [41.901651, 12.478760];
marker1939_08_25_5 = L.marker(marker1939_08_25_5_location, {
  id: "marker1939_08_25_5",
  icon: orange_bullhorn,
  title: info_1939_08_25_5
});
info_1939_08_25_6 = getCookie("info_1939_08_25_4");
marker1939_08_25_6_location = [52.518715, 13.376125];
marker1939_08_25_6 = L.marker(marker1939_08_25_6_location, {
  id: "marker1939_08_25_4",
  icon: orange_bullhorn,
  title: info_1939_08_25_4
});
info_1939_08_25_7 = getCookie("info_1939_08_25_7");
marker1939_08_25_7_location = [52.407787, -1.510682];
marker1939_08_25_7 = L.marker(marker1939_08_25_7_location, {
  id: "marker1939_08_25_7",
  icon: blue_bahai,
  title: info_1939_08_25_7
});
info_1939_08_25_8 = getCookie("info_1939_08_25_8");
marker1939_08_25_8_location = [34.307144, -37.96875];
marker1939_08_25_8 = L.marker(marker1939_08_25_8_location, {
  id: "marker1939_08_25_8",
  icon: black_anchor,
  title: info_1939_08_25_8
});
info_1939_08_25_9 = getCookie("info_1939_08_25_8");
marker1939_08_25_9_location = [52.520608, 13.408127];
marker1939_08_25_9 = L.marker(marker1939_08_25_9_location, {
  id: "marker1939_08_25_8",
  icon: black_bullhorn,
  title: info_1939_08_25_8
});
info_1939_08_25_10 = getCookie("info_1939_08_25_10");
marker1939_08_25_10_location = [52.512669, 13.395596];
marker1939_08_25_10 = L.marker(marker1939_08_25_10_location, {
  id: "marker1939_08_25_10",
  icon: black_bullhorn,
  title: info_1939_08_25_10
});

marker_group.addLayer(marker1939_08_25_1);
marker_group.addLayer(marker1939_08_25_2);
marker_group.addLayer(marker1939_08_25_3);
marker_group.addLayer(marker1939_08_25_4);
marker_group.addLayer(marker1939_08_25_5);
marker_group.addLayer(marker1939_08_25_6);
marker_group.addLayer(marker1939_08_25_7);
marker_group.addLayer(marker1939_08_25_8);
marker_group.addLayer(marker1939_08_25_9);
marker_group.addLayer(marker1939_08_25_10);

mymap.addLayer(marker_group);

marker1939_08_25_1.on("click", function () {
  onClick1();
  location.href='#1939_08_25_1';
  infoClicked = document.getElementById("1939_08_25_1");
  onClick2();
});
marker1939_08_25_2.on("click", function () {
  onClick1();
  location.href='#1939_08_25_2';
  infoClicked = document.getElementById("1939_08_25_2");
  onClick2();
});
marker1939_08_25_3.on("click", function () {
  onClick1();
  location.href='#1939_08_25_3';
  infoClicked = document.getElementById("1939_08_25_3");
  onClick2();
});
marker1939_08_25_4.on("click", function () {
  onClick1();
  location.href='#1939_08_25_4';
  infoClicked = document.getElementById("1939_08_25_3");
  onClick2();
});
marker1939_08_25_5.on("click", function () {
  onClick1();
  location.href='#1939_08_25_5';
  infoClicked = document.getElementById("1939_08_25_5");
  onClick2();
});
marker1939_08_25_6.on("click", function () {
  onClick1();
  location.href='#1939_08_25_6';
  infoClicked = document.getElementById("1939_08_25_5");
  onClick2();
});
marker1939_08_25_7.on("click", function () {
  onClick1();
  location.href='#1939_08_25_7';
  infoClicked = document.getElementById("1939_08_25_7");
  onClick2();
});
marker1939_08_25_8.on("click", function () {
  onClick1();
  location.href='#1939_08_25_8';
  infoClicked = document.getElementById("1939_08_25_8");
  onClick2();
});
marker1939_08_25_9.on("click", function () {
  onClick1();
  location.href='#1939_08_25_9';
  infoClicked = document.getElementById("1939_08_25_9");
  onClick2();
});
marker1939_08_25_10.on("click", function () {
  onClick1();
  location.href='#1939_08_25_10';
  infoClicked = document.getElementById("1939_08_25_10");
  onClick2();
});

function zoom1939_08_25_1() {
  mymap.setView(marker1939_08_25_1_location);
}
function zoom1939_08_25_2() {
  mymap.setView(marker1939_08_25_2_location);
}
function zoom1939_08_25_3() {
  mymap.setView(marker1939_08_25_3_location);
}
function zoom1939_08_25_4() {
  mymap.setView(marker1939_08_25_4_location);
}
function zoom1939_08_25_5() {
  mymap.setView(marker1939_08_25_5_location);
}
function zoom1939_08_25_6() {
  mymap.setView(marker1939_08_25_6_location);
}
function zoom1939_08_25_7() {
  mymap.setView(marker1939_08_25_7_location);
}
function zoom1939_08_25_8() {
  mymap.setView(marker1939_08_25_8_location);
}
function zoom1939_08_25_9() {
  mymap.setView(marker1939_08_25_9_location);
}
function zoom1939_08_25_10() {
  mymap.setView(marker1939_08_25_10_location);
}

countries = []

markers = []

marker_group = new L.FeatureGroup();

info_1939_09_01_1 = getCookie("info_1939_09_01_1");
marker1939_09_01_1_location = [54.407542, 18.66972];
marker1939_09_01_1 = L.marker(marker1939_09_01_1_location, {
  id: "marker1939_09_01_1",
  icon: black_bahai,
  title: info_1939_09_01_1
});
info_1939_09_01_2 = getCookie("info_1939_09_01_2");
marker1939_09_01_2_location = [54.404544, 18.680363];
marker1939_09_01_2 = L.marker(marker1939_09_01_2_location, {
  id: "marker1939_09_01_2",
  icon: black_gun_right,
  title: info_1939_09_01_2
});
info_1939_09_01_3 = getCookie("info_1939_09_01_3");
marker1939_09_01_3_location = [54.354836, 18.657224];
marker1939_09_01_3 = L.marker(marker1939_09_01_3_location, {
  id: "marker1939_09_01_3",
  icon: black_gun_right,
  title: info_1939_09_01_3
});
info_1939_09_01_4 = getCookie("info_1939_09_01_4");
marker1939_09_01_4_location = [51.220521, 18.570061];
marker1939_09_01_4 = L.marker(marker1939_09_01_4_location, {
  id: "marker1939_09_01_4",
  icon: black_bomb,
  title: info_1939_09_01_4
});
info_1939_09_01_5 = getCookie("info_1939_09_01_5");
marker1939_09_01_5_location = [51.116907, 18.868843];
marker1939_09_01_5 = L.marker(marker1939_09_01_5_location, {
  id: "marker1939_09_01_5",
  icon: black_bomb,
  title: info_1939_09_01_5
});

marker_group.addLayer(marker1939_09_01_1);
marker_group.addLayer(marker1939_09_01_2);
marker_group.addLayer(marker1939_09_01_3);
marker_group.addLayer(marker1939_09_01_4);
marker_group.addLayer(marker1939_09_01_5);

mymap.addLayer(marker_group);

marker1939_09_01_1.on("click", function () {
  onClick1();
  location.href='#1939_09_01_1';
  infoClicked = document.getElementById("1939_09_01_1");
  onClick2();
});
marker1939_09_01_2.on("click", function () {
  onClick1();
  location.href='#1939_09_01_2';
  infoClicked = document.getElementById("1939_09_01_2");
  onClick2();
});
marker1939_09_01_3.on("click", function () {
  onClick1();
  location.href='#1939_09_01_3';
  infoClicked = document.getElementById("1939_09_01_3");
  onClick2();
});
marker1939_09_01_4.on("click", function () {
  onClick1();
  location.href='#1939_09_01_4';
  infoClicked = document.getElementById("1939_09_01_4");
  onClick2();
});
marker1939_09_01_5.on("click", function () {
  onClick1();
  location.href='#1939_09_01_5';
  infoClicked = document.getElementById("1939_09_01_5");
  onClick2();
});


function zoom1939_09_01_1() {
  mymap.setView(marker1939_09_01_1_location);
}
function zoom1939_09_01_2() {
  mymap.setView(marker1939_09_01_2_location);
}
function zoom1939_09_01_3() {
  mymap.setView(marker1939_09_01_3_location);
}
function zoom1939_09_01_4() {
  mymap.setView(marker1939_09_01_4_location);
}
function zoom1939_09_01_5() {
  mymap.setView(marker1939_09_01_5_location);
}

countries = []

marker_group = new L.FeatureGroup();

info_1939_08_27_1 = getCookie("info_1939_08_27_1");
marker1939_08_27_1_location = [52.518715, 13.376125];
marker1939_08_27_1 = L.marker(marker1939_08_27_1_location, {
  id: "marker1939_08_27_1",
  icon: black_bullhorn,
  title: info_1939_08_27_1
});
info_1939_08_27_2 = getCookie("info_1939_08_27_2");
marker1939_08_27_2_location = [52.520608, 13.408127];
marker1939_08_27_2 = L.marker(marker1939_08_27_2_location, {
  id: "marker1939_08_27_2",
  icon: black_chart_line,
  title: info_1939_08_27_2
});
info_1939_08_27_3 = getCookie("info_1939_08_27_3");
marker1939_08_27_3_location = [54.073000, 12.044200];
marker1939_08_27_3 = L.marker(marker1939_08_27_3_location, {
  id: "marker1939_08_27_3",
  icon: black_plane,
  title: info_1939_08_27_3
});

marker_group.addLayer(marker1939_08_27_1);
marker_group.addLayer(marker1939_08_27_2);
marker_group.addLayer(marker1939_08_27_3);

mymap.addLayer(marker_group);

marker1939_08_27_1.on("click", function () {
  onClick1();
  location.href='#1939_08_27_1';
  infoClicked = document.getElementById("1939_08_27_1");
  onClick2();
});
marker1939_08_27_2.on("click", function () {
  onClick1();
  location.href='#1939_08_27_2';
  infoClicked = document.getElementById("1939_08_27_2");
  onClick2();
});
marker1939_08_27_3.on("click", function () {
  onClick1();
  location.href='#1939_08_27_3';
  infoClicked = document.getElementById("1939_08_27_3");
  onClick2();
});


function zoom1939_08_27_1() {
  mymap.setView(marker1939_08_27_1_location);
}
function zoom1939_08_27_2() {
  mymap.setView(marker1939_08_27_2_location);
}
function zoom1939_08_27_3() {
  mymap.setView(marker1939_08_27_3_location);
}

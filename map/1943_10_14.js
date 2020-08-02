countries = []

marker_group = new L.FeatureGroup();

info_1943_10_14_1 = getCookie("info_1943_10_14_1");
marker1943_10_14_1_location = [13.497511, 39.471300];
marker1943_10_14_2_location = [13.479173, 39.543222];
marker1943_10_14_1 = L.marker(marker1943_10_14_1_location, {
  id: "marker1943_10_14_1",
  icon: blue_flag,
  title: info_1943_10_14_1
})
marker1943_10_14_2 = L.marker(marker1943_10_14_2_location, {
  id: "marker1943_10_14_2",
  icon: blue_flag,
  title: info_1943_10_14_1
});
info_1943_10_14_3 = getCookie("info_1943_10_14_1");
marker1943_10_14_3_location = [13.506419, 39.475274];
marker1943_10_14_3 = L.marker(marker1943_10_14_3_location, {
  id: "marker1943_10_14_3",
  icon: blue_bomb,
  title: info_1943_10_14_3
});

marker_group.addLayer(marker1943_10_14_1);
marker_group.addLayer(marker1943_10_14_2);
marker_group.addLayer(marker1943_10_14_3);

mymap.addLayer(marker_group);

marker1943_10_14_1.on("click", function () {
  onClick1();
  location.href='#1943_10_14_1';
  infoClicked = document.getElementById("1943_10_14_1");
  onClick2();
})
marker1943_10_14_2.on("click", function () {
  onClick1();
  location.href='#1943_10_14_2';
  infoClicked = document.getElementById("1943_10_14_1");
  onClick2();
});
marker1943_10_14_3.on("click", function () {
  onClick1();
  location.href='#1943_10_14_3';
  infoClicked = document.getElementById("1943_10_14_3");
  onClick2();
})

function zoom1943_10_14_1() {
  mymap.setView(marker1943_10_14_1_location);
}
function zoom1943_10_14_2() {
  mymap.setView(marker1943_10_14_2_location);
}
function zoom1943_10_14_3() {
  mymap.setView(marker1943_10_14_3_location);
}

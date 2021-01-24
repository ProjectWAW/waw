countries = []

markers = []
info_1943-10-09_1 = getCookie("info_1943-10-09_1");
marker1943-10-09_1_location = [12.509087, 39.519568];
marker1943-10-09_1 = L.marker(marker1943-10-09_1_location, {
  id: "marker1943-10-09_1",
  icon: blue_gun_right,
  title: info_1943-10-09_1
});
info_1943-10-09_3 = getCookie("info_1943-10-09_3");
marker1943-10-09_3_location = [12.804200, 39.647200];
marker1943-10-09_3 = L.marker(marker1943-10-09_3_location, {
  id: "marker1943-10-09_3",
  icon: blue_bomb,
  title: info_1943-10-09_3
})
info_1943-10-09_4 = getCookie("info_1943-10-09_3");
marker1943-10-09_4_location = [13.317808, 39.458453];
marker1943-10-09_4 = L.marker(marker1943-10-09_4_location, {
  id: "marker1943-10-09_2",
  icon: blue_bomb,
  title: info_1943-10-09_3
});

marker_group.addLayer(marker1943-10-09_1);
marker_group.addLayer(marker1943-10-09_3);
marker_group.addLayer(marker1943-10-09_4);


mymap.addLayer(marker_group);

marker1943-10-09_1.on("click", function () {
  onClick1();
  location.href='#1943-10-09_1';
  infoClicked = document.getElementById("1943-10-09_1");
  onClick2();
});
marker1943-10-09_3.on("click", function () {
  onClick1();
  location.href='#1943-10-09_3';
  infoClicked = document.getElementById("1943-10-09_3");
  onClick2();
})
marker1943-10-09_4.on("click", function () {
  onClick1();
  location.href='#1943-10-09_4';
  infoClicked = document.getElementById("1943-10-09_3");
  onClick2();
});

function zoom1943-10-09_1() {
  mymap.setView(marker1943-10-09_1_location);
}
function zoom1943-10-09_3() {
  mymap.setView(marker1943-10-09_3_location);
}
function zoom1943-10-09_4() {
  mymap.setView(marker1943-10-09_4_location);
}

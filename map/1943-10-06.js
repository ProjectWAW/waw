countries = []

markers = []

info_1943-10-06_1 = getCookie("info_1943-10-06_1");
marker1943-10-06_1_location = [13.498511, 39.472240];
marker1943-10-06_1 = L.marker(marker1943-10-06_1_location, {
  id: "marker1943-10-06_1",
  icon: blue_bomb,
  title: info_1943-10-06_1
});

marker_group.addLayer(marker1943-10-06_1);

mymap.addLayer(marker_group);

marker1943-10-06_1.on("click", function () {
  onClick1();
  location.href='#1943-10-06_1';
  infoClicked = document.getElementById("1943-10-06_1");
  onClick2();
});

function zoom1943-10-06_1() {
  mymap.setView(marker1943-10-06_1_location);
}

countries = []

markers = []

info_1941-03-29_1 = getCookie("info_1941-03-29_1");
marker1941-03-29_1_location = [9.312002, 42.120172];
marker1941-03-29_1 = L.marker(marker1941-03-29_1_location, {
  id: "marker1941-03-29_1",
  icon: blue_flag,
  title: info_1941-03-29_1
});

marker_group.addLayer(marker1941-03-29_1);

mymap.addLayer(marker_group);

marker1941-03-29_1.on("click", function () {
  onClick1();
  location.href='#1941-03-29_1';
  infoClicked = document.getElementById("1941-03-29_1");
  onClick2();
});

function zoom1941-03-29_1() {
  mymap.setView(marker1941-03-29_1_location);
}

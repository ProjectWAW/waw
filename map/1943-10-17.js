countries = []

markers = []

info_1943-10-17_1 = getCookie("info_1943-10-17_1");
marker1943-10-17_1_location = [13.786365, 39.602073];
marker1943-10-17_1 = L.marker(marker1943-10-17_1_location, {
  id: "marker1943-10-17_1",
  icon: blue_flag,
  title: info_1943-10-17_1
});

marker_group.addLayer(marker1943-10-17_1);

mymap.addLayer(marker_group);

marker1943-10-17_1.on("click", function () {
  onClick1();
  location.href='#1943-10-17_1';
  infoClicked = document.getElementById("1943-10-17_1");
  onClick2();
});

function zoom1943-10-17_1() {
  mymap.setView(marker1943-10-17_1_location);
}

countries = []

markers = []

marker_group = new L.FeatureGroup();

info_1937_02_19_1 = getCookie("info_1937_02_19_1");
marker1937_02_19_1_location = [9.030392, 38.764603];
marker1937_02_19_1 = L.marker(marker1937_02_19_1_location, {
  id: "marker1937_02_19_1",
  icon: green_bullhorn,
  title: info_1937_02_19_1
});

marker_group.addLayer(marker1937_02_19_1);

mymap.addLayer(marker_group);

marker1937_02_19_1.on("click", function () {
  onClick1();
  location.href='#1937_02_19_1';
  infoClicked = document.getElementById("1937_02_19_1");
  onClick2();
});

function zoom1937_02_19_1() {
  mymap.setView(marker1937_02_19_1_location);
}

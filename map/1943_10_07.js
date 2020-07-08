countries = []

marker_group = new L.FeatureGroup();

info_1943_10_07_1 = "<?php echo $info_1943_10_07_1;?>";
marker1943_10_07_1_location = [12.804200, 39.647200];
marker1943_10_07_1 = L.marker(marker1943_10_07_1_location, {
  id: "marker1943_10_07_1",
  icon: blue_bomb,
  title: info_1943_10_07_1
})
info_1943_10_07_2 = "<?php echo $info_1943_10_07_1;?>";
marker1943_10_07_2_location = [13.317808, 39.458453];
marker1943_10_07_2 = L.marker(marker1943_10_07_2_location, {
  id: "marker1943_10_07_2",
  icon: blue_bomb,
  title: info_1943_10_07_1
});

marker_group.addLayer(marker1943_10_07_1);
marker_group.addLayer(marker1943_10_07_2);

mymap.addLayer(marker_group);

marker1943_10_07_1.on("click", function () {
  onClick1();
  location.href='#1943_10_07_1';
  infoClicked = document.getElementById("1943_10_07_1");
  onClick2();
})
marker1943_10_07_2.on("click", function () {
  onClick1();
  location.href='#1943_10_07_2';
  infoClicked = document.getElementById("1943_10_07_2");
  onClick2();
});

function zoom1943_10_07_1() {
  mymap.setView(marker1943_10_07_1_location);
}
function zoom1943_10_07_2() {
  mymap.setView(marker1943_10_07_2_location);
}

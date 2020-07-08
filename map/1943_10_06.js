countries = []

marker_group = new L.FeatureGroup();

info_1943_10_06_1 = "<?php echo $info_1943_10_06_1;?>";
marker1943_10_06_1_location = [13.498511, 39.472240];
marker1943_10_06_1 = L.marker(marker1943_10_06_1_location, {
  id: "marker1943_10_06_1",
  icon: blue_bomb,
  title: info_1943_10_06_1
});

marker_group.addLayer(marker1943_10_06_1);

mymap.addLayer(marker_group);

marker1943_10_06_1.on("click", function () {
  onClick1();
  location.href='#1943_10_06_1';
  infoClicked = document.getElementById("1943_10_06_1");
  onClick2();
});

function zoom1943_10_06_1() {
  mymap.setView(marker1943_10_06_1_location);
}

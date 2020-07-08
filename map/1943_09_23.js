countries = []

marker_group = new L.FeatureGroup();

info_1943_09_23_1 = "<?php echo $info_1943_09_23_1;?>";
marker1943_09_23_1_location = [14.282099, 39.464800];
marker1943_09_23_1 = L.marker(marker1943_09_23_1_location, {
  id: "marker1943_09_23_1",
  icon: orange_flag,
  title: info_1943_09_23_1
});

marker_group.addLayer(marker1943_09_23_1);

mymap.addLayer(marker_group);

marker1943_09_23_1.on("click", function () {
  onClick1();
  location.href='#1943_09_23_1';
  infoClicked = document.getElementById("1943_09_23_1");
  onClick2();
});

function zoom1943_09_23_1() {
  mymap.setView(marker1943_09_23_1_location);
}

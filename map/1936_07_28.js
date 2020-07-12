countries = []

marker_group = new L.FeatureGroup();

info_1936_07_28_1 = "<?php echo $info_1936_07_28_1;?>";
marker1936_07_28_1_location = [9.030392, 38.764603];
marker1936_07_28_1 = L.marker(marker1936_07_28_1_location, {
  id: "marker1936_07_28_1",
  icon: orange_gun_right,
  title: info_1936_07_28_1
});

marker_group.addLayer(marker1936_07_28_1);

mymap.addLayer(marker_group);

marker1936_07_28_1.on("click", function () {
  onClick1();
  location.href='#1936_07_28_1';
  infoClicked = document.getElementById("1936_07_28_1");
  onClick2();
});

function zoom1936_07_28_1() {
  mymap.setView(marker1936_07_28_1_location);
}

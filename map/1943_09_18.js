countries = []

marker_group = new L.FeatureGroup();

info_1943_09_18_1 = "<?php echo $info_1943_09_18_1;?>";
marker1943_09_18_1_location = [12.983868, 39.549919];
marker1943_09_18_1 = L.marker(marker1943_09_18_1_location, {
  id: "marker1943_09_18_1",
  icon: blue_gun_right,
  title: info_1943_09_18_1
});

marker_group.addLayer(marker1943_09_18_1);

mymap.addLayer(marker_group);

marker1943_09_18_1.on("click", function () {
  onClick1();
  location.href='#1943_09_18_1';
  infoClicked = document.getElementById("1943_09_18_1");
  onClick2();
});

function zoom1943_09_18_1() {
  mymap.setView(marker1943_09_18_1_location);
}

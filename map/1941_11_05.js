countries = []

marker_group = new L.FeatureGroup();

info_1941_11_05_1 = "<?php echo $info_1941_11_05_1;?>";
marker1941_11_05_1_location = [12.306409, 37.604032];
marker1941_11_05_1 = L.marker(marker1941_11_05_1_location, {
  id: "marker1941_11_05_1",
  icon: blue_gun_right,
  title: info_1941_11_05_1
});

marker_group.addLayer(marker1941_11_05_1);

mymap.addLayer(marker_group);

marker1941_11_05_1.on("click", function () {
  onClick1();
  location.href='#1941_11_05_1';
  infoClicked = document.getElementById("1941_11_05_1");
  onClick2();
});

function zoom1941_11_05_1() {
  mymap.setView(marker1941_11_05_1_location);
}

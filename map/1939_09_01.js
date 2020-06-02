




// Germany declares war on Poland
info_1939_09_01_1 = "<?php echo $info_1939_09_01_1;?>";
marker1939_09_01_1_location = [52.518623, 13.376198];
marker1939_09_01_1 = L.marker(marker1939_09_01_1_location, {
  id: "marker1939_09_01_1",
  icon: black_bullhorn,
  title: info_1939_09_01_1
});

marker_group = new L.FeatureGroup();
marker_group.addLayer(marker1);
mymap.addLayer(marker_group);

marker1.on("click", function () {
  onClick1();
  location.href='#1939_09_01_1';
  infoClicked = document.getElementById("1939_09_01_1");
  onClick2();
});

function zoom1939_09_01_1() {
  mymap.setView(marker1_location);
}
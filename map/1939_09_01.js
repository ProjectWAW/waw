// Germany declares war on Poland
var i1939_09_01_1 = L.icon.fontAwesome({
  iconClasses: "fas fa-bullhorn",
  markerColor: axisMarkerColor,
  markerStrokeWidth: 1,
  markerStrokeColor: axisMarkerStroke,
  iconColor: "#FFF",
  iconSize: [15, 15],
  iconXOffset: -2.5,
  iconYOffset: 0
});
var info_1 = "<?php echo $info_1; ?>";
var marker1 = L.marker([52.518623, 13.376198], {
  icon: i1939_09_01_1,
  title: info_1
})
.addTo(mymap);


marker1.on("click", function (event) {
  if ($(window).width() < 768) {
    showSidebar();
  }
  if($('#sidebar').css('display') == 'none') {
    hideSidebar();
  }
  showInfo();
  location.href='#1939_09_01_1';
  var infoClicked = document.getElementById("1939_09_01_1");
  infoClicked.classList.add("info-clicked");
  setTimeout(function () {
    infoClicked.classList.remove("info-clicked");
  }, 5000);
});


function zoom1939_09_01_1() {
  mymap.setView([52.518623, 13.376198]);
}
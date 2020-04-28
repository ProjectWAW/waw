var i1935_10_03_1 = L.icon.fontAwesome({
  iconClasses: "fas fa-bullhorn",
  markerColor: "#474747",
  markerStrokeWidth: 1,
  markerStrokeColor: "#2e2e2e",
  iconColor: "#FFF",
  iconSize: [15, 15],
  iconXOffset: -2.5,
  iconYOffset: 0
});
var info_1 = "<?php echo $info_1; ?>";
var marker1 = L.marker([52.518623, 13.376198], {
  icon: i1935_10_03_1,
  title: info_1
})
//.bindPopup("Popup friendly!")
.addTo(mymap);

marker1.on("click", function (event) {
  if ($(window).width() < 768) {
    showSidebar();
  }
  if($('#sidebar').css('display') == 'none') {
    hideSidebar();
  }
  showInfo();
  location.href='#test2';
  var infoClicked = document.getElementById("test2");
  infoClicked.classList.add("info-clicked");
  setTimeout(function () {
    infoClicked.classList.remove("info-clicked");
  }, 5000);
});

function zoom1935_10_03_1() {
  mymap.setView([52.518623, 13.376198]);
}
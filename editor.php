<?php
if (isset($_GET['d'])) {
  $date = $_GET['d'];
} else {
  $date = "1936.07.16";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require 'page_head.php';?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
<link rel="stylesheet" href="http://xguaita.github.io/Leaflet.MapCenterCoord/dist/L.Control.MapCenterCoord.min.css" />
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
<script src="http://xguaita.github.io/Leaflet.MapCenterCoord/dist/L.Control.MapCenterCoord.min.js"></script>
<script src="js/leaflet.ajax.min.js"></script>
<link rel="stylesheet" href="js/leaflet-geoman.css"/>
<script src="js/leaflet-geoman.min.js"></script>
<title>Map - Project: World at War</title>
<style>
.navbar {
  position: fixed;
  margin-bottom: 0;
  z-index: 500;
  width: 100%;
  box-shadow: 0 0 0;
  -webkit-box-shadow: 0 0 0;
}
#map {
  width: 100%;
  height: 100%;
  position: absolute;
}
select {
  z-index: 9999;
}
</style>
</head>
<body>
<?php include 'loader.php';
require 'navbar.php';
?>
<script>
  L.ImageOverlay.Rotated = L.ImageOverlay.extend({

  initialize: function (image, topleft, topright, bottomleft, options) {

    if (typeof(image) === 'string') {
      this._url = image;
    } else {
      this._rawImage = image;
    }

    this._topLeft    = L.latLng(topleft);
    this._topRight   = L.latLng(topright);
    this._bottomLeft = L.latLng(bottomleft);

    L.setOptions(this, options);
  },


  onAdd: function (map) {
    if (!this._image) {
      this._initImage();

      if (this.options.opacity < 1) {
        this._updateOpacity();
      }
    }

    if (this.options.interactive) {
      L.DomUtil.addClass(this._rawImage, 'leaflet-interactive');
      this.addInteractiveTarget(this._rawImage);
    }

    map.on('zoomend resetview', this._reset, this);

    this.getPane().appendChild(this._image);
    this._reset();
  },


    onRemove: function(map) {
        map.off('zoomend resetview', this._reset, this);
        L.ImageOverlay.prototype.onRemove.call(this, map);
    },


  _initImage: function () {
    var img = this._rawImage;
    if (this._url) {
      img = L.DomUtil.create('img');
      img.style.display = 'none';

      if (this.options.crossOrigin) {
        img.crossOrigin = '';
      }

      img.src = this._url;
      this._rawImage = img;
    }
    L.DomUtil.addClass(img, 'leaflet-image-layer');

    var div = this._image = L.DomUtil.create('div',
        'leaflet-image-layer ' + (this._zoomAnimated ? 'leaflet-zoom-animated' : ''));

    this._updateZIndex();
    
    div.appendChild(img);

    div.onselectstart = L.Util.falseFn;
    div.onmousemove = L.Util.falseFn;

    img.onload = function(){
      this._reset();
      img.style.display = 'block';
      this.fire('load');
    }.bind(this);

    img.alt = this.options.alt;
  },


  _reset: function () {
    var div = this._image;

    if (!this._map) {
      return;
    }

    // Project control points to container-pixel coordinates
    var pxTopLeft    = this._map.latLngToLayerPoint(this._topLeft);
    var pxTopRight   = this._map.latLngToLayerPoint(this._topRight);
    var pxBottomLeft = this._map.latLngToLayerPoint(this._bottomLeft);

    // Infer coordinate of bottom right
    var pxBottomRight = pxTopRight.subtract(pxTopLeft).add(pxBottomLeft);

    // pxBounds is mostly for positioning the <div> container
    var pxBounds = L.bounds([pxTopLeft, pxTopRight, pxBottomLeft, pxBottomRight]);
    var size = pxBounds.getSize();
    var pxTopLeftInDiv = pxTopLeft.subtract(pxBounds.min);

    // LatLngBounds are needed for (zoom) animations
    this._bounds = L.latLngBounds( this._map.layerPointToLatLng(pxBounds.min),
                                  this._map.layerPointToLatLng(pxBounds.max) );

    L.DomUtil.setPosition(div, pxBounds.min);

    div.style.width  = size.x + 'px';
    div.style.height = size.y + 'px';

    var imgW = this._rawImage.width;
    var imgH = this._rawImage.height;
    if (!imgW || !imgH) {
      return;
    }

    var vectorX = pxTopRight.subtract(pxTopLeft);
    var vectorY = pxBottomLeft.subtract(pxTopLeft);

    this._rawImage.style.transformOrigin = '0 0';

    this._rawImage.style.transform = "matrix(" +
      (vectorX.x/imgW) + ', ' + (vectorX.y/imgW) + ', ' +
      (vectorY.x/imgH) + ', ' + (vectorY.y/imgH) + ', ' +
      pxTopLeftInDiv.x + ', ' + pxTopLeftInDiv.y + ')';

  },


  reposition: function(topleft, topright, bottomleft) {
    this._topLeft    = L.latLng(topleft);
    this._topRight   = L.latLng(topright);
    this._bottomLeft = L.latLng(bottomleft);
    this._reset();
  },


  setUrl: function (url) {
    this._url = url;

    if (this._rawImage) {
      this._rawImage.src = url;
    }
    return this;
  }
  });

  L.imageOverlay.rotated = function(imgSrc, topleft, topright, bottomleft, options) {
  return new L.ImageOverlay.Rotated(imgSrc, topleft, topright, bottomleft, options);
  };
</script>
<br><br><br>
<select id="countries_dropdown" onchange="start(this.value)">
  <option value="a">a</option>
  <option value="andorra">andorra</option>
  <option value="albania">albania</option>
  <option value="bahrain">bahrain</option>
  <option value="bermuda">bermuda</option>
  <option value="bhutan">bhutan</option>
  <option value="british_africa">british_africa</option>
  <option value="british_somaliland">british_somaliland</option>
  <option value="bulgaria">bulgaria</option>
  <option value="cyprus">cyprus</option>
  <option value="czechoslovakia">czechoslovakia</option>
  <option value="danzig">danzig</option>
  <option value="denmark">denmark</option>
  <option value="djibouti">djibouti</option>
  <option value="eritrea">eritrea</option>
  <option value="finland">finland</option>
  <option value="france">france</option>
  <option value="french_africa">french_africa</option>
  <option value="french_syria">french_syria</option>
  <option value="gambia">gambia</option>
  <option value="german_prussia">german_prussia</option>
  <option value="germany">germany</option>
  <option value="gibraltar">gibraltar</option>
  <option value="greece">greece</option>
  <option value="iraq">iraq</option>
  <option value="isle_of_man">isle_of_man</option>
  <option value="italian_dodecanese">italian_dodecanese</option>
  <option value="kuwait">kuwait</option>
  <option value="libya">libya</option>
  <option value="lichtenstein">lichtenstein</option>
  <option value="lithuania">lithuania</option>
  <option value="luxembourg">luxembourg</option>
  <option value="malta">malta</option>
  <option value="mongolia">mongolia</option>
  <option value="neutral_zone_iraq">neutral_zone_iraq</option>
  <option value="netherlands">netherlands</option>
  <option value="northern_ireland">northern_ireland</option>
  <option value="poland">poland</option>
  <option value="portugal">portugal</option>
  <option value="qatar">qatar</option>
  <option value="romania">romania</option>
  <option value="south_georgia">south_georgia</option>
  <option value="spanish_africa">spanish_africa</option>
  <option value="spanish_sahara">spanish_sahara</option>
  <option value="swaziland">swaziland</option>
  <option value="tannu_tuva">tannu_tuva</option>>
  <option value="turkey">turkey</option>
  <option value="uk">uk</option>
  <option value="ussr">ussr</option>
  <option value="yugoslavia">yugoslavia</option>
  <option value="zara">zara</option>
  </select>
  <br>
  <br>

  <div id='map'></div>
  <script>
    var mymap = L.map('map').setView([40.85563, 20.982513], 10);
    
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors</a>',
      minZoom: 3,
      maxZoom: 14,
      zoomControl: true
    }).addTo(mymap);

  /*var topleft    = L.latLng(61.339797, 27.982864),
	topright   = L.latLng(61.277823, 31.232071),
  bottomleft = L.latLng(59.808577, 27.989044);
  
  var marker1 = L.marker(topleft, {draggable: true} ).addTo(mymap),
	marker2 = L.marker(topright, {draggable: true} ).addTo(mymap),
	marker3 = L.marker(bottomleft, {draggable: true} ).addTo(mymap);

var overlay = L.imageOverlay.rotated("https://cdn.discordapp.com/attachments/704230942985682974/705397542028050462/Karjala.jpg", topleft, topright, bottomleft, {
	opacity: 0.6,
	interactive: true,
	attribution: "Medonci"
}).addTo(mymap);

function repositionImage() {
			overlay.reposition(marker1.getLatLng(), marker2.getLatLng(), marker3.getLatLng());
		};
		
		marker1.on('drag dragend', repositionImage);
		marker2.on('drag dragend', repositionImage);
		marker3.on('drag dragend', repositionImage);*/

    country = "france";

    function start(val) {

      country = val;
      console.log(country);

      var geojsonLayer = new L.GeoJSON.AJAX("geojson_files/1935_10_03/" + country + ".geojson");

      geojsonLayer.on('data:loaded', function() {
        geojsonLayer.addTo(mymap);
      });
      geojsonLayer.on('pm:update', e => {
        var geoJSONData = JSON.stringify(geojsonLayer.toGeoJSON());
        var data = new FormData();
        console.log(country + " was edited");
        data.append('country', country);
        data.append('gdata', geoJSONData);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', "ajax_store_geojson_after_edit.php", true);
        xhr.onload = function() {
          console.log(this.response);
        };
        console.log("before sending data");
        xhr.send(data);

      })

    }


    L.control.mapCenterCoord({
      icon: false,
      position: 'bottomright'
    }).addTo(mymap);

    L.control.scale({
      position: 'bottomright'
    }).addTo(mymap);

    mymap.zoomControl.setPosition('bottomleft');

    mymap.pm.addControls({
      editPolygon: true,
    });
  </script>
</body>
</html>
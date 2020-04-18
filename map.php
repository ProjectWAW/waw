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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
<link rel="stylesheet" href="http://xguaita.github.io/Leaflet.MapCenterCoord/dist/L.Control.MapCenterCoord.min.css" />
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
<script src="http://xguaita.github.io/Leaflet.MapCenterCoord/dist/L.Control.MapCenterCoord.min.js"></script>
<script>
    
  /*
  * 🍂class ImageOverlay.Rotated
  * 🍂inherits ImageOverlay
  *
  * Like `ImageOverlay`, but rotates and skews the image. This is done by using
  * *three* control points instead of *two*.
  *
  * @example
  *
  * ```
  * var topleft    = L.latLng(40.52256691873593, -3.7743186950683594),
  * 	topright   = L.latLng(40.5210255066156, -3.7734764814376835),
  * 	bottomleft = L.latLng(40.52180437272552, -3.7768453359603886);
  *
  * var overlay = L.imageOverlay.rotated("./palacio.jpg", topleft, topright, bottomleft, {
  * 	opacity: 0.4,
  * 	interactive: true,
  * 	attribution: "&copy; <a href='http://www.ign.es'>Instituto Geográfico Nacional de España</a>"
  * });
  * ```
  *
  */

  L.ImageOverlay.Rotated = L.ImageOverlay.extend({

  initialize: function (image, topleft, topright, bottomleft, options) {

    if (typeof(image) === 'string') {
      this._url = image;
    } else {
      // Assume that the first parameter is an instance of HTMLImage or HTMLCanvas
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
      img.style.display = 'none';	// Hide while the first transform (zero or one frames) is being done

      if (this.options.crossOrigin) {
        img.crossOrigin = '';
      }

      img.src = this._url;
      this._rawImage = img;
    }
    L.DomUtil.addClass(img, 'leaflet-image-layer');

    // this._image is reused by some of the methods of the parent class and
    // must keep the name, even if it is counter-intuitive.
    var div = this._image = L.DomUtil.create('div',
        'leaflet-image-layer ' + (this._zoomAnimated ? 'leaflet-zoom-animated' : ''));

    this._updateZIndex(); // apply z-index style setting to the div (if defined)
    
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
      return;	// Probably because the image hasn't loaded yet.
    }

    // Sides of the control-point box, in pixels
    // These are the main ingredient for the transformation matrix.
    var vectorX = pxTopRight.subtract(pxTopLeft);
    var vectorY = pxBottomLeft.subtract(pxTopLeft);

    this._rawImage.style.transformOrigin = '0 0';

    // The transformation is an affine matrix that switches
    // coordinates around in just the right way. This is the result
    // of calculating the skew/rotation/scale matrices and simplyfing
    // everything.
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

  /* 🍂factory imageOverlay.rotated(imageUrl: String|HTMLImageElement|HTMLCanvasElement, topleft: LatLng, topright: LatLng, bottomleft: LatLng, options?: ImageOverlay options)
  * Instantiates a rotated/skewed image overlay, given the image URL and
  * the `LatLng`s of three of its corners.
  *
  * Alternatively to specifying the URL of the image, an existing instance of `HTMLImageElement`
  * or `HTMLCanvasElement` can be used.
  */
  L.imageOverlay.rotated = function(imgSrc, topleft, topright, bottomleft, options) {
  return new L.ImageOverlay.Rotated(imgSrc, topleft, topright, bottomleft, options);
  };
</script>

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
</style>
</head>
<body>
<?php include 'loader.php';
require 'navbar.php';
?>
<!--<a href="map.php?d=1936.07.16">s</a>-->
<div id='map'></div>
<script>
var mymap = L.map('map').setView([60.481585, 29.393921], 8);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
  attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
  minZoom: 3,
  maxZoom: 14,
  id: 'mapbox/light-v10',
  tileSize: 512,
  fullscreenControl: true,
  zoomOffset: -1,
  accessToken: 'pk.eyJ1IjoiYW50aXNvY2lhbGVsZXBoYW50IiwiYSI6ImNrOHg4bXJ1NzAzcXYzZWs0cnpyem16OWUifQ.o7KFeNSG2NkS1vdRt9TIew',
  zoomControl: true,
  noWrap: true,
  bounds: [
    [-90, -180],
    [90, 180]
  ]
}).addTo(mymap);

/*var imageUrl = 'https://upload.wikimedia.org/wikipedia/commons/3/33/Karelian_Isthmus.png',
imageBounds = [[61.336175, 28.009644], [59.753628, 31.129761]];

L.imageOverlay(imageUrl, imageBounds, {
  opacity: 0.5,
	interactive: true }
).addTo(mymap);*/

/*var topleft    = L.latLng(61.339797, 27.982864),
	topright   = L.latLng(61.277823, 31.232071),
  bottomleft = L.latLng(59.808577, 27.989044);
  
  var marker1 = L.marker(topleft, {draggable: true} ).addTo(mymap),
		    marker2 = L.marker(topright, {draggable: true} ).addTo(mymap),
		    marker3 = L.marker(bottomleft, {draggable: true} ).addTo(mymap);

var overlay = L.imageOverlay.rotated("https://upload.wikimedia.org/wikipedia/commons/3/33/Karelian_Isthmus.png", topleft, topright, bottomleft, {
	opacity: 0.6,
	interactive: true,
	attribution: "&copy; <a href='http://www.ign.es'>Instituto Geográfico Nacional de España</a>"
}).addTo(mymap);

function repositionImage() {
			overlay.reposition(marker1.getLatLng(), marker2.getLatLng(), marker3.getLatLng());
		};
		
		marker1.on('drag dragend', repositionImage);
		marker2.on('drag dragend', repositionImage);
		marker3.on('drag dragend', repositionImage);*/

L.control.mapCenterCoord({
  icon: false,
  position: 'bottomright'
}).addTo(mymap);

L.control.scale({
  position: 'bottomright'
}).addTo(mymap);

mymap.zoomControl.setPosition('bottomleft');

/***** COLORS *****/
var axis = 'black'
var axis_puppet = 'gray'
var axis_occupied = '#a1a1a1'

var allies = '#296d98'
var allies_puppet = '#3792cb'
var allies_occupied = '#45b6fe'

var comintern = '#B30000'
var comintern_puppet = 'red'
var comintern_occupied = '#ff7f7f'

var finland = 'purple'
var finland_occupied = '#ac68cc'

var neutral = '#ffca8a'

<?php require 'map_files.php';?>

var popup = L.popup();
function onMapClick(e) {
  popup
    .setLatLng(e.latlng)
    .setContent("You clicked the map at " + e.latlng.toString())
    .openOn(mymap);
}

mymap.on('click', onMapClick);
</script>
</body>
</html>
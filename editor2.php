<!DOCTYPE html>
<html lang="en">
<head>
<?php require 'page_head.php';?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
<script src="leaflet/leaflet.ajax.min.js"></script>
<link rel="stylesheet" href="leaflet/leaflet-geoman.css"/>
<script src="leaflet/leaflet-geoman.min.js"></script>
<title>Editor - Project: World at War</title>
<style>
.navbar {
  position: fixed;
  margin-bottom: 0;
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
<?php require 'navbar.php'; ?>
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

    var pxTopLeft    = this._map.latLngToLayerPoint(this._topLeft);
    var pxTopRight   = this._map.latLngToLayerPoint(this._topRight);
    var pxBottomLeft = this._map.latLngToLayerPoint(this._bottomLeft);

    var pxBottomRight = pxTopRight.subtract(pxTopLeft).add(pxBottomLeft);

    var pxBounds = L.bounds([pxTopLeft, pxTopRight, pxBottomLeft, pxBottomRight]);
    var size = pxBounds.getSize();
    var pxTopLeftInDiv = pxTopLeft.subtract(pxBounds.min);

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
  <option value="aden_protectorate">aden_protectorate</option>
  <option value="afghanistan">afghanistan</option>
  <option value="albania">albania</option>
  <option value="andorra">andorra</option>
  <option value="argentina">argentina</option>
  <option value="aussa">aussa</option>
  <option value="australia">australia</option>
  <option value="austria">austria</option>
  <option value="bahamas">bahamas</option>
  <option value="bahrain">bahrain</option>
  <option value="barbados">barbados</option>
  <option value="basutoland">basutoland</option>
  <option value="bechuanaland">bechuanaland</option>
  <option value="belgian_congo">belgian_congo</option>
  <option value="belgium">belgium</option>
  <option value="bermuda">bermuda</option>
  <option value="bhutan">bhutan</option>
  <option value="british_burma">british_burma</option>
  <option value="british_guiana">british_guiana</option>
  <option value="british_honduras">british_honduras</option>
  <option value="british_hong_kong">british_hong_kong</option>
  <option value="british_leeward_islands">british_leeward_islands</option>
  <option value="british_malaya">british_malaya</option>
  <option value="british_somaliland">british_somaliland</option>
  <option value="british_western_pacific_territories">british_western_pacific_territories</option>
  <option value="british_windward_islands">british_windward_islands</option>
  <option value="brunei">brunei</option>
  <option value="bolivia">bolivia</option>
  <option value="brazil">brazil</option>
  <option value="brazil_communist_uprising">brazil_communist_uprising</option>
  <option value="bulgaria">bulgaria</option>
  <option value="canada">canada</option>
  <option value="ceylon">ceylon</option>
  <option value="chile">chile</option>
  <option value="china">china</option>
  <option value="chinese_soviet_republic">chinese_soviet_republic</option>
  <option value="chongqing_clique">chongqing_clique</option>
  <option value="colombia">colombia</option>
  <option value="costarica">costarica</option>
  <option value="cuba">cuba</option>
  <option value="cyprus">cyprus</option>
  <option value="czechoslovakia">czechoslovakia</option>
  <option value="danzig">danzig</option>
  <option value="denmark">denmark</option>
  <option value="dominican_republic">dominican_republic</option>
  <option value="dutch_east_indies">dutch_east_indies</option>
  <option value="east_chahar">east_chahar</option>
  <option value="east_hebei">east_hebei</option>
  <option value="ecuador">ecuador</option>
  <option value="egypt">egypt</option>
  <option value="el_salvador">el_salvador</option>
  <option value="italian_eritrea">italian_eritrea</option>
  <option value="estonia">estonia</option>
  <option value="falklands">falklands</option>
  <option value="finland">finland</option>
  <option value="france">france</option>
  <option value="french_cameroon">french_cameroon</option>
  <option value="french_equatorial_africa">french_equatorial_africa</option>
  <option value="french_guiana">french_guiana</option>
  <option value="french_india">french_india</option>
  <option value="french_indochina">french_indochina</option>
  <option value="french_madagascar">french_madagascar</option>
  <option value="french_oceania">french_oceania</option>
  <option value="french_syria">french_syria</option>
  <option value="french_west_africa">french_west_africa</option>
  <option value="french_togoland">french_togoland</option>
  <option value="french_somaliland">french_somaliland</option>
  <option value="gambia">gambia</option>
  <option value="german_prussia">german_prussia</option>
  <option value="germany">germany</option>
  <option value="gibraltar">gibraltar</option>
  <option value="gold_coast">gold_coast</option>
  <option value="greece">greece</option>
  <option value="guadelupe">guadelupe</option>
  <option value="guangdong_clique">guangdong_clique</option>
  <option value="guatemala">guatemala</option>
  <option value="guizhou_clique">guizhou_clique</option>
  <option value="haiti">haiti</option>
  <option value="hebei_chahar_council">hebei_chahar_council</option>
  <option value="honduras">honduras</option>
  <option value="hunan_clique">hunan_clique</option>
  <option value="hungary">hungary</option>
  <option value="iceland">iceland</option>
  <option value="ifni">ifni</option>
  <option value="india">india</option>
  <option value="inini">inini</option>
  <option value="iran">iran</option>
  <option value="iraq">iraq</option>
  <option value="ireland">ireland</option>
  <option value="italian_east_africa">italian_east_africa</option>
  <option value="italian_ethiopia">italian_ethiopia</option>
  <option value="italian_somalia">italian_somalia</option>
  <option value="italy">italy</option>
  <option value="jamaica">jamaica</option>
  <option value="japan">japan</option>
  <option value="japanese_korea">japanese_korea</option>
  <option value="japanese_taiwan">japanese_taiwan</option>
  <option value="kenya">kenya</option>
  <option value="kingdom_of_sikkim">kingdom_of_sikkim</option>
  <option value="kuwait">kuwait</option>
  <option value="kwantung_leased_territory">kwantung_leased_territory</option>
  <option value="latvia">latvia</option>
  <option value="liberia">liberia</option>
  <option value="italian_libya">italian_libya</option>
  <option value="lichtenstein">lichtenstein</option>
  <option value="lithuania">lithuania</option>
  <option value="luxembourg">luxembourg</option>
  <option value="macau">macau</option>
  <option value="maldives">maldives</option>
  <option value="malta">malta</option>
  <option value="manchukuo">manchukuo</option>
  <option value="martinique">martinique</option>
  <option value="mauritius">mauritius</option>
  <option value="mexico">mexico</option>
  <option value="mianyang_clique">mianyang_clique</option>
  <option value="monaco">monaco</option>
  <option value="mongolia">mongolia</option>
  <option value="morocco">morocco</option>
  <option value="nationalist_spain">nationalist_spain</option>
  <option value="nepal">nepal</option>
  <option value="netherlands">netherlands</option>
  <option value="neutral_zone_iraq">neutral_zone_iraq</option>
  <option value="new_guanxi_clique">new_guanxi_clique</option>
  <option value="new_zealand">new_zealand</option>
  <option value="nicaragua">nicaragua</option>
  <option value="nigeria">nigeria</option>
  <option value="ningxia_ma_clique">ningxia_ma_clique</option>
  <option value="north_borneo">north_borneo</option>
  <option value="northeastern_army">northeastern_army</option>
  <option value="northern_rhodesia">northern_rhodesia</option>
  <option value="northwest_garrison">northwest_garrison</option>
  <option value="norway">norway</option>
  <option value="nyasaland">nyasaland</option>
  <option value="oman">oman</option>
  <option value="pailingmiao_council">pailingmiao_council</option>
  <option value="palestine">palestine</option>
  <option value="panama">panama</option>
  <option value="paraguay">paraguay</option>
  <option value="peru">peru</option>
  <option value="philippines">philippines</option>
  <option value="poland">poland</option>
  <option value="portugal">portugal</option>
  <option value="portuguese_cape_verde">portuguese_cape_verde</option>
  <option value="portuguese_east_africa">portuguese_east_africa</option>
  <option value="portuguese_india">portuguese_india</option>
  <option value="portuguese_guinea">portuguese_guinea</option>
  <option value="portuguese_timor">portuguese_timor</option>
  <option value="portuguese_west_africa">portuguese_west_africa</option>
  <option value="qatar">qatar</option>
  <option value="qinghai_ma_clique">qinghai_ma_clique</option>
  <option value="republican_spain">republican_spain</option>
  <option value="righteous_army">righteous_army</option>
  <option value="romania">romania</option>
  <option value="saint_helena">saint_helena</option>
  <option value="san_marino">san_marino</option>
  <option value="san_marino">sao_tome_and_principe</option>
  <option value="sarawak">sarawak</option>
  <option value="saudi_arabia">saudi_arabia</option>
  <option value="seychelles">seychelles</option>
  <option value="shandong_clique">shandong_clique</option>
  <option value="shanxi_clique">shanxi_clique</option>
  <option value="siam">siam</option>
  <option value="sichuan_clique">sichuan_clique</option>
  <option value="south_africa">south_africa</option>
  <option value="southern_rhodesia">southern_rhodesia</option>
  <option value="spain">spain</option>
  <option value="spanish_africa">spanish_africa</option>
  <option value="spanish_morocco">spanish_morocco</option>
  <option value="spanish_sahara">spanish_sahara</option>
  <option value="swaziland">swaziland</option>
  <option value="sweden">sweden</option>
  <option value="switzerland">switzerland</option>
  <option value="tangiers">tangiers</option>
  <option value="tannu_tuva">tannu_tuva</option>\
  <option value="tetua_airfield">tetua_airfield</option>
  <option value="tibet">tibet</option>
  <option value="transjordania">transjordania</option>
  <option value="trinidad_and_tobago">trinidad_and_tobago</option>
  <option value="tristan_de_cunha">tristan_de_cunha</option>
  <option value="trucial_states">trucial_states</option>
  <option value="tunganistan">tunganistan</option>
  <option value="tunis">tunis</option>
  <option value="turkey">turkey</option>
  <option value="uganda">uganda</option>
  <option value="uk">uk</option>
  <option value="uruguay">uruguay</option>
  <option value="usa">usa</option>
  <option value="ussr">ussr</option>
  <option value="vatican">vatican</option>
  <option value="venezuela">venezuela</option>
  <option value="xikang_clique">xikang_clique</option>
  <option value="xinjiang">xinjiang</option>
  <option value="yemen">yemen</option>
  <option value="yugoslavia">yugoslavia</option>
  <option value="yunnan_clique">yunnan_clique</option>
  <option value="zanzibar">zanzibar</option>
  </select>
  <br><br>

  <div id='map'></div>
  <script>
    var mymap = L.map('map').setView([40.418201, -3.704109], 6);
    
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors</a>',
      minZoom: 3,
      maxZoom: 14,
      zoomControl: true
    }).addTo(mymap);

 /*var topleft = L.latLng(37.291535, 115.378418),
	topright   = L.latLng(38.539573, 123.068848),
  bottomleft = L.latLng(34.633208, 115.290527);
  
  var marker1 = L.marker(topleft, {draggable: true} ).addTo(mymap),
	marker2 = L.marker(topright, {draggable: true} ).addTo(mymap),
	marker3 = L.marker(bottomleft, {draggable: true} ).addTo(mymap);

var overlay = L.imageOverlay.rotated("https://upload.wikimedia.org/wikipedia/commons/1/14/Ecuador-peru-land-claims-01.png", topleft, topright, bottomleft, {
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

    function start(val) {

      country = val;
      console.log(country);

      var geojsonLayer = new L.GeoJSON.AJAX("geojson_files/1935_10_28/" + country + ".geojson");

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
        xhr.open('POST', "ajax_store_geojson_after_edit2.php", true);
        xhr.onload = function() {
          console.log(this.response);
        };
        console.log("before sending data");
        xhr.send(data);
      })
    }

    mymap.zoomControl.setPosition('bottomright');

    mymap.pm.addControls({
      editPolygon: true,
    });
  </script>
</body>
</html>
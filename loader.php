<script>
(function(){
  function id(v) {
    return document.getElementById(v);
  }
  function loadbar() {
    var ovrl = id("overlay"),
    prog = id("progress"),
    stat = id("progstat"),
    img = document.images,
    c = 0,
    tot = img.length;
    if (tot == 0) return doneLoading();
    function imgLoaded() {
      c += 1;
      var perc = ((100/tot*c) << 0) +"%";
      prog.style.width = perc;
      stat.innerHTML = "Loading: "+ perc;
      if(c===tot) return doneLoading();
    }
    function doneLoading() {
      ovrl.style.opacity = 0;
      setTimeout(function(){ 
        ovrl.style.display = "none";
      }, 1200);
    }
    for(var i=0; i<tot; i++) {
      var tImg = new Image();
      tImg.onload = imgLoaded;
      tImg.onerror = imgLoaded;
      tImg.src = img[i].src;
    }    
  }
  document.addEventListener('DOMContentLoaded', loadbar, false);
}());
</script>
<style>
#overlay{
  position: fixed;
  z-index: 99999;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  background: rgba(0,0,0,0.9);
  transition: 1s 0.4s;
}
#progress-container {
  height: 13px;
  border: 1px solid #fff;
  top: 50%;
  left: 5%;
  right: 5%;
  position: absolute;
}
#progress{
  height: 11px;
  background: #fff;
  width: 0;
  transition: 1s;
}
#progstat{
  font-size: 2em;
  position: absolute;
  top: 50%;
  margin-top: -45px;
  width: 100%;
  text-align: center;
  color: #fff;
}
</style>
<div id="overlay">
  <div id="progstat">Loading: 0%</div>
  <div id="progress-container"><div id="progress"></div></div>
</div>
<img>
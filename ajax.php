<?php
  $id = $_POST['id'];
  $location = $_POST['location'];
  $class = $_POST['class'];
  $conflict = $_POST['conflict'];
  $country = $_POST['country'];
  
  $location = implode(",",$location);

  echo '
  
  <div id="'.$id.'">
  <i class="'.$class.'" onClick="mymap.setView(['.$location.']);"></i> <b class="country-name">'.$country.'</b>
  <div class="info-content" id="info_'.$id.'">
    <script>document.getElementById("info_'.$id.'").innerHTML = getCookie("info_'.$id.'") + \' <a href="sources/'.$conflict.'.php?i='.$id.'" class="read-more-info">Source <span class="glyphicon glyphicon-new-window"></span></a>\';</script>
  </div>
</div>
<hr>
  
  ';
?>
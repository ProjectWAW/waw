<?php
  $id = $_POST['id'];
  $location = $_POST['location'];
  $text = $_POST['text'];
  $class = $_POST['class'];
  $conflict = $_POST['conflict'];
  $country = $_POST['country'];
  
  $location = implode(",",$location);

  $g = '<i class="'.$class.'" onClick="mymap.setView(['.$location.']);"></i> <b class="country-name">'.$country.'</b>
  <div class="info-content" id="info_'.$id.'">
    '.$text.' <a href="sources/'.$conflict.'.php?i='.$id.'" class="read-more-info">Source <span class="glyphicon glyphicon-new-window"></span></a>
  </div>
<hr>';

echo json_encode($g);
?>
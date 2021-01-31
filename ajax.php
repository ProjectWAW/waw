<?php
  $id = $_POST['id'];
  $location = $_POST['location'];
  $text = $_POST['text'];
  $class = $_POST['class'];
  $country = $_POST['country'];
  $source = $_POST['source'];
  
  $location = implode(",",$location);

  $g = '<i class="'.$class.' circle-fa" onClick="mymap.setView(['.$location.']);"></i> <b class="country-name">'.$country.'</b>
  <div class="info-content" id="info_'.$id.'">
    '.$text.' <a href="#" class="read-more-info" data-toggle="tooltip" data-html="true" data-container="body" data-placement="top" title="'.$source.'">Source <span class="glyphicon glyphicon-new-window"></span></a>
  </div>';

echo json_encode($g);
?>
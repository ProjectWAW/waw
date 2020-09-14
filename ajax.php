<?php
  $id = $_POST['id'];
  $location = $_POST['location'];
  $text = $_POST['text'];
  $class = $_POST['class'];
  $conflict = $_POST['conflict'];
  $country = $_POST['country'];
  
  $location = implode(",",$location);

/* var ambulance = 'fas fa-ambulance'
var anchor = 'fas fa-anchor'
var artillery_left = 'icon-artillery-left'
var artillery_right = 'icon-artillery-right'
var atom = 'fas fa-atom'
var bahai = 'fas fa-bahai'
var biohazard = 'fas fa-biohazard'
var bomb = 'icon-bomb'
var bullhorn = 'fas fa-bullhorn'
var chart_line = 'fas fa-chart-line'
var crosshairs = 'fas fa-crosshairs'
var drafting_compass = 'fas fa-drafting-compass'
var fire_alt = 'fas fa-fire-alt'
var flag = 'fas fa-flag'
var gun_left = 'icon-gun-left'
var gun_right = 'icon-gun-right'
var helmet = 'icon-helmet'
var info = 'fas fa-info'
var plane = 'fas fa-plane'
var plane_slash = 'fas fa-plane-slash'
var skull_crossbones = 'fas fa-skull-crossbones'
var tank_left = 'icon-tank-left'
var tank_right = 'icon-tank-right'
var truck = 'fas fa-truck'
var virus = 'fas fa-virus' */

  $g = '<i class="'.$class.'" onClick="mymap.setView(['.$location.']);"></i> <b class="country-name">'.$country.'</b>
  <div class="info-content" id="info_'.$id.'">
    '.$text.' <a href="sources/'.$conflict.'.php?i='.$id.'" class="read-more-info">Source <span class="glyphicon glyphicon-new-window"></span></a>
  </div>';

echo json_encode($g);
?>
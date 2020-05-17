<?php
$date = $_POST['date'];
$date_year = substr($date, 0, 4);
$date_month2 = substr($date, 4,4);
$date_day = substr($date, 8, 10);
if ((strpos($date, '01_31')) || (strpos($date, '1937_02_28')) || (strpos($date, '1938_02_28')) || (strpos($date, '1939_02_28')) || (strpos($date, '1941_02_28')) || (strpos($date, '1942_02_28')) || (strpos($date, '1943_02_28')) || (strpos($date, '1945_02_28')) || (strpos($date, '1936_02_29')) || (strpos($date, '1940_02_29')) || (strpos($date, '03_31')) || (strpos($date, '04_30')) || (strpos($date, '05_31')) || (strpos($date, '06_30')) || (strpos($date, '07_31')) || (strpos($date, '08_31')) || (strpos($date, '09_30')) || (strpos($date, '10_31')) || (strpos($date, '11_30'))) {
  $date_day = '01';
  $date_month2 = substr($date, 5, 7);
  $date_month2++;
  $date = "".$date_year."_".$date_month2."_".$date_day."";
  include 'map/'.$date.'.js';
} elseif (strpos($date, '12_31')) {
  $date_year++;
  $date_day = '01';
  $date_month2 = '01';
  $date = "".$date_year."_".$date_month2."_".$date_day."";
  include 'map/'.$date.'.js';
} else {
  if ($date_day == '01') {
    $date_day = '02';
  } elseif ($date_day == '02') {
    $date_day = '03';
  } elseif ($date_day == '03') {
    $date_day = '04';
  } elseif ($date_day == '04') {
    $date_day = '05';
  } elseif ($date_day == '05') {
    $date_day = '06';
  }
  $date_month2 = substr($date, 4, 4);
  $date = "".$date_year."".$date_month2."".$date_day."";
  include 'map/'.$date.'.js';
  $date_year = substr($date, 0, 4);
  $date_month2 = substr($date, 4,4);
  $date_day = substr($date, 8, 10);
}
//echo '<script>a1935_10_04();</script>';
?>
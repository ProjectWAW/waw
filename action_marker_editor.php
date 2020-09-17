<?php
if (isset($_POST['submit'])) {
  $var = '["'.$_POST["id"].'", "info_'.$_POST["id"].'", '.$_POST["colour_and_icon"].', ['.$_POST["location"].'], "'.$_POST["information"].'", "'.$_POST["icon"].'", "'.$_POST["source"].'", "'.$_POST["country"].'"],';

var_dump($var);

function debug_to_console($data) {
  $output = $data;
  if (is_array($output))
      $output = implode(',', $output);

  echo "<script>console.log('$output');</script>";
}

debug_to_console($var);

  /*

  ["1935_10_03_1", "info_1935_10_03_1", green_bullhorn, [41.8919300, 12.5113300], "Italy starts an invasion of Ethiopia without a formal declaration of war, shortly after the league exonerated both parties in the Walwal incident.", "fas fa-bullhorn", "italo_ethiopian_war", "Italy"],

  */
}
?>
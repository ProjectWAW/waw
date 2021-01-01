<?php
if (isset($_POST['submit'])) {
  $var = '["'.$_POST["id"].'", "info_'.$_POST["id"].'", '.$_POST["colour_and_icon"].', ['.$_POST["location"].'], "'.$_POST["information"].'", "'.$_POST["icon"].'", "'.$_POST["conflict"].'", "'.$_POST["country"].'"],';

var_dump($var);

function debug_to_console($data) {
  $output = $data;
  if (is_array($output))
      $output = implode(',', $output);

  echo "<script>console.log('$output');</script>";
}

debug_to_console($var);
}
?>
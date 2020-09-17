<?php require 'action_marker_editor.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require 'page_head.php';?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="">
<title>Editor - Project: World at War</title>
<style>
.content {
  margin-top: 70px;
  text-align: center;
}
input {
  width: 80%;
}
select {
  width: 80%;
}
.submit {
  height: 40px;
}
</style>
</head>
<body>
<?php require 'navbar.php';?>
<div class="content">
  <form method="post" action="/marker_editor.php">
    <label for="id">Id:</label><br>
    <input type="text" id="id" name="id" placeholder="1935_10_03_1"><br><hr>

    <label for="country">Country:</label><br>
    <input type="text" id="country" name="country" placeholder="Italy"><br><hr>

    <label for="information">Information:</label><br>
    <input type="text" id="information" name="information" placeholder="Italy starts an invasion of Ethiopia without a formal declaration of war, shortly after the league exonerated both parties in the Walwal incident."><br><hr>

    <label for="location">Location:</label><br>
    <input type="text" id="location" name="location" placeholder="41.8919300, 12.5113300"><br><hr>

    <label for="colour_and_icon">Colour and icon:</label><br>
    <input type="text" id="colour_and_icon" name="colour_and_icon" placeholder="green_bullhorn"><br><hr>

    <label for="icon">Icon:</label><br>
    <select name="icon" id="source">
      <option value="fas fa-ambulance">Ambulance</option>
      <option value="fas fa-anchor">Anchor</option>
      <option value="icon-artillery-left">Artillery (Left)</option>
      <option value="icon-artillery-right">Artillery (Right)</option>
      <option value="fas fa-atom">Atom</option>
      <option value="fas fa-bahai">Bahai</option>
      <option value="fas fa-biohazard">Biohazard</option>
      <option value="fas fa-bomb">Bomb</option>
      <option value="fas fa-bullhorn">Bullhorn</option>
      <option value="fas fa-chart_line">Chart Line</option>
      <option value="fas fa-crosshairs">Crosshairs</option>
      <option value="fas fa-drafting-compass">Drafting Compass</option>
      <option value="fas fa-fire-alt">Fire</option>
      <option value="fas fa-flag">Flag</option>
      <option value="icon-gun-left">Gun (Left)</option>
      <option value="icon-gun-right">Gun (Right)</option>
      <option value="icon-helmet">Helmet</option>
      <option value="fas fa-info">Info</option>
      <option value="fas fa-plane">Plane</option>
      <option value="fas fa-plane-slash">Plane (Slash)</option>
      <option value="fas fa-skull-crossbones">Skull and Crossbones</option>
      <option value="icon-tank-left">Tank (Left)</option>
      <option value="icon-tank-right">Tank (Right)</option>
      <option value="fas fa-truck">Truck</option>
      <option value="fas fa-virus">Virus</option>
    </select><br><hr>

    <label for="source">Source:</label><br>
    <select name="source" id="source">
      <option value="italo_ethiopian_war">Italo-Ethiopian War</option>
      <option value="spanish_civil_war">Spanish Civil War</option>
      <option value="invasion_of_poland">Invasion of Poland</option>
      <option value="phoney_war">Phoney War</option>
    </select>

    <br><hr><input type="submit" id="submit" name="submit" class="submit" value="Submit">
  </form>
</div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require 'page_head.php';?>
<?php require 'action_marker_editor.php';?>
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
<u><h2>Country</h2></u>
  <form method="post" action="/marker_editor.php">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" placeholder="Republic of China"><br><hr>
    
    <label for="status">Status:</label><br>
    <input type="text" id="status" name="status" placeholder="Independent country"><br><hr>

    <label for="government">Government:</label><br>
    <input type="text" id="government" name="government" placeholder="Unitary military dictatorship"><br><hr>

    <label for="party">Party:</label><br>
    <input type="text" id="party" name="party" placeholder="Kuomintang (中國國民黨)"><br><hr>

    <label for="hos">Head of State:</label><br>
    <input type="text" id="hos" name="hos" placeholder="Lin Sen"><br><hr>

    <label for="hog">Head of Government:</label><br>
    <input type="text" id="hog" name="hog" placeholder="Wang Jingwei"><br><hr>

    <label for="capital">Capital:</label><br>
    <input type="text" id="capital" name="capital" placeholder="Nanjing (南京)"><br><hr>
    
    <input type="submit" id="submit1" name="submit1" class="submit" value="Submit"><br><br><br>
  </form>
  <u><h2>Marker</h2></u>
  <form method="post" action="/marker_editor.php">

  <label for="date">Date:</label><br>
  <input type="text" id="date" name="date" placeholder="1936-12-31"><br><hr>

  <label for="country">Country:</label><br>
  <input type="text" id="country" name="country" placeholder="Italy"><br><hr>

  <label for="location">Location:</label><br>
  <input type="text" id="location" name="location" placeholder="41.8919300, 12.5113300"><br><hr>

  <label for="information">Information:</label><br>
  <input type="text" id="information" name="information" placeholder="Italy starts an invasion of Ethiopia without a formal declaration of war, shortly after the league exonerated both parties in the Walwal incident."><br><hr>
  
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

    <label for="conflict">Period:</label><br>
    <select name="conflict" id="conflict">
      <option value="italo_ethiopian_war">Italo-Ethiopian War</option>
      <option value="spanish_civil_war">Spanish Civil War</option>
      <option value="invasion_of_poland">Invasion of Poland</option>
      <option value="phoney_war">Phoney War</option>
    </select><br><hr>

    <label for="source">Source:</label><br>
    <input type="text" id="source" name="source" placeholder=""><br><hr>

    <label for="position">Page position:</label><br>
    <input type="number" id="position" name="position" placeholder="5"><br><hr>

    <input type="submit" id="submit2" name="submit2" class="submit" value="Submit"><br><br><br>
  </form>
  <u><h2>Source</h2></u>
  <form method="post" action="/marker_editor.php">
  </form>



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

    <label for="conflict">Period:</label><br>
    <select name="conflict" id="conflict">
      <option value="italo_ethiopian_war">Italo-Ethiopian War</option>
      <option value="spanish_civil_war">Spanish Civil War</option>
      <option value="invasion_of_poland">Invasion of Poland</option>
      <option value="phoney_war">Phoney War</option>
    </select><br><hr>

    <label for="source_type">Source type:</label><br>
    <select name="source_type" id="source_type">
      <option value="book">Book</option>
      <option value="website">Website</option>
      <option value="journal">Journal</option>
    </select><br><hr>

    <label for="source_author">Source author:</label><br>
    <input type="text" id="source_author" name="source_author" placeholder="Beevor, Anthony"><br><hr>

    <label for="source_title">Source title:</label><br>
    <input type="text" id="source_title" name="source_title" placeholder="The Battle for Spain the Spanish Civil War 1936-1939"><br><hr>

    <label for="source_title">Source publisher:</label><br>
    <input type="text" id="source_publisher" name="source_publisher" placeholder="Phoenix"><br><hr>

    <label for="source_title">Source date published:</label><br>
    <input type="text" id="source_date_published" name="source_date_published" placeholder="(Book/Journal - write the year and add 01-01) 2007-01-01 / (Website - write the full date) 2007-07-12">

    <br><hr><input type="submit" id="submit" name="submit" class="submit" value="Submit"><br><br><br>
  </form>
</div>
</body>
</html>
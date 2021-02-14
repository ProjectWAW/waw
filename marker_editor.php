<!DOCTYPE html>
<html lang="en">
<head>
<?php require 'page_head.php';?>
<?php require 'action_marker_editor.php';?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="">
<script type="text/javascript" src="marker_editor.js"></script>
<title>Editor - Project: World at War</title>
<style>
.content {
  margin-top: 70px;
  text-align: center;
}
input {
  width: 80%;
  height: 35px;
}
select {
  width: 80%;
  height: 35px;
}
.submit {
  height: 40px;
  background-color: lightgreen;
}
datalist.option {
  width: 500px;
}
</style>
</head>
<body>
<?php require 'navbar.php';?>
<div class="content">
<u><h2>Country</h2></u>
  <form method="post" action="/marker_editor.php">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" placeholder="Republic of China" required><br><hr>
    
    <label for="status">Status:</label><br>
    <input type="text" id="status" name="status" placeholder="Independent country" required><br><hr>

    <label for="government">Government:</label><br>
    <input type="text" id="government" name="government" placeholder="Unitary military dictatorship" required><br><hr>

    <label for="party">Party:</label><br>
    <input type="text" id="party" name="party" placeholder="Kuomintang (中國國民黨)" required><br><hr>

    <label for="hos">Head of State:</label><br>
    <input type="text" id="hos" name="hos" placeholder="Lin Sen" required><br><hr>

    <label for="hog">Head of Government:</label><br>
    <input type="text" id="hog" name="hog" placeholder="Wang Jingwei" required><br><hr>

    <label for="capital">Capital:</label><br>
    <input type="text" id="capital" name="capital" placeholder="Nanjing (南京)" required><br><hr>
    
    <input type="submit" id="submit1" name="submit1" class="submit" value="Submit"><br><br><br>
  </form>
  <u><h2>Marker</h2></u>
  <form method="post" action="/marker_editor.php">

  <label for="date">Date:</label><br>
  <input type="text" id="date" name="date" placeholder="1936-12-31" required><br><hr>

  <label for="country">Country:</label><br>
  <input type="text" id="country" list="country_list" name="country" placeholder="Italy" value="5cf7b120-cd0c-4db0-9f75-c88f8991ceec" required><br><hr>
  <datalist id="country_list">
    <option value="Default"></option>
  </datalist>

  <label for="location">Location:</label><br>
  <input type="text" id="location" name="location" placeholder="41.8919300, 12.5113300" required><br><hr>

  <label for="information">Information:</label><br>
  <input type="text" id="information" name="information" placeholder="Italy starts an invasion of Ethiopia without a formal declaration of war, shortly after the league exonerated both parties in the Walwal incident." required><br><hr>
  
  <label for="colour_and_icon">Colour and icon:</label><br>
  <input type="text" id="colour_and_icon" name="colour_and_icon" placeholder="green_bullhorn" required><br><hr>

  <label for="icon">Icon:</label><br>
    <select name="icon" id="source">
      <option selected="selected" value="fas fa-ambulance">Ambulance</option>
      <option value="fas fa-anchor">Anchor</option>
      <option value="icon-artillery-left">Artillery (Left)</option>
      <option value="icon-artillery-right">Artillery (Right)</option>
      <option value="fas fa-atom">Atom</option>
      <option value="fas fa-bahai">Bahai</option>
      <option value="fas fa-biohazard">Biohazard</option>
      <option value="icon-bomb">Bomb</option>
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
    <input type="text" id="source" list="sources_list" name="source" placeholder="" required><br><hr>
    <datalist id="sources_list">
      <option value="Default"></option>
    </datalist>

    <label for="position">Page position:</label><br>
    <input type="number" id="position" name="position" placeholder="5" required><br><hr>

    <input type="submit" id="submit2" name="submit2" class="submit" value="Submit"><br><br><br>
  </form>
  <u><h2>Source</h2></u>
  <form method="post" action="/marker_editor.php">

    <label for="source_type">Source type:</label><br>
    <select name="source_type" id="source_type">
      <option value="book" selected="selected">Book</option>
      <option value="website">Website</option>
      <option value="journal">Journal</option>
      <option value="newspapers">Newspapers</option>
    </select><br><hr>

    <label for="source_author">Source author:</label><br>
    <input type="text" id="source_author" name="source_author" placeholder="Beevor, Anthony (Last name, First name) (If no author, write '/'!)" required><br><hr>

    <label for="source_title">Source title:</label><br>
    <input type="text" id="source_title" name="source_title" placeholder="The Battle for Spain the Spanish Civil War 1936-1939" required><br><hr>

    <label for="source_title">Source publisher:</label><br>
    <input type="text" id="source_publisher" name="source_publisher" placeholder="Phoenix" required><br><hr>

    <label for="source_title">Source date published:</label><br>
    <input type="text" id="source_date_published" name="source_date_published" placeholder="(Book/Journal - write only the year) 2007 / (Website - write the full date) 2007-12-31" required><br><hr>

    <label for="source_title">Website</label><br>
    <input type="text" id="url" name="url" placeholder="laguerracivilenaragon.blogspot.com/2014/02/frente-de-aragon.html (ONLY IF YOUR SOURCE IS A WEBSITE, NOT A BOOK OR A JOURNAL!"><br><hr>

    <input type="submit" id="submit3" name="submit3" class="submit" value="Submit"><br><br><br>
  </form>
</div>
</body>
</html>
<?php include 'action_marker_editor.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require 'page_head.php';?>
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
  <form action="marker_editor.php">
    <label for="id">Id:</label><br>
    <input type="text" id="id" name="id" placeholder="1935_10_03_1"><br><hr>

    <label for="country">Country:</label><br>
    <input type="text" id="country" name="country" placeholder="Italy"><br><hr>

    <label for="information">Information:</label><br>
    <input type="text" id="information" name="information" placeholder="Italy starts an invasion of Ethiopia without a formal declaration of war, shortly after the league exonerated both parties in the Walwal incident."><br><hr>

    <label for="location">Location:</label><br>
    <input type="text" id="location" name="location" placeholder="[41.8919300, 12.5113300]"><br><hr>

    <label for="colour_and_icon">Colour and icon:</label><br>
    <input type="text" id="colour_and_icon" name="colour_and_icon" placeholder="fas fa-bullhorn"><br><hr>

    <label for="icon">Icon:</label><br>
    <select name="icon" id="source">
      <option value="fas fa-ambulance">Ambulance</option>
    </select><br><hr>

    <label for="source">Source:</label><br>
    <select name="source" id="source">
      <option value="italo_ethiopian_war">Italo-Ethiopian War</option>
      <option value="spanish_civil_war">Spanish Civil War</option>
      <option value="invasion_of_poland">Invasion of Poland</option>
    </select>

    <br><hr><input type="submit" id="submit" name="submit" class="submit" value="Submit">
  </form>
</div>
</body>
</html>
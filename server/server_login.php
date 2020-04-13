<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$errors = array();
require("php_db_info.php");
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['username']) == true ) {
  session_unset();
  session_destroy();
}

if (isset($_POST['login_user'])) {
  $dsn = 'mysql:host=127.0.0.1;dbname=users;charset=utf8';

  $conn = new PDO($dsn, $username1, $password);
  $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $username20  = isset($_POST['username']) ? $_POST['username'] : null;
  $password120 = isset($_POST['password']) ? $_POST['password'] : null;

if (empty($username20)) {
  array_push($errors, "Username is required.");
}
if (empty($password120)) {
  array_push($errors, "Password is required.");
}
if (count($errors) == 0) {
  $stm_log = $conn->prepare("SELECT username,password FROM users WHERE username = :username20 LIMIT 1");
  $stm_log->bindParam(":username20", $username20, PDO::PARAM_INT);
  $stm_log->execute();
  $row = $stm_log->fetch(PDO::FETCH_ASSOC); 

  $stm_check = $conn->prepare("SELECT * FROM users WHERE username=? LIMIT 1");
  $stm_check->execute([$username20]); 
  $user_found = $stm_check->fetch();

  if($user_found) {
    if (password_verify($password120, $row['password'])) {
      $_SESSION['username'] = $username20;
      $hour = time() + 15 * 24 * 60 * 60;
      header('location: index.php');
    } else {
      array_push($errors, "Password and username do not match!");
    }
  } else {
    array_push($errors, "Invalid username.");
  }
}
}
?>
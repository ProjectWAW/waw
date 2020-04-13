<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$errors = array();
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['username']) == true ) {
  session_unset();
  session_destroy();
}

if (isset($_POST['reg_user'])) {
  require("php_db_info.php");

  $dsn = 'mysql:host=127.0.0.1;dbname=users;charset=utf8';

  $conn = new PDO($dsn, $username1, $password);
  $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $username = $_POST['username'];
  $username_banned = strtolower($username);
  $username_banned = str_replace("-","_",$username_banned);
  $email = $_POST['email'];
  $password_1 = $_POST['password_1'];
  $password_2 = $_POST['password_2'];

if (empty($username)) { array_push($errors, $t_error1_reg); }
if (empty($email)) { array_push($errors, $t_error2_reg); }
if (empty($password_1)) { array_push($errors, $t_error3_reg); }
if ($password_1 != $password_2) {
  array_push($errors, "The passwords don't match!");
}
if(preg_match("[A-Za-z0-9\-\_]", $username)) {
  array_push($errors, "You can only use letters, numbers, underscores and dashes.");
}
if (strpos($username, '--') !== false || (strpos($username, '__') !== false)) {
  array_push($errors, $t_error15_reg);
}
if (strpos($username, '-_') !== false || (strpos($username, '_-') !== false)) {
  array_push($errors, $t_error16_reg);
}
if (strlen($username) <= 2) {
  array_push($errors, "Your username must have at least 3 characters.");
}
if (strlen($username) >= 22) {
  array_push($errors, "Your username must have below 22 characters.");
}
if (strlen($password_1) <= 6) {
  array_push($errors, "Your password must have at least 7 characters.");
}

require "server_bannedwords.php";

  $stm_reg1 = $conn->prepare('SELECT username FROM users WHERE username = :username LIMIT 1');
  $stm_reg1->bindParam(":username", $username, PDO::PARAM_STR);
  $stm_reg1->execute();
  $row = $stm_reg1->fetch(PDO::FETCH_ASSOC);
if ( ! $row) {} else {
  array_push($errors, "Username already exists.");
}
  $stm_reg2 = $conn->prepare('SELECT username FROM users WHERE email = :email LIMIT 1');
  $stm_reg2->bindParam(":email", $email, PDO::PARAM_STR);
  $stm_reg2->execute();
  $row = $stm_reg2->fetch(PDO::FETCH_ASSOC);
if ( ! $row) {} else {
  array_push($errors, "Email already exists.");
}
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {} else {
  array_push($errors, "Email isn't valid.");
}
if (count($errors) == 0) {
  $password2 = password_hash($password_1, PASSWORD_DEFAULT);
  $stm_reg_fin = $conn->prepare("INSERT INTO `users` (username, email, password, date_created, date_active, deleted, date_deleted, role) VALUES (:username, :email, :password2, curdate(), curdate(), 0, NULL, 'member')");
  $stm_reg_fin->execute(array(':username' => $_POST['username'], ':email' => $_POST['email'], ':password2' => $password2));
  $_SESSION['username'] = $username;
  require 'verify.php';
  header("location: index.php");
}
}
?>
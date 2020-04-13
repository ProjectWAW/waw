<?php
require 'server/server_register.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require 'page_head.php';?>
<link rel="stylesheet" type="text/css" href="/forms.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<title>Register - Project: World at War</title>
<style>
.error {
  width: 100%;
  margin: 0px auto;
  padding: 8px;
  border: 1px solid #a94442;
  color: #a94442;
  background-color: #f2dede;
  border-radius: 5px;
  text-align: left;
}
.glowing-border {
  border: 2px solid #dadada;
  border-radius: 7px;
}
.glowing-border:focus {
  outline: none;
  border-color: #9ecaed;
  box-shadow: 0 0 10px #9ecaed;
}
.red {
  border: 2px solid red;
  border-radius: 7px;
  background-color: red;
}
.red:focus { 
  outline: none;
  border-color: red;
  box-shadow: 0 0 10px red;
}
.green {
  border: 2px solid green;
  border-radius: 7px;
  background-color: green;
}
.green:focus { 
  outline: none;
  border-color: green;
  box-shadow: 0 0 10px green;
}
input:focus { 
  outline: none;
  box-shadow: 0px 0px 5px #1a7efc;
  -moz-box-shadow: 0px 0px 5px #1a7efc;
  -webkit-box-shadow: 0px 0px 5px #1a7efc;
}
</style>
</head>
<body>
<?php 
  include 'loader.php';
?>
<div class="form">
<div class="form-toggle"></div>
  <div class="form-panel one">
    <div class="form-header">
      <h1>Register - Project: World at War</h1>
      <?php require 'errors.php';?>
    </div>
<!--<i class="fa fa-times" style="color:red"></i>
<i class="fa fa-check" style="color:green"></i>-->
    <div class="form-content">
      <form name="regform" method="post" action="register.php">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="email" id="email" name="email" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="password_1">Password</label>
          <input type="password" id="myInput" name="password_1" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="password_2">Confirm Password</label>
          <input type="password" id="myInput1" name="password_2" autocomplete="off">
        </div>
        <div class="form-group">
          <label class="form-remember">
            <input type="checkbox" onclick="myFunction()">Show Password
          </label><a class="form-recovery" href="login.php">Already a member?</a>
        </div>
        <p>By registering, you agree to our <a href="tos.php">Terms of Service</a> and <a href="pp.php">Privacy Policy</a>.</p>
        <div class="form-group">
          <button type="submit" name="reg_user">Register</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="pen-footer"></div>
<script src="show_password.js"></script>
</body>
</html>
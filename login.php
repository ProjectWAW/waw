<?php 
require 'server/server_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require 'page_head.php';?>
<link rel="stylesheet" type="text/css" href="forms.css">
<title>Login - Project: World at War</title>
</head>
<body>
<?php include 'loader.php';?>
<div class="form">
  <div class="form-toggle"></div>
    <div class="form-panel one">
      <div class="form-header">
        <h1>Login - Project: World at War</h1>
      </div>
      <?php require 'errors.php';?>
      <div class="form-content">
        <form method="post" action="login.php">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="myInput" name="password" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="form-remember">
              <input type="checkbox" onclick="myFunction()"/>Show Password
            </label>
            <a class="form-recovery" href="enter_email.php">Forgot Password?</a><br>
            <a class="form-recovery" href="register.php">New member?</a>
          </div>
          <div class="form-group">
            <button type="submit" name="login_user">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<div class="pen-footer"></div>
<script src="show_password.js"></script>
</body>
</html>
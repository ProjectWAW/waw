<?php
$verify_token = substr(uniqid('', true), -100);

$stm_app_fin = $conn->prepare("INSERT INTO verify (username, token) VALUES (:username, :token)");
$stm_app_fin->execute(array(':username' => $username, ':token' => $verify_token));

$to = $email;
$subject = $t_mailh_verify;
$msg = "Hello, ".$username."! You have made an account on our website. Click on the following link to verify your email on our site. <a href=\"verified.php?token=".urlencode($verify_token)."\">link</a> If you have any additional problems, please mail us at projectworldatwar@gmail.com. If you didn't do this, you can ignore this email.";
$msg = wordwrap($msg,70);
mail($to, $subject, $msg);
?>
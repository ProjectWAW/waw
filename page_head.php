<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include $_SERVER['DOCUMENT_ROOT'].'/meta.php';
include $_SERVER['DOCUMENT_ROOT'].'/css.php';
?>
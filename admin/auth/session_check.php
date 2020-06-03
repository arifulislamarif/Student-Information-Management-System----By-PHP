<?php
session_start();

if (!isset($_SESSION['login_status'])) {
  header("location: login.php");
}

 ?>

<?php

session_start();
require_once('db.php');

$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];
$encryptpassword = md5($_POST['user_password']);


$query="SELECT count(*) as total_count , name, position FROM `auth` WHERE email='$user_email' AND password='$encryptpassword'";
$results=mysqli_query($connection , $query);

$afterassoc = mysqli_fetch_assoc($results);

if ($afterassoc['total_count'] == 1) {


  $_SESSION['name']=$afterassoc['name'];
  $_SESSION['position']=$afterassoc['position'];
  $_SESSION["login_status"] = "Login";
  header("location: ../index.php");

}else {
  $_SESSION["info_wrong"] = "wrong";
  header("location: ../login.php");
}




 ?>

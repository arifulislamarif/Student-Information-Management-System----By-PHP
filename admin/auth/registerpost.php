<?php
  session_start();


  $user_name = $_POST['user_name'];
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];
  $encryptpassword = md5($user_password);
  $user_position = $_POST['user_position'];



  if (empty($user_name) || empty($user_email) || empty($user_password)) {
    $_SESSION["field_empty"] = "empty_field";
    header("location: ../register.php");
  }
  elseif (!preg_match("/^[a-zA-Z -]*$/",$user_name)) {
    $_SESSION['letter_allow']="letter_allow";
    header("location: ../register.php");
  }
  elseif (strlen($user_password) < 6) {
    $_SESSION["pass_kom"] = "kom_pass";
    header("location: ../register.php");
  }else {
      require_once('db.php');
      $query="INSERT INTO `auth`(`name`, `email`, `password`, `position`) VALUES ('$user_name','$user_email','$encryptpassword','$user_position')";
      $results=mysqli_query($connection , $query);
      $_SESSION["form_done"] = "form_done";
      header("location: ../register.php");
  }






 ?>

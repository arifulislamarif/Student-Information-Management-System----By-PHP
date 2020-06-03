<?php
session_start();
require_once('auth/db.php');

$s_name = $_POST['s_name'];
$s_class = $_POST['s_class'];
$s_roll = $_POST['s_roll'];
$s_age = $_POST['s_age'];

if (empty($s_name) || empty($s_class) || empty($s_roll) || empty($s_age) || empty($s_name)) {
  $_SESSION['empty']="empty";
  header("location: addstudent.php");
}
elseif (!preg_match("/^[a-zA-Z -]*$/",$s_name)) {
  $_SESSION['letter_allow']="letter_allow";
  header("location: addstudent.php");
}
elseif (!is_numeric($s_roll)) {
  $_SESSION['letter_not_allow']="letter_not_allow";
  header("location: addstudent.php");
}
elseif (strlen($s_roll) !=6) {
  $_SESSION['must_be_six']="must_be_six";
header("location: addstudent.php");
}
else{

  $target_dir = "images/student/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

      // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
      $new_file_name = basename( $_FILES["fileToUpload"]["name"]);
      // $query = "INSERT INTO `student_info` (`s_img`) VALUES ('$new_file_name')";
      $query = "INSERT INTO `student_info`(`s_name`,`s_img`, `s_class`, `s_roll`, `s_age`) VALUES ('$s_name','$new_file_name','$s_class','$s_roll','$s_age')";
      $results=mysqli_query($connection,$query);
      $_SESSION['addstudent']="student";
      header("location: index.php");

  } else {

      $_SESSION['imgnai'] = "image";
      header("location: addstudent.php");
  }


}








 ?>

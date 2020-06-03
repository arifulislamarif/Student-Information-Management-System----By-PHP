<?php
// session_start();
// require_once('auth/db.php');
//
// $s_id = $_POST['s_id'];
// $s_name = $_POST['s_name'];
// $s_class = $_POST['s_class'];
// $s_roll = $_POST['s_roll'];
// $s_age = $_POST['s_age'];

// if (empty($s_name) || empty($s_class) || empty($s_roll) || empty($s_age) || empty($s_name)) {
//   $_SESSION['empty']="empty";
//   header("location: editstudent.php");
// }
// elseif (!preg_match("/^[a-zA-Z -]*$/",$s_name)) {
//   $_SESSION['letter_allow']="letter_allow";
//   header("location: editstudent.php");
// }
// elseif (!is_numeric($s_roll)) {
//   $_SESSION['letter_not_allow']="letter_not_allow";
//   header("location: editstudent.php");
// }
// elseif (strlen($s_roll) !=6) {
//   $_SESSION['must_be_six']="must_be_six";
// header("location: editstudent.php");
// }else {
//   $query = "UPDATE `student_info` SET `s_name`='$s_name',`s_class`='$s_class',`s_roll`='$s_roll',`s_age`='$s_age' WHERE s_id=$s_id";
//   $results = mysqli_query($connection , $query);
//
//   $_SESSION['editstudent']="student";
//   header("location: index.php");
// }



 ?>

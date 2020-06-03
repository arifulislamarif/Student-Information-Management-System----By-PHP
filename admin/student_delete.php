<?php
  session_start();
  require_once('auth/db.php');

  $s_id = $_GET['student_id'];


  $query = "UPDATE `student_info` SET `status`='1'  WHERE s_id=$s_id";
  $results = mysqli_query($connection , $query);

  $_SESSION['deletestudent']="delete";
  header("location: index.php");
 ?>

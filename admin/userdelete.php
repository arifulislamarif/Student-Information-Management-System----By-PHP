
<?php
   session_start();
   require_once('auth/db.php');

   $user_id = $_GET['user_id'];


   $query = "UPDATE `auth` SET `status`='1'  WHERE id=$user_id";
   $results = mysqli_query($connection , $query);

   $_SESSION['deleteuser']="delete";
   header("location: index.php");
  ?>

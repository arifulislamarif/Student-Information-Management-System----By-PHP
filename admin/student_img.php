<?php
require_once('auth/db.php');
$target_dir = "images/student/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

// echo $target_file;

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

    $new_file_name = basename( $_FILES["fileToUpload"]["name"]);
    $query = "UPDATE `student_info` SET `s_img`='$new_file_name' WHERE s_id=2";
    $results=mysqli_query($connection,$query);
    header("location: appearance.php");
} else {
    echo "Sorry, there was an error uploading your file.";
}
?>

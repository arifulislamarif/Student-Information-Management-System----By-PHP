<?php
  session_start();

if (isset($_POST['getinfo'])) {

  require_once('admin/auth/db.php');

  $class = $_POST['class'];
  $roll = $_POST['roll'];

  $query="SELECT count(*) as info_count ,s_name, s_roll, s_age, s_img, s_class FROM `student_info` WHERE s_class='$class' AND s_roll='$roll'";
  $results=mysqli_query($connection , $query);
  $afterassoc = mysqli_fetch_assoc($results);

if (empty($roll)) {

    $_SESSION['info'] = "You must be fill roll field!";

}elseif (!is_numeric($roll)) {

  $_SESSION["info"] = "Roll must be numeric!";

}elseif (strlen($roll) != 6) {

  $_SESSION["info"] = "Roll must be 6 digit!";

}else {

          if ($afterassoc['info_count'] == 1) {
            $_SESSION['info_paisi'] = "paisi";
          }else {
              $_SESSION["info"] = "Sorry! We couldn't find any information.";
            }

}




}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Student Information</title>
  </head>
  <body>

<div class="info-area mt-2">
  <div class="container">
    <div class="row">
      <div class="col-xl-6 offset-xl-1 text-center">
         <h1 class="display-4">Student Information</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4 offset-xl-2">
        <form action="" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Class</label>
            <select class="form-control" class="" name="class">
              <option value="">Select Class</option>
              <option value="One">Class One</option>
              <option value="Two">Class Two</option>
              <option value="Three">Class Three</option>
              <option value="Four">Class Four</option>
              <option value="Five">Class Five</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Roll No.</label>
            <input name="roll" type="text" class="form-control" id="exampleInputPassword1">
          </div>
          <button name="getinfo" type="submit" class="btn btn-success">Get Info.</button> <a href="admin/index.php" class="btn btn-info"> User Login</a>
        </form>
      </div>
      <div class="col-sm-4 offset-sm-2" style="border:1px solid black;">
        <h4 style="color:red;">Student Information :</h4>
        <h5>Student-1:</h5>
        <p><b>Class : </b>Two &nbsp;&nbsp;&nbsp;<b>Roll : </b> 123456</p>
        <hr>
        <h5>Student-2:</h5>
        <p><b>Class : </b>Four &nbsp;&nbsp;&nbsp;<b>Roll : </b> 456123</p>
        <hr>
        <h5>Student-3:</h5>
        <p><b>Class : </b>Five &nbsp;&nbsp;&nbsp;<b>Roll : </b> 123456</p>


      </div>
    </div>

  <?php
    if (isset($_SESSION["info"])) {
  ?>

  <div class="row">
    <div class="col-xl-6 offset-xl-3">
      <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
          <!-- <strong>Sorry! We couldn't found any information.</strong> -->
          <strong><?=$_SESSION['info']?></strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">X</span>
          </button>
      </div>
    </div>
  </div>

  <?php
    unset($_SESSION["info"]);
  }
  ?>

<?php
  if (isset($_SESSION['info_paisi'])) {
 ?>
    <div class="row mt-3">
      <div class="col-md-8 m-auto">
        <div id="result_display">
          <div class="alert alert-dismissible fade show mt-5" role="alert">
            <div class="table-responsive">
              <table class="table table-striped table-bordered" >
                <tbody>
                  <tr><td rowspan="5" class="text-center"><img width=200 height=250 src="admin/images/student/<?= $afterassoc['s_img'];?>" alt=""></td></tr>
                  <tr><td>Name of Student</td><td><?= $afterassoc['s_name'];?></td></tr>
                  <tr><td>Student Roll No</td><td><?= $afterassoc['s_roll'];?></td></tr>
                  <tr><td>Student Class</td><td><?= $afterassoc['s_class'];?></td></tr>
                  <tr><td>Student Age</td><td><?= $afterassoc['s_age'];?></td></tr>
                </tbody>
              </table>
              </div>
              <button type="button" class="close bg-danger" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">X</span>
              </button>
          </div>

          </div>
        </div>
      </div>

      <?php
      unset($_SESSION["info_paisi"]);
    }
       ?>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

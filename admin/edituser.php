<?php
require_once('auth/session_check.php');


if (isset($_POST['edit'])) {

  $user_id = $_POST['user_id'];
  $user_name = $_POST['user_name'];
  $user_email = $_POST['user_email'];
  $user_position = $_POST['user_position'];



  if (empty($user_name) || empty($user_email) || empty($user_position)) {
    $_SESSION["field_empty"] = "empty_field";
  }
  elseif (!preg_match("/^[a-zA-Z -]*$/",$user_name)) {
    $_SESSION['letter_allow']="letter_allow";
  }

  else {
    require_once('auth/db.php');
        $query = "UPDATE `auth` SET `name`='$user_name',`email`='$user_email',`position`='$user_position' WHERE id=$user_id";
         $results = mysqli_query($connection , $query);

         $_SESSION['edituser']="student";
         header("location: index.php");
  }


}

 ?>


  <?php
    require_once('require/header.php');
   ?>
       <body>

          <!-- Begin page -->
          <div id="layout-wrapper">

              <div class="main-content">

                <?php
                  require_once('require/header-nav.php');
                 ?>

               <div class="dropdown d-inline-block ml-2">
                   <button type="button" class="btn header-item waves-effect waves-light"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-3.jpg"
                           alt="Header Avatar">
                       <span class="d-none d-sm-inline-block ml-2" style="font-size: 14px;font-weight: 500;color: #fff;">
                         <?=$_SESSION['name'];?> ( <?=$_SESSION['position'];?> )
                       </span>
                       <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                   </button>
                   <div class="dropdown-menu dropdown-menu-right">
                       <a class="dropdown-item d-flex align-items-center justify-content-between" href="auth/logout.php">
                           <span class="text-danger" style="padding: 5px 0px;font-size: 15px;font-weight: 600;">
                             <i class="fas fa-sign-out-alt" ></i> Log Out
                           </span>
                       </a>
                   </div>
                <?php
                  require_once('require/header-nav-2.php');
                 ?>

                <?php
                  require_once('require/header-menu.php');
                 ?>



                  <div class="page-content">
                      <div class="container-fluid">

                      <!-- start page title -->
                      <div class="row">
                          <div class="col-12">
                              <div class="page-title-box d-flex align-items-center justify-content-between">
                                  <h4 class="mb-0 font-size-18">Edit User</h4>

                                  <div class="page-title-right">
                                      <ol class="breadcrumb m-0">
                                          <li class="breadcrumb-item"><a href="index.php">Back</a></li>
                                          <li class="breadcrumb-item active">Dashboard</li>
                                      </ol>
                                  </div>

                              </div>
                          </div>
                      </div>
                      <!-- end page title -->
                      <div class="row">

                        <div class="col-xl-4 offset-xl-4">
                           <div class="card ">
                              <div class="card-body">


                                <?php
                                  if (isset($_SESSION["field_empty"])) {
                                ?>

                                <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                    <strong>You must be provide all field!</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <?php
                                  unset($_SESSION["field_empty"]);
                                }
                                ?>

                                <?php
                                  if (isset($_SESSION['letter_allow'])) {
                                ?>

                                <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                    <strong>Name must be letter!</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <?php
                                  unset($_SESSION['letter_allow']);
                                }
                                ?>

                           <h4 class="card-title">Edit User</h4>

                            <form action="" method="post">
                              <input type="hidden" name="user_id" value="<?= $_GET['user_id']?>">
                                <div class="form-group">
                                    <label for="simpleinput">Name</label>
                                    <input value="<?= $_GET['user_name']?>" name="user_name" type="text" id="simpleinput" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="simpleinput">Email</label>
                                    <input value="<?=$_GET['user_email']?>" name="user_email" type="text" id="simpleinput" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="text-danger" for="simpleinput">User Position</label>
                                    <select  name="user_position" class="form-control">
                                      <option value="<?=$_GET['user_position']?>"><?=$_GET['user_position']?></option>
                                      <option value="Teacher">Teacher</option>
                                      <option value="Admin">Admin</option>
                                    </select>
                                </div>
                                </div>

                                    <button name="edit" type="submit" class="btn btn-primary waves-effect waves-light mb-2">Edit</button>
                                     <a class="btn btn-danger" href="index.php">Back</a>
                            </form>
                              </div>
                          </div>
                        </div>
                      </div>
                      </div>
                  </div>
              </div>
          </div>

  <?php
    require_once('require/script.php');
   ?>

      </body>


  </html>

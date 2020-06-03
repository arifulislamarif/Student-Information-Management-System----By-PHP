<?php
    require_once('auth/session_check.php');

    if (isset($_POST['submit'])) {

      $s_id = $_POST['s_id'];
      $s_name = $_POST['s_name'];
      $s_class = $_POST['s_class'];
      $s_roll = $_POST['s_roll'];
      $s_age = $_POST['s_age'];

      if (empty($s_name) || empty($s_class) || empty($s_roll) || empty($s_age) || empty($s_name)) {
        $_SESSION['empty'] = "empty";
      }
      elseif (!preg_match("/^[a-zA-Z -]*$/",$s_name)) {
        $_SESSION['letter_allow']="letter_allow";
      }
      elseif (!is_numeric($s_roll)) {
        $_SESSION['letter_not_allow'] = "letter_not_allow";
      }
      elseif (strlen($s_roll) !=6) {
        $_SESSION['must_be_six'] = "must_be_six";
      }else {

        require_once('auth/db.php');
        $query = "UPDATE `student_info` SET `s_name`='$s_name',`s_class`='$s_class',`s_roll`='$s_roll',`s_age`='$s_age' WHERE s_id=$s_id";
         $results = mysqli_query($connection , $query);

         $_SESSION['editstudent']="student";
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
                                 <h4 class="mb-0 font-size-18">Edit Student</h4>

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

                       <div class="col-xl-6 offset-xl-3">
                          <div class="card ">
                             <div class="card-body">


                               <?php
                                 if (isset($_SESSION['empty'])) {
                               ?>

                               <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                   <strong>You must be provide all fields!</strong>
                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                     <span aria-hidden="true">×</span>
                                   </button>
                               </div>

                               <?php
                                 unset($_SESSION['empty']);
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

                               <?php
                                 if (isset($_SESSION['letter_not_allow'])) {
                               ?>

                               <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                   <strong>Roll must be numeric!</strong>
                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                     <span aria-hidden="true">×</span>
                                   </button>
                               </div>

                               <?php
                                 unset($_SESSION['letter_not_allow']);
                               }
                               ?>

                               <?php
                                 if (isset($_SESSION['must_be_six'])) {
                               ?>

                               <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                   <strong>Roll must be 6 digit!</strong>
                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                     <span aria-hidden="true">×</span>
                                   </button>
                               </div>

                               <?php
                                 unset($_SESSION['must_be_six']);
                               }
                               ?>



                          <h4 class="card-title">Edit Student</h4>

                           <form action="" method="post">
                             <input type="hidden" name="s_id" value="<?= $_GET['student_id']?>">
                               <div class="form-group">
                                   <label for="simpleinput">Studnet Name</label>
                                   <input value="<?= $_GET['student_name']?>" name="s_name" type="text" id="simpleinput" class="form-control" placeholder="Enter Name">
                               </div>

                               <div class="form-group">
                                   <label for="simpleinput">Studnet Class</label>
                                   <select  name="s_class" class="form-control">
                                     <option value="<?= $_GET['student_class']?>">Class <?= $_GET['student_class']?></option>
                                     <option value="One">Class One</option>
                                     <option value="Two">Class Two</option>
                                     <option value="Three">Class Three</option>
                                     <option value="Four">Class Four</option>
                                     <option value="Five">Class Five</option>
                                   </select>
                               </div>
                               <div class="form-group">
                                   <label for="simpleinput">Studnet Roll</label>
                                   <input value="<?=$_GET['student_roll']?>" name="s_roll" type="text" id="simpleinput" class="form-control" placeholder="Enter Roll">
                               </div>
                               <div class="form-group">
                                   <label for="simpleinput">Studnet Age</label>
                                   <select name="s_age" class="form-control">
                                     <option value="<?= $_GET['student_age']?>"><?=$_GET['student_age']?></option>
                                     <option value="3">3</option>
                                     <option value="4">4</option>
                                     <option value="5">5</option>
                                     <option value="6">6</option>
                                     <option value="7">7</option>
                                     <option value="8">8</option>
                                     <option value="9">9</option>
                                     <option value="10">10</option>
                                     <option value="11">11</option>
                                     <option value="12">12</option>
                                     <option value="13">13</option>
                                     <option value="14">14</option>
                                     <option value="15">15</option>
                                     <option value="16">16</option>
                                     <option value="17">17</option>
                                     <option value="18">18</option>
                                   </select>

                               </div>

                               

                                   <button name="submit" type="submit" class="btn btn-primary waves-effect waves-light">Edit</button>
                                    <a class="btn btn-danger" href="index.php">Back</a>
                           </form>
                             </div>
                             <!-- end card-body-->
                         </div>


                       </div>



                     <!-- end row -->


                     </div> <!-- container-fluid -->

                     </div> <!-- container-fluid -->
                 </div>
                 <!-- End Page-content -->



             </div>
             <!-- end main content-->

         </div>
         <!-- END layout-wrapper -->


 <?php
   require_once('require/script.php');
  ?>

     </body>


 </html>

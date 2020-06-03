<?php
  require_once('auth/session_check.php');
  require_once('require/header.php');
 ?>

    <body>
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
                              <h1 class="mb-0">Dashboard</h1>
                            </div>
                        </div>
                    </div><!-- end page title -->


                    <?php
                      if ($_SESSION['position'] != "Admin" && $_SESSION['position'] != "Teacher") {
                      ?>

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="avatar-sm float-right">
                                            <span class="avatar-title bg-soft-primary rounded-circle">
                                                <i class="bx bx-layer m-0 h3 text-primary"></i>
                                            </span>
                                        </div>
                                        <h6 class="text-muted text-uppercase mt-0">Total Student</h6>
                                        <?php
                                            require_once('auth/db.php');

                                            $query= "SELECT s_id FROM `student_info` WHERE status=0 ORDER BY s_id";
                                            $results = mysqli_query($connection,$query);

                                            $row = mysqli_num_rows($results);
                                         ?>
                                        <h3 class="my-3"><?= $row?></h3>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="avatar-sm float-right">
                                            <span class="avatar-title bg-soft-primary rounded-circle">
                                              <i class="bx bx-layer m-0 h3 text-primary"></i>
                                            </span>
                                        </div>
                                        <h6 class="text-muted text-uppercase mt-0">Total Teachers</h6>

                                        <?php
                                            require_once('auth/db.php');

                                            $query= "SELECT id FROM `auth` WHERE position='Teacher' AND status='0' ORDER BY id";
                                            $results = mysqli_query($connection,$query);

                                            $row = mysqli_num_rows($results);
                                         ?>

                                        <h3 class="my-3"><?= $row?></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="avatar-sm float-right">
                                            <span class="avatar-title bg-soft-primary rounded-circle">
                                              <i class="bx bx-layer m-0 h3 text-primary"></i>
                                            </span>
                                        </div>
                                        <h6 class="text-muted text-uppercase mt-0">Total Admiin</h6>
                                        <?php
                                            require_once('auth/db.php');

                                            $query= "SELECT id FROM `auth` WHERE position='Admin' AND status='0' ORDER BY id";
                                            $results = mysqli_query($connection,$query);

                                            $row = mysqli_num_rows($results);
                                         ?>
                                        <h3 class="my-3"><?= $row?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="avatar-sm float-right">
                                            <span class="avatar-title bg-soft-primary rounded-circle">
                                                <i class="bx bx-layer m-0 h3 text-primary"></i>
                                            </span>
                                        </div>
                                        <h6 class="text-muted text-uppercase mt-0">Total Registered</h6>
                                        <?php
                                            require_once('auth/db.php');

                                            $query= "SELECT id FROM `auth` ORDER BY id";
                                            $results = mysqli_query($connection,$query);

                                            $row = mysqli_num_rows($results);
                                         ?>

                                        <h3 class="my-3"><?=$row?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>  <!-- end row -->
                        <?php
                            }
                          ?>


                          <?php
                            if ($_SESSION['position'] != "Admin") {
                          ?>
                        <div class="row">
                            <div class="col-12">
                                 <div class="card ">
                                    <div class="card-body">
                                      <?php
                                        if (isset($_SESSION['addstudent'])) {
                                      ?>
                                      <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                                          <strong>Student added successfully done!</strong>
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">X</span>
                                          </button>
                                      </div>
                                      <?php
                                        unset($_SESSION['addstudent']);
                                      }
                                      ?>
                                      <?php
                                        if (isset($_SESSION['editstudent'])) {
                                      ?>
                                      <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                                          <strong>Student edit successfully done!</strong>
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">X</span>
                                          </button>
                                      </div>
                                      <?php
                                        unset($_SESSION['editstudent']);
                                      }
                                      ?>
                                      <?php
                                        if (isset($_SESSION['deletestudent'])) {
                                      ?>
                                      <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                          <strong>Student deleted successfully done!</strong>
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">X</span>
                                          </button>
                                      </div>
                                      <?php
                                        unset($_SESSION['deletestudent']);
                                        }
                                      ?>
                                        <h1 class="card-title d-inline">Student Information</h1><a class="btn btn-primary float-right mb-2" href="addstudent.php">Add New Student</a>
                                        <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap">
                                            <thead class="bg-dark text-white">
                                                <tr>
                                                    <th>SL. No.</th>
                                                    <th>Student Name</th>
                                                    <th>Student Photo</th>
                                                    <th>Class</th>
                                                    <th>Roll</th>
                                                    <th>Age</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody class="bg-light text-dark" style="font-size:16px;font-weight:500;">
                                              <?php
                                                  require_once('auth/db.php');

                                                  $query= "SELECT * FROM `student_info` WHERE status=0";
                                                  $results = mysqli_query($connection,$query);
                                                  $counter=1;
                                                  foreach ($results as $final_result) {
                                                ?>
                                                <tr>
                                                  <td><?=$counter?></td>
                                                  <td><?=$final_result['s_name']?></td>
                                                  <td> <img width="100" height="80" src="images/student/<?=$final_result['s_img']?>"> </td>
                                                  <td><?=$final_result['s_class']?></td>
                                                  <td><?=$final_result['s_roll']?></td>
                                                  <td><?=$final_result['s_age']?></td>

                                                  <td><a class="btn btn-warning" href="editstudent.php?student_id=<?=$final_result['s_id']?>&student_name=<?=$final_result['s_name']?>&student_img=<?=$final_result['s_img']?>&student_class=<?=$final_result['s_class']?>&student_roll=<?=$final_result['s_roll']?>&student_age=<?=$final_result['s_age']?>">Edit</a> <a class="btn btn-danger" href="student_delete.php?student_id=<?=$final_result['s_id']?>">Delete</a> </td>
                                                </tr>
                                                <?php
                                              $counter++;
                                                }
                                              ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>  <!-- end row-->


                        <?php
                            }
                         ?>

                    <?php
                      if ($_SESSION['position'] != "Teacher") {
                    ?>

                    <div class="row">
                        <div class="col-12">
                             <div class="card ">
                                <div class="card-body">

                                  <?php
                                    if (isset($_SESSION['edituser'])) {
                                  ?>

                                  <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                                      <strong>User edit successfully done!</strong>
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">X</span>
                                      </button>
                                  </div>

                                  <?php
                                    unset($_SESSION['edituser']);
                                    }
                                  ?>

                                  <?php
                                    if (isset($_SESSION['deleteuser'])) {
                                  ?>

                                  <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                      <strong>User deleted successfully done!</strong>
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">X</span>
                                      </button>
                                  </div>

                                  <?php
                                    unset($_SESSION['deleteuser']);
                                  }
                                  ?>

                                    <h1 class="card-title d-inline">User Information</h1><a class="btn btn-primary float-right mb-2" href="register.php">Register New User</a>
                                    <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap mt-2">
                                        <thead class="bg-dark text-white">
                                            <tr>
                                                <th>SL. No.</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Position</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody class="bg-light text-dark" style="font-size:16px;font-weight:500;">
                                          <?php
                                              require_once('auth/db.php');

                                              $query= "SELECT * FROM `auth` WHERE position !='Super Admin' AND status=0";
                                              $results = mysqli_query($connection,$query);
                                              $counter=1;
                                              foreach ($results as $final_result) {
                                            ?>
                                            <tr>
                                              <td><?=$counter?></td>
                                              <td><?=$final_result['name']?></td>
                                              <td><?=$final_result['email']?></td>
                                              <td class="text-info"><?=$final_result['position']?></td>
                                              <td>

                                                <a class="btn btn-warning" href="edituser.php?user_id=<?=$final_result['id']?>&user_name=<?=$final_result['name']?>&user_email=<?=$final_result['email']?>&user_position=<?=$final_result['position']?>">Edit
                                                </a>

                                                <?php
                                                    if ($_SESSION['position'] != "Admin") {
                                                 ?>
                                                 <a class="btn btn-danger" href="userdelete.php?user_id=<?=$final_result['id']?>">Delete</a>

                                                 <?php
                                                    }
                                                  ?>

                                               </td>
                                            </tr>
                                            <?php
                                          $counter++;
                                            }
                                          ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php
                      }
                     ?>

                    </div>
                </div>
            </div>
        </div>
        <?php
          require_once('require/footer.php');
         ?>

      <?php
        require_once('require/script.php');
       ?>

    </body>


</html>

<?php
  session_start();
  require_once('require/header.php');
 ?>

<body class="bg-primary">

    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center min-vh-100">
                        <div class="w-100 d-block my-5">
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-lg-5">
                                     <div class="card ">
                                        <div class="card-body">

                                          <?php
                                            if (isset($_SESSION["field_empty"])) {
                                           ?>

                                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>You must be provide all fields!</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
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

                                           <?php
                                             if (isset($_SESSION["pass_kom"])) {
                                           ?>

                                           <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                               <strong>Password must be 6 or greater!</strong>
                                               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                 <span aria-hidden="true">×</span>
                                               </button>
                                           </div>

                                           <?php
                                             unset($_SESSION["pass_kom"]);
                                           }
                                           ?>

                                           <?php
                                             if (isset($_SESSION["form_done"])) {
                                           ?>

                                           <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                                               <strong>Register successfully done!</strong>
                                               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                 <span aria-hidden="true">×</span>
                                               </button>
                                           </div>

                                           <?php
                                             unset($_SESSION["form_done"]);
                                           }
                                           ?>


                                            <div class="text-center mb-4 mt-3">
                                                <h1>Register User</h1>
                                            </div>
                                            <form action="auth/registerpost.php" method="post" class="p-2">
                                                <div class="form-group">
                                                    <label for="username">Name</label>
                                                    <input name="user_name" class="form-control" type="text" id="username"  placeholder="Enter Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="emailaddress">Email address</label>
                                                    <input name="user_email" class="form-control" type="email" id="emailaddress"  placeholder="Enter Email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input name="user_password" class="form-control" type="password" id="password" placeholder="Enter password">
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-danger" for="simpleinput">User Position</label>
                                                    <select  name="user_position" class="form-control">
                                                      <option value="">Select Position</option>
                                                      <option value="Teacher">Teacher</option>
                                                      <option value="Admin">Admin</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3 text-center">
                                                    <button class="btn btn-primary btn-block" type="submit">Register</button>
                                                </div>
                                                <div class="mt-3 text-center">
                                                    <a href="index.php" class="btn btn-danger" type="submit">Back to dashboard</a>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- end card-body -->
                                    </div>
                                    <!-- end card -->

                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div> <!-- end .w-100 -->
                    </div> <!-- end .d-flex -->
                </div> <!-- end col-->
            </div> <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <?php
      require_once('require/script.php');
     ?>

</body>


</html>

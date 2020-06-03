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
                                          <div class="row">
                                            <div class="col-sm-12 text-center">
                                              <h5 style="color:red;">Super Admin Login :</h5>
                                              <p><b>Email : </b>arif@gmail.com</p>
                                              <p><b>Password : </b> 123456</p>
                                            </div>
                                            <div class="col-sm-6">
                                              <h5 style="color:red;">Admin Login :</h5>
                                              <p><b>Email : </b> admin@gmail.com</p>
                                              <p><b>Password :</b> 123456</p>
                                            </div>
                                            <div class="col-sm-6">
                                              <h5 style="color:red;">Teacher Login :</h5>
                                              <p><b>Email : </b> teacher@gmail.com </p>
                                              <p><b>Password : </b> 123456</p>
                                            </div>
                                          </div>
                                          <hr>


                                            <div class="text-center mb-4 mt-3">

                                               <?php
                                                 if (isset($_SESSION["info_wrong"])) {
                                                ?>

                                               <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                 <strong>Your email or password is wrong!</strong>
                                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                                 </button>
                                               </div>

                                               <?php
                                                 unset($_SESSION["info_wrong"]);
                                                 }
                                                ?>

                                              <h1>Login</h1>
                                            </div>
                                            <form action="auth/loginpost.php" method="post" class="p-2">
                                                <div class="form-group">
                                                    <label for="emailaddress">Email address</label>
                                                    <input name="user_email" class="form-control" type="email" id="emailaddress"  placeholder="Enter email">
                                                </div>
                                                <div class="form-group">
                                                    <a href="pages-recoverpw.html" class="text-muted float-right">Forgot your password?</a>
                                                    <label for="password">Password</label>
                                                    <input name="user_password" class="form-control" type="password"  id="password" placeholder="Enter password">
                                                </div>

                                                <div class="mb-3 text-center">
                                                    <button class="btn btn-primary btn-block" type="submit"> Sign In </button>
                                                    <a class="btn btn-info btn-block" href="../index.php"> <i class="fas fa-arrow-left"></i>  Go Info. Page</a>
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


<!-- Mirrored from myrathemes.com/opatix/layouts/horizontal/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 May 2020 07:43:42 GMT -->
</html>

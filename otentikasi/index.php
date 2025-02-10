<?php

session_start();

if (isset($_SESSION['ssLogin'])) {
    header('location: ../index.php');
}

require "../config.php";



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - Ujian Online</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= $main_url ?>vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= $main_url ?>vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= $main_url ?>css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= $main_url ?>images/layout.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent" style="height: 100vh; padding-top: 100px;">
                            <h2 class="text-center">Login</h2>
                            <form action="auth.php" method="POST" class="pt-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="ti-user text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="email" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="masukkan email anda">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="ti-lock text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="password" name="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password">
                                    </div>
                                </div>
                                <div class="my-3 d-grid">
                                    <button type="submit" name="login" class="btn btn-block btn-primary btn-lg">LOGIN</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Silahkan daftar disini jika belum memiliki akun<a href="register.php" class="text-primary"> Daftar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 login-half-bg d-flex flex-row">
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= $main_url ?>vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="<?= $main_url ?>js/off-canvas.js"></script>
    <script src="<?= $main_url ?>js/hoverable-collapse.js"></script>
    <script src="<?= $main_url ?>js/template.js"></script>
    <script src="<?= $main_url ?>js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>
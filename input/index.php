<?php
include "koneksi/koneksi.php";
session_start();
if($_SESSION){
    if($_SESSION['jeniskelamin']=="Laki-Laki")
    {
        header("Location: dashboard.php");
    }
}

include('proseslogin.php'); 

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sistem Informasi Sekolah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Andika">
    <meta name="author" content="andika">

  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/minified/core.min.css" rel="stylesheet" type="text/css">
  <link href="css/minified/components.min.css" rel="stylesheet" type="text/css">
  <link href="css/minified/colors.min.css" rel="stylesheet" type="text/css">
  <link href="css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
  <!-- /global stylesheets -->

  <!-- Core JS files -->
  <script type="text/javascript" src="js/plugins/loaders/pace.min.js"></script>
  <script type="text/javascript" src="js/core/libraries/jquery.min.js"></script>
  <script type="text/javascript" src="js/core/libraries/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/plugins/loaders/blockui.min.js"></script>
  <!-- /core JS files -->
  <script type="text/javascript" src="js/core/app.js"></script>
</head>

<body  background = '1.png'>
    <div class="navbar navbar-inverse">
        <h3><marquee><strong>Selamat Datang Di Sistem Sekolah Bina Mandiri</strong></marquee></h3>
    </div>

    <div class="page-container login-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Content area -->
                <div class="content">

<div class="container">
    <div class="loading navbar-fixed-top" style="display: none">
        <div class="progress progress-primary progress-striped active">
            <div class="bar" style="width: 100%;"></div>
        </div>
    </div>
    <!--- form tujuan -->
    <form class="form-signin" action="" method="post">
    <div class="panel panel-body login-form">
                            <div class="text-center">
                                <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                                <h5 class="content-group">LOGIN SISTEM </h5>
                            </div>
                             <div class="form-group ">
                                <input type="text" class="form-control" name="username" placeholder="Username">
                                <div class="form-control-feedback">
                                  
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <div class="form-control-feedback">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
                            </div>
                        </div>
                    </form>

                    <!-- /footer -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->
    </form>
</div>
</body>

</html>
<!DOCTYPE html>
<?php
	session_start();
	include "ceksessionn.php";
?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Arsip Surat Kota Samarinda</title>

    <!-- Bootstrap -->
    <link href="../../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../../assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../assets/build/css/custom.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../../img/icon.ico">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="proses_login.php" id="login" name="login" method="post">
              <h1>Login Bagian</h1>
              <div class="form-group has-feedback">
                <input type="text" id="username" name="username_admin_bagian" class="form-control" autocomplete="off" maxlength="50" placeholder="Username" required="username" />
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="password" id="password" name="password_bagian" class="form-control" autocomplete="off" maxlength="50" placeholder="Password" required="password" />
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <div>
                <a href="../../index.php"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</button></a>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock"></span> Masuk</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div>
                  <h2><i class="fa fa-institution"></i> PEMKOT SAMARINDA</h2>
                  <p>©2017 ILMU KOMPUTER UNMUL</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>

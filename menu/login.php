<?php
session_start(); // memulai session
if(isset($_SESSION['idadmin'])) {
  echo "<script>window.location='index.php';</script>";
}

require "../koneksi.php"; // memanggil file koneksi
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Login Administrator</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body class="login-img3-body">
    
    <div class="container">

    <form class="login-form" action="" method="GET">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" name="username" placeholder="Username" required>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
        <button class="btn btn-info btn-lg btn-block" name="login">Login</button>
        <button class="btn btn-info btn-lg btn-block" name="signup">Signup</button>
      </div>
    </form>

    <?php
    if(isset($_GET['login'])) {
        $admin = $_GET['username'];
        $pass = $_GET['password'];

        $query = $con->prepare("SELECT * FROM t_admin WHERE username = :admin AND password = :pass");
        $query->bindValue(':admin', $admin);
        $query->bindValue(':pass', $pass);
        $query->execute();
        $cek = $query->rowCount();
        if($cek > 0) {
            $data = $query->fetch();
            $_SESSION['idadmin'] = $data['id_admin'];
            $_SESSION['username'] = $data['username'];
            echo "<script>alert('Selamat. Login berhasil :)'); window.location='index.php';</script>";

        } else {
            echo "<script>alert('Login gagal. Ulangi lagi!');</script>";
        }

    }
    ?>

    
    <div class="text-right">
      <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
  </div>


</body>

</html>

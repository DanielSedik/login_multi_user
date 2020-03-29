<!DOCTYPE html>
<html>
<head>
	<title>Login Multi User</title>
	<link  href="css/bootstrap.min.css" rel="stylesheet">
	<link  href="css/flat-ui.css" rel="stylesheet">
	<link  href="css/demo.css" rel="stylesheet">
	<link  rel="shortcut icon" href="img/yukcoding.tech.png" >
</head>
<body style="overflow: hidden;">
	<div class="container" style="padding-top: 10px;">
		<div class="login">
			<div class="login-screen" style="background-color: #1ABC9C;">
				<div class="login-icon">
					<img src="img/icons/svg/map.svg" alt="Welcome to Mail App" />
					<h4> Welcome to <small>Login Page</small></h4>
				</div>

				<div class="login-form">
				<form action="" method="POST">
					<div class="form-group">
						<input type="text" name="user" class="form-control login-field" placeholder="Enter you username" id="login-name" required autofocus />
						<label class="login-field-icon fui-user" for="login-name"></label>	
					</div>
					<div class="form-group">
						<input type="password" name="pass" class="form-control login-field" placeholder="Password" id="login-pass" required autofocus>
						<label class="login-field-icon fui-lock" for="login-pass"></label>	
					</div>
					<div class="form-group">
						<select name="level" class="form-control select select-primary" data-toggle="select" required>
							<option value="">-Pilih Level-</option>
							<option value="admin">Admin</option>
							<option value="guru">Guru</option>
							<option value="siswa">Siswa</option>
						</select>
					</div>

					<input type="submit" name="login" value="Log in " class="btn btn-primary btn-lg btn-block" />
					<a class="login-link" href=""> Lost your password</a>

				</form>

				<?php
				session_start();
				include "koneksi.php";
				if(@$_POST['login']){
					$user = mysqli_real_escape_string($db, $_POST['user']);
					$pass = mysqli_real_escape_string($db, $_POST['pass']);
					$level = mysqli_real_escape_string($db, $_POST['level']);

					if($level == 'admin'){
						$sql1 = mysqli_query($db, "SELECT * FROM tb_admin WHERE username = '$user' AND password ='$pass'") or die ($db->error);
						$data1 = mysqli_fetch_array($sql1);
						$id = $data1[0];
						$cek1 = mysqli_num_rows($sql1);
						if($cek1 > 0){
							$_SESSION['admin'] = $id;
							echo "<script>window.location='_admin'; </script>";
						} else {
							echo "<script>alert('Login admin gagal, sihlakan cek username & password Anda'); </script>";
						}
					} else if($level == 'guru') {
						$sql2 = mysqli_query($db, "SELECT * FROM tb_guru WHERE username = '$user' AND password ='$pass'") or die ($db->error);
						$data2 = mysqli_fetch_array($sql2);
						$id = $data2[0];
						$cek2 = mysqli_num_rows($sql2);
						if($cek2 > 0){
							$_SESSION['guru'] = $id;
							echo "<script>window.location='_guru'; </script>";
						} else {
							echo "<script>alert('Login guru gagal, sihlakan cek username & password Anda'); </script>";
						}
						
					} else if($level == 'siswa') {
						$sql3 = mysqli_query($db, "SELECT * FROM tb_siswa WHERE username = '$user' AND password ='$pass'") or die ($db->error);
						$data3 = mysqli_fetch_array($sql3);
						$id = $data3[0];
						$cek3 = mysqli_num_rows($sql3);
						if($cek3 > 0){
							$_SESSION['siswa'] = $id;
							echo "<script>window.location='_siswa'; </script>";
						} else {
							echo "<script>alert('Login siswa gagal, sihlakan cek username & password Anda'); </script>";
						}
					}	
				}
				?>
				</div>
			</div>
		</div>
	</div>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/flat-ui.js"></script>
    <script src="js/application.js"></script>

</body>
</html>
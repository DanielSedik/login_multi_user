<?php
session_start();

if (@$_SESSION['admin']) {
?>

Selamat datang di halaman admin. <br>
Jika sudah selesai sihlakan <a href="logout.php">Logout</a>

<?php
} else {
	echo "<script>window.location='../login.php'; </script>";
}
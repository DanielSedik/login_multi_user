<?php
session_start();

if (@$_SESSION['siswa']) {
?>

Selamat datang di halaman siswa. <br>
Jika sudah selesai sihlakan <a href="logout.php">Logout</a>

<?php
} else {
	echo "<script>window.location='../login.php'; </script>";
}
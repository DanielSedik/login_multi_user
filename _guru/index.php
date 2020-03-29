<?php
session_start();

if (@$_SESSION['guru']) {
?>

Selamat datang di halaman guru. <br>
Jika sudah selesai sihlakan <a href="logout.php">Logout</a>

<?php
} else {
	echo "<script>window.location='../login.php'; </script>";
}
<?php 
// session_start();
// if(!isset($_SESSION['iduser'])) {
// 	echo "<script>window.location='login.php';</script>";
// }
include "../koneksi.php";

$params = [
    "id"                => $_GET['id'],
    "kd_kacamatan"      => $_GET['kd_kacamatan'],
    "nama_kacamatan"    => $_GET['nama_kacamatan']
   
  ];

$sql = "UPDATE w_kecamatan SET
            kd_kacamatan = :kd_kacamatan,
            nama_kacamatan = :nama_kacamatan 
        WHERE id = :id";
$query = $con->prepare($sql);
if($query->execute($params)) { // prepare > execute menggunakan parameter array
    echo "<script>alert('Data berhasil diedit'); window.location='njop_kecamatan.php';</script>";
} else {
    echo "<script>alert('Data gagal diedit');</script>";
}


/*
Code by YukCoding Tutor
www.yukcoding.id
*/
?>
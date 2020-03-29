<?php 
// session_start();
// if(!isset($_SESSION['iduser'])) {
// 	echo "<script>window.location='login.php';</script>";
// }
include "../koneksi.php";

$params = [
    "id"                => $_GET['id'],
    "nama_kecamatan"    => $_GET['nama_kecamatan'],
    "kd_kecamatan"      => $_GET['kd_kecamatan'],
    "nama_kelurahan"    => $_GET['nama_kelurahan']
   
  ];

$sql = "UPDATE kelurahan SET
            nama_kecamatan = :nama_kecamatan,
            kd_kecamatan = :kd_kecamatan,
            nama_kelurahan = :nama_kelurahan
        WHERE id = :id";
$query = $con->prepare($sql);
if($query->execute($params)) { // prepare > execute menggunakan parameter array
    echo "<script>alert('Data berhasil diedit'); window.location='njop_kelurahan.php';</script>";
} else {
    echo "<script>alert('Data gagal diedit');</script>";
}


/*
Code by YukCoding Tutor
www.yukcoding.id
*/
?>
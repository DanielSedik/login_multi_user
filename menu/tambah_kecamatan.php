
<?php 
// session_start();
// if(!isset($_SESSION['idadmin'])) {
// 	echo "<script>window.location='login.php';</script>";
// }
include "../koneksi.php";

echo "Sukses";

$kd_kacamatan = $_GET['kd_kacamatan'];
$nama_kacamatan = $_GET['nama_kacamatan'];



$query = $con->prepare("INSERT INTO w_kecamatan (kd_kacamatan, nama_kacamatan) 
                        VALUES (:kd_kacamatan, :nama_kacamatan)");

$query->bindparam(':kd_kacamatan', $kd_kacamatan); // menggunakan bindparam
$query->bindparam(':nama_kacamatan', $nama_kacamatan);



if($query->execute()) {
    echo "<script>alert('Data Berhasil di tambah'); window.location='njop_kecamatan.php';</script>";
} else {
    echo "<script>alert('Data Gagal ditambah');</script>";
}

?>
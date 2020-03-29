
<?php 
// session_start();
// if(!isset($_SESSION['idadmin'])) {
// 	echo "<script>window.location='login.php';</script>";
// }
include "../koneksi.php";

echo "Sukses";

$nama_kecamatan = $_GET['nama_kecamatan'];
$kd_kecamatan = $_GET['kd_kecamatan'];
$nama_kelurahan = $_GET['nama_kelurahan'];



$query = $con->prepare("INSERT INTO kelurahan (nama_kecamatan, kd_kecamatan, nama_kelurahan) 
                        VALUES (:nama_kecamatan, :kd_kecamatan, :nama_kelurahan)");

$query->bindparam(':nama_kecamatan', $nama_kecamatan); // menggunakan bindparam
$query->bindparam(':kd_kecamatan', $kd_kecamatan);
$query->bindparam(':nama_kelurahan', $nama_kelurahan);


if($query->execute()) {
    echo "<script>alert('Data Berhasil di tambah'); window.location='njop_kelurahan.php';</script>";
} else {
    echo "<script>alert('Data Gagal ditambah');</script>";
}

?>


   

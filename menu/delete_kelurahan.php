<?php

include"../koneksi.php";

// echo("sukses");

$id = $_GET['id'];
$param = array(':id' => $id);

$query = $con->prepare("DELETE FROM kelurahan WHERE id = :id");

if($query->execute($param)) {
    echo "<script>alert('Data berhasil dihapus'); window.location='njop_kelurahan.php';</script>";
} else {
    echo "<script>alert('Data gagal dihapus'); window.location='njop_kelurahan.php';</script>";
}


?>


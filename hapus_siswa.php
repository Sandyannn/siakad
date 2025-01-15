<?php
include 'koneksi.php';

$id_siswa = $_GET['id'];

mysqli_query($conn,"DELETE FROM siswa WHERE id_siswa = $id_siswa");

header("location: siswa.php");

?>

<?php 
 require("../../../connection.php");
 $nisn = $_POST["nisn"];
 $nis = $_POST["nis"];
 $nama = $_POST["nama"];
 $kelas = $_POST["id_kelas"];
 $alamat = $_POST["alamat"];
 $no_telpon = $_POST["no_telpon"];
 $spp = $_POST["spp"];

 mysqli_query($conn,"INSERT INTO `data_siswa` VALUE('$nisn','$nis','$nama','$kelas','$alamat','$no_telpon','$spp') ");
 header("location:../data_siswa.php")
?>
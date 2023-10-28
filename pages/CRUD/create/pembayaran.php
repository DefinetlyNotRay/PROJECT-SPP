<?php 
 require("../../../connection.php");
 $id_akun = $_POST["id_akun"];
 $nisn = $_POST["nisn"];
 $tgl_bayar = $_POST["tgl_bayar"];
 $bulan_dibayar = $_POST["bulan_dibayar"];
 $tahun_dibayar = $_POST["tahun_dibayar"];
 $id_spp = $_POST["id_spp"];
 $jumlah_bayar = $_POST["jumlah_bayar"];
 $query = mysqli_query($conn,"SELECT * FROM `data_siswa` WHERE nisn = $nisn");
 $row = mysqli_fetch_array($query);
 $id_akun_siswa = $row["id_akun"];

 mysqli_query($conn,"INSERT INTO `data_pembayaran` VALUE(NULL,$id_akun,'$nisn','$tgl_bayar','$bulan_dibayar','$tahun_dibayar',$id_spp,$jumlah_bayar,$id_akun_siswa) ");
 header("location:../data_pembayaran.php")
?>
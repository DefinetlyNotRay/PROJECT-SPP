<?php 
 require("../../../../connection.php");
 $id_akun = $_POST["id_akun"];
 $nisn = $_POST["nisn"];
 $tgl_bayar = $_POST["tgl_bayar"];
 $bulan_dibayar = $_POST["bulan_dibayar"];
 $tahun_dibayar = $_POST["tahun_dibayar"];
 $id_spp = $_POST["id_spp"];
 $jumlah_bayar = $_POST["jumlah_bayar"];

 mysqli_query($conn,"INSERT INTO `data_pembayaran` VALUE(NULL,$id_akun,'$nisn','$tgl_bayar','$bulan_dibayar','$tahun_dibayar',$id_spp,$jumlah_bayar) ");
 header("location:../../../dashboard/petugas.php")
?>
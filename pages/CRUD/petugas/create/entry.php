<?php
require("../../../../connection.php");
$id_akun = $_POST["id_akun"];
$nisn = $_POST["nisn"];
$tgl_bayar = $_POST["tgl_bayar"];
$bulan_dibayar = $_POST["bulan_dibayar"];
$tahun_dibayar = $_POST["tahun_dibayar"];
$id_spp = $_POST["id_spp"];
$jumlah_bayar = $_POST["jumlah_bayar"];
$query = mysqli_query($conn, "SELECT * FROM `data_siswa` WHERE nisn = $nisn");
$row = mysqli_fetch_array($query);
$id_akun_siswa = $row["id_akun"];

$query = mysqli_query($conn, "SELECT * FROM `data_spp`");
$query2 = mysqli_query($conn, "SELECT * FROM `data_pembayaran`");

$row = mysqli_fetch_array($query2);
$row = mysqli_fetch_array($query);
$account_id = $row['id_spp'];
$nominal_spp = $row['nominal'];
$tahun_spp = $row['tahun'];
$months = [
    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
];

$key = array_search($bulan_dibayar, $months);
$checkQuery = mysqli_query($conn, "SELECT * FROM data_pembayaran WHERE nisn = '$nisn' AND tahun_dibayar = '$tahun_dibayar' AND bulan_dibayar = '$bulan_dibayar'");

if ($jumlah_bayar >= $nominal_spp) {
    $count = floor($jumlah_bayar / $nominal_spp);
    for ($i = 0; $i < $count; $i++) {
        if ($key !== false && isset($months[$key])) {
            $Nextbulan_dibayar = $months[$key];
            $jumlah_bayar = $jumlah_bayar - $nominal_spp;
            mysqli_query($conn, "INSERT INTO `data_pembayaran` VALUE(NULL,$id_akun,'$nisn','$tgl_bayar','$Nextbulan_dibayar','$tahun_dibayar',$id_spp,$nominal_spp,$id_akun_siswa) ");
            $key++;
        } else {
            $Nextbulan_dibayar = 'Januari';
            $tahun_dibayar++;
            mysqli_query($conn, "INSERT INTO `data_pembayaran` VALUE(NULL,$id_akun,'$nisn','$tgl_bayar','$Nextbulan_dibayar','$tahun_dibayar',$id_spp,$nominal_spp,$id_akun_siswa) ");
        }
    }
    header("Location: ../kwitansi.php?nisn=$nisn&bulan_dibayar=$Nextbulan_dibayar&tahun_dibayar=$tahun_dibayar&jumlah_bayar=$jumlah_bayar&tgl_bayar=$tgl_bayar");
} else {
    mysqli_query($conn, "INSERT INTO `data_pembayaran` VALUE(NULL,$id_akun,'$nisn','$tgl_bayar','$bulan_dibayar','$tahun_dibayar',$id_spp,$jumlah_bayar,$id_akun_siswa) ");
    header("Location: ../kwitansi.php?nisn=$nisn&bulan_dibayar=$bulan_dibayar&tahun_dibayar=$tahun_dibayar&jumlah_bayar=$jumlah_bayar&tgl_bayar=$tgl_bayar");
};
?>

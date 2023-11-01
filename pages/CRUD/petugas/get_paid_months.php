<?php
// Membutuhkan file koneksi
require("../../../connection.php");

$nisn = $_GET['nisn'];
$tahun = $_GET['tahun'];

// Melakukan kueri ke database untuk mendapatkan daftar bulan yang sudah dibayar untuk NISN dan tahun tertentu
$query = mysqli_query($conn, "SELECT DISTINCT bulan_dibayar FROM data_pembayaran WHERE nisn = '$nisn' AND tahun_dibayar = '$tahun'");
$bulan_terbayar = [];

while ($row = mysqli_fetch_array($query)) {
    $bulan_terbayar[] = $row['bulan_dibayar'];
}

echo json_encode($bulan_terbayar);
?>

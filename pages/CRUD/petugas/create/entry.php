<?php
// Memasukkan file koneksi
require("../../../../connection.php");

// Mengambil nilai dari permintaan POST
$id_akun = $_POST["id_akun"];
$nisn = $_POST["nisn"];
$tgl_bayar = $_POST["tgl_bayar"];
$bulan_dibayar = $_POST["bulan_dibayar"];
$tahun_dibayar = $_POST["tahun_dibayar"];
$id_spp = $_POST["id_spp"];
$jumlah_bayar = $_POST["jumlah_bayar"];

// Permintaan untuk mendapatkan data siswa dengan nisn yang sesuai
$query = mysqli_query($conn, "SELECT * FROM `data_siswa` WHERE nisn = $nisn");
$row = mysqli_fetch_array($query);
$id_akun_siswa = $row["id_akun"];

// Mengambil data dari tabel data_spp dan data_pembayaran
$query = mysqli_query($conn, "SELECT * FROM `data_spp`");
$query2 = mysqli_query($conn, "SELECT * FROM `data_pembayaran`");

$row = mysqli_fetch_array($query2);
$row = mysqli_fetch_array($query);

$account_id = $row['id_spp'];
$nominal_spp = $row['nominal'];
$tahun_spp = $row['tahun'];

$bulan = [
    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
];

$kunci = array_search($bulan_dibayar, $bulan);

// Memeriksa apakah catatan pembayaran sudah ada untuk nisn, tahun, dan bulan yang sama
$cekQuery = mysqli_query($conn, "SELECT * FROM data_pembayaran WHERE nisn = '$nisn' AND tahun_dibayar = '$tahun_dibayar' AND bulan_dibayar = '$bulan_dibayar'");

if ($jumlah_bayar >= $nominal_spp) {
    // Menghitung berapa bulan yang dapat dibayarkan dengan jumlah yang diberikan
    $hitung = floor($jumlah_bayar / $nominal_spp);

    for ($i = 0; $i < $hitung; $i++) {
        if ($kunci !== false && isset($bulan[$kunci])) {
            $bulan_dibayar_selanjutnya = $bulan[$kunci];
            $jumlah_bayar = $jumlah_bayar - $nominal_spp;
            // Memasukkan catatan pembayaran ke dalam data_pembayaran
            mysqli_query($conn, "INSERT INTO `data_pembayaran` VALUE(NULL,$id_akun,'$nisn','$tgl_bayar','$bulan_dibayar_selanjutnya','$tahun_dibayar',$id_spp,$nominal_spp,$id_akun_siswa) ");
            $kunci++;
        } else {
            $bulan_dibayar_selanjutnya = 'Januari';
            $tahun_dibayar++;
            // Memasukkan catatan pembayaran ke dalam data_pembayaran untuk tahun berikutnya
            mysqli_query($conn, "INSERT INTO `data_pembayaran` VALUE(NULL,$id_akun,'$nisn','$tgl_bayar','$bulan_dibayar_selanjutnya','$tahun_dibayar',$id_spp,$nominal_spp,$id_akun_siswa) ");
        }
    }
    // Mengalihkan ke kwitansi.php dengan parameter yang relevan di URL untuk proses atau tampilan selanjutnya
    header("Location: ../kwitansi.php?nisn=$nisn&bulan_dibayar=$bulan_dibayar_selanjutnya&tahun_dibayar=$tahun_dibayar&jumlah_bayar=$jumlah_bayar&tgl_bayar=$tgl_bayar");
} else {
    // Jika pembayaran kurang dari jumlah nominal, masukkan satu catatan pembayaran saja
    mysqli_query($conn, "INSERT INTO `data_pembayaran` VALUE(NULL,$id_akun,'$nisn','$tgl_bayar','$bulan_dibayar','$tahun_dibayar',$id_spp,$jumlah_bayar,$id_akun_siswa) ");
    // Mengalihkan ke kwitansi.php dengan parameter yang relevan di URL untuk proses atau tampilan selanjutnya
    header("Location: ../kwitansi.php?nisn=$nisn&bulan_dibayar=$bulan_dibayar&tahun_dibayar=$tahun_dibayar&jumlah_bayar=$jumlah_bayar&tgl_bayar=$tgl_bayar");
};
?>

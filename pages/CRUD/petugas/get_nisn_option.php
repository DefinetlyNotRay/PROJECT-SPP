<?php
// Membutuhkan file koneksi
require("../../../connection.php");

// Mengambil nilai kelas dari parameter URL
$kelas = $_GET['kelas'];

// Melakukan kueri untuk mendapatkan data siswa dengan id_kelas yang sesuai
$query = mysqli_query($conn, "SELECT * FROM `data_siswa` WHERE id_kelas = '$kelas'");
$data = array();

// Mengambil data dan menyusunnya dalam bentuk array asosiatif
while ($row = mysqli_fetch_assoc($query)) {
    $data[] = array(
        'nisn' => $row['nisn']
    );
}

// Mengonversi data menjadi format JSON dan mencetaknya
echo json_encode($data);
?>

<?php
    // Membutuhkan file koneksi
    require("../../../connection.php");

    $id = $_GET["id"];

    // Menghitung jumlah total baris di kolom id_kelas
    $totalId = mysqli_query($conn, "SELECT COUNT(id_kelas) FROM data_kelas;");

    // Mendapatkan data yang terkait dengan kolom COUNT(id_kelas) 
    $totalRecords = mysqli_fetch_assoc($totalId)['COUNT(id_kelas)'];

    // Menghapus data dari tabel `data_kelas`
    $result = mysqli_query($conn, "DELETE FROM `data_kelas` WHERE id_kelas = '$id' ");  

    if($result){
        // Mengarahkan pengguna ke data_kelas.php dengan parameter success=deleted
        header("location:../data_kelas.php?success=deleted");
    } else {
        // Jika tidak berhasil, arahkan pengguna ke data_kelas.php dengan parameter success=false
        header("location:../data_kelas.php?success=false");
    }

    // Mengatur ulang nilai auto increment
    mysqli_query($conn, "ALTER TABLE `data_kelas` AUTO_INCREMENT = $totalRecords");
?>

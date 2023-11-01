<?php
    // Membutuhkan file koneksi
    require("../../../connection.php");

    $id = $_GET["id"];

    // Menghitung jumlah total baris di kolom id
    $totalId = mysqli_query($conn, "SELECT COUNT(id_akun) FROM data_akun;");

    // Mendapatkan data yang terkait dengan kolom COUNT(id) 
    $totalRecords = mysqli_fetch_assoc($totalId)['COUNT(id_akun)'];

    // Menghapus data dari tabel `data_akun`
    $result = mysqli_query($conn, "DELETE FROM `data_akun` WHERE id_akun = '$id' ");  

    if($result){
        // Mengarahkan pengguna ke data_akun.php dengan parameter success=deleted
        header("location:../data_akun.php?success=deleted");
    } else {
        // Jika tidak berhasil, arahkan pengguna ke data_akun.php dengan parameter success=false
        header("location:../data_akun.php?success=false");
    }

    // Mengatur ulang nilai auto increment
    mysqli_query($conn, "ALTER TABLE `data_akun` AUTO_INCREMENT = $totalRecords");

?>

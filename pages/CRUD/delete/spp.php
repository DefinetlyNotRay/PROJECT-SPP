<?php
    // Membutuhkan file koneksi
    require("../../../connection.php");

    $id = $_GET["id"];

    // Menghitung jumlah total baris di kolom id_spp
    $totalId = mysqli_query($conn, "SELECT COUNT(id_spp) FROM data_spp;");

    // Mendapatkan data yang terkait dengan kolom COUNT(id_spp) 
    $totalRecords = mysqli_fetch_assoc($totalId)['COUNT(id_spp)'];

    // Menghapus data dari tabel `data_spp`
    $result = mysqli_query($conn, "DELETE FROM `data_spp` WHERE id_spp = '$id' ");  

    if($result){
        // Mengarahkan pengguna ke data_spp.php dengan parameter success=deleted
        header("location:../data_spp.php?success=deleted");
    } else {
        // Jika tidak berhasil, arahkan pengguna ke data_spp.php dengan parameter success=false
        header("location:../data_spp.php?success=false");
    }

    // Mengatur ulang nilai auto increment
    mysqli_query($conn, "ALTER TABLE `data_spp` AUTO_INCREMENT = $totalRecords");
?>

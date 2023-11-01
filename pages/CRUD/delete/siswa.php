<?php
    // Membutuhkan file koneksi
    require("../../../connection.php");

    $id = $_GET["id"];

    // Menghitung jumlah total baris di kolom nisn
    $totalId = mysqli_query($conn, "SELECT COUNT(nisn) FROM data_siswa;");

    // Mendapatkan data yang terkait dengan kolom COUNT(nisn) 
    $totalRecords = mysqli_fetch_assoc($totalId)['COUNT(nisn)'];

    // Menghapus data dari tabel `data_siswa`
    $result =mysqli_query($conn, "DELETE FROM `data_siswa` WHERE nisn = '$id' ");  

    if($result){
        // Mengarahkan pengguna ke data_siswa.php dengan parameter success=deleted
        header("location:../data_siswa.php?success=deleted");
    } else {
        // Jika tidak berhasil, arahkan pengguna ke data_siswa.php dengan parameter success=false
        header("location:../data_siswa.php?success=false");
    }

    // Mengatur ulang nilai auto increment
    mysqli_query($conn, "ALTER TABLE `data_siswa` AUTO_INCREMENT = $totalRecords");

?>  

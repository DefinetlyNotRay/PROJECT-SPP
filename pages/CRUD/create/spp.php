<?php 
    // Membutuhkan file koneksi
    require("../../../connection.php");

    // Mengambil nilai tahun dan nominal dari formulir POST
    $tahun = $_POST["tahun"];
    $nominal = $_POST["nominal"];

    // Memasukkan data tahun dan nominal ke tabel `data_spp`
    mysqli_query($conn, "INSERT INTO `data_spp`(tahun,nominal) VALUE('$tahun','$nominal')");

    // Memeriksa apakah kueri berhasil atau tidak
    if( mysqli_query($conn, "INSERT INTO `data_spp`(tahun,nominal) VALUE('$tahun','$nominal')")){
        // Jika berhasil, arahkan pengguna ke data_spp.php dengan parameter success=true
        header("location:../data_spp.php?success=true");
    } else {
        // Jika tidak berhasil, arahkan pengguna ke data_spp.php dengan parameter success=false
        header("location:../data_spp.php?success=false");
    }
?>

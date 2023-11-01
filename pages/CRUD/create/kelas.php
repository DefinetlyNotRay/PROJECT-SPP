<?php 
    // Membutuhkan file koneksi
    require("../../../connection.php");

    // Mengambil nilai dari formulir POST seperti kelas dan kompetensi_keahlian
    $kelas = $_POST["kelas"];
    $kompetensi_keahlian = $_POST["kompetensi_keahlian"];

    // Memasukkan data kelas ke tabel `data_kelas`
    mysqli_query($conn, "INSERT INTO `data_kelas`(nama_kelas,kompetensi_keahlian) VALUE('$kelas','$kompetensi_keahlian')");

    // Memeriksa apakah kueri berhasil atau tidak
    if(mysqli_query($conn, "INSERT INTO `data_kelas`(nama_kelas,kompetensi_keahlian) VALUE('$kelas','$kompetensi_keahlian')")){
        // Jika berhasil, arahkan pengguna ke data_kelas.php dengan parameter success=true
        header("location:../data_kelas.php?success=true") ;
    } else {
        // Jika tidak berhasil, arahkan pengguna ke data_kelas.php dengan parameter success=false
        header("location:../data_kelas.php?success=false") ;
    }
    
?>

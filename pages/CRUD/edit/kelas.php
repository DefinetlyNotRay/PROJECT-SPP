<?php 
    // Membutuhkan file koneksi
    require("../../../connection.php");

    // Mengambil data dari permintaan POST
    $id = $_POST["id"];
    $nama_kelas = $_POST["nama_kelas"];
    $kompetensi_keahlian = $_POST["kompetensi_keahlian"];

    // Melakukan pembaruan pada tabel `data_kelas` dengan menggunakan kueri UPDATE
    $result = mysqli_query($conn, "UPDATE `data_kelas` set nama_kelas='$nama_kelas', kompetensi_keahlian='$kompetensi_keahlian' WHERE id_kelas = $id");
    
    // Memeriksa apakah pembaruan berhasil atau tidak
    if($result){
        // Jika berhasil, arahkan kembali ke halaman data_kelas.php dengan parameter success=edited
        header("location:../data_kelas.php?success=edited");
    } else {
        // Jika tidak berhasil, arahkan kembali ke halaman data_kelas.php dengan parameter success=false
        header("location:../data_kelas.php?success=false");
    }
?>

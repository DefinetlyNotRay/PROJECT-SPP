<?php 
    // Membutuhkan file koneksi
    require("../../../connection.php");

    // Mengambil data dari permintaan POST
    $id = $_POST['id'];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nama = $_POST["nama"];
    $level = $_POST["level"];

    // Melakukan pembaruan pada tabel `data_akun` dengan menggunakan kueri UPDATE
    $result = mysqli_query($conn,"UPDATE `data_akun` set username='$username', password='$password', nama='$nama', level='$level' where id_akun='$id'");
    
    // Memeriksa apakah pembaruan berhasil atau tidak
    if($result){
        // Jika berhasil, arahkan kembali ke halaman data_akun.php dengan parameter success=edited
        header("location:../data_akun.php?success=edited");
    } else {
        // Jika tidak berhasil, arahkan kembali ke halaman data_akun.php dengan parameter success=false
        header("location:../data_akun.php?success=false");
    }
?>

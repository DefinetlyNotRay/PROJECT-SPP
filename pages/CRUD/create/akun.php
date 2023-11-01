<?php 
    // Membutuhkan file koneksi
    require("../../../connection.php");

    // Mengambil nilai dari formulir POST
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nama = $_POST["nama"];
    $level = $_POST["level"];

    // Memasukkan data akun ke tabel `data_akun`
    mysqli_query($conn, "INSERT INTO `data_akun`(username, password, nama, level) VALUE('$username','$password','$nama','$level')");

    // Memeriksa apakah kueri berhasil atau tidak
    if(mysqli_query($conn, "INSERT INTO `data_akun`(username, password, nama, level) VALUE('$username','$password','$nama','$level')")) {
        // Jika berhasil, arahkan pengguna ke data_akun.php dengan parameter success=true
        header("location:../data_akun.php?success=true");
    } else {
        // Jika tidak berhasil, arahkan pengguna ke data_akun.php dengan parameter success=false
        header("location:../data_akun.php?success=false");
    }
?>

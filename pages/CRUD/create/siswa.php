<?php 
    // Membutuhkan file koneksi
    require("../../../connection.php");

    // Mengambil nilai dari formulir POST seperti nisn, nis, nama, id_kelas, alamat, no_telpon, spp, dan akun
    $nisn = $_POST["nisn"];
    $nis = $_POST["nis"];
    $nama = $_POST["nama"];
    $kelas = $_POST["id_kelas"];
    $alamat = $_POST["alamat"];
    $no_telpon = $_POST["no_telpon"];
    $spp = $_POST["spp"];
    $id_akun = $_POST["akun"];

    // Memasukkan data siswa ke tabel `data_siswa`
    $result = mysqli_query($conn,"INSERT INTO `data_siswa` VALUE('$nisn','$nis','$nama','$kelas','$alamat','$no_telpon','$spp','$id_akun') ");

    // Memeriksa apakah kueri berhasil atau tidak
    if($result){
        // Jika berhasil, arahkan pengguna ke data_siswa.php dengan parameter success=true
        header("location:../data_siswa.php?success=true");
    } else {
        // Jika tidak berhasil, arahkan pengguna ke data_siswa.php dengan parameter success=false
        header("location:../data_siswa.php?success=false");
    }
?>

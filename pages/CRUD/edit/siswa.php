<?php 
    // Membutuhkan file koneksi
    require("../../../connection.php");

    // Mengambil data dari permintaan POST
    $id = $_POST["id"];
    $nisn = $_POST["nisn"];
    $nis = $_POST["nis"];
    $nama = $_POST["nama"];
    $kelas = $_POST["kelas"];
    $alamat = $_POST["alamat"];
    $no_telpon = $_POST["no_telp"];
    $id_spp = $_POST["id_spp"];
   

    // Melakukan pembaruan pada tabel `data_siswa` dengan menggunakan kueri UPDATE
    $result = mysqli_query($conn,"UPDATE `data_siswa` set nisn='$nisn', nis='$nis', nama='$nama', id_kelas='$kelas', alamat='$alamat', no_telp='$no_telpon', id_spp ='$id_spp' where nisn='$id'");
    
    // Memeriksa apakah pembaruan berhasil atau tidak
    if($result){
        // Jika berhasil, arahkan kembali ke halaman data_siswa.php dengan parameter success=edited
        header("location:../data_siswa.php?success=edited");
    } else {
        // Jika tidak berhasil, arahkan kembali ke halaman data_siswa.php dengan parameter success=false
        header("location:../data_siswa.php?success=false");
    }
?>

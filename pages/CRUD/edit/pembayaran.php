<?php 
    // Membutuhkan file koneksi
    require("../../../connection.php");

    // Mengambil data dari permintaan POST
    $id = $_POST["id"];
    $id_akun = $_POST["id_akun"];
    $nisn = $_POST["nisn"];
    $tgl_bayar = $_POST["tgl_bayar"];
    $bulan_dibayar = $_POST["bulan_dibayar"];
    $tahun_dibayar = $_POST["tahun_dibayar"];
    $id_spp = $_POST["id_spp"];
    $jumlah_bayar = $_POST["jumlah_bayar"];
   

    // Melakukan pembaruan pada tabel `data_pembayaran` dengan menggunakan kueri UPDATE
    $result = mysqli_query($conn,"UPDATE `data_pembayaran` set id_akun='$id_akun', nisn='$nisn', tgl_bayar='$tgl_bayar', bulan_dibayar='$bulan_dibayar', tahun_dibayar='$tahun_dibayar', id_spp='$id_spp', jumlah_bayar ='$jumlah_bayar' where id_pembayaran='$id'");
    
    // Memeriksa apakah pembaruan berhasil atau tidak
    if($result){
        // Jika berhasil, arahkan kembali ke halaman data_pembayaran.php dengan parameter success=edited
        header("location:../data_pembayaran.php?success=edited");
    } else {
        // Jika tidak berhasil, arahkan kembali ke halaman data_pembayaran.php dengan parameter success=false
        header("location:../data_pembayaran.php?success=false");
    }
?>

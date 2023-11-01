<?php 
    // Membutuhkan file koneksi
    require("../../../connection.php");

    // Mengambil nilai dari formulir POST
    $id_akun = $_POST["id_akun"];
    $nisn = $_POST["nisn"];
    $tgl_bayar = $_POST["tgl_bayar"];
    $bulan_dibayar = $_POST["bulan_dibayar"];
    $tahun_dibayar = $_POST["tahun_dibayar"];
    $id_spp = $_POST["id_spp"];
    $jumlah_bayar = $_POST["jumlah_bayar"];

    // Mengambil data siswa berdasarkan NISN
    $query = mysqli_query($conn,"SELECT * FROM `data_siswa` WHERE nisn = $nisn");
    $row = mysqli_fetch_array($query);
    $id_akun_siswa = $row["id_akun"];

    // Mengambil data spp
    $query = mysqli_query($conn,"SELECT * FROM `data_spp`");
    $query2 = mysqli_query($conn,"SELECT * FROM `data_pembayaran`");

    $row = mysqli_fetch_array($query2);
    $row = mysqli_fetch_array($query);
    $account_id = $row['id_spp'];
    $nominal_spp = $row['nominal'];
    $tahun_spp = $row['tahun'];

    // Daftar nama bulan
    $months = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    // Mencari index dari bulan yang dibayar
    $key = array_search($bulan_dibayar, $months);

    // Memeriksa apakah pembayaran sudah pernah dilakukan untuk bulan dan tahun yang sama
    $checkQuery = mysqli_query($conn, "SELECT * FROM data_pembayaran WHERE nisn = '$nisn' AND tahun_dibayar = '$tahun_dibayar' AND bulan_dibayar = '$bulan_dibayar'");

    if($jumlah_bayar == $nominal_spp*2){
        if ($key !== false && isset($months[$key + 1]) && mysqli_num_rows($checkQuery) == 0) {
            // Jika ada bulan berikutnya, set bulan_dibayar ke bulan berikutnya
            $Nextbulan_dibayar = $months[$key + 1];
            $Newjumlah_bayar = $jumlah_bayar - $nominal_spp;
            mysqli_query($conn,"INSERT INTO `data_pembayaran` VALUE(NULL,$id_akun,'$nisn','$tgl_bayar','$bulan_dibayar','$tahun_dibayar',$id_spp,$Newjumlah_bayar,$id_akun_siswa) ");
            mysqli_query($conn,"INSERT INTO `data_pembayaran` VALUE(NULL,$id_akun,'$nisn','$tgl_bayar','$Nextbulan_dibayar','$tahun_dibayar',$id_spp,$Newjumlah_bayar,$id_akun_siswa) ");
        
        } else {
            // Jika sudah bulan Desember, set bulan_dibayar ke Januari tahun depan
            $Nextbulan_dibayar = 'Januari';
            $tahun_dibayar++;
            $Nextbulan_dibayar = $months[$key + 1];
            $Newjumlah_bayar = $jumlah_bayar - $nominal_spp;

            mysqli_query($conn,"INSERT INTO `data_pembayaran` VALUE(NULL,$id_akun,'$nisn','$tgl_bayar','$bulan_dibayar','$tahun_dibayar',$id_spp,$Newjumlah_bayar,$id_akun_siswa) ");
            mysqli_query($conn,"INSERT INTO `data_pembayaran` VALUE(NULL,$id_akun,'$nisn','$tgl_bayar','$Nextbulan_dibayar','$tahun_dibayar',$id_spp,$Newjumlah_bayar,$id_akun_siswa) ");
        
        }
      
    } else {
        // Jika jumlah bayar tidak dua kali lipat dari nominal spp, lakukan pembayaran normal
        mysqli_query($conn,"INSERT INTO `data_pembayaran` VALUE(NULL,$id_akun,'$nisn','$tgl_bayar','$bulan_dibayar','$tahun_dibayar',$id_spp,$jumlah_bayar,$id_akun_siswa) ");
    }

    // Mengarahkan pengguna kembali ke halaman data_pembayaran.php dengan parameter success=true
    header("location:../data_pembayaran.php?success=true");
?>

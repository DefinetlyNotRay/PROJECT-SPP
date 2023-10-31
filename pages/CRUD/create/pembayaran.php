<?php 
 require("../../../connection.php");
 $id_akun = $_POST["id_akun"];
 $nisn = $_POST["nisn"];
 $tgl_bayar = $_POST["tgl_bayar"];
 $bulan_dibayar = $_POST["bulan_dibayar"];
 $tahun_dibayar = $_POST["tahun_dibayar"];
 $id_spp = $_POST["id_spp"];
 $jumlah_bayar = $_POST["jumlah_bayar"];
 $query = mysqli_query($conn,"SELECT * FROM `data_siswa` WHERE nisn = $nisn");
 $row = mysqli_fetch_array($query);
 $id_akun_siswa = $row["id_akun"];


 $query = mysqli_query($conn,"SELECT * FROM `data_spp`");
 $query2 = mysqli_query($conn,"SELECT * FROM `data_pembayaran`");

$row = mysqli_fetch_array($query2);
$row = mysqli_fetch_array($query);
    $account_id = $row['id_spp'];
    $nominal_spp = $row['nominal'];
    $tahun_spp = $row['tahun'];
    $months = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

$key = array_search($bulan_dibayar, $months);
$checkQuery = mysqli_query($conn, "SELECT * FROM data_pembayaran WHERE nisn = '$nisn' AND tahun_dibayar = '$tahun_dibayar' AND bulan_dibayar = '$bulan_dibayar'");

if($jumlah_bayar == $nominal_spp*2){
    if ($key !== false && isset($months[$key + 1]) && mysqli_num_rows($checkQuery) == 0) {
        // If there is a next month, set bulan_dibayar to the next month
        $Nextbulan_dibayar = $months[$key + 1];
        $Newjumlah_bayar = $jumlah_bayar - $nominal_spp;
        mysqli_query($conn,"INSERT INTO `data_pembayaran` VALUE(NULL,$id_akun,'$nisn','$tgl_bayar','$bulan_dibayar','$tahun_dibayar',$id_spp,$Newjumlah_bayar,$id_akun_siswa) ");
        mysqli_query($conn,"INSERT INTO `data_pembayaran` VALUE(NULL,$id_akun,'$nisn','$tgl_bayar','$Nextbulan_dibayar','$tahun_dibayar',$id_spp,$Newjumlah_bayar,$id_akun_siswa) ");
    
    } else {
        // If it's December, set bulan_dibayar to Januari of the next year
        $Nextbulan_dibayar = 'Januari';
        $tahun_dibayar++;
        $Nextbulan_dibayar = $months[$key + 1];
        $Newjumlah_bayar = $jumlah_bayar - $nominal_spp;

        mysqli_query($conn,"INSERT INTO `data_pembayaran` VALUE(NULL,$id_akun,'$nisn','$tgl_bayar','$bulan_dibayar','$tahun_dibayar',$id_spp,$Newjumlah_bayar,$id_akun_siswa) ");
        mysqli_query($conn,"INSERT INTO `data_pembayaran` VALUE(NULL,$id_akun,'$nisn','$tgl_bayar','$Nextbulan_dibayar','$tahun_dibayar',$id_spp,$Newjumlah_bayar,$id_akun_siswa) ");
    
    }
  
} else{
    mysqli_query($conn,"INSERT INTO `data_pembayaran` VALUE(NULL,$id_akun,'$nisn','$tgl_bayar','$bulan_dibayar','$tahun_dibayar',$id_spp,$jumlah_bayar,$id_akun_siswa) ");

};

 
 header("location:../data_pembayaran?success=true.php")
?>
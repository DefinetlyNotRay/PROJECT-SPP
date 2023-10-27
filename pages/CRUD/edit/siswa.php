<?php 
    require("../../../connection.php");

    $id = $_POST["id"];
    $nisn = $_POST["nisn"];
    $nis = $_POST["nis"];
    $nama = $_POST["nama"];
    $kelas = $_POST["kelas"];
    $alamat = $_POST["alamat"];
    $no_telpon = $_POST["no_telp"];
    $id_spp = $_POST["id_spp"];
   

    mysqli_query($conn,"UPDATE `data_siswa` set nisn='$nisn',nis='$nis', nama='$nama',id_kelas='$kelas',alamat='$alamat',no_telp='$no_telpon',id_spp ='$id_spp' where nisn='$id'");

    header("location:../data_siswa.php")
    ?>
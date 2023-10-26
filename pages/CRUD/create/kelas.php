<?php 
    require("../../../connection.php");
    $kelas = $_POST["kelas"];
    $kompetensi_keahlian = $_POST["kompetensi_keahlian"];

    mysqli_query($conn, "INSERT INTO `data_kelas`(nama_kelas,kompetensi_keahlian) VALUE('$kelas','$kompetensi_keahlian')");

    header("location:../data_kelas.php") ;
?>
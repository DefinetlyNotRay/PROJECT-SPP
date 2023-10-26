<?php 
    require("../../../connection.php");
    $tahun = $_POST["tahun"];
    $nominal = $_POST["nominal"];

    mysqli_query($conn, "INSERT INTO `data_spp`(tahun,nominal) VALUE('$tahun','$nominal')");

    header("location:../data_spp.php") ;
?>
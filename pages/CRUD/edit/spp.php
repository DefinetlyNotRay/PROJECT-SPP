<?php 
    require("../../../connection.php");
    $id = $_POST["id"];
    $tahun = $_POST["tahun"];
    $nominal = $_POST["nominal"];

    mysqli_query($conn, "UPDATE `data_spp` set tahun='$tahun', nominal='$nominal' WHERE id_spp = $id");

    header("location:../data_spp.php") ;
?>
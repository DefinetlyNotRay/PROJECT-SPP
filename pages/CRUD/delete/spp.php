<?php
    require("../../../connection.php");

    $id = $_GET["id"];

    // counts the total rows in the column id
    $totalId = mysqli_query($conn, "SELECT COUNT(id_spp) FROM data_spp;");

    // gets the data associated with COUNT(id) column
    $totalRecords = mysqli_fetch_assoc($totalId)['COUNT(id_spp)'];

    mysqli_query($conn, "DELETE FROM `data_spp` WHERE id_spp = '$id' ");  

    // Reset auto increment value
    mysqli_query($conn, "ALTER TABLE `data_spp` AUTO_INCREMENT = $totalRecords");


    // redericts to the data_spp.php
    header("location:../data_spp.php");
?>  
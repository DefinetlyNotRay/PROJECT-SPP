<?php
    require("../../../connection.php");

    $id = $_GET["id"];

    // counts the total rows in the column id
    $totalId = mysqli_query($conn, "SELECT COUNT(id_kelas) FROM data_kelas;");

    // gets the data associated with COUNT(id) column
    $totalRecords = mysqli_fetch_assoc($totalId)['COUNT(id_kelas)'];

    $result = mysqli_query($conn, "DELETE FROM `data_kelas` WHERE id_kelas = '$id' ");  
    if($result){
        // redericts to the data_kelas.php?success=deleted
        header("location:../data_kelas.php?success=deleted");
    }else{
        header("location:../data_kelas.php?success=false");
    }
    // Reset auto increment value
    mysqli_query($conn, "ALTER TABLE `data_kelas` AUTO_INCREMENT = $totalRecords");


    // redericts to the data_kelas.php
?>  
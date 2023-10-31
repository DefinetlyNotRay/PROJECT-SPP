<?php
    require("../../../connection.php");

    $id = $_GET["id"];

    // counts the total rows in the column id
    $totalId = mysqli_query($conn, "SELECT COUNT(id_akun) FROM data_akun;");

    // gets the data associated with COUNT(id) column
    $totalRecords = mysqli_fetch_assoc($totalId)['COUNT(id_akun)'];

    $result = mysqli_query($conn, "DELETE FROM `data_akun` WHERE id_akun = '$id' ");  
    if($result){
        // redericts to the data_akun.php?success=deleted
        header("location:../data_akun.php?success=deleted");
    }else{
        header("location:../data_akun.php?success=false");
    }
    // Reset auto increment value
    mysqli_query($conn, "ALTER TABLE `data_akun` AUTO_INCREMENT = $totalRecords");
    

    // redericts to the data_akun.php
?>  
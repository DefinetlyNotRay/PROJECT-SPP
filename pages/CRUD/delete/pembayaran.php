<?php
    require("../../../connection.php");

    $id = $_GET["id"];

    // counts the total rows in the column id
    $totalId = mysqli_query($conn, "SELECT COUNT(id_pembayaran) FROM data_pembayaran;");

    // gets the data associated with COUNT(id) column
    $totalRecords = mysqli_fetch_assoc($totalId)['COUNT(id_pembayaran)'];

    $result =mysqli_query($conn, "DELETE FROM `data_pembayaran` WHERE id_pembayaran = '$id' ");  
    if($result){
        header("location:../data_pembayaran.php?success=deleted");
    }else{
        header("location:../data_pembayaran.php?success=false");

    }
    // Reset auto increment value
    mysqli_query($conn, "ALTER TABLE `data_pembayaran` AUTO_INCREMENT = $totalRecords");
    

    // redericts to the data_pembayaran.php
    
?>  
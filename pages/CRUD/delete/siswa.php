<?php
    require("../../../connection.php");

    $id = $_GET["id"];

    // counts the total rows in the column id
    $totalId = mysqli_query($conn, "SELECT COUNT(nisn) FROM data_siswa;");

    // gets the data associated with COUNT(id) column
    $totalRecords = mysqli_fetch_assoc($totalId)['COUNT(nisn)'];

    $result =mysqli_query($conn, "DELETE FROM `data_siswa` WHERE nisn = '$id' ");  
    if($result){
        header("location:../data_siswa.php?success=deleted");
    }else{
        header("location:../data_siswa.php?success=false");
    }
    // Reset auto increment value
    mysqli_query($conn, "ALTER TABLE `data_siswa` AUTO_INCREMENT = $totalRecords");


    // redericts to the data_siswa.php
   
?>  
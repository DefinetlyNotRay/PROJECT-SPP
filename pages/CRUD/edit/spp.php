<?php 
    require("../../../connection.php");
    $id = $_POST["id"];
    $tahun = $_POST["tahun"];
    $nominal = $_POST["nominal"];

   $result= mysqli_query($conn, "UPDATE `data_spp` set tahun='$tahun', nominal='$nominal' WHERE id_spp = $id");
    if($result){
        header("location:../data_spp.php?success=edited");
    }else{
        header("location:../data_spp.php?success=false");
    }
?>
<?php 
    // Membutuhkan file koneksi
    require("../../../connection.php");

    // Mendapatkan data yang di send
    $id = $_POST["id"];
    $tahun = $_POST["tahun"];
    $nominal = $_POST["nominal"];

    $result = mysqli_query($conn, "UPDATE `data_spp` set tahun='$tahun', nominal='$nominal' WHERE id_spp = $id");
    

    // mengecheck berhasil atau tidak
    if($result){
        header("location:../data_spp.php?success=edited");
    }else{
        header("location:../data_spp.php?success=false");
    }
?>

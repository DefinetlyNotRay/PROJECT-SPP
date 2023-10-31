<?php 
    require("../../../connection.php");
    $id = $_POST["id"];
    $nama_kelas = $_POST["nama_kelas"];
    $kompetensi_keahlian = $_POST["kompetensi_keahlian"];

    $result= mysqli_query($conn, "UPDATE `data_kelas` set nama_kelas='$nama_kelas',kompetensi_keahlian='$kompetensi_keahlian' WHERE id_kelas = $id");
    if($result){
        header("location:../data_kelas.php?success=edited");
    }else{
        header("location:../data_kelas.php?success=false");
    }
?>
<?php 
    require("../../../connection.php");

    $id = $_POST['id'];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nama = $_POST["nama"];
    $level = $_POST["level"];

    $result = mysqli_query($conn,"UPDATE `data_akun` set username='$username', password='$password', nama='$nama',level='$level' where id_akun='$id'");
    if($result){
        header("location:../data_akun.php?success=edited");
    }else{
        header("location:../data_akun.php?success=false");
    }
?>
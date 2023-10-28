<?php 
    require("../../../connection.php");

    $id = $_POST['id'];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nama = $_POST["nama"];
    $level = $_POST["level"];

    mysqli_query($conn,"UPDATE `data_akun` set username='$username', password='$password', nama='$nama',level='$level' where id_akun='$id'");

    header("location:../data_akun.php")
?>
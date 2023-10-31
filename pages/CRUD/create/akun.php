<?php 
    require("../../../connection.php");
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nama = $_POST["nama"];
    $level = $_POST["level"];

    mysqli_query($conn, "INSERT INTO `data_akun`(username, password, nama, level) VALUE('$username','$password','$nama','$level')");

    if(mysqli_query($conn, "INSERT INTO `data_akun`(username, password, nama, level) VALUE('$username','$password','$nama','$level')")) {
        header("location:../data_akun.php?success=true");
    } else {
        header("location:../data_akun.php?success=false");
    }
?>
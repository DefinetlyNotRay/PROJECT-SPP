<?php 
require("../connection.php");   
session_start();

$username = $_POST["username"];
$password = $_POST["password"];

$statement = $conn->prepare("SELECT * FROM data_akun WHERE username=? AND password=?");
$statement->bind_param("ss", $username, $password);
$statement->execute();
$result = $statement->get_result();

if ($row = $result->fetch_assoc()) {
        $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";

        if ($row['level'] == 'admin') {
        header("location:../pages/dashboard/index.php");
    } else if ($row['level'] == 'petugas') {
        header("location:../pages/dashboard/petugas.php");
    } else if($row['level'] == 'siswa'){
        header("location:../pages/dashboard/siswa.php");
    }
} else {
    // If no match is found, redirect back to index.php with a message
    header("location:../pages/index.php?msg=failed");
}

$statement->close();
$conn->close();
?>

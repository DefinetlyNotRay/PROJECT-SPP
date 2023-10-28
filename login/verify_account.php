<?php 
require("../connection.php");   
session_start();

$username = $_POST["username"];
$password = $_POST["password"];

$statement = $conn->prepare("SELECT * FROM data_akun WHERE username=? AND password=?");
$statement->bind_param("ss", $username, $password);
$statement->execute();
$result = $statement->get_result();


// ... (previous code)

if ($row = $result->fetch_assoc()) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";

    $id_akun = $row['id_akun']; // Assuming id_akun is in data_akun table

    $query = mysqli_query($conn, "SELECT * FROM `data_siswa` WHERE id_akun = $id_akun");
    $ex = mysqli_fetch_array($query);

    if ($row['level'] == 'admin') {
        $_SESSION["level"] = "admin";
        header("location:../pages/dashboard/index.php");
    } else if ($row['level'] == 'petugas') {
        $_SESSION["level"] = "petugas";
        header("location:../pages/dashboard/petugas.php");
    } else if($row['level'] == 'siswa'){
        $_SESSION["level"] = "siswa";
        $_SESSION["akun"] = $ex["id_akun"];
        header("location:../pages/dashboard/siswa.php");
    }
} else {
    // If no match is found, redirect back to index.php with a message
    header("location:../pages/index.php?msg=failed");
}

// ...


$statement->close();
$conn->close();
?>

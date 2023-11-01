<?php
// Memasukkan file koneksi
require("../connection.php");

// Memulai sesi
session_start();

// Mengambil data dari formulir POST
$username = $_POST["username"];
$password = $_POST["password"];

// Memasang pernyataan SQL untuk mengambil data akun
$statement = $conn->prepare("SELECT * FROM data_akun WHERE username=? AND password=?");
$statement->bind_param("ss", $username, $password);
$statement->execute();
$result = $statement->get_result();

// Memeriksa hasil query untuk mencocokkan akun
if ($row = $result->fetch_assoc()) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";

    $id_akun = $row['id_akun']; // Mengasumsikan id_akun ada di tabel data_akun

    // Mengambil data siswa berdasarkan id_akun
    $query = mysqli_query($conn, "SELECT * FROM `data_siswa` WHERE id_akun = $id_akun");
    $ex = mysqli_fetch_array($query);

    // Memeriksa level akun dan mengarahkan ke halaman yang sesuai
    if ($row['level'] == 'admin') {
        $_SESSION["level"] = "admin";
        header("location:../pages/dashboard/index.php?login=success");
    } else if ($row['level'] == 'petugas') {
        $_SESSION["level"] = "petugas";
        header("location:../pages/dashboard/petugas.php?login=success");
    } else if($row['level'] == 'siswa'){
        $_SESSION["level"] = "siswa";
        $_SESSION["akun"] = $ex["id_akun"];
        header("location:../pages/dashboard/siswa.php?login=success");
    }
} else {
    // Jika tidak ada kecocokan ditemukan, redirect kembali ke index.php dengan pesan
    header("location:../pages/index.php?msg=failed");
}

// Menutup pernyataan dan koneksi database
$statement->close();
$conn->close();
?>

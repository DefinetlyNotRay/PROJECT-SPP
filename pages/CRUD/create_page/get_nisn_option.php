<?php
require("../../../connection.php");

$kelas = $_GET['kelas'];

$query = mysqli_query($conn, "SELECT * FROM `data_siswa` WHERE id_kelas = '$kelas'");
$data = array();

while ($row = mysqli_fetch_assoc($query)) {
    $data[] = array(
        'nisn' => $row['nisn']
    );
}

echo json_encode($data);
?>

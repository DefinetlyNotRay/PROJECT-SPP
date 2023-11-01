<?php
require("../../../connection.php");

$nisn = $_GET['nisn'];
$year = $_GET['tahun'];

// Query the database to get the list of paid months for the given NISN and year
$query = mysqli_query($conn, "SELECT DISTINCT bulan_dibayar FROM data_pembayaran WHERE nisn = '$nisn' AND tahun_dibayar = '$year'");
$paid_months = [];

while ($row = mysqli_fetch_array($query)) {
    $paid_months[] = $row['bulan_dibayar'];
}

echo json_encode($paid_months);
?>

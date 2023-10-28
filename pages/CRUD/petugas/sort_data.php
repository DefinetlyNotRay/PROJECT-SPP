<?php
require("../../../connection.php");

$id_kelas = $_GET['id_kelas'];

if($id_kelas == "all"){
    $query = mysqli_query($conn, "SELECT * FROM `data_siswa`");
} else{ 
    $query = mysqli_query($conn, "SELECT * FROM `data_siswa` WHERE id_kelas = $id_kelas"); 
}

$no = 1;

while ($row = mysqli_fetch_array($query)) {
    $idRow = $row["id_kelas"];
    $query2 = mysqli_query($conn, "SELECT * FROM `data_kelas` WHERE id_kelas = $idRow");
    $ex = mysqli_fetch_array($query2);

    echo '<tr>
        <th class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">' . $no++ . '</th>
        <td class="text-center text-dark font-medium text-base py-5 px-2 bg-[#F3F6FF] border-b border-[#E8E8E8]">' . $row["nisn"] . '</td>
        <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">' . $row["nis"] . '</td>
        <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">' . $row["nama"] . '</td>
        <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">' . $ex["nama_kelas"] . '</td>
        <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">' . $row["alamat"] . '</td>
        <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">' . $row["no_telp"] . '</td>
        <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">' . $row["id_spp"] . '</td>
        <td class="text-center flex items-center justify-center text-dark font-medium text-base py-5 px-2 bg-[#F3F6FF] border-b border-r border-[#E8E8E8]">
            <a href="./history/siswa.php?id=' . $row['nisn'] . '" class="inline-block px-6 py-2 mr-2 text-blue-600 border border-blue-600 rounded hover:bg-blue-600 hover:text-white">
                History
            </a>
        </td>
    </tr>';
}
?>

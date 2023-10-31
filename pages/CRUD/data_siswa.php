<?php
	session_start();
	if($_SESSION['status']!="login"){
		header("location:../index.php?msg=not_logged");
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Siswa</title>
    <link href="../../dist/output.css" rel="stylesheet" />
  </head>
  
  <body class="min-h-screen bg-blue-light">
 
    <nav class="fixed min-w-72">
      <div>
      </div>
      <div style="justify-content:space-between;" class="flex w-screen min-w-full px-4 py-5 bg-blue-600 py-auto">
        <ul class="flex gap-4 py-4 text-white text-m">
            <li><a class="px-5 text-2xl hover:underline" href="./data_kelas.php"><span class="sr-only">(current)</span>Data Kelas</a></li>
            <li><a class="px-5 text-2xl font-bold underline" href="./data_siswa.php">Data Siswa</a></li>
            <li><a class="px-5 text-2xl first-letter hover:underline " href="./data_spp.php">Data SPP</a></li>
            <li><a class="px-5 text-2xl hover:underline" href="./data_akun.php">Data Akun</a></li>
            <li><a class="px-5 text-2xl hover:underline" href="./data_pembayaran.php">Data Pembayaran</a></li>
        </ul>
        <div class="right-0 flex gap-4 ">
             <ul class="flex gap-4 py-4 text-white text-m">
                <li><a class="px-5 text-2xl hover:underline" href="../CRUD/index.php">CRUD</a></li>
                <li><a class="px-5 text-2xl hover:underline" href="../dashboard/index.php">Dashboard</a></li>
                <li><a class="px-5 text-2xl hover:underline" href="../../login/logout.php">Logout</a></li>
             </ul>
         </div>
    </nav>
    <section class="py-20 lg:py-[120px] flex justify-center">
    <div class="container flex">
        <div class="flex flex-wrap ">
            <div class="">
                <div class="max-w-full overflow-x-auto">
                <a href="./create_page/siswa.php" class="inline-block px-6 py-2 mt-10 mb-5 mr-2 text-white bg-green-600 border border-green-600 rounded hover:border-white hover:text-white">
                         Add New Data
                     </a>
                    <table class="table-auto w-96">
                        <thead>   
                            <tr class="text-center bg-blue-700">
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    No
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    NISN
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    NIS
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    Nama
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    Kelas
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    Alamat
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    No Telpon
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    SPP
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4 border-r border-transparent">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                require("../../connection.php");
                                $no = 1;
                                $query = mysqli_query($conn,"SELECT * FROM `data_siswa`");
                                while($row = mysqli_fetch_array($query)){
                            ?>
                            <tr>
                                <th class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php echo $no++ ?>
                                </th>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-[#F3F6FF] border-b border-[#E8E8E8]">
                                    <?php echo $row["nisn"] ?>
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php echo $row["nis"] ?>
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php echo $row["nama"] ?>
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php echo $row["id_kelas"] ?>
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php echo $row["alamat"] ?>
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php echo $row["no_telp"] ?>
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php echo $row["id_spp"] ?>
                                </td>
                                <td class="text-center flex items-center justify-center text-dark font-medium text-base py-5 px-2 bg-[#F3F6FF] border-b border-r border-[#E8E8E8]">
                                    <a href="./edit_page/siswa.php?id=<?php echo $row['nisn']; ?>" class="inline-block px-6 py-2 mr-2 text-blue-600 border border-blue-600 rounded hover:bg-blue-600 hover:text-white">
                                        Edit
                                    </a>
                                    <p>&nbsp;&nbsp;</p>
                                    <a href="./delete/siswa.php?id=<?php echo $row['nisn']; ?>" class="inline-block px-6 py-2 text-red-700 border border-red-700 rounded hover:bg-red-700 hover:text-white">
                                        Delete
                                    </a>
                                </td>

                            </tr>
                           <?php } ?>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </section>

  </body>
</html>

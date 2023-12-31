<?php
	session_start();
	if($_SESSION['status']!="login"){
		header("location:../../index.php?msg=not_logged");
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Pembayaran</title>
    <link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="../../../dist/output.css" rel="stylesheet" />
  </head>
  
  <body class="flex min-h-screen bg-blue-light">

  <nav class="fixed min-w-full">
      <div>
      </div>
      <div style="justify-content:space-between;" class="flex min-w-full px-4 py-5 bg-blue-600 py-auto w-fit">
        <ul class="flex gap-4 py-4 text-white text-m">
            <li><a class="px-5 text-2xl hover:underline" href="../data_kelas.php"><span class="sr-only">(current)</span>Data Kelas</a></li>
            <li><a class="px-5 text-2xl hover:underline" href="../data_siswa.php">Data Siswa</a></li>
            <li><a class="px-5 text-2xl first-letter hover:underline " href="../data_spp.php">Data SPP</a></li>
            <li><a class="px-5 text-2xl hover:underline" href="../data_akun.php">Data Akun</a></li>
            <li><a class="px-5 text-2xl font-bold underline" href="../data_pembayaran.php">Data Pembayaran</a></li>
        </ul>
        <div class="right-0 flex gap-4 ">
             <ul class="flex gap-4 py-4 text-white text-m">
                <li><a class="px-5 text-2xl hover:underline" href="../../CRUD/index.php">CRUD</a></li>
                <li><a class="px-5 text-2xl hover:underline" href="../../dashboard/index.php">Dashboard</a></li>
                <li><a class="px-5 text-2xl hover:underline" href="../../../login/logout.php">Logout</a></li>
             </ul>
         </div>
         
      </div>
    </nav>
    <section class="flex justify-center min-w-full lg:py-[120px]">
    <div class="container ">
        <div class="flex flex-wrap justify-center">
            <div class="">
                <div class="max-w-full">
                <form action="../edit/pembayaran.php" method="POST">
                    <table class="w-[1440px] table-auto">
                            <thead>   
                            <tr class="text-center bg-blue-700">
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    No
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    Akun
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    NISN
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    Tanggal Bayar
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    Bulan Bayar
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    Tahun Bayar
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    SPP
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    Jumlah Bayar
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4 border-r border-transparent">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            <tr>
                                <th class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                   <?php $no = 1; echo $no++ ?>
                                </th>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-[#F3F6FF] border-b border-[#E8E8E8]">
                                    
                               
                                <select name="id_akun" class="p-2 bg-white">
                                    <?php 
                                        require("../../../connection.php");
                                        $selected_id_akun = $_GET["id"]; // Assuming this is the id_akun you want to select
                                        $query_pembayaran = mysqli_query($conn,"SELECT `id_akun` FROM `data_pembayaran` WHERE id_pembayaran = $selected_id_akun");
                                        $arrayPembayaran = mysqli_fetch_array($query_pembayaran);
                                        $query_akun = mysqli_query($conn,"SELECT * FROM `data_akun`");
                                        while($row_akun = mysqli_fetch_array($query_akun)){
                                            $id_akun = $row_akun["id_akun"];
                                            $username = $row_akun["username"];

                                            // Check if the current option's ID matches the selected ID from data_pembayaran
                                            $selected = ($id_akun == $arrayPembayaran["id_akun"]) ? 'selected="selected"' : '';
                                    ?>
                                        <option  value="<?php echo $id_akun ?>" <?php echo $selected ?>><?php echo $username ?></option>
                                    <?php } ?>
                                </select>

                                </td>
                                <?php 
                                    require("../../../connection.php");
                                    $no = 1;
                                    $id = $_GET["id"];
                                    $query = mysqli_query($conn,"SELECT * FROM `data_pembayaran` WHERE id_pembayaran=$id");
                                    while($row = mysqli_fetch_array($query)){
                                    $id_spp = $row["id_spp"];
                                    $sppQuery = mysqli_query($conn,"SELECT * FROM `data_spp` WHERE id_spp = $id_spp");
                                    $spp = mysqli_fetch_array($sppQuery);
                                    
                                
                                
                                ?>
                                <input type="hidden" name="id" value="<?php echo $row["id_pembayaran"] ?>" />
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <input type="text" name="nisn" value="<?php echo $row["nisn"] ?>" readonly/>  
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-[#F3F6FF]  border-b border-[#E8E8E8]">
                                <input type="date" name="tgl_bayar" value="<?php echo $row["tgl_bayar"] ?>"/>
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                   <input name="bulan_dibayar" value="<?php echo $row["bulan_dibayar"] ?>" />
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-[#F3F6FF]  border-b border-[#E8E8E8]">
                                   <input name="tahun_dibayar" value="<?php echo $row["tahun_dibayar"] ?>" />
                                </td>
                                
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                <input name="" class="text-center" value="<?php echo $spp['tahun'] . ' | ' . $spp['nominal']; ?>" placeholder="<?php echo $spp['tahun'] . ' | ' . $spp['nominal']; ?>" readonly/>
                                <input type="hidden" name="id_spp" value="<?php echo $row['id_spp']; ?>" />

                                </td>
                                
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-[#F3F6FF]  border-b border-[#E8E8E8]">
                                  <input name="jumlah_bayar" value="<?php echo $row["jumlah_bayar"] ?>" />
                                </td>
                                <?php } ?>
                                <td class="text-center flex items-center justify-center text-dark font-medium text-base py-5 px-2 bg-[#F3F6FF] border-b border-r border-[#E8E8E8]">
                                        <button type="submit" class="inline-block px-6 py-2 mr-2 text-blue-600 border border-blue-600 rounded hover:bg-blue-600 hover:text-white">
                                            Submit
                                        </button>
                                    </td>
                            </tr>
                           
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
        </section>


  </body>
</html>

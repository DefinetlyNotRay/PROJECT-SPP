<?php
	session_start();
	if($_SESSION['status']!="login"){
		header("location:../../../index.php?msg=not_logged");
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>History Siswa</title>
    <link href="../../../../dist/output.css" rel="stylesheet" />
  </head>
  
  <body class="flex min-h-screen bg-blue-light">
 
  <nav class="fixed min-w-full">
      <div>
      </div>
      <div style="justify-content:space-between;" class="flex min-w-full px-4 py-5 bg-blue-600 py-auto w-fit">
        <ul class="flex gap-4 py-4 text-white text-m">
        <li><a class="px-5 text-2xl hover:underline" href="../entry.php">Entry Transaksi</a></li>
          <li><a class="px-5 text-2xl font-bold underline " href="../history.php">Lihat History</a></li>
        </ul>
        <div class="right-0 flex gap-4 ">
             <ul class="flex gap-4 py-4 text-white text-m">
                <li><a class="px-5 text-2xl hover:underline" href="../../../dashboard/index.php">Dashboard</a></li>
                <li><a class="px-5 text-2xl hover:underline" href="../../../../login/logout.php">Logout</a></li>
             </ul>
         </div>
         
      </div>
    </nav>
    <section class="flex justify-center min-w-full lg:py-[120px]">
    <div class="container ">
        <div class="flex flex-wrap justify-center">
            <div class="">
                <div class="max-w-full">
               

                    <table  id="dataTable" class="w-[1440px] table-auto">
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
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                     Status
                                </th>
                                
                            </tr>
                            </thead>
                       
                        <tbody class="tableBody" id="tableBody">
                           
                           
                           
                            <?php 
                            require("../../../../connection.php");
                            $no = 1;
                            $id = $_GET["id"];
                            $query = mysqli_query($conn,"SELECT * FROM `data_pembayaran` WHERE nisn = $id");
                            while($row = mysqli_fetch_array($query)){
                                $query2 = mysqli_query($conn,"SELECT * FROM `data_akun` WHERE id_akun = $row[id_akun]");
                                $akun_data = mysqli_fetch_assoc($query2);
                                $query3 = mysqli_query($conn,"SELECT * FROM `data_spp` WHERE id_spp = $row[id_spp]");
                                $nominal_data = mysqli_fetch_assoc($query3);
                            ?>
                            
                            <tr>
                                <th class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php echo $no++ ?>
                                </th>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-[#F3F6FF] border-b border-[#E8E8E8]">
                                    <?php echo $akun_data["username"] ?>
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php echo $row["nisn"] ?>
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php echo $row["tgl_bayar"] ?>
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php echo $row["bulan_dibayar"] ?>
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php echo $row["tahun_dibayar"] ?>
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php echo $nominal_data["nominal"] ?>
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php echo $row["jumlah_bayar"] ?>
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php 
                                        if($row["jumlah_bayar"] < $nominal_data["nominal"]) {
                                            echo "Belum Lunas";
                                        } else {
                                            echo "Lunas";
                                        }
                                    ?>
                                </td>
                            
                            </tr>
                            <?php } ?>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                    <div>
             
                    <a href="../cetak.php?id=<?php echo $id ?>" class="inline-block px-6 w-full mt-10 py-2 text-center text-white bg-blue-600 border rounded hover:bg-blue-700">
                        Print
                    </a>
                    
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
  </body>
</html>

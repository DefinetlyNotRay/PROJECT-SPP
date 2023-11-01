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
    <title>History Siswa</title>
    <link href="../../../dist/output.css" rel="stylesheet" />
  </head>
  
  <body class="flex min-h-screen bg-blue-light">
 
  <nav class="fixed min-w-full z-50">
      <div>
      </div>
      <div style="justify-content:space-between;" class="flex min-w-full px-4 py-5 bg-blue-600 py-auto w-fit">
        <ul class="flex gap-4 py-4 text-white text-m">
        <li><a class="px-5 text-2xl hover:underline" href="./entry.php">Entry Transaksi</a></li>
          <li><a class="px-5 text-2xl hover:underline" href="./history.php">Lihat History</a></li>
          <li><a class="px-5 text-2xl font-bold underline " href="./laporan.php">Generate Laporan</a></li>

        </ul>
        <div class="right-0 flex gap-4 ">
             <ul class="flex gap-4 py-4 text-white text-m">
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
               
              
                <form action="" method="GET" class="mb-5 mt-20">
                    <div class="flex flex-col mb-3">

                        <label for="startDate" class="text-xl">Start Date:</label>
                        <input type="date" id="startDate" name="startDate" class="text-xl p-2 rounded">
                    </div>
                    <div class="flex flex-col mb-3">

                        <label for="endDate" class="text-xl">End Date:</label>
                        <input type="date" id="endDate" name="endDate" class="text-xl p-2 rounded">
                    </div>
                    <button type="submit" class="inline-block px-6 py-2 mr-2 text-blue-600 border border-blue-600 rounded hover:bg-blue-600 hover:text-white">Filter</button>
                </form>
                


                    <table  id="dataTable" class="w-[1440px] table-auto">
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
                                    Tanggal Bayar
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    SPP
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4 border-r border-transparent">
                                    Action
                                </th>
                            </tr>
                        </thead>
                       
                        <tbody class="tableBody" id="tableBody">
                           
                           
                           
                        <?php 
                            require("../../../connection.php");
                            $no = 1;
                            $startDate = $_GET['startDate'];
                            $endDate = $_GET['endDate'];
                            if(isset($_GET['startDate']) && isset($_GET['startDate'])){
                                $query = mysqli_query($conn,"SELECT * FROM `data_pembayaran` WHERE tgl_bayar BETWEEN '$startDate' AND '$endDate'");

                            } else{
                                $query = mysqli_query($conn,"SELECT * FROM `data_pembayaran`");

                            };
                            while($row = mysqli_fetch_array($query)){
                                $query2 = mysqli_query($conn,"SELECT * FROM `data_siswa` WHERE nisn = $row[nisn]");
                                $row2 = mysqli_fetch_array($query2);
                                $query3 = mysqli_query($conn,"SELECT * FROM `data_spp` WHERE id_spp = $row[id_spp]");
                                $nominal_data = mysqli_fetch_assoc($query3);
                                $query4 = mysqli_query($conn,"SELECT * FROM `data_kelas` WHERE id_kelas = $row2[id_kelas]");
                                $row4= mysqli_fetch_array($query4);

                            ?>
                            
                            <tr>
                                <th class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php echo $no++ ?>
                                </th>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php echo $row["nisn"] ?>
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php echo $row2["nis"] ?>
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php echo $row2["nama"] ?>
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php echo $row4["nama_kelas"] ?>
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php echo $row["tgl_bayar"] ?>
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php echo $nominal_data["nominal"] ?>
                                </td>
                                <td class="text-center flex items-center justify-center text-dark font-medium text-base py-5 px-2 bg-[#F3F6FF] border-b border-r border-[#E8E8E8]">
                                    <a href="./history/siswa.php?id=<?php echo $row['nisn']; ?>" class="inline-block px-6 py-2 mr-2 text-blue-600 border border-blue-600 rounded hover:bg-blue-600 hover:text-white">
                                        History
                                    </a>
                                    
                                </td>
                                
                            </tr>
                           <?php } ?>
                           
                            <!-- Add more rows  as needed -->
                        </tbody>
                    </table>
                    <?php 
                        $query = mysqli_query($conn,"SELECT * FROM `data_pembayaran` WHERE tgl_bayar BETWEEN '$startDate' AND '$endDate'");
                        $row = mysqli_fetch_array($query);

                    ?>
                    <!-- Redirect to cetak-tanggal with params -->
                    <a href="./cetak-tanggal.php?id=<?php echo $row['nisn']?>&startDate=<?php echo $_GET['startDate'] ?>&endDate=<?php echo  $_GET['endDate'] ?>"" class="inline-block px-6 py-2 text-white bg-blue-600 border rounded hover:bg-blue-700">
                        Print
                    </a>
                </div>
            </div>
        </div>
    </div>
    </section>
    <script>
    function filterByDate() {
    var startDateStr = document.getElementById('startDate').value;
    var endDateStr = document.getElementById('endDate').value;

    var startDate = new Date(startDateStr);
    var endDate = new Date(endDateStr);

    var table = document.getElementById('dataTable');
    var rows = table.getElementsByTagName('tr');

    for (var i = 1; i < rows.length; i++) {
        var dateStr = rows[i].getElementsByTagName('td')[5].textContent; // Assuming the date is in the 6th column
        var dateParts = dateStr.split('-');
        var date = new Date('20' + dateParts[0], dateParts[1] - 1, dateParts[2]);

        if (date >= startDate && date <= endDate) {
            rows[i].style.display = '';
        } else {
            rows[i].style.display = 'none';
        }
    }
}



</script>

  </body>
</html>

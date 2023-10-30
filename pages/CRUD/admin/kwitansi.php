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
    <title>Login</title>
    <link href="../../../dist/output.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  </head>
  
  <body class="flex min-h-screen bg-blue-light">
 
  <nav class="fixed min-w-full">
      <div>
      </div>
      <div style="justify-content:space-between;" class="flex min-w-full px-4 py-5 bg-blue-600 py-auto w-fit">
        <ul class="flex gap-4 py-4 text-white text-m">
        <li><a class="px-5 text-2xl hover:underline" href="./entry.php">Entry Transaksi</a></li>
          <li><a class="px-5 text-2xl font-bold underline " href="./history.php">Lihat History</a></li>
        </ul>
        <div class="right-0 flex gap-4 ">
             <ul class="flex gap-4 py-4 text-white text-m">
                <li><a class="px-5 text-2xl hover:underline" href="../../dashboard/index.php">Dashboard</a></li>
                <li><a class="px-5 text-2xl hover:underline" href="../../../../login/logout.php">Logout</a></li>
             </ul>
         </div>
         
      </div>
    </nav>
    <section class="flex justify-center min-w-full lg:py-[120px]">
    <div class="container ">
        <div class="flex flex-wrap justify-center">
            <div class="">
                <div class="max-w-full" id="content">


                    <p class="text-3xl font-bold text-center">SMK Tunas Media Laporan Pembayaran</p>
                    <?php 
                        require("../../../connection.php");
                      $id = $_GET["nisn"];
                      $query = mysqli_query($conn,"SELECT * FROM `data_siswa` WHERE nisn = $id ");
                      $row = mysqli_fetch_array($query);
                      
                    ?>
                    <p class="mb-20 text-2xl font-bold text-center" class="nama"> <?php echo $row["nama"]." | ".$_GET["tgl_bayar"] ?></p>
                    <table   class="w-[1440px] table-auto">
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
                                
                            </tr>
                            </thead>
                       
                        <tbody class="tableBody" id="tableBody">
                           
                           
                           
                            <?php 
                            require("../../../connection.php");
                            $no = 1;
                            $nisn = $_GET['nisn'];
                            $bulan_dibayar = $_GET['bulan_dibayar'];
                            $tahun_dibayar = $_GET['tahun_dibayar'];
                            $jumlah_bayar = $_GET['jumlah_bayar'];
                            $tgl_bayar = $_GET['tgl_bayar'];

                            $query = mysqli_query($conn,"SELECT * FROM `data_pembayaran` WHERE tgl_bayar = '$tgl_bayar' AND nisn = '$nisn'");
                            while($row = mysqli_fetch_array($query)){
                                $query2 = mysqli_query($conn,"SELECT * FROM `data_akun` WHERE id_akun = $row[id_akun]");
                                $akun_data = mysqli_fetch_assoc($query2);
                                $query3 = mysqli_query($conn,"SELECT * FROM `data_spp` WHERE id_spp = $row[id_spp]");
                                $spp = mysqli_fetch_assoc($query3);
                                
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
                                    <?php echo $spp["tahun"]." | ".$spp["nominal"] ?>
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php echo $row["jumlah_bayar"] ?>
                                </td>

                            </tr>
                           <?php } ?>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                    
                </form>
                    
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-20">
                    <button id="download" class="inline-block px-6 py-2 text-center text-white bg-blue-600 border rounded hover:bg-blue-700">
                        Genereate Kwitansi
                    </button>
                    </div>
    </div>
    
    </section>
    <script>
    window.onload = function(){
      document.getElementById("download").addEventListener("click", () => {
        const invoice = this.document.getElementById("content");
        console.log(invoice);
        console.log(window);
        <?php 
         require("../../../connection.php");
         $id = $_GET["nisn"];
         $query = mysqli_query($conn,"SELECT * FROM `data_siswa` WHERE nisn = $id ");
         $row = mysqli_fetch_array($query);
        ?>
        var opt = {
          margin: 1,
          filename:'Data <?php echo $row["nama"]."|".$_GET["tgl_bayar"]?>.pdf',
          image:{
            type: 'jpeg',
            quality: 0.98
          },
          html2canvas:{
            scale: 2
          },
          jsPDF: {
            unit:'in',
            format:'tabloid',
            orientation: 'landscape'
          }
        };
        html2pdf().from(invoice).set(opt).save();
      })
      }
</script>
  </body>
</html>

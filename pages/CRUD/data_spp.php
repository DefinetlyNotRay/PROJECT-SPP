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
    <title>Login</title>
    <link href="../../dist/output.css" rel="stylesheet" />
  </head>
  
  <body class="min-h-screen bg-blue-light">
 
    <nav class="fixed min-h-screen min-w-72">
      <div>
      </div>
      <div class="min-h-screen px-4 py-5 bg-blue-600 py-auto w-270">
        <ul class="flex flex-col h-screen gap-4 py-4 text-white text-m">
            <li><a class="px-5 text-2xl first-letter font-bold underline " href="./data_spp.php"><span class="sr-only">(current)</span>Data SPP</a></li>
        
            <li><a class="px-5 text-2xl hover:underline" href="./data_siswa.php">Data Siswa</a></li>
            <li><a class="px-5 text-2xl hover:underline" href="./data_kelas.php">Data Kelas</a></li>
            <li><a class="px-5 text-2xl hover:underline" href="./data_akun.php">Data Akun</a></li>
            <li><a class="px-5 text-2xl hover:underline" href="./data_pembayaran.php">Data Pembayaran</a></li>
            
            <div class="flex flex-col gap-4 fixed bottom-6 ">
                <li><a class="px-5 text-2xl hover:underline" href="../CRUD/index.php">CRUD</a></li>
                <li><a class="px-5 text-2xl hover:underline" href="../dashboard/index.php">Dashboard</a></li>
                <li><a class="px-5 text-2xl hover:underline" href="../../login/logout.php">Logout</a></li>
            </div>
        </ul>
      </div>
    </nav>
    <section class="py-20 lg:py-[120px]">
    <div class="container flex w-96">
        <div class="flex ml-20 lg:ml-[35rem] justify-center flex-wrap -mx-4">
            <div class="px-4">
                <div class="max-w-full overflow-x-auto">
                    <table class="table-auto w-96">
                        <thead>   
                            <tr class="bg-blue-700 text-center">
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    No
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    Tahun
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    Nominal
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
                                $query = mysqli_query($conn,"SELECT * FROM `data_spp`");
                                while($row = mysqli_fetch_array($query)){
                            ?>
                            <tr>
                                <th class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php echo $no++ ?>
                                </th>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-[#F3F6FF] border-b border-[#E8E8E8]">
                                    <?php echo $row["tahun"] ?>
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php echo $row["nominal"] ?>
                                </td>
                                <td class="text-center flex items-center justify-center text-dark font-medium text-base py-5 px-2 bg-[#F3F6FF] border-b border-r border-[#E8E8E8]">
                                    <a href="./edit_page/spp.php?id=<?php echo $row['id_spp']; ?>" class="border border-blue-600 mr-2 py-2 px-6 text-blue-600 inline-block rounded hover:bg-blue-600 hover:text-white">
                                        Edit
                                    </a>
                                    <p>&nbsp;&nbsp;</p>
                                    <a href="./delete/spp.php?id=<?php echo $row['id_spp']; ?>" class="border border-red-700 py-2 px-6 text-red-700 inline-block rounded hover:bg-red-700 hover:text-white">
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

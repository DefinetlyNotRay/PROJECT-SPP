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
    <link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="../../dist/output.css" rel="stylesheet" />
  </head>
  
  <body class="min-h-screen bg-blue-light">

        <nav class="fixed w-48 min-h-screen lg:w-fit">
          <div>
          </div>
          <div class="min-h-screen px-4 py-5 bg-blue-600 py-auto w-fit">
            <ul class="flex flex-col h-screen gap-4 py-4 text-white text-m">
                <li><a class="px-5 text-2xl font-bold underline " href="./data_akun.php"><span class="sr-only">(current)</span>Data Akun</a></li>
                <li><a class="px-5 text-2xl hover:underline" href="./data_kelas.php">Data Kelas</a></li>
                <li><a class="px-5 text-2xl hover:underline" href="./data_siswa.php">Data Siswa</a></li>
                <li><a class="px-5 text-2xl first-letter hover:underline " href="./data_spp.php">Data SPP</a></li>
                <li><a class="px-5 text-2xl hover:underline" href="./data_pembayaran.php">Data Pembayaran</a></li>
                
                <div class="fixed flex flex-col gap-4 bottom-6 ">
                    <li><a class="px-5 text-2xl hover:underline" href="../CRUD/index.php">CRUD</a></li>
                    <li><a class="px-5 text-2xl hover:underline" href="../dashboard/index.php">Dashboard</a></li>
                    <li><a class="px-5 text-2xl hover:underline" href="../../login/logout.php">Logout</a></li>
                </div>
            </ul>
          </div>
        </nav>
        <section class="py-20 lg:py-[120px]">
    <div class="container flex ">
        <div class="flex flex-wrap justify-center ml-20 -mx-4 lg:ml-96">
            <div class="px-4">
                <div class="flex flex-col items-start max-w-full gap-5 overflow-x-auto">
                    <a href="./create_page/akun.php" class="inline-block px-6 py-2 mr-2 text-white bg-green-600 border border-green-600 rounded hover:border-white hover:text-white">
                         Add New Data
                     </a>
                    <table class="table-auto w-96">
                        <thead>   
                            <tr class="text-center bg-blue-700">
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    No
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    Username
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    Password
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    Nama
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4 border-r border-transparent">
                                    Level
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
                                $query = mysqli_query($conn,"SELECT * FROM `data_akun`");
                                while($row = mysqli_fetch_array($query)){
                            ?>
                            <tr>
                                <th class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php echo $no++ ?>
                                </th>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-[#F3F6FF] border-b border-[#E8E8E8]">
                                    <?php echo $row["username"] ?>
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php echo $row["password"] ?>
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-[#F3F6FF] border-b border-[#E8E8E8]">
                                    <?php echo $row["nama"] ?>
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php echo $row["level"] ?>
                                </td>
                                <td class="text-center flex items-center justify-center text-dark font-medium text-base py-5 px-2 bg-[#F3F6FF] border-b border-r border-[#E8E8E8]">
                                    <a href="./edit_page/akun.php?id=<?php echo $row['id_akun']; ?>" class="inline-block px-6 py-2 mr-2 text-blue-600 border border-blue-600 rounded hover:bg-blue-600 hover:text-white">
                                        Edit
                                    </a>
                                    <p>&nbsp;&nbsp;</p>
                                    <a href="./delete/akun.php?id=<?php echo $row['id_akun']; ?>" class="inline-block px-6 py-2 text-red-700 border border-red-700 rounded hover:bg-red-700 hover:text-white">
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

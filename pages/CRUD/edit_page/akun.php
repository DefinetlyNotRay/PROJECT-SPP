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
    <title>Edit Kelas</title>
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
            <li><a class="px-5 text-2xl font-bold underline" href="../data_akun.php">Data Akun</a></li>
            <li><a class="px-5 text-2xl hover:underline" href="../data_pembayaran.php">Data Pembayaran</a></li>
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
                <form action="../edit/akun.php" method="POST">
                    <table class="w-[1440px] table-auto">
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
                                    require("../../../connection.php");
                                    $no = 1;
                                    $id = $_GET["id"];
                                    $query = mysqli_query($conn,"SELECT * FROM `data_akun` WHERE id_akun = $id ");
                                    while($row = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                <input type="hidden" name="id" value="<?php echo $row["id_akun"] ?>" />
                                    <th class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                        <?php echo $no++ ?>
                                    </th>
                                    <td class="text-center text-dark font-medium text-base py-5 px-2 bg-[rgb(243,246,255)] border-b border-[#E8E8E8]">
                                        <input type="text" name="username" class="max-w-[150px]" value="<?php echo $row["username"] ?>" />
                                    </td>
                                    <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                        <input type="text" name="password" class="max-w-[150px]" value="<?php echo $row["password"] ?>" />
                                    </td>
                                    <td class="text-center text-dark font-medium text-base py-5 px-2 bg-[#F3F6FF] border-b border-[#E8E8E8]">
                                    <input type="text" name="nama" class="max-w-[150px]" value="<?php echo $row["nama"] ?>" />
                                    </td>
                                    <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                        <?php 
                                            require("../../../connection.php");
                                            $levelCol = $row["level"];
    
                                        ?>
                                        
                                   
                                        <select name="level">
                                            <option value="admin" <?php echo ($levelCol == 'admin') ? 'selected="selected"' : ''; ?>> 
                                                admin
                                            </option>
                                            <option value="petugas" <?php echo ($levelCol == 'petugas') ? 'selected="selected"' : ''; ?>> 
                                                petugas
                                            </option>
                                            <option value="siswa" <?php echo ($levelCol == 'siswa') ? 'selected="selected"' : ''; ?>> 
                                                siswa
                                            </option>
                                        </select>
    
                                     
                                    
                                    </td>
                                    <td class="text-center flex items-center justify-center text-dark font-medium text-base py-5 px-2 bg-[#F3F6FF] border-b border-r border-[#E8E8E8]">
                                        <button type="submit" class="inline-block px-6 py-2 mr-2 text-blue-600 border border-blue-600 rounded hover:bg-blue-600 hover:text-white">
                                            Submit
                                        </button>
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
    </div>
        </section>


  </body>
</html>

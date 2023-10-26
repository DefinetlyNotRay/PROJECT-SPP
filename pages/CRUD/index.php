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
 
    <nav class="fixed top-0">
      <div>
      </div>
      <div class="flex justify-between w-screen px-4 py-5 bg-blue-600 py-auto">
        <ul class="flex gap-4 py-4 text-white text-m">
            <li><a class="px-5 text-2xl font-bold underline" href="../CRUD/index.php"><span class="sr-only">(current)</span>CRUD</a></li>
            <li><a class="px-5 text-2xl hover:underline" href="./data_spp.php">Data SPP</a></li>
            <li><a class="px-5 text-2xl hover:underline" href="./data_siswa.php">Data Siswa</a></li>
            <li><a class="px-5 text-2xl hover:underline" href="./data_kelas.php">Data Kelas</a></li>
            <li><a class="px-5 text-2xl hover:underline" href="./data_akun.php">Data Akun</a></li>
            <li><a class="px-5 text-2xl hover:underline" href="./data_pembayaran.php">Data Pembayaran</a></li>
          
         

        </ul>
        <div class="flex">
            <ul class="flex gap-4 py-4 text-white text-m">
                <li><a class="px-5 text-2xl hover:underline" href="../dashboard/index.php">Dashboard</a></li>
                <li><a class="px-5 text-2xl hover:underline" href="../../login/logout.php">Logout</a></li>
            </ul>
        </div>
      </div>
    </nav>
    <div class="">

        <div class="" style="margin-top: 10rem; padding-left:20px;">
            <p class="text-3xl font-bold text-white">Welcome To The Dashboard!! 👋</p>
        </div>
        
        <div class="flex flex-wrap ">
        
       
        <div class="w-full px-5 mt-4 mb-4 lg:w-6/12 xl:w-3/12">
        <div class="relative flex flex-col min-w-0 mb-3 break-words bg-white rounded shadow-lg xl:mb-0">
            <?php 
                require("../../connection.php");
                $query = mysqli_query($conn, "SELECT COUNT(id_akun) FROM `data_akun`");
                while($row = mysqli_fetch_array($query)){
            ?>
            <div class="flex-auto p-4">
            <div class="flex flex-wrap">
                <div class="relative flex-1 flex-grow w-full max-w-full pr-4">
                <h5 class="text-xs font-bold uppercase text-blueGray-400">Users</h5>
                <span class="text-xl font-semibold text-blueGray-700"><?php echo $row['COUNT(id_akun)']; ?></span>
                </div>
                <div class="relative flex-initial w-auto pl-4">
                <div class="inline-flex items-center justify-center w-12 h-12 p-3 text-center text-white bg-red-500 rounded-full shadow-lg">
                    <i class="fas fa-chart-bar"></i>
                </div>
                </div>
            </div>
               
            </div>
        </div>
        </div>
            <?php }?>
            <?php 
                require("../../connection.php");
                $query = mysqli_query($conn, "SELECT COUNT(id_kelas) FROM `data_kelas`");
                while($row = mysqli_fetch_array($query)){
            ?>           
        <div class="w-full px-5 mt-4 lg:w-6/12 xl:w-3/12">
        <div class="relative flex flex-col min-w-0 mb-4 break-words bg-white rounded shadow-lg xl:mb-0">
            <div class="flex-auto p-4">
            <div class="flex flex-wrap">
                <div class="relative flex-1 flex-grow w-full max-w-full pr-4">
                <h5 class="text-xs font-bold uppercase text-blueGray-400">Class</h5>
                <span class="text-xl font-semibold text-blueGray-700"><?php echo $row['COUNT(id_kelas)'] ?></span>
                </div>
                <div class="relative flex-initial w-auto pl-4">
                <div class="inline-flex items-center justify-center w-12 h-12 p-3 text-center text-white bg-pink-500 rounded-full shadow-lg">
                    <i class="fas fa-chart-pie"></i>
                </div>
                </div>
            </div>
         
            </div>
        </div>
        </div>
        <?php }?>
        <?php 
                require("../../connection.php");
                $query = mysqli_query($conn, "SELECT COUNT(id_pembayaran) FROM `data_pembayaran`");
                while($row = mysqli_fetch_array($query)){
            ?>   
        <div class="w-full px-5 mt-4 lg:w-6/12 xl:w-3/12">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white rounded shadow-lg xl:mb-0">
            <div class="flex-auto p-4">
            <div class="flex flex-wrap">
                <div class="relative flex-1 flex-grow w-full max-w-full pr-4">
                <h5 class="text-xs font-bold uppercase text-blueGray-400">Transaction</h5>
                <span class="text-xl font-semibold text-blueGray-700"><?php echo $row['COUNT(id_pembayaran)']?></span>
                </div>
                <div class="relative flex-initial w-auto pl-4">
                <div class="inline-flex items-center justify-center w-12 h-12 p-3 text-center text-white bg-green-500 rounded-full shadow-lg">
                    <i class="fas fa-users"></i>
                </div>
                </div>
            </div>
            
            </div>
        </div>
        </div>
        <?php }?>
        <?php 
                require("../../connection.php");
                $query = mysqli_query($conn, "SELECT COUNT(nisn) FROM `data_siswa`");
                while($row = mysqli_fetch_array($query)){
            ?>   
        <div class="w-full px-5 mt-4 lg:w-6/12 xl:w-3/12">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white rounded shadow-lg xl:mb-0">
            <div class="flex-auto p-4">
            <div class="flex flex-wrap">
                <div class="relative flex-1 flex-grow w-full max-w-full pr-4">
                <h5 class="text-xs font-bold uppercase text-blueGray-400">Students</h5>
                <span class="text-xl font-semibold text-blueGray-700"><?php echo $row['COUNT(nisn)']?></span>
                </div>
                <div class="relative flex-initial w-auto pl-4">
                <div class="inline-flex items-center justify-center w-12 h-12 p-3 text-center text-white bg-blue-300 rounded-full shadow-lg">
                    <i class="fas fa-percent"></i>
                </div>
                </div>
            </div>
            
            </div>
            <?php }?>
            
        </div>
        </div>
        
    </div>
    </div>

  </body>
</html>

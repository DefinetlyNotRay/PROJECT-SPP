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


  </body>
</html>

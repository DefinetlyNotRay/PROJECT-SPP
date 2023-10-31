<?php
	session_start();
	if($_SESSION['status']!="login"){
		header("location:../index.php?msg=not_logged");
	}
    if($_SESSION['petugas']!="petugas"){
		header("location:../index.php?msg=admin");
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link href="../../dist/output.css" rel="stylesheet" />
  </head>
  
  <body class="min-h-screen bg-blue-light">
    <nav class="fixed m">
      <div>
          
      </div>
      <div class="flex justify-between w-screen px-4 py-5 bg-blue-600 py-auto">
        <ul class="flex gap-4 py-4 text-white text-m">
          <li><a class="px-5 text-2xl font-bold underline " href="dashboard/index.php"><span class="sr-only">(current)</span>Dashboard</a></li>
          <li><a class="px-5 text-2xl hover:underline" href="../CRUD/petugas/entry.php">Entry Transaksi</a></li>
          <li><a class="px-5 text-2xl hover:underline" href="../CRUD/petugas/history.php">Lihat History</a></li>
        </ul>
        <ul class="flex gap-4 py-4 text-white text-m">
        <li><a class="px-5 text-2xl hover:underline" href="../../login/logout.php">Log Out</a></li>

        </ul>
      </div>
    </nav>
    <div class="flex">
      
    </div>
  </body>
</html>

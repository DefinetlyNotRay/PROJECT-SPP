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
  <nav class="fixed min-h-fit">

      <div class="px-4 py-5 bg-blue-700 min-h-fit py-auto max-w-screen">

      </div>
    </nav>
    <nav class="fixed min-h-screen">
      <div>
          
      </div>
      <div class="min-h-screen px-4 py-5 bg-blue-600 py-auto max-w-fit">
        <ul class="flex flex-col gap-4 py-4 text-white text-m">
          <li><a class="px-5 text-2xl font-bold underline " href="dashboard/index.php"><span class="sr-only">(current)</span>Dashboard</a></li>
          <li><a class="px-5 text-2xl hover:underline" href="../CRUD/index.php">CRUD</a></li>
          <li><a class="px-5 text-2xl hover:underline" href="">Entry Transaksi</a></li>
          <li><a class="px-5 text-2xl hover:underline" href="">Lihat History</a></li>
          <li><a class="fixed px-5 text-2xl bottom-5 hover:underline" href="../../login/logout.php">Log Out</a></li>
        </ul>
      </div>
    </nav>
    <div class="flex">
      
    </div>
  </body>
</html>

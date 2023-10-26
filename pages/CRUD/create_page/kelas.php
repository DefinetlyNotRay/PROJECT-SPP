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
    <link href="../../../dist/output.css" rel="stylesheet" />
  </head>
 
  
  <body class="min-h-screen bg-blue-light">
 
  <nav class="fixed min-w-full">
      <div>
      </div>
      <div style="justify-content:space-between;" class="flex min-w-full px-4 py-5 bg-blue-600 py-auto w-fit">
        <ul class="flex gap-4 py-4 text-white text-m">
            <li><a class="px-5 text-2xl font-bold underline  href="./data_kelas.php"><span class="sr-only">(current)</span>Data Kelas</a></li>
            <li><a class="px-5 text-2xl hover:underline" href="./data_siswa.php">Data Siswa</a></li>
            <li><a class="px-5 text-2xl hover:underline" first-letter " href="./data_spp.php">Data SPP</a></li>
            <li><a class="px-5 text-2xl hover:underline" href="./data_akun.php">Data Akun</a></li>
            <li><a class="px-5 text-2xl hover:underline" href="./data_pembayaran.php">Data Pembayaran</a></li>
        </ul>
        <div class="right-0 flex gap-4 ">
             <ul class="flex gap-4 py-4 text-white text-m">
                <li><a class="px-5 text-2xl hover:underline" href="../CRUD/index.php">CRUD</a></li>
                <li><a class="px-5 text-2xl hover:underline" href="../dashboard/index.php">Dashboard</a></li>
                <li><a class="px-5 text-2xl hover:underline" href="../../login/logout.php">Logout</a></li>
             </ul>
         </div>
         
      </div>
    </nav>
    <div class="">
    <br><br><br><br><br><br><br>
        <div id="1440px" class="flex items-center justify-center">
            <section class="flex flex-col items-center justify-center gap-5 w-fit">
                <form method="POST" action="../create/kelas.php" class="flex flex-col gap-5">
                    <div class="flex flex-col gap-4 ">
                        <label class="text-2xl" for="kelas">Kelas</label>
                        <input class="w-96" name="kelas" type="text" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">
                    </div>
                    <div class="flex flex-col gap-4 ">
                        <label class="text-2xl">Kompetensi Keahlian</label>
                        <input class="w-96 " name="kompetensi_keahlian" type="text"style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">
                    </div>
                    <button type="submit" class="inline-block px-6 py-2 text-white bg-blue-600 border rounded hover:bg-blue-700">
                        Submit
                    </button>
                </form>
            </section>
        </div>
    </div>
  </body>
</html>

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
 
        <nav class="fixed w-48 min-h-screen lg:w-fit">
          <div>
          </div>
          <div class="min-h-screen px-4 py-5 bg-blue-600 py-auto w-fit">
            <ul class="flex flex-col h-screen gap-4 py-4 text-white text-m">
                <li><a class="px-5 text-2xl font-bold underline " href="../data_akun.php"><span class="sr-only">(current)</span>Data Akun</a></li>
                <li><a class="px-5 text-2xl hover:underline" href="../data_kelas.php">Data Kelas</a></li>
                <li><a class="px-5 text-2xl hover:underline" href="../data_siswa.php">Data Siswa</a></li>
                <li><a class="px-5 text-2xl first-letter hover:underline " href="../data_spp.php">Data SPP</a></li>
                <li><a class="px-5 text-2xl hover:underline" href="../data_pembayaran.php">Data Pembayaran</a></li>
                
                <div class="fixed flex flex-col gap-4 bottom-6 ">
                    <li><a class="px-5 text-2xl hover:underline" href="../CRUD/index.php">CRUD</a></li>
                    <li><a class="px-5 text-2xl hover:underline" href="../dashboard/index.php">Dashboard</a></li>
                    <li><a class="px-5 text-2xl hover:underline" href="../../login/logout.php">Logout</a></li>
                </div>
            </ul>
          </div>
        </nav>
        <div id="1440px" class="flex items-center justify-center h-full" style="padding-left:15rem; padding-top:10rem;">
            <section class="flex flex-col items-center justify-center gap-5 w-fit">
                <div class="flex flex-col gap-4 ">
                    <label class="text-2xl" for="username">Username</label>
                    <input class="w-96 " type="text"style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">
                </div>
                <div class="flex flex-col gap-4 ">
                    <label class="text-2xl">Password</label>
                    <input class="w-96 " type="text"style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">
                </div>
                <div class="flex flex-col gap-4 ">
                    <label class="text-2xl">Name</label>
                    <input class="w-96 rounded-xl" type="text" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">
                </div>
                <div class="flex flex-col gap-4 ">
                    <label class="text-2xl">Level</label>
                    <select name="level" class="pl-5 bg-blue-600 w-96 " style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem;">
                        <option value="admin" <?php echo ($genderCol == 'admin') ? 'selected="selected"' : ''; ?>> 
                            admin
                        </option>
                        <option value="petugas" <?php echo ($genderCol == 'petugas') ? 'selected="selected"' : ''; ?>> 
                            petugas
                        </option>
                        <option value="siswa" <?php echo ($genderCol == 'siswa') ? 'selected="selected"' : ''; ?>> 
                            siswa
                        </option>
                    </select>
                </div>
            </section>
        </div>
  </body>
</html>

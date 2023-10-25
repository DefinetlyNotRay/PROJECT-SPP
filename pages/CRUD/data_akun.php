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

        <nav class="min-h-screen  fixed max-w-fit">
          <div>
          </div>
          <div class="min-h-screen  px-4 py-5 bg-blue-600 py-auto w-fit">
            <ul class="flex flex-col  h-screen gap-4 py-4 text-white text-m">
                <li><a class="px-5 text-2xl font-bold underline " href="./data_akun.php"><span class="sr-only">(current)</span>Data Akun</a></li>
                <li><a class="px-5 text-2xl hover:underline" href="./data_kelas.php">Data Kelas</a></li>
                <li><a class="px-5 text-2xl hover:underline" href="./data_siswa.php">Data Siswa</a></li>
                <li><a class="px-5 text-2xl first-letter hover:underline " href="./data_spp.php">Data SPP</a></li>
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
    <div class="container">
        <div class="flex ml-20 justify-center flex-wrap -mx-4">
            <div class="px-4">
                <div class="max-w-full overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead>
                            <tr class="bg-primary text-center">
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
                            <tr>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    1 Year
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-[#F3F6FF] border-b border-[#E8E8E8]">
                                    $75.00
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    $5.00
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-[#F3F6FF] border-b border-[#E8E8E8]">
                                    $10.00
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <select>
                                        <option value="d">s</option>
                                    </select>
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-[#F3F6FF] border-b border-r border-[#E8E8E8]">
                                    <a href="javascript:void(0)" class="border border-primary py-2 px-6 text-primary inline-block rounded hover:bg-primary hover:text-white">
                                        Sign Up
                                    </a>
                                </td>
                            </tr>
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

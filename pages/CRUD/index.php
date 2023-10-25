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
 
    <nav class="fixed min-h-screen">
      <div>
          
      </div>
      <div class="min-h-screen px-4 py-5 bg-blue-600 py-auto w-fit">
        <ul class="flex flex-col h-screen gap-4 py-4 text-white text-m">
        <li><a class="px-5 text-2xl font-bold underline" href="../CRUD/index.php"><span class="sr-only">(current)</span>CRUD</a></li>

          <li><a class="px-5 text-2xl hover:underline" href="dashboard/index.php">Data Siswa</a></li>
          <li><a class="px-5 text-2xl hover:underline" href="">Data Akun</a></li>
          <li><a class="px-5 text-2xl hover:underline" href="">Data SPP</a></li>
          <li><a class="px-5 text-2xl hover:underline" href="">Data Petugas</a></li>
          <div class="fixed bottom-6 ">
              <li><a class="px-5 text-2xl hover:underline" href="../dashboard/index.php">Dashboard</a></li>
              <li><a class="px-5 text-2xl hover:underline" href="../../login/logout.php">Logout</a></li>
          </div>

        </ul>
      </div>
    </nav>
    <div class="pl-5 py-7 ml-52">
        <p class="text-3xl font-bold text-white">Welcom To The Dashboard!! 👋</p>
    </div>
    <div class="flex flex-wrap ml-52 ">
    <div class="w-full px-5 mt-4 mb-4 lg:w-6/12 xl:w-3/12">
    <div class="relative flex flex-col min-w-0 mb-3 break-words bg-white rounded shadow-lg xl:mb-0">
        <div class="flex-auto p-4">
        <div class="flex flex-wrap">
            <div class="relative flex-1 flex-grow w-full max-w-full pr-4">
            <h5 class="text-xs font-bold uppercase text-blueGray-400">Users</h5>
            <span class="text-xl font-semibold text-blueGray-700">1</span>
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

    <div class="w-full px-5 mt-4 lg:w-6/12 xl:w-3/12">
    <div class="relative flex flex-col min-w-0 mb-4 break-words bg-white rounded shadow-lg xl:mb-0">
        <div class="flex-auto p-4">
        <div class="flex flex-wrap">
            <div class="relative flex-1 flex-grow w-full max-w-full pr-4">
            <h5 class="text-xs font-bold uppercase text-blueGray-400">New users</h5>
            <span class="text-xl font-semibold text-blueGray-700">2,999</span>
            </div>
            <div class="relative flex-initial w-auto pl-4">
            <div class="inline-flex items-center justify-center w-12 h-12 p-3 text-center text-white bg-pink-500 rounded-full shadow-lg">
                <i class="fas fa-chart-pie"></i>
            </div>
            </div>
        </div>
        <p class="mt-4 text-sm text-blueGray-400">
            <span class="mr-2 text-red-500"><i class="fas fa-arrow-down"></i> 4,01%</span>
            <span class="whitespace-nowrap"> Since last week </span></p>
        </div>
    </div>
    </div>

    <div class="w-full px-5 mt-4 lg:w-6/12 xl:w-3/12">
    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white rounded shadow-lg xl:mb-0">
        <div class="flex-auto p-4">
        <div class="flex flex-wrap">
            <div class="relative flex-1 flex-grow w-full max-w-full pr-4">
            <h5 class="text-xs font-bold uppercase text-blueGray-400">Sales</h5>
            <span class="text-xl font-semibold text-blueGray-700">901</span>
            </div>
            <div class="relative flex-initial w-auto pl-4">
            <div class="inline-flex items-center justify-center w-12 h-12 p-3 text-center text-white rounded-full shadow-lg bg-lightBlue-500">
                <i class="fas fa-users"></i>
            </div>
            </div>
        </div>
        <p class="mt-4 text-sm text-blueGray-400">
            <span class="mr-2 text-red-500"><i class="fas fa-arrow-down"></i> 1,25% </span>
            <span class="whitespace-nowrap"> Since yesterday </span></p>
        </div>
    </div>
    </div>

    <div class="w-full px-5 mt-4 lg:w-6/12 xl:w-3/12">
    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white rounded shadow-lg xl:mb-0">
        <div class="flex-auto p-4">
        <div class="flex flex-wrap">
            <div class="relative flex-1 flex-grow w-full max-w-full pr-4">
            <h5 class="text-xs font-bold uppercase text-blueGray-400">Performance</h5>
            <span class="text-xl font-semibold text-blueGray-700">51.02% </span>
            </div>
            <div class="relative flex-initial w-auto pl-4">
            <div class="inline-flex items-center justify-center w-12 h-12 p-3 text-center text-white rounded-full shadow-lg bg-emerald-500">
                <i class="fas fa-percent"></i>
            </div>
            </div>
        </div>
        <p class="mt-4 text-sm text-blueGray-400">
            <span class="mr-2 text-emerald-500"><i class="fas fa-arrow-up"></i> 12% </span>
            <span class="whitespace-nowrap"> Since last mounth </span></p>
        </div>
    </div>
    </div>
</div>
  </body>
</html>

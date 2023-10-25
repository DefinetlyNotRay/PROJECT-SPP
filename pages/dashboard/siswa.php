<?php
	session_start();
	if($_SESSION['status']!="login"){
		header("location:login/index.php?msg=not_logged");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi Data karyawan</title>
    <link href="../../dist/output.css" rel="stylesheet" />

</head>
<nav class="fixed min-h-fit">

<div class="px-4 py-5 bg-blue-700 min-h-fit py-auto max-w-screen">

</div>
</nav>
<nav class="fixed min-h-screen">
<div>
    
</div>
<div class="min-h-screen px-4 py-5 bg-blue-600 py-auto max-w-fit">
  <ul class="flex flex-col gap-4 py-4 text-white text-m">
    <li><a class="px-5 text-2xl font-bold underline" href="dashboard/index.php"><span class="sr-only">(current)</span>Dashboard</a></li>
    <li><a class="px-5 text-2xl" href="crud/crud.php">CRUD</a></li>
    <li><a class="px-5 text-2xl" href="">Entry Transaksi</a></li>
    <li><a class="px-5 text-2xl" href="">Lihat History</a></li>
    <li><a class="px-5 text-2xl" href="">Log Out</a></li>
  </ul>
</div>
</nav>
</body>
</html>

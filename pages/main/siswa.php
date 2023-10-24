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
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">PT.Moquet</a>
  <button class="navbar-toggler" type="button"data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="data_karyawan.php">Data Karyawan</a>
      </li>
 	  <li class="nav-item">
        <a class="nav-link" href="data_jabatan.php">Data Jabatan</a>
      </li>
    </ul>
        <a class="nav-link" href="./login/logout.php" class="form-inline my-2 my-lg-0">Logout</a>
  </div>
</nav>
<br><br>
<center>
	<img src="gambar/1.png">
  <br>
  <br>
  <h1>PT. Moquet</h1>
  <h5>Hello buu!!</h5>
</center>
</body>
</html>

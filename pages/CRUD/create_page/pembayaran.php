<?php
	session_start();
	if($_SESSION['status']!="login"){
		header("location:../index.php?msg=not_logged");
	}
?>
<!DOCTYPE html>
<html lang="en-us">
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
            <li><a class="px-5 text-2xl hover:underline" href="../data_kelas.php"><span class="sr-only">(current)</span>Data Kelas</a></li>
            <li><a class="px-5 text-2xl hover:underline " href="../data_siswa.php">Data Siswa</a></li>
            <li><a class="px-5 text-2xl first-letter hover:underline " href="../data_spp.php">Data SPP</a></li>
            <li><a class="px-5 text-2xl hover:underline" href="../data_akun.php">Data Akun</a></li>
            <li><a class="px-5 text-2xl font-bold underline" href="../data_pembayaran.php">Data Pembayaran</a></li>
        </ul>
        <div class="right-0 flex gap-4 ">
             <ul class="flex gap-4 py-4 text-white text-m">
                <li><a class="px-5 text-2xl hover:underline" href="../../CRUD/index.php">CRUD</a></li>
                <li><a class="px-5 text-2xl hover:underline" href="../../dashboard/index.php">Dashboard</a></li>
                <li><a class="px-5 text-2xl hover:underline" href="../../../login/logout.php">Logout</a></li>
             </ul>
         </div>
         
      </div>
    </nav>
    <div class="">
    <br><br><br><br><br><br><br>
        <div id="1440px" class="flex items-center justify-center">
            <section class="flex flex-col items-center justify-center gap-5 w-fit">
                <form method="POST" action="../create/pembayaran.php" class="flex flex-col gap-5">
                    <div class="flex flex-col gap-4 ">

                        <label class="text-2xl" for="username">Id Akun</label>
                        <select name="id_akun" class="p-2 text-2xl bg-white rounded-lg" required>
                        <?php
                            require("../../../connection.php");
                            $query = mysqli_query($conn, "SELECT * FROM `data_akun` WHERE level IN ('admin', 'petugas')");
                            $account_names = array();

                            while($row = mysqli_fetch_array($query)){
                                $account_id = $row['id_akun'];
                                $account_name = $row['nama'];
                                $account_names[$account_id] = $account_name; // Store in associative array
                                
                            
                        ?>
                            <option value="<?php echo $account_id; ?>" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem"><?php echo $account_name?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="flex flex-col gap-4 ">
                        <label class="text-2xl">NISN</label>
                        <select name="nisn" class="p-2 text-2xl bg-white rounded-lg" required>
                        <?php
                            require("../../../connection.php");
                            $query = mysqli_query($conn,"SELECT * FROM `data_siswa`");
                            $account_names = array();

                            while($row = mysqli_fetch_array($query)){
                                $account_id = $row['nisn'];
                                $name = $row['nisn'];
                                
                                
                            
                        ?>
                            <option value="<?php echo $account_id; ?>" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem"><?php echo $name?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="flex flex-col gap-4 ">
                        <label class="text-2xl">Tanggal Bayar</label>
                        <input class="pl-2 w-96 rounded-xl" name="tgl_bayar" type="date" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem" required>
                    </div>
                    <div class="flex flex-col gap-4 ">
                        <label class="text-2xl">Bulan Dibayar</label>
                        <select name="bulan_dibayar" class="p-2 text-2xl bg-white rounded-lg" required>
                            <option value="januari" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">Januari</option>
                            <option value="februari" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">Februari</option>
                            <option value="maret" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">Maret</option>
                            <option value="april" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">April</option>
                            <option value="mei" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">Mei</option>
                            <option value="juni" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">Juni</option>
                            <option value="juli" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">Juli</option>
                            <option value="agustus" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">Agustus</option>
                            <option value="september" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">September</option>
                            <option value="oktober" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">Oktober</option>
                            <option value="november" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">November</option>
                            <option value="december" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">December</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-4 ">
                        <label class="text-2xl">Tahun Dibayar</label>
                        <select name="tahun_dibayar" class="p-2 text-2xl bg-white rounded-lg" required>
                     <?php
                         require("../../../connection.php");
                         $query = mysqli_query($conn,"SELECT * FROM `data_spp`");
                         $account_names = array();

                         while($row = mysqli_fetch_array($query)){
                             $tahun_dibayar = $row['tahun'];
                     ?>
                         <option value="<?php echo $tahun_dibayar ?>" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem"><?php echo $tahun_dibayar?></option>
                     <?php } ?>
                     </select>
                    </div>
                    <div class="flex flex-col gap-4 ">
                    <label class="text-2xl">Nominal & Tahun SPP</label>
                    <select name="id_spp" class="p-2 text-2xl bg-white rounded-lg" required>
                        <?php
                            require("../../../connection.php");
                            $query = mysqli_query($conn,"SELECT * FROM `data_spp`");
                            $account_names = array();

                            while($row = mysqli_fetch_array($query)){
                                $account_id = $row['id_spp'];
                                $nominal_spp = $row['nominal'];
                                $tahun_spp = $row['tahun'];
                        ?>
                            <option value="<?php echo $account_id; ?>" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem"><?php echo $tahun_spp?> | <?php echo $nominal_spp ?></option>
                        <?php } ?>
                    </select>
                    </div>
                    <div class="flex flex-col gap-4 ">
                        <label class="text-2xl">Jumlah Bayar</label>
                        <input class="pl-2 w-96 rounded-xl" name="jumlah_bayar" type="text" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem" required>
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

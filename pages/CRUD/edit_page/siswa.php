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
    <link href="../../../dist/output.css" rel="stylesheet" />
  </head>
  
  <body class="flex min-h-screen bg-blue-light">
 
  <nav class="fixed min-w-full">
      <div>
      </div>
      <div style="justify-content:space-between;" class="flex min-w-full px-4 py-5 bg-blue-600 py-auto w-fit">
        <ul class="flex gap-4 py-4 text-white text-m">
            <li><a class="px-5 text-2xl hover:underline" href="../data_kelas.php"><span class="sr-only">(current)</span>Data Kelas</a></li>
            <li><a class="px-5 text-2xl font-bold underline" href="../data_siswa.php">Data Siswa</a></li>
            <li><a class="px-5 text-2xl first-letter hover:underline " href="../data_spp.php">Data SPP</a></li>
            <li><a class="px-5 text-2xl hover:underline" href="../data_akun.php">Data Akun</a></li>
            <li><a class="px-5 text-2xl hover:underline" href="../data_pembayaran.php">Data Pembayaran</a></li>
        </ul>
        <div class="right-0 flex gap-4 ">
             <ul class="flex gap-4 py-4 text-white text-m">
                <li><a class="px-5 text-2xl hover:underline" href="../../../CRUD/index.php">CRUD</a></li>
                <li><a class="px-5 text-2xl hover:underline" href="../../dashboard/index.php">Dashboard</a></li>
                <li><a class="px-5 text-2xl hover:underline" href="../../../login/logout.php">Logout</a></li>
             </ul>
         </div>
         
      </div>
    </nav>
    <section class="flex justify-center min-w-full lg:py-[120px]">
    <div class="container ">
        <div class="flex flex-wrap justify-center">
            <div class="">
                <div class="max-w-full">
                <form action="../edit/siswa.php" method="POST">
                    <table class="w-[1440px] table-auto">
                        <thead>   
                            <tr class="text-center bg-blue-700">
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    No
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    NISN
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    NIS
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    Nama
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    Kelas
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    Alamat
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    No Telpon
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                                    SPP
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4 border-r border-transparent">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                require("../../../connection.php");
                                $no = 1;
                                $id = $_GET["id"];
                                $query = mysqli_query($conn,"SELECT * FROM `data_siswa` WHERE nisn=$id");
                                while($row = mysqli_fetch_array($query)){
                                $idRow = $row["id_kelas"];
                                $query2 = mysqli_query($conn,"SELECT * FROM `data_kelas` WHERE id_kelas = $idRow");
                                $ex = mysqli_fetch_array($query2)
                            ?>
                            <tr>
                                
                                <th class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <?php echo $no++ ?>
                                </th>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-[#F3F6FF] border-b border-[#E8E8E8]">
                                <input type="text" name="nisn" class="max-w-[150px] text-center" value="<?php echo $row["nisn"] ?>" readonly/>
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                   <input type="text" name="nis" class="max-w-[150px] text-center" value="<?php echo $row["nis"] ?>" />
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                   <input type="text" name="nama" class="max-w-[150px] text-center" value="<?php echo $row["nama"] ?>" />
                                </td>
                                <?php }?>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                    <select name="kelas">
                                        <?php 
                                            $id = $_GET["id"];
                                            $query_siswa = mysqli_query($conn,"SELECT `id_kelas` FROM `data_siswa` WHERE nisn = $id");
                                            $row_kelas = mysqli_fetch_array($query_siswa);
                                            $query_kelas = mysqli_query( $conn,"SELECT * FROM `data_kelas`");
                                            while($rows = mysqli_fetch_array($query_kelas)){
                                                $id_kelas_dataKelas = $rows["id_kelas"];
                                                $nama_kelas_dataKelas = $rows["nama_kelas"];
                                                
                                            $selected = ($id_kelas_dataKelas == $row_kelas["id_kelas"]) ? 'selected="selected"' : '';

                                        ?>
                                        <option value="<?php echo $id_kelas_dataKelas ?>" <?php echo $selected ?>><?php echo $nama_kelas_dataKelas ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <?php 
                                require("../../../connection.php");
                                $no = 1;
                                $id = $_GET["id"];
                                $query = mysqli_query($conn,"SELECT * FROM `data_siswa` WHERE nisn=$id");
                                while($row = mysqli_fetch_array($query)){
                                    $query2 = mysqli_query($conn,"SELECT * FROM `data_spp` ");
                                    $row2 = mysqli_fetch_array($query2)
                            ?>
                                <input type="hidden" name="id" value="<?php echo $row["nisn"] ?>" />
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                   <input type="text" name="alamat" class="max-w-[150px] text-center" value="<?php echo $row["alamat"] ?>" />
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                   <input type="text" name="no_telp" class="max-w-[150px] text-center" value="<?php echo $row["no_telp"] ?>" />
                                </td>
                                <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                <select name="id_spp" class="">
                     

                                <?php
                                    require("../../../connection.php");
                                    $query = mysqli_query($conn,"SELECT * FROM `data_spp`");
                                    $account_names = array();

                                    while($row = mysqli_fetch_array($query)){
                                        $account_id = $row['id_spp'];
                                        $nominal_spp = $row['nominal'];
                                        $tahun_spp = $row['tahun'];

                                ?>
                                    
                                    <option value="<?php echo $account_id; ?>" ><?php echo $tahun_spp?> | <?php echo $nominal_spp ?> </option>
                                <?php } ?>
                                </select>
                                </td>
                                <td class="text-center flex items-center justify-center text-dark font-medium text-base py-5 px-2 bg-[#F3F6FF] border-b border-r border-[#E8E8E8]">
                                        <button type="submit" class="inline-block px-6 py-2 mr-2 text-blue-600 border border-blue-600 rounded hover:bg-blue-600 hover:text-white">
                                            Submit
                                        </button>
                                    </td>

                            </tr>
                           <?php } ?>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </form>
                </div>
            </div>
        </div>
    </div>
    </section>

  </body>
</html>

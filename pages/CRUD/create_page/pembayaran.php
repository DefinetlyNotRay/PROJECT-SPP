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
    <title>Tambah Pembayaran</title>
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
                            $query = mysqli_query($conn,"SELECT * FROM `data_akun` WHERE level IN ('admin', 'petugas')");
                            $account_names = array();

                            while($row = mysqli_fetch_array($query)){
                                $account_id = $row['id_akun'];
                                $account_name = $row['username'];
                                $account_names[$account_id] = $account_name; // Store in associative array
                                
                            
                        ?>
                            <option value="<?php echo $account_id; ?>" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem"><?php echo $account_name?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="flex flex-col gap-4 ">
                        <label class="text-2xl">Kelas</label>
                        <select id="kelasDropdown" name="kelas" class="p-2 text-2xl bg-white rounded-lg" required>
                        <option value="" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">Select kelas</option>

                        <?php
                            require("../../../connection.php");
                            $query = mysqli_query($conn,"SELECT * FROM `data_kelas` ");
                            $account_names = array();

                            while($row1 = mysqli_fetch_array($query)){
                                
                                
                            
                        ?>
                            <option value="<?php echo $row1["id_kelas"]; ?>" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem"><?php echo $row1["nama_kelas"]?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="flex flex-col gap-4 ">
                        <label class="text-2xl">NISN</label>
                        <select id="nisnDropdown" name="nisn" class="p-2 text-2xl bg-white rounded-lg" required>
                        <option value="" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">Select NISN</option>

                        <?php
                            require("../../../connection.php");
                            $query = mysqli_query($conn,"SELECT * FROM `data_siswa`");
                            $account_names = array();

                            while($row = mysqli_fetch_array($query)){
                                $account_id = $row['nisn'];
                                
                                
                            
                        ?>
                            <option value="<?php echo $account_id; ?>" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem"><?php echo $account_id?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="flex flex-col gap-4 ">
                        <label class="text-2xl">Tanggal Bayar</label>
                        <input class="pl-2 w-96 rounded-xl" name="tgl_bayar" type="date" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem" required>
                    </div>
                    <div class="flex flex-col gap-4 ">
                        <label class="text-2xl">Tahun Dibayar</label>
                        <select name="tahun_dibayar" class="p-2 text-2xl bg-white rounded-lg" required>
                        <option value="" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">Select Year</option>


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
                        <label class="text-2xl">Bulan Dibayar</label>
                        <select name="bulan_dibayar" class="p-2 text-2xl bg-white rounded-lg" required>
                        <option value="" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">Select Month</option>

                            <option value="Januari" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">Januari</option>
                            <option value="Februari" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">Februari</option>
                            <option value="Maret" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">Maret</option>
                            <option value="April" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">April</option>
                            <option value="Mei" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">Mei</option>
                            <option value="Juni" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">Juni</option>
                            <option value="Juli" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">Juli</option>
                            <option value="Agustus" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">Agustus</option>
                            <option value="September" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">September</option>
                            <option value="Oktober" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">Oktober</option>
                            <option value="November" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">November</option>
                            <option value="December" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem">December</option>



                        </select>
                    </div>
                   
                    <div class="flex flex-col gap-4 ">
                    <label class="text-2xl">Nominal SPP</label>
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
                            
                            <option value="<?php echo $account_id; ?>" style="border-radius: 5px; width: 87rem; height:3rem; font-size:1.5rem"><?php echo $tahun_spp?> | <?php echo $nominal_spp ?> </option>
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
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const kelasDropdown = document.getElementById('kelasDropdown');
    const nisnDropdown = document.getElementById('nisnDropdown');
    const bulanDropdown = document.getElementsByName('bulan_dibayar')[0];
    const tahunDropdown = document.getElementsByName('tahun_dibayar')[0];

    function updateMonthOptions() {
        const selectedBulan = bulanDropdown.value;
        const selectedTahun = tahunDropdown.value;
        const selectedNisn = nisnDropdown.value;

        const xhr = new XMLHttpRequest();
        xhr.onload = function() {
            if (xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);

                // Iterate through the options and disable those that are in the list of paid months
                for (let i = 0; i < bulanDropdown.options.length; i++) {
                    const option = bulanDropdown.options[i];
                    if (data.includes(option.value) && option.value !== selectedBulan) {
                        option.disabled = true;
                    } else {
                        option.disabled = false;
                    }
                }
            }
        };
        xhr.open('GET', `./get_paid_months.php?nisn=${selectedNisn}&tahun=${selectedTahun}`, true);
        xhr.send();
    }

    kelasDropdown.addEventListener('change', function() {
        const selectedKelas = this.value;

        nisnDropdown.innerHTML = '';

        const defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.text = 'Select NISN';
        nisnDropdown.appendChild(defaultOption);

        const defaultBulanOption = document.createElement('option');
        defaultBulanOption.value = '';
        
       

        const defaultTahunOption = document.createElement('option');
        defaultTahunOption.value = '';
        defaultTahunOption.text = 'Select Tahun';
       

        const xhr = new XMLHttpRequest();
        xhr.onload = function() {
            if (xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);
                data.forEach(function(item) {
                    const option = document.createElement('option');
                    option.value = item.nisn;
                    option.text = item.nisn;
                    nisnDropdown.appendChild(option);
                });
            }
        };
        xhr.open('GET', `./get_nisn_option.php?kelas=${selectedKelas}`, true);
        xhr.send();
        updateMonthOptions();
    });

    nisnDropdown.addEventListener('change', function() {
        const selectedNisn = this.value;
        const selectedTahun = tahunDropdown.value;

        const xhr = new XMLHttpRequest();
        xhr.onload = function() {
            if (xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);  // Parse the response as JSON
                const selectedBulan = bulanDropdown.value;

                // Iterate through the options and disable those that are in the list of paid months
                for (let i = 0; i < bulanDropdown.options.length; i++) {
                    const option = bulanDropdown.options[i];
                    if (data.includes(option.value) && option.value !== selectedBulan) {
                        option.disabled = true;
                    } else {
                        option.disabled = false;
                    }
                }
            }
        };
        xhr.open('GET', `./get_paid_months.php?nisn=${selectedNisn}&tahun=${selectedTahun}`, true);
        xhr.send();
        updateMonthOptions();
    });

    bulanDropdown.addEventListener('change', function() {
        const selectedBulan = this.value;
        const selectedTahun = tahunDropdown.value;
        const selectedNisn = nisnDropdown.value;

        const xhr = new XMLHttpRequest();
        xhr.onload = function() {
            if (xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);
                console.log(data)

                // Iterate through the options and disable those that are in the list of paid months
                for (let i = 0; i < bulanDropdown.options.length; i++) {
                    const option = bulanDropdown.options[i];
                    if (data.includes(option.value) && option.value !== selectedBulan) {
                        option.disabled = true;
                    } else {
                        option.disabled = false;
                    }
                }
            }
        };
        xhr.open('GET', `./get_paid_months.php?nisn=${selectedNisn}&tahun=${selectedTahun}`, true);
        xhr.send();
        updateMonthOptions();
    });

    tahunDropdown.addEventListener('change', function() {
        const selectedTahun = this.value;
        const selectedNisn = nisnDropdown.value;

        const xhr = new XMLHttpRequest();
        xhr.onload = function() {
            if (xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);
                const selectedBulan = bulanDropdown.value;

                // Iterate through the options and enable those that are not in the list of paid months
                for (let i = 0; i < bulanDropdown.options.length; i++) {
                    const option = bulanDropdown.options[i];
                    if (!data.includes(option.value) || option.value === selectedBulan) {
                        option.disabled = false;
                    } else {
                        option.disabled = true;
                    }
                }
            }
        };
        xhr.open('GET', `./get_paid_months.php?nisn=${selectedNisn}&tahun=${selectedTahun}`, true);
        xhr.send();
        updateMonthOptions();
    });

    updateMonthOptions();
});

</script>
    </div>
  </body>
</html>

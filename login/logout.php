<?php 
session_start();

// menghapus semua session
session_destroy();

// mengalihkan halaman sambil mengirim pesan logout
header("location:../pages/index.php?pesan=logout");
?>
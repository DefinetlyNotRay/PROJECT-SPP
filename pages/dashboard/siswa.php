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
    <title>Dashboard</title>
    <link href="../../dist/output.css" rel="stylesheet" />
  </head>
  
  <body class="min-h-screen bg-blue-light">
    <nav class="fixed m">
      <div>
          
      </div>
      <div class="flex justify-between w-screen px-4 py-5 bg-blue-600 py-auto">
        <ul class="flex gap-4 py-4 text-white text-m">
          <li><a class="px-5 text-2xl font-bold underline " href="dashboard/index.php"><span class="sr-only">(current)</span>Dashboard</a></li>
          <li><a class="px-5 text-2xl hover:underline" href="../CRUD/siswa/history.php">Lihat History</a></li>
        </ul>
        <ul class="flex gap-4 py-4 text-white text-m">
        <li><a class="px-5 text-2xl hover:underline" href="../../login/logout.php">Log Out</a></li>

        </ul>
      </div>
    </nav>
    <div class="flex justify-center w-full">
    <?php
    $login = isset($_GET['login']) ? $_GET['login'] : '';
    $successMessage = '';
    if($login == 'success'){
    $successMessage =  '<div id="successAlert" class="flex items-center p-4 mt-20 mb-4 text-sm text-green-800 border border-green-300 rounded-lg w-screeb bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="sr-only">Info</span>
    <div class="flex-grow">
        <span class="font-medium">Success!</span> You are logged in!!
    </div>
    <button id="closeButton" class="text-green-600 hover:text-green-900">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path fill-rule="evenodd" d="M6.293 6.293a1 1 0 011.414 0L10 8.586l2.293-2.293a1 1 0 111.414 1.414L11.414 10l2.293 2.293a1 1 0 11-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 01-1.414-1.414L8.586 10 6.293 7.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
    </button>
        
</div>';
}
echo $successMessage;
    ?>
    </div>
    <style>
      #successAlert{
        margin-top: 10rem;
        width:2100px;
      }
    </style>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const closeButton = document.getElementById('closeButton');
        const successAlert = document.getElementById('successAlert');
       
        if (closeButton && successAlert) {
            closeButton.addEventListener('click', function() {
                successAlert.style.display = 'none';
            });
        }
    });
</script>
  </body>
</html>

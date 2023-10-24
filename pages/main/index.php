<?php
	session_start();
	if($_SESSION['status']!="login"){
		header("location:login/index.php?pesan=not_logged");
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
    <nav class="static bg-blue-200 min-w-full">
        s
    </nav>
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link href="../dist/output.css" rel="stylesheet" />
  </head>
  <body class="flex flex-col items-center justify-center min-h-screen bg-blue">
  <?php
    $login = isset($_GET['msg']) ? $_GET['msg'] : '';
    $successMessage = '';
    if($login == 'logout'){
    $successMessage =  '<div id="successAlert" class="flex items-center p-4 mt-20 mb-4 text-sm text-green-800 border border-green-300 rounded-lg w-screeb bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="sr-only">Info</span>
    <div class="flex-grow">
        <span class="font-medium">Success!</span> You are logged out!!
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
    <div class="container flex flex-col items-center justify-center">
    
      <div class="bg-white rounded-md wrapper w-96">
      
        <div class="flex flex-col items-start p-11">
          <form action="../login/verify_account.php" method="post" class="w-full"
          >
          <?php 
        if(isset($_GET['msg'])){
            if($_GET['msg'] == "failed"){
                echo '<p class="mb-5 font-bold text-center">Failed to Login, your username or password is wrong!</p>';
            }else if($_GET['msg'] == "not_logged"){
                echo '<p class="mb-5 font-bold text-center">You have to login first to access dashboard</p>';
            } else if($_GET['msg'] == "admin"){
              echo '<p class="mb-5 font-bold text-center">You have to login as admin first to access this page</p>';
          } 
        }
        ?>
            <p class="font-bold">Username:</p>
            <input
              type="text"
              class="w-full mb-6 rounded-sm bg-blue-light h-11"
              style="padding-left: 1rem"
              name="username"
            />

            <p class="font-bold">Password:</p>
            <input
              type="password"
              class="w-full mb-6 rounded-sm bg-blue-light h-11"
              style="padding-left: 1rem"
              name="password"
            />

            <div class="flex flex-col items-center justify-center w-full">
              <button
                class="flex items-center justify-center w-full mb-2 font-bold text-white duration-300 ease-in-out rounded-sm bg-blue h-11 shadow-L hover:bg-blue-light"
              >
                Sign in
              </button>


            </div>
          </form>
        </div>
      </div>
    </div>
    <style>
      #successAlert{
        width:385px;
        
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

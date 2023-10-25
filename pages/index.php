<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link href="../dist/output.css" rel="stylesheet" />
  </head>
  <body class="flex items-center justify-center min-h-screen bg-blue">
   
    <div class="container flex justify-center">
      <div class="bg-white rounded-md wrapper w-96">
        <div class="flex flex-col items-start p-11">
          <form action="../login/verify_account.php" method="post" class="w-full"
          >
          <?php 
        if(isset($_GET['msg'])){
            if($_GET['msg'] == "failed"){
                echo '<p class="mb-5 font-bold text-center">Failed to Login, your username or password is wrong!</p>';
            }else if($_GET['msg'] == "logout"){
                echo '<p class="mb-5 font-bold text-center">successfully logged out</p>';
            }else if($_GET['msg'] == "not_logged"){
                echo '<p class="mb-5 font-bold text-center">You have to login first to access dashboard</p>';
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
              type="text"
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

              <p class="mt-5 text-sm text-center">
                Dont have an account?
                <a
                  href="sign-up.php"
                  class="font-bold underline text-blue-light"
                  >Sign Up</a
                >
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>

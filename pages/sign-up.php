<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign up</title>
    <link href="../dist/output.css" rel="stylesheet" />
  </head>
  <body class="flex items-center justify-center min-h-screen bg-blue">
    <div class="container flex justify-center">
      <div class="bg-white rounded-md wrapper w-96">
        <div class="flex flex-col items-start p-11">
          <form action="" method="post" class="w-full">
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
            <p class="font-bold">Name:</p>
            <input
              type="text"
              class="w-full mb-6 rounded-sm bg-blue-light h-11"
              style="padding-left: 1rem"
              name="name"
            />
            <div class="flex flex-col items-center justify-center w-full">
              <button
                class="flex items-center justify-center w-full mb-2 font-bold text-white duration-300 ease-in-out rounded-sm bg-blue h-11 shadow-L hover:bg-blue-light"
              >
                Sign up
              </button>
              <p class="text-sm text-center mt-5">
                Already have an account?
                <a
                  href="index.php"
                  class="font-bold underline text-blue-light"
                  >Sign In</a
                >
                <input type="hidden" aria-hidden="hidden" value="petugas" />
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>

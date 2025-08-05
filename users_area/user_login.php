<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Ecommerce Website</title>

    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" class="" enctype="multipart/form-data">

                    <!-- username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username">
                    </div>

                    <!-- password field -->
                    <div class="form-outline mb-4">
                        <label for="user_userpassword" class="form-label">Password</label>
                        <input type="password" id="user_userpassword" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_userpassword">
                    </div>

                    <!-- submit button -->
                    <div class="mt-4 pt-2">
                        <input type="submit" class="bg-info py-2 px-3 border-0" value="Login" name="user_login">
                        <p class="small fw-bold mt-3 pt-1 mb-0">Don't have an account? <a href="user_registration.php" class="text-danger">Register</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>
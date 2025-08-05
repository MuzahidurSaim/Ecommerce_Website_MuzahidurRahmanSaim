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
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" class="" enctype="multipart/form-data">

                    <!-- username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username">
                    </div>

                    <!-- email field -->
                    <div class="form-outline mb-4">
                        <label for="user_useremail" class="form-label">Email</label>
                        <input type="email" id="user_useremail" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="user_useremail">
                    </div>

                    <!-- image field -->
                    <div class="form-outline mb-4">
                        <label for="user_userimage" class="form-label">User Image</label>
                        <input type="file" id="user_userimage" class="form-control" required="required" name="user_userimage">
                    </div>

                    <!-- password field -->
                    <div class="form-outline mb-4">
                        <label for="user_userpassword" class="form-label">Password</label>
                        <input type="password" id="user_userpassword" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_userpassword">
                    </div>

                    <!-- confirmed password field -->
                    <div class="form-outline mb-4">
                        <label for="conf_user_userpassword" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_user_userpassword" class="form-control" placeholder="Confirm password" autocomplete="off" required="required" name="conf_user_userpassword">
                    </div>

                    <!-- address field -->
                    <div class="form-outline mb-4">
                        <label for="user_useraddress" class="form-label">Address</label>
                        <input type="text" id="user_useraddress" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" name="user_useraddress">
                    </div>

                    <!-- contact field -->
                    <div class="form-outline mb-4">
                        <label for="user_usercontact" class="form-label">Contact</label>
                        <input type="text" id="user_usercontact" class="form-control" placeholder="Enter your mobile number" autocomplete="off" required="required" name="user_usercontact">
                    </div>

                    <!-- submit button -->
                    <div class="mt-4 pt-2">
                        <input type="submit" class="bg-info py-2 px-3 border-0" value="Register" name="user_register">
                        <p class="small fw-bold mt-3 pt-1 mb-0">Already have an account? <a href="user_login.php" class="text-danger">Login</a></p>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</body>
</html>
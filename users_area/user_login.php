<?php

    /* connecting to the database */
    include('../includes/connect.php');
    include_once('../functions/common_function.php');

    /* checking whether the user credentials are correct or not */
    if(isset($_POST['user_login'])) {
        $user_username=$_POST['user_username'];
        $user_userpassword=$_POST['user_userpassword'];

        $select_query="SELECT * FROM `user_table` WHERE user_name='$user_username'";
        $result=mysqli_query($con, $select_query);
        $row_count=mysqli_num_rows($result);
        $row_data=mysqli_fetch_assoc($result);
        $user_userip=getUserIpAddress();

        $select_query_cart="SELECT * FROM `cart_details` WHERE ip_address='$user_userip'";
        $select_cart=mysqli_query($con, $select_query_cart);
        $row_count_cart=mysqli_num_rows($select_cart);

        if($row_count>0) {
            $_SESSION['username']=$user_username;
            if(password_verify($user_userpassword, $row_data['user_password'])) {
                if($row_count==1 AND $row_count_cart==0) {
                    $_SESSION['username']=$user_username;
                    echo "<script>alert('Login successful')</script>";
                    echo "<script>window.open('profile.php', '_self')</script>";
                } else {
                    $_SESSION['username']=$user_username;
                    echo "<script>alert('Login successful')</script>";
                    echo "<script>window.open('payment.php', '_self')</script>";
                }
            } else {
                echo "<script>alert('Password does not match')</script>";
            }
        } else {
            echo "<script>alert('Username does not match')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAIM - User Login</title>

    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!-- css file -->
    <link rel = "stylesheet" href = "style.css">
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">

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
<?php
    /* connecting to the database */
    include('../includes/connect.php');
    include('../functions/common_function.php');
    @session_start();

    /* checking whether the user credentials are correct or not */
    if(isset($_POST['admin_login'])) {
        $username=$_POST['username'];
        $password=$_POST['password'];

        $select_query="SELECT * FROM `admin_table` WHERE admin_name='$username'";
        $result=mysqli_query($con, $select_query);
        $row_count=mysqli_num_rows($result);
        $row_data=mysqli_fetch_assoc($result);

        if($row_count>0) {
            $_SESSION['username']=$username;
            if(password_verify($password, $row_data['admin_password'])) {
                $_SESSION['username']=$username;
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('./index.php', '_self')</script>";
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
    <title>SAIM - Admin Login</title>

    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel = "stylesheet" href = "../style.css">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            overflow-x: hidden;
        }

        .logo {
            width:4%;
            height:2%;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">

        <!-- fourth child -->
        <div class="container-fluid m-3">
            <h2 class="text-center mb-5">Admin Login</h2>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 col-xl-6">
                    <img src="../images/admin_login.jpg" alt="Admin Login" class="img-fluid">
                </div>
                <div class="col-lg-6 col-xl-4">
                    <form action="" method="post">
                        <div class="form-outline mb-4">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" placeholder="Enter your username" required="required" class="form-control">
                        </div>
                        <div class="form-outline mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" placeholder="Enter your password" required="required" class="form-control">
                        </div>
                        <div>
                            <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_login" value="Login">
                            <p class="small fw-bold mt-2 pt-1">Don't have an account? <a href="admin_registration.php">Register</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
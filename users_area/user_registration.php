<?php

    /* connecting to the database */
    include('../includes/connect.php');
    include('../functions/common_function.php');

    /* storing registration information into the database */
    if(isset($_POST['user_register'])) {
        $user_username=$_POST['user_username'];
        $user_useremail=$_POST['user_useremail'];
        $user_conf_userpassword=$_POST['user_conf_userpassword'];
        $user_useraddress=$_POST['user_useraddress'];
        $user_usercontact=$_POST['user_usercontact'];
        $user_userip=getUserIpAddress();

        $user_userpassword=$_POST['user_userpassword'];
        $user_hash_userpassword=password_hash($user_userpassword, PASSWORD_DEFAULT);

        $user_userimage=$_FILES['user_userimage']['name'];
        $user_tmp_userimage=$_FILES['user_userimage']['tmp_name'];

        $select_query="SELECT * FROM `user_table` WHERE user_name='$user_username' or user_email='$user_useremail'";
        $result=mysqli_query($con, $select_query);
        $rows_count=mysqli_num_rows($result);

        if($rows_count>0) {
            echo "<script>alert('Username or Email already exists')</script>";
        } else if($user_userpassword != $user_conf_userpassword) {
            echo "<script>alert('Passwords do not match')</script>";
        } else {
            move_uploaded_file($user_tmp_userimage, "./user_images/$user_userimage");

            $insert_query="INSERT INTO `user_table` (user_name, user_email, user_password, user_image, user_ip, user_address, user_mobile) VALUES ('$user_username', '$user_useremail', '$user_hash_userpassword', '$user_userimage', '$user_userip', '$user_useraddress', '$user_usercontact')";
            $sql_execute=mysqli_query($con, $insert_query);

            if($sql_execute) {
                echo "<script>alert('Data inserted successfully')</script>";
            } else {
                die(mysqli_error($con));
            }
        }

        /* checking if the user has added items in the cart before login */
        $select_cart_items="SELECT * FROM `cart_details` WHERE ip_address='$user_userip'";
        $result_cart=mysqli_query($con, $select_cart_items);
        $rows_count=mysqli_num_rows($result_cart);

        if($rows_count>0) {
            $_SESSION['username']=$user_username;
            echo "<script>alert('You have items in your cart')</script>";
            echo "<script>window.open('checkout.php', '_self')</script>";
        } else {
            echo "<script>window.open('../index.php', '_self')</script>";
        }
    }

?>

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
        <div class="row d-flex align-items-center justify-content-center mt-5">
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
                        <label for="user_conf_userpassword" class="form-label">Confirm Password</label>
                        <input type="password" id="user_conf_userpassword" class="form-control" placeholder="Confirm password" autocomplete="off" required="required" name="user_conf_userpassword">
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
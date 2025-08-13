# Project Structure
Ecommerce_Website/
├── admin_area/
│   ├── product_images/
│   ├── admin_login.php
│   ├── admin_registration.php
│   ├── all_orders.php
│   ├── all_payments.php
│   ├── all_users.php
│   ├── delete_brand.php
│   ├── delete_category.php
│   ├── delete_order.php
│   ├── delete_payment.php
│   ├── delete_products.php
│   ├── delete_user.php
│   ├── edit_brand.php
│   ├── edit_category.php
│   ├── edit_products.php
│   ├── index.php
│   ├── insert_brands.php
│   ├── insert_categories.php
│   ├── insert_product.php
│   ├── view_brands.php
│   ├── view_categories.php
│   ├── view_products.php
├── functions/
│   ├── common_function.php
├── includes/
│   ├── connect.php
│   ├── footer.php
├── users_area
│   ├── user_images/
│   ├── checkout.php
│   ├── confirm_payment.php
│   ├── delete_account.php
│   ├── edit_account.php
│   ├── order.php
│   ├── payment.php
│   ├── profile.php
│   ├── user_login.php
│   ├── user_logout.php
│   ├── user_orders.php
│   ├── user_registration.php
├── cart.php
├── display_all.php
├── index.php
├── product_details.php
├── search_product.php
├── style.css

# Database Structure
├── admin_table
│   ├── admin_id	int(11)	NO	PRI	NULL	auto_increment
│   ├── admin_name	varchar(255)	NO		NULL
│   ├── admin_email	varchar(255)	NO		NULL
│   ├── admin_password	varchar(255)	NO		NULL
├── brands
│   ├── brand_id	int(11)	NO	PRI	NULL	auto_increment
│   ├── brand_title	varchar(100)	NO		NULL
├── cart_details
│   ├── product_id	int(11)	NO	PRI	NULL
│   ├── ip_address	varchar(255)	NO		NULL
│   ├── quantity	int(100)	NO		NULL
├── categories
│   ├── category_id	int(11)	NO	PRI	NULL	auto_increment
│   ├── category_title	varchar(100)	NO		NULL
├── orders_pending
│   ├── order_id	int(11)	NO	PRI	NULL	auto_increment
│   ├── user_id	int(11)	NO		NULL
│   ├── invoice_number	int(255)	NO		NULL
│   ├── product_id	int(11)	NO		NULL
│   ├── quantity	int(255)	NO		NULL
│   ├── order_status	varchar(255)	NO		NULL
├── products
│   ├── product_id	int(11)	NO	PRI	NULL	auto_increment
│   ├── product_title	varchar(100)	NO		NULL
│   ├── product_description	varchar(255)	NO		NULL
│   ├── product_keywords	varchar(255)	NO		NULL
│   ├── category_id	int(11)	NO		NULL
│   ├── brand_id	int(11)	NO		NULL
│   ├── product_image1	varchar(255)	NO		NULL
│   ├── product_image2	varchar(255)	NO		NULL
│   ├── product_image3	varchar(255)	NO		NULL
│   ├── product_price	varchar(100)	NO		NULL
│   ├── product_date	timestamp	NO		current_timestamp()	on update current_timestamp()
│   ├── product_status	varchar(100)	NO		NULL
├── user_orders
│   ├── order_id	int(11)	NO	PRI	NULL	auto_increment
│   ├── user_id	int(11)	NO		NULL
│   ├── amount_due	int(255)	NO		NULL
│   ├── invoice_number	int(255)	NO		NULL
│   ├── total_products	int(255)	NO		NULL
│   ├── order_date	timestamp	NO		current_timestamp()	on update current_timestamp()
│   ├── order_status	varchar(255)	NO		NULL
├── user_payments
│   ├── payment_id	int(11)	NO	PRI	NULL	auto_increment
│   ├── order_id	int(11)	NO		NULL
│   ├── invoice_number	int(11)	NO		NULL
│   ├── amount	int(11)	NO		NULL
│   ├── payment_mode	varchar(255)	NO		NULL
│   ├── date	timestamp	NO		current_timestamp()	on update current_timestamp()
├── user_table
│   ├── user_id	int(11)	NO	PRI	NULL	auto_increment
│   ├── user_name	varchar(100)	NO		NULL
│   ├── user_email	varchar(100)	NO		NULL
│   ├── user_password	varchar(255)	NO		NULL
│   ├── user_image	varchar(255)	NO		NULL
│   ├── user_ip	varchar(255)	NO		NULL
│   ├── user_address	varchar(255)	NO		NULL
│   ├── user_mobile	varchar(20)	NO		NULL

# admin_login.php
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

# admin_registration.php
<?php

    /* connecting to the database */
    include('../includes/connect.php');
    include_once('../functions/common_function.php');

    /* storing registration information into the database */
    if(isset($_POST['admin_registration'])) {
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $hash_password=password_hash($password, PASSWORD_DEFAULT);
        $confirm_password=$_POST['confirm_password'];

        $select_query="SELECT * FROM `admin_table` WHERE admin_name='$username' or admin_email='$email'";
        $result=mysqli_query($con, $select_query);
        $rows_count=mysqli_num_rows($result);

        if($rows_count>0) {
            echo "<script>alert('Username or Email already exists')</script>";
        } else if($password != $confirm_password) {
            echo "<script>alert('Passwords do not match')</script>";
        } else {
            $insert_query="INSERT INTO `admin_table` (admin_name, admin_email, admin_password) VALUES ('$username', '$email', '$hash_password')";
            $sql_execute=mysqli_query($con, $insert_query);

            if($sql_execute) {
                echo "<script>alert('Data inserted successfully')</script>";
            } else {
                die(mysqli_error($con));
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAIM - Admin Registration</title>

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
            <h2 class="text-center mb-5">Admin Registration</h2>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 col-xl-6">
                    <img src="../images/admin_register.jpg" alt="Admin Registration" class="img-fluid">
                </div>
                <div class="col-lg-6 col-xl-4">
                    <form action="" method="post">
                        <div class="form-outline mb-4">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" placeholder="Enter your username" required="required" class="form-control">
                        </div>
                        <div class="form-outline mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email" required="required" class="form-control">
                        </div>
                        <div class="form-outline mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" placeholder="Enter your password" required="required" class="form-control">
                        </div>
                        <div class="form-outline mb-4">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" placeholder="Enter your password again" required="required" class="form-control">
                        </div>
                        <div>
                            <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_registration" value="Register">
                            <p class="small fw-bold mt-2 pt-1">Already have an account? <a href="admin_login.php">Login</a></p>
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

# all_orders.php
<h3 class="text-center text-success">All Orders</h3>
<table class="table table-bordered mt-4 text-center">
    <thead class="table_head">
        <?php
            $get_orders="SELECT * FROM `user_orders`";
            $result=mysqli_query($con, $get_orders);
            $row_count=mysqli_num_rows($result);
            if($row_count==0) {
                echo "<h2 class='text-danger text-center mt-5'>No orders yet</h2>";
            }
            else {
                echo "
                    <tr>
                    <th>SL no</th>
                    <th>Due Amount</th>
                    <th>Invoice number</th>
                    <th>Total products</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody class='table_body'>
                ";
                $number=0;
                while($row_data=mysqli_fetch_assoc($result)) {
                    $order_id=$row_data['order_id'];
                    $user_id=$row_data['user_id'];
                    $amount_due=$row_data['amount_due'];
                    $invoice_number=$row_data['invoice_number'];
                    $total_products=$row_data['total_products'];
                    $order_date=$row_data['order_date'];
                    $order_status=$row_data['order_status'];
                    $number++;
                    echo "
                        <tr>
                            <td>$number</td>
                            <td>$amount_due</td>
                            <td>$invoice_number</td>
                            <td>$total_products</td>
                            <td>$order_date</td>
                            <td>$order_status</td>
                            <td><a href='index.php?delete_order=$order_id' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                        </tr>
                    ";
                }
            }
        ?>
    </tbody>
</table>

# all_payments.php
<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered mt-4 text-center">
    <thead class="table_head">
        <?php
            $get_payments="SELECT * FROM `user_payments`";
            $result=mysqli_query($con, $get_payments);
            $row_count=mysqli_num_rows($result);
            if($row_count==0) {
                echo "<h2 class='text-danger text-center mt-5'>No payments received yet</h2>";
            }
            else {
                echo "
                    <tr>
                    <th>SL no</th>
                    <th>Invoice number</th>
                    <th>Amount</th>
                    <th>Payment mode</th>
                    <th>Order Date</th>
                    <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody class='table_body'>
                ";
                $number=0;
                while($row_data=mysqli_fetch_assoc($result)) {
                    $payment_id=$row_data['payment_id'];
                    $order_id=$row_data['order_id'];
                    $invoice_number=$row_data['invoice_number'];
                    $amount=$row_data['amount'];
                    $payment_mode=$row_data['payment_mode'];
                    $date=$row_data['date'];
                    $number++;
                    echo "
                        <tr>
                            <td>$number</td>
                            <td>$invoice_number</td>
                            <td>$amount</td>
                            <td>$payment_mode</td>
                            <td>$date</td>
                            <td><a href='index.php?delete_payment=$payment_id' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                        </tr>
                    ";
                }
            }
        ?>
    </tbody>
</table>

# all_users.php
<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-4 text-center">
    <thead class="table_head">
        <?php
            $get_users="SELECT * FROM `user_table`";
            $result=mysqli_query($con, $get_users);
            $row_count=mysqli_num_rows($result);
            if($row_count==0) {
                echo "<h2 class='text-danger text-center mt-5'>No users yet</h2>";
            }
            else {
                echo "
                    <tr>
                    <th>SL no</th>
                    <th>Username</th>
                    <th>User email</th>
                    <th>User image</th>
                    <th>User address</th>
                    <th>User mobile</th>
                    <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody class='table_body'>
                ";
                $number=0;
                while($row_data=mysqli_fetch_assoc($result)) {
                    $user_id=$row_data['user_id'];
                    $user_name=$row_data['user_name'];
                    $user_email=$row_data['user_email'];
                    $user_image=$row_data['user_image'];
                    $user_address=$row_data['user_address'];
                    $user_mobile=$row_data['user_mobile'];
                    $number++;
                    echo "
                        <tr>
                            <td>$number</td>
                            <td>$user_name</td>
                            <td>$user_email</td>
                            <td><img src='../users_area/user_images/$user_image' alt='$user_name' class='product_img'></td>
                            <td>$user_address</td>
                            <td>$user_mobile</td>
                            <td><a href='index.php?delete_user=$user_id' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                        </tr>
                    ";
                }
            }
        ?>
    </tbody>
</table>

# delete_brand.php
<?php
    if(isset($_GET['delete_brand'])) {
        $delete_brand=$_GET['delete_brand'];
        $delete_query="DELETE FROM `brands` WHERE brand_id=$delete_brand";
        $result=mysqli_query($con, $delete_query);
        if($result) {
            echo "<script>alert('Brand has been deleted successfully')</script>";
            echo "<script>window.open('./index.php?view_brands', '_self')</script>";
        }
    }
?>

# delete_category.php
<?php
    if(isset($_GET['delete_category'])) {
        $delete_category=$_GET['delete_category'];
        $delete_query="DELETE FROM `categories` WHERE category_id=$delete_category";
        $result=mysqli_query($con, $delete_query);
        if($result) {
            echo "<script>alert('Category has been deleted successfully')</script>";
            echo "<script>window.open('./index.php?view_categories', '_self')</script>";
        }
    }
?>

# delete_order.php
<?php
    if(isset($_GET['delete_order'])) {
        $delete_order=$_GET['delete_order'];
        $delete_query="DELETE FROM `user_orders` WHERE order_id=$delete_order";
        $result=mysqli_query($con, $delete_query);
        if($result) {
            echo "<script>alert('Order has been deleted successfully')</script>";
            echo "<script>window.open('./index.php?all_orders', '_self')</script>";
        }
    }
?>

# delete_payment.php
<?php
    if(isset($_GET['delete_payment'])) {
        $delete_payment=$_GET['delete_payment'];
        $delete_query="DELETE FROM `user_payments` WHERE payment_id=$delete_payment";
        $result=mysqli_query($con, $delete_query);
        if($result) {
            echo "<script>alert('Payment has been deleted successfully')</script>";
            echo "<script>window.open('./index.php?all_payments', '_self')</script>";
        }
    }
?>

# delete_products.php
<?php
    if(isset($_GET['delete_products'])) {
        $delete_id=$_GET['delete_products'];
        $delete_product="DELETE FROM `products` WHERE product_id=$delete_id";
        $result_product=mysqli_query($con, $delete_product);
        if($result_product) {
            echo "<script>alert('Product deleted successfully')</script>";
            echo "<script>window.open('./index.php', '_self')</script>";
        }
    }
?>

# delete_user.php
<?php
    if(isset($_GET['delete_user'])) {
        $delete_user=$_GET['delete_user'];
        $delete_query="DELETE FROM `users` WHERE user_id=$delete_user";
        $result=mysqli_query($con, $delete_query);
        if($result) {
            echo "<script>alert('User has been deleted successfully')</script>";
            echo "<script>window.open('./index.php?all_users', '_self')</script>";
        }
    }
?>

# edit_brand.php
<?php
    if(isset($_GET['edit_brand'])) {
        $edit_brand=$_GET['edit_brand'];
        $get_brands="SELECT * FROM `brands` WHERE brand_id=$edit_brand";
        $result=mysqli_query($con, $get_brands);
        $row=mysqli_fetch_assoc($result);
        $brand_title=$row['brand_title'];
    }

    if(isset($_POST['edit_cat'])) {
        $cat_title=$_POST['brand_title'];
        $update_query="UPDATE `brands` SET brand_title='$cat_title' WHERE brand_id=$edit_brand";
        $result_cat=mysqli_query($con, $update_query);
        if($result_cat) {
            echo "<script>alert('Brand is been updated successfully')</script>";
            echo "<script>window.open('./index.php?view_brands', '_self')</script>";
        }
    }
?>

<div class="container mt-3">
    <h3 class="text-center">Edit Brand</h3>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brand_title" class="form-label">Brand Title</label>
            <input type="text" name="brand_title" id="brand_title" class="form-control" required="required" value="<?=$brand_title?>">
        </div>
        <input type="submit" value="Update Brand" class="btn btn-info px-3 mb-3" name="edit_cat">
    </form>
</div>

# edit_category.php
<?php
    if(isset($_GET['edit_category'])) {
        $edit_category=$_GET['edit_category'];
        $get_categories="SELECT * FROM `categories` WHERE category_id=$edit_category";
        $result=mysqli_query($con, $get_categories);
        $row=mysqli_fetch_assoc($result);
        $category_title=$row['category_title'];
    }

    if(isset($_POST['edit_cat'])) {
        $cat_title=$_POST['category_title'];
        $update_query="UPDATE `categories` SET category_title='$cat_title' WHERE category_id=$edit_category";
        $result_cat=mysqli_query($con, $update_query);
        if($result_cat) {
            echo "<script>alert('Category is been updated successfully')</script>";
            echo "<script>window.open('./index.php?view_categories', '_self')</script>";
        }
    }
?>

<div class="container mt-3">
    <h3 class="text-center">Edit Category</h3>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="category_title" class="form-label">Category Title</label>
            <input type="text" name="category_title" id="category_title" class="form-control" required="required" value="<?=$category_title?>">
        </div>
        <input type="submit" value="Update Category" class="btn btn-info px-3 mb-3" name="edit_cat">
    </form>
</div>

# edit_products.php
<?php
    if(isset($_GET['edit_products'])) {
        $edit_id=$_GET['edit_products'];
        $get_data="SELECT * FROM `products` WHERE product_id=$edit_id";
        $result=mysqli_query($con, $get_data);
        $row=mysqli_fetch_assoc($result);
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_keywords=$row['product_keywords'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        $product_image1=$row['product_image1'];
        $product_image2=$row['product_image2'];
        $product_image3=$row['product_image3'];
        $product_price=$row['product_price'];

        // fetching category
        $select_category="SELECT * FROM `Categories` WHERE category_id=$category_id";
        $result_category=mysqli_query($con, $select_category);
        $row_category=mysqli_fetch_assoc($result_category);
        $category_title=$row_category['category_title'];

        // fetching brands
        $select_brand="SELECT * FROM `brands` WHERE brand_id=$brand_id";
        $result_brand=mysqli_query($con, $select_brand);
        $row_brand=mysqli_fetch_assoc($result_brand);
        $brand_title=$row_brand['brand_title'];
    }

    /* editing products */
    if(isset($_POST['edit_product'])) {
        $product_title=$_POST['product_title'];
        $product_description=$_POST['product_description'];
        $product_keywords=$_POST['product_keywords'];
        $product_category=$_POST['product_category'];
        $product_brand=$_POST['product_brand'];
        $product_price=$_POST['product_price'];

        $product_image1=$_FILES['product_image1']['name'];
        $product_image2=$_FILES['product_image2']['name'];
        $product_image3=$_FILES['product_image3']['name'];

        $temp_image1=$_FILES['product_image1']['tmp_name'];
        $temp_image2=$_FILES['product_image2']['tmp_name'];
        $temp_image3=$_FILES['product_image3']['tmp_name'];

        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        /* query to update products */
        $update_product="UPDATE `products` SET product_title='$product_title', product_description='$product_description', product_keywords='$product_keywords', category_id=$product_category, brand_id=$product_brand, product_image1='$product_image1', product_image2='$product_image2', product_image3='$product_image3', product_price='$product_price', product_date=NOW() WHERE product_id=$edit_id";
        $result_update=mysqli_query($con, $update_product);  // error shown here
        if($result_update) {
            echo "<script>alert('Product updated successfully')</script>";
            echo "<script>window.open('./index.php?view_products', '_self')</script>";
        }
    }
?>

<div class="container my-4">
    <h3 class="text-center text-success py-2">Edit Product</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label fw-bold">Product Title</label>
            <input type="text" id="product_title" value="<?=$product_title;?>" name="product_title" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_description" class="form-label fw-bold">Product Description</label>
            <input type="text" id="product_description" value="<?=$product_description;?>" name="product_description" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label fw-bold">Product Keywords</label>
            <input type="text" id="product_keywords" value="<?=$product_keywords;?>" name="product_keywords" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_category" class="form-label fw-bold">Product Categories</label>
            <select name="product_category" class="form-select">
                <option value="<?=$category_id?>"><?=$category_title?></option>
                <?php
                    $select_category_all="SELECT * FROM `Categories`";
                    $result_category_all=mysqli_query($con, $select_category_all);
                    while($row_category_all=mysqli_fetch_assoc($result_category_all)) {
                        $category_title=$row_category_all['category_title'];
                        $category_id=$row_category_all['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    };
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_brand" class="form-label fw-bold">Product Brands</label>
            <select name="product_brand" class="form-select">
                <option value="<?=$brand_id?>"><?=$brand_title?></option>
                <?php
                    $select_brand_all="SELECT * FROM `Brands`";
                    $result_brand_all=mysqli_query($con, $select_brand_all);
                    while($row_brand_all=mysqli_fetch_assoc($result_brand_all)) {
                        $brand_title=$row_brand_all['brand_title'];
                        $brand_id=$row_brand_all['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    };
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label fw-bold">Product Image (1)</label>
            <div class="d-flex">
                <input type="file" id="product_image1" name="product_image1" class="form-control" required="required">
                <img src="./product_images/<?=$product_image1;?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label fw-bold">Product Image (2)</label>
            <div class="d-flex">
                <input type="file" id="product_image2" name="product_image2" class="form-control" required="required">
                <img src="./product_images/<?=$product_image2;?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label fw-bold">Product Image (3)</label>
            <div class="d-flex">
                <input type="file" id="product_image3" name="product_image3" class="form-control" required="required">
                <img src="./product_images/<?=$product_image3;?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label fw-bold">Product Price</label>
            <input type="text" id="product_price" value="<?=$product_price;?>" name="product_price" class="form-control" required="required">
        </div>
        <div class="w-50 m-auto py-2">
            <input type="submit" id="edit_product" name="edit_product" value="Update product" class="btn btn-info px-3">
        </div>
    </form>
</div>

# index.php
<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAIM - Welcome <?=$_SESSION['username']?></title>

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
        .table_head th {
            background-color: var(--bs-info);
        }
        .table_body td {
            background-color: var(--bs-secondary);
            color: var(--bs-light);
        }
        .product_img {
            width: 100px;
            object-fit: contain;
        }
    </style>
</head>
<body>

    <div class="container-fluid p-0">

        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">

            <!-- navbar -->
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">

                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img src="../images/mango.jpg" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button><a href="insert_product.php" class="nav-link text-light bg-info m-1 p-2">Insert Products</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-info m-1 p-2">View Products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info m-1 p-2">Insert Categories</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-light bg-info m-1 p-2">View Categories</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-light bg-info m-1 p-2">Insert Brands</a></button>
                    <button><a href="index.php?view_brands" class="nav-link text-light bg-info m-1 p-2">View Brands</a></button>
                    <button><a href="index.php?all_orders" class="nav-link text-light bg-info m-1 p-2">All Orders</a></button>
                    <button><a href="index.php?all_payments" class="nav-link text-light bg-info m-1 p-2">All Payments</a></button>
                    <button><a href="index.php?all_users" class="nav-link text-light bg-info m-1 p-2">All Users</a></button>
                    <button><a href="../index.php" class="nav-link text-light bg-info m-1 p-2">Logout</a></button>
                </div>
            </div>
        </div>

        <!-- fourth child -->
        <div class="container my-3">
            <?php
                if(isset($_GET['view_products'])) {
                    include('view_products.php');
                }
                if(isset($_GET['edit_products'])) {
                    include('edit_products.php');
                }
                if(isset($_GET['delete_products'])) {
                    include('delete_products.php');
                }
                if(isset($_GET['insert_category'])) {
                    include('insert_categories.php');
                }
                if(isset($_GET['view_categories'])) {
                    include('view_categories.php');
                }
                if(isset($_GET['edit_category'])) {
                    include('edit_category.php');
                }
                if(isset($_GET['delete_category'])) {
                    include('delete_category.php');
                }
                if(isset($_GET['insert_brand'])) {
                    include('insert_brands.php');
                }
                if(isset($_GET['view_brands'])) {
                    include('view_brands.php');
                }
                if(isset($_GET['edit_brand'])) {
                    include('edit_brand.php');
                }
                if(isset($_GET['delete_brand'])) {
                    include('delete_brand.php');
                }
                if(isset($_GET['all_orders'])) {
                    include('all_orders.php');
                }
                if(isset($_GET['delete_order'])) {
                    include('delete_order.php');
                }
                if(isset($_GET['all_payments'])) {
                    include('all_payments.php');
                }
                if(isset($_GET['delete_payment'])) {
                    include('delete_payment.php');
                }
                if(isset($_GET['all_users'])) {
                    include('all_users.php');
                }
                if(isset($_GET['delete_user'])) {
                    include('delete_user.php');
                }
            ?>
        </div>

        <!-- include footer file -->
        <?php
            include("../includes/footer.php")
        ?>
    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

# insert_brands.php
<?php

    /* connect the database to this php file */
    include('../includes/connect.php');

    /* insert only distinct values to the ddatabase */
    if(isset($_POST['insert_brand'])) {

        $brand_title=$_POST['brand_title'];

        $select_query="Select * from `brands` where brand_title='$brand_title'";
        $result_select=mysqli_query($con, $select_query);
        $number=mysqli_num_rows($result_select);

        if($number>0) {
            echo "<script>alert('This brand is present inside the database')</script>";
        }else{
            $insert_query="insert into `brands` (brand_title) values ('$brand_title')";
            $result=mysqli_query($con, $insert_query);

            if($result) {
                echo "<script>alert('Brand has been inserted successfully')</script>";
            }
        }
    }

?>

<h2 class="text-center">Insert Brands</h2>

<form action="" method="post" class="mb-2">
    <div class="input-group mb-2 w-90">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="Brands" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-2 w-10 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_brand" value="Insert Brands">
    </div>
</form>

# insert_categories.php
<?php

    /* connect the database to this php file */
    include('../includes/connect.php');

    /* insert only distinct values to the ddatabase */
    if(isset($_POST['insert_cat'])) {

        $category_title=$_POST['cat_title'];

        $select_query="Select * from `categories` where category_title='$category_title'";
        $result_select=mysqli_query($con, $select_query);
        $number=mysqli_num_rows($result_select);

        if($number>0) {
            echo "<script>alert('This category is present inside the database')</script>";
        }else{
            $insert_query="insert into `categories` (category_title) values ('$category_title')";
            $result=mysqli_query($con, $insert_query);

            if($result) {
                echo "<script>alert('Category has been inserted successfully')</script>";
            }
        }
    }

?>

<h2 class="text-center">Insert Categories</h2>

<form action="" method="post" class="mb-2">
    <div class="input-group mb-2 w-90">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="Catagories" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-2 w-10 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_cat" value="Insert Categories">
    </div>
</form>

# insert_product.php
<?php

    /* connect the database to this php file */
    include('../includes/connect.php');

    if(isset($_POST['insert_product'])) {
        $product_title=$_POST['product_title'];
        $product_description=$_POST['product_description'];
        $product_keywords=$_POST['product_keywords'];
        $product_category=$_POST['product_category'];
        $product_brand=$_POST['product_brand'];
        $product_price=$_POST['product_price'];
        $product_status='true';

        // accessing images name
        $product_image1=$_FILES['product_image1']['name'];
        $product_image2=$_FILES['product_image2']['name'];
        $product_image3=$_FILES['product_image3']['name'];

        // accessing images temporary name
        $temp_image1=$_FILES['product_image1']['tmp_name'];
        $temp_image2=$_FILES['product_image2']['tmp_name'];
        $temp_image3=$_FILES['product_image3']['tmp_name'];

        // checking empty condition
        if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' or $product_brand=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3=='') {
            echo "<script>alert('Please fill all the available fields')</script>";
            exit();
        }else{
            move_uploaded_file($temp_image1, "./product_images/$product_image1");
            move_uploaded_file($temp_image2, "./product_images/$product_image2");
            move_uploaded_file($temp_image3, "./product_images/$product_image3");

            // insert query
            $insert_products="insert into `products` (product_title, product_description, product_keywords, category_id, brand_id, product_image1, product_image2, product_image3, product_price, product_date, product_status) values ('$product_title', '$product_description', '$product_keywords', '$product_category', '$product_brand', '$product_image1', '$product_image2', '$product_image3', '$product_price', NOW(), '$product_status')";

            $result_query=mysqli_query($con, $insert_products);
            if($result_query) {
                echo "<script>alert('Successfully inserted the product')</script>";
            }
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>

    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel = "stylesheet" href = "../style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>

        <form action="" method="post" enctype="multipart/form-data">

            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
            </div>

            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
            </div>

            <!-- keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required">
            </div>

            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select a Category</option>

                    <?php

                        $select_query="Select * from `categories`";
                        $result_query=mysqli_query($con, $select_query);

                        while($row=mysqli_fetch_assoc($result_query)) {
                            $category_title=$row['category_title'];
                            $category_id=$row['category_id'];

                            echo "<option value='$category_id'>$category_title</option>";
                        }

                    ?>

                </select>
            </div>

            <!-- brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brand" id="" class="form-select">
                    <option value="">Select a Brand</option>

                    <?php

                        $select_query="Select * from `brands`";
                        $result_query=mysqli_query($con, $select_query);

                        while($row=mysqli_fetch_assoc($result_query)) {
                            $brand_title=$row['brand_title'];
                            $brand_id=$row['brand_id'];

                            echo "<option value='$brand_id'>$brand_title</option>";
                        }

                    ?>

                </select>
            </div>

            <!-- image1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 01</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>

            <!-- image2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 02</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>

            <!-- image3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 03</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>

            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
            </div>

            <!-- submit -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Product">
            </div>

        </form>
    </div>

</body>
</html>

# view_brands.php
<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="table_head">
        <tr>
            <th>SL no</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="table_body">
        <?php
            $select_cat = "SELECT * FROM `Brands`";
            $result = mysqli_query($con, $select_cat);
            $number = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $brand_id = $row['brand_id'];
                $brand_title = $row['brand_title'];
                $number++;
        ?>
        <tr>
            <td><?= $number; ?></td>
            <td><?= $brand_title; ?></td>
            <td>
                <a href='index.php?edit_brand=<?= $brand_id; ?>' class='text-light'>
                    <i class='fa-solid fa-pen-to-square'></i>
                </a>
            </td>
            <td>
                <a href="#" class="text-light"
                    data-bs-toggle="modal"
                    data-bs-target="#deleteModal<?= $brand_id; ?>"
                    data-href="index.php?delete_brand=<?= $brand_id; ?>"
                    title="Delete brand ID <?= $brand_id; ?>">
                    <i class='fa-solid fa-trash'></i>
                </a>
            </td>
        </tr>

        <!-- Modal for each brand -->
        <div class="modal fade" id="deleteModal<?= $brand_id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $brand_id; ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <h4>Are you sure you want to delete <strong><?= $brand_title; ?></strong>?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <a href='index.php?delete_brand=<?= $brand_id; ?>' class="btn btn-danger text-light text-decoration-none">Yes</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </tbody>
</table>


# view_categories.php
<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="table_head">
        <tr>
            <th>SL no</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="table_body">
        <?php
            $select_cat="SELECT * FROM `Categories`";
            $result=mysqli_query($con, $select_cat);
            $number=0;
            while($row=mysqli_fetch_assoc($result)) {
                $category_id=$row['category_id'];
                $category_title=$row['category_title'];
                $number++;
                ?>
                <tr>
                    <td><?=$number;?></td>
                    <td><?=$category_title;?></td>
                    <td><a href='index.php?edit_category=<?=$category_id;?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                    <td><a href='index.php?delete_category=<?=$category_id;?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>

# view_products.php
<h3 class="text-center text-success">All products</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="table_head">
        <tr>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="table_body">
        <?php
            $get_products="SELECT * FROM `products`";
            $result=mysqli_query($con, $get_products);
            $number=0;
            while($row=mysqli_fetch_assoc($result)) {
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_image1=$row['product_image1'];
                $product_price=$row['product_price'];
                $product_status=$row['product_status'];
                $number++;
                ?>
                <tr>
                    <td><?=$number;?></td>
                    <td><?=$product_title;?></td>
                    <td><img src='./product_images/<?=$product_image1;?>' class='product_img'/></td>
                    <td><?=$product_price;?></td>
                    <td>
                        <?php
                            $get_count="SELECT * FROM `orders_pending` WHERE product_id=$product_id";
                            $result_count=mysqli_query($con, $get_count);
                            $rows_count=mysqli_num_rows($result_count);
                            echo $rows_count;
                        ?>
                    </td>
                    <td><?=$product_status;?></td>
                    <td><a href='index.php?edit_products=<?=$product_id;?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                    <td><a href='index.php?delete_products=<?=$product_id;?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>

# common_function.php
<?php

    // function for getting products
    function getProducts() {
        global $con;

        // condition to check isset or not
        if(!isset($_GET['category'])) {
            if(!isset($_GET['brand'])) {
                $select_query="Select * from `products` order by rand() limit 0, 3";
                $result_query=mysqli_query($con, $select_query);

                while($row=mysqli_fetch_assoc($result_query)) {
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_description=$row['product_description'];
                    $category_id=$row['category_id'];
                    $brand_id=$row['brand_id'];
                    $product_image1=$row['product_image1'];
                    $product_price=$row['product_price'];

                    echo "
                        <div class='col-md-4 mb-2'>
                            <div class='card'>
                                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text'>Price: $product_price/-</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                                </div>
                            </div>
                        </div>
                    ";
                }
            }
        }
    }

    // function for getting all products
    function getAllProducts() {
        global $con;

        // condition to check isset or not
        if(!isset($_GET['category'])) {
            if(!isset($_GET['brand'])) {
                $select_query="Select * from `products` order by rand()";
                $result_query=mysqli_query($con, $select_query);

                while($row=mysqli_fetch_assoc($result_query)) {
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_description=$row['product_description'];
                    $category_id=$row['category_id'];
                    $brand_id=$row['brand_id'];
                    $product_image1=$row['product_image1'];
                    $product_price=$row['product_price'];

                    echo "
                        <div class='col-md-4 mb-2'>
                            <div class='card'>
                                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text'>Price: $product_price/-</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                                </div>
                            </div>
                        </div>
                    ";
                }
            }
        }
    }

    // function for getting unique categories
    function getUniqueCategories() {
        global $con;

        // condition to check isset or not
        if(isset($_GET['category'])) {
            $category_id=$_GET['category'];
            $select_query="Select * from `products` where category_id=$category_id";
            $result_query=mysqli_query($con, $select_query);

            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows==0) {
                echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
            }

            while($row=mysqli_fetch_assoc($result_query)) {
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_description=$row['product_description'];
                $category_id=$row['category_id'];
                $brand_id=$row['brand_id'];
                $product_image1=$row['product_image1'];
                $product_price=$row['product_price'];

                echo "
                    <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price: $product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>
                ";
            }
        }
    }

    // function for getting unique brands
    function getUniqueBrands() {
        global $con;

        // condition to check isset or not
        if(isset($_GET['brand'])) {
            $brand_id=$_GET['brand'];
            $select_query="Select * from `products` where brand_id=$brand_id";
            $result_query=mysqli_query($con, $select_query);

            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows==0) {
                echo "<h2 class='text-center text-danger'>This brand is not available for service</h2>";
            }

            while($row=mysqli_fetch_assoc($result_query)) {
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_description=$row['product_description'];
                $category_id=$row['category_id'];
                $brand_id=$row['brand_id'];
                $product_image1=$row['product_image1'];
                $product_price=$row['product_price'];

                echo "
                    <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price: $product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>
                ";
            }
        }
    }

    // function for displaying brands in sidenav
    function getBrands() {
        global $con;

        $select_brands="Select * from `brands`";
        $result_brands=mysqli_query($con, $select_brands);

        while($row_data=mysqli_fetch_assoc($result_brands)) {
            $brand_title=$row_data['brand_title'];
            $brand_id=$row_data['brand_id'];

            echo "<li class='nav-item'><a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a></li>";
        }
    }

    // function for displaying categories in sidenav
    function getCategories() {
        global $con;

        $select_categories="Select * from `categories`";
        $result_categories=mysqli_query($con, $select_categories);

        while($row_data=mysqli_fetch_assoc($result_categories)) {
            $category_title=$row_data['category_title'];
            $category_id=$row_data['category_id'];

            echo "<li class='nav-item'><a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a></li>";
        }
    }

    // function for searching products
    function searchProducts() {
        global $con;

        // condition to get the search value
        if(isset($_GET['search_data_product'])) {
            $search_data_value=$_GET['search_data'];
            $search_query="Select * from `products` where product_keywords like '%$search_data_value%'";
            $result_query=mysqli_query($con, $search_query);

            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows==0) {
                echo "<h2 class='text-center text-danger'>No results match. No products found on this category!</h2>";
            }

            while($row=mysqli_fetch_assoc($result_query)) {
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_description=$row['product_description'];
                $category_id=$row['category_id'];
                $brand_id=$row['brand_id'];
                $product_image1=$row['product_image1'];
                $product_price=$row['product_price'];

                echo "
                    <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price: $product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>
                ";
            }

        }
    }

    // function for viewing the details of a product
    function viewDetails() {
        if(isset($_GET['product_id'])) {
            global $con;

            // condition to check isset or not
            if(!isset($_GET['category'])) {
                if(!isset($_GET['brand'])) {
                    $product_id=$_GET['product_id'];
                    $select_query="Select * from `products` where product_id=$product_id";
                    $result_query=mysqli_query($con, $select_query);

                    while($row=mysqli_fetch_assoc($result_query)) {
                        $product_id=$row['product_id'];
                        $product_title=$row['product_title'];
                        $product_description=$row['product_description'];
                        $category_id=$row['category_id'];
                        $brand_id=$row['brand_id'];
                        $product_image1=$row['product_image1'];
                        $product_image2=$row['product_image2'];
                        $product_image3=$row['product_image3'];
                        $product_price=$row['product_price'];

                        echo "
                            <div class='col-md-4 mb-2'>
                                <div class='card'>
                                    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$product_title</h5>
                                        <p class='card-text'>$product_description</p>
                                        <p class='card-text'>Price: $product_price/-</p>
                                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                        <a href='index.php' class='btn btn-secondary'>Go Home</a>
                                    </div>
                                </div>
                            </div>

                            <div class='col-md-8'>
                                <div class='row'>
                                    <div class='col-md-12'>
                                        <h4 class='text-center text-info mb-5'>Related Produtcs</h4>
                                    </div>
                                    <div class='col-md-6'>
                                        <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                                    </div>
                                    <div class='col-md-6'>
                                        <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                                    </div>
                                </div>
                            </div>
                        ";
                    }
                }
            }
        }
    }

    // function for getting user ip address
    function getUserIpAddress() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    // function to add to cart
    function cart() {
        if(isset($_GET['add_to_cart'])) {
            global $con;

            $ip=getUserIpAddress();
            $product_id=$_GET['add_to_cart'];
            $select_query="Select * from `cart_details` where ip_address='$ip' and product_id=$product_id";
            $result_query=mysqli_query($con, $select_query);

            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows>0) {
                echo "<script>alert('This item is already present inside cart');</script>";
                echo "<script>window.open('index.php', '_self');</script>";
            } else {
                $insert_query="Insert into `cart_details` (product_id, ip_address, quantity) values ($product_id, '$ip', 0)";
                $result_query=mysqli_query($con, $insert_query);
                echo "<script>alert('Item is added to cart');</script>";
                echo "<script>window.open('index.php', '_self');</script>";
            }
        }
    }

    // function to get the number of items in cart
    function cartItems() {
        if(isset($_GET['add_to_cart'])) {
            global $con;
            $ip=getUserIpAddress();
            $select_query="Select * from `cart_details` where ip_address='$ip'";
            $result_query=mysqli_query($con, $select_query);
            $count_cart_items=mysqli_num_rows($result_query);
        } else {
            global $con;
            $ip=getUserIpAddress();
            $select_query="Select * from `cart_details` where ip_address='$ip'";
            $result_query=mysqli_query($con, $select_query);
            $count_cart_items=mysqli_num_rows($result_query);
        }
        echo $count_cart_items;
    }

    // function to get the total price from cart
    function cartTotalPrice() {
        global $con;
        $ip=getUserIpAddress();
        $total=0;
        $cart_query="SELECT * FROM `cart_details` WHERE ip_address='$ip'";
        $result=mysqli_query($con, $cart_query);

        while($row=mysqli_fetch_array($result)) {
            $product_id=$row['product_id'];
            $select_products="SELECT * FROM `products` WHERE product_id='$product_id'";
            $result_products=mysqli_query($con, $select_products);

            while($row_product_price=mysqli_fetch_array($result_products)) {
                $product_price=array($row_product_price['product_price']);
                $product_values=array_sum($product_price);
                $total+=$product_values;
            }
        }
        echo $total;
    }

    // function to get the order details of any user
    function get_user_order_details() {
        global $con;
        $username=$_SESSION['username'];
        $get_details="SELECT * FROM `user_table` WHERE user_name='$username'";
        $result_query=mysqli_query($con, $get_details);
        while($row_query=mysqli_fetch_array($result_query)) {
            $user_id=$row_query['user_id'];
            if(!isset($_GET['edit_account'])) {
                if(!isset($_GET['my_orders'])) {
                    if(!isset($_GET['delete_account'])) {
                        $get_orders="SELECT * FROM `user_orders` WHERE user_id=$user_id AND order_status='pending'";
                        $result_orders_query=mysqli_query($con, $get_orders);
                        $row_count=mysqli_num_rows($result_orders_query);
                        if($row_count>0) {
                            echo "
                                <h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
                                <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>
                            ";
                        } else {
                            echo "
                                <h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>zero</span> pending orders</h3>
                                <p class='text-center'><a href='../index.php' class='text-dark'>Explore products</a></p>
                            ";
                        }
                    }
                }
            }
        }
    }
?>

# connect.php
<?php

    $con=mysqli_connect('localhost', 'root', '', 'mystore');

    if(!$con) {
        die(mysqli_error($con));
    }

?>

# footer.php
<div class = "bg-info p-3 text-center">
    <p>All rights reserved © Designed by Saim-2025</p>
</div>

# checkout.php
<?php
    include('../includes/connect.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAIM - Checkout</title>

    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel = "stylesheet" href = "style.css">
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

    <div class = "container-fluid p-0">

        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">

            <!-- navbar -->
            <div class="container-fluid">
                <img src = "../images/logo.png" alt = "" class = "logo">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>

                    <form class="d-flex" role="search" action="../search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class = "navbar-nav me-auto">
                <?php
                    if(!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome Guest</a></li>";
                    } else {
                        echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a></li>";
                    }
                    if(!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'><a class='nav-link' href='./users_area/user_login.php'>Login</a></li>";
                    } else {
                        echo "<li class='nav-item'><a class='nav-link' href='user_logout.php'>Logout</a></li>";
                    }
                ?>
            </ul>
        </nav>

        <!-- third child -->
        <div class = "bg-light py-2">
            <h3 class="text-center">Online Store</h3>
            <p class="text-center">Communication is at the heart of e-commerce and community</p>
        </div>

        <!-- fourth child -->
        <div class="row px-1">

            <!-- session -->
            <div class="col-md-12c">
                <div class="row">
                    <?php
                        if(!isset($_SESSION['username'])) {
                            include('user_login.php');
                        } else {
                            include('payment.php');
                        }
                    ?>
                </div>
            </div>
        </div>

        <!-- include footer file -->
        <?php
            include("../includes/footer.php")
        ?>

    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>

# confirm_payment.php
<?php
    include('../includes/connect.php');
    session_start();

    if(isset($_GET['order_id'])) {
        $order_id=$_GET['order_id'];
        $select_data="SELECT * FROM `user_orders` WHERE order_id=$order_id";
        $result=mysqli_query($con, $select_data);
        $row_fetch=mysqli_fetch_assoc($result);
        $invoice_number=$row_fetch['invoice_number'];
        $amount_due=$row_fetch['amount_due'];
    }

    if(isset($_POST['confirm_payment'])) {
        $invoice_number=$_POST['invoice_number'];
        $amount=$_POST['amount'];
        $payment_mode=$_POST['payment_mode'];
        $insert_query="INSERT INTO `user_payments` (order_id, invoice_number, amount, payment_mode) VALUES ($order_id, $invoice_number, $amount, '$payment_mode')";
        $result=mysqli_query($con, $insert_query);
        if($result) {
            echo "<script>window.open('profile.php?my_orders', '_self')</script>";
        }
        $update_orders="UPDATE `user_orders` SET order_status='Complete' WHERE order_id=$order_id";
        $result_orders=mysqli_query($con, $update_orders);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAIM - Confirm Payment<?=$_SESSION['username']?></title>

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
<body class="bg-secondary">
    <div class="container my-5">
        <h1 class="text-center text-light">Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?=$invoice_number?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?=$amount_due?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" class="form-select w-50 m-auto">
                    <option>Select payment mode</option>
                    <option>Paypal</option>
                    <option>Bkash</option>
                    <option>Nagad</option>
                    <option>Cash on Delivery</option>
                    <option>Pay Offline</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class="bg-info py-2 px-3 border-0" value="Confirm" name="confirm_payment">
            </div>
        </form>
    </div>
</body>
</html>

# delete_account.php
<h3 class="text-danger my-4">Delete Account</h3>
<form action="" method="post" class="mt-5">
    <div class="form-outline mb-4">
        <input type="submit" class="form-control w-50 m-auto" name="delete" value="Delete Account">
    </div>
    <div class="form-outline mb-4">
        <input type="submit" class="form-control w-50 m-auto" name="do_not_delete" value="Don't Delete Account">
    </div>
</form>

<?php
    $username_session=$_SESSION['username'];
    if(isset($_POST['delete'])) {
        $delete_query="DELETE FROM `user_table` WHERE user_name='$username_session'";
        $result=mysqli_query($con, $delete_query);
        if($result) {
            session_destroy();
            echo "<script>alert('Account Deleted successfully')</script>";
            echo "<script>window.open('../index.php', '_self')</script>";
        }
    }
    if(isset($_POST['do_not_delete'])) {
        echo "<script>window.open('profile.php', '_self')</script>";
    }
?>

# edit_account.php
<?php
    if(isset($_GET['edit_account'])) {
        $user_session_name=$_SESSION['username'];
        $select_query="SELECT * FROM `user_table` WHERE user_name='$user_session_name'";
        $result_query=mysqli_query($con, $select_query);
        $row_fetch=mysqli_fetch_assoc($result_query);
        $user_id=$row_fetch['user_id'];
        $user_name=$row_fetch['user_name'];
        $user_email=$row_fetch['user_email'];
        $user_address=$row_fetch['user_address'];
        $user_mobile=$row_fetch['user_mobile'];
    }

    if(isset($_POST['user_update'])) {
        $update_id=$user_id;
        $user_name=$_POST['user_username'];
        $user_email=$_POST['user_email'];
        $user_address=$_POST['user_address'];
        $user_mobile=$_POST['user_mobile'];
        $user_image=$_FILES['user_image']['name'];
        $user_image_tmp=$_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");

        // update the database
        $update_data="UPDATE `user_table` SET user_name='$user_name', user_email='$user_email', user_address='$user_address', user_mobile='$user_mobile', user_image='$user_image' WHERE user_id=$update_id";
        $result_query_update=mysqli_query($con, $update_data);
        if($result_query_update) {
            echo "<script>alert('Data updated successfully')</script>";
            echo "<script>window.open('user_logout.php', '_self')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAIM - Edit account <?=$_SESSION['username']?></title>

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

        .profile_img {
            width: 90%;
            margin: auto;
            display: block;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <h3 class="text-success my-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_username" value="<?=$user_name?>">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" name="user_email" value="<?=$user_email?>">
        </div>
        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input type="file" class="form-control" name="user_image">
            <img src="./user_images/<?=$user_image?>" alt="" class="edit_image">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_address" value="<?=$user_address?>">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_mobile" value="<?=$user_mobile?>">
        </div>
        <input type="submit" value="Update" class="bg-info py-2 px-3 border-0" name="user_update">
    </form>
</body>
</html>

# order.php
<?php
    /* connecting to the database */
    include('../includes/connect.php');
    include('../functions/common_function.php');

    /* accessing the user ip address */
    if(isset($_GET['user_id'])) {
        $user_id=$_GET['user_id'];
    }

    /* gettting total items and their values from database */
    $get_ip_address=getUserIpAddress();
    $total_price=0;
    $cart_query_price="SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
    $result_cart_price=mysqli_query($con, $cart_query_price);
    $invoice_number=mt_rand();
    $status='pending';
    $count_products=mysqli_num_rows($result_cart_price);
    while($row_price=mysqli_fetch_array($result_cart_price)) {
        $product_id=$row_price['product_id'];
        $select_product="SELECT * FROM `products` WHERE product_id=$product_id";
        $run_price=mysqli_query($con, $select_product);
        while($row_product_price=mysqli_fetch_array($run_price)) {
            $product_price=array($row_product_price['product_price']);
            $product_values=array_sum($product_price);
            $total_price+=$product_values;
        }
    }

    /* getting quantity from cart */
    $get_cart="SELECT * FROM `cart_details`";
    $run_cart=mysqli_query($con, $get_cart);
    $get_item_quantity=mysqli_fetch_array($run_cart);
    $quantity=$get_item_quantity['quantity'];
    if($quantity==0) {
        $quantity=1;
        $subtotal=$total_price;
    } else {
        $quantity=$quantity;
        $subtotal=$total_price*$quantity;
    }

    /* insert values of the orders */
    $insert_orders="INSERT INTO `user_orders` (user_id, amount_due, invoice_number, total_products, order_date, order_status) VALUES ($user_id, $subtotal, $invoice_number, $count_products, NOW(), '$status')";
    $result_query=mysqli_query($con, $insert_orders);
    if($result_query) {
        echo "<script>alert('Orders are submitted successfully')</script>";
        echo "<script>window.open('profile.php', '_self')</script>";
    }

    /* orders pending (issue: only one product is added to the database!)*/
    $insert_pending_orders="INSERT INTO `orders_pending` (user_id, invoice_number, product_id, quantity, order_status) VALUES ($user_id, $invoice_number, $product_id, $quantity, '$status')";
    $result_pendding_orders=mysqli_query($con, $insert_pending_orders);

    /* delete items from cart */
    $empty_cart="DELETE FROM `cart_details` WHERE ip_address='$get_ip_address'";
    $result_delete=mysqli_query($con, $empty_cart);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAIM - Orders</title>

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

        .payment_img{
            width: 90%;
            margin: auto;
            display: block;
        }
    </style>
</head>
<body>

    <div class = "container-fluid p-0">

        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">

            <!-- navbar -->
            <div class="container-fluid">
                <img src = "../images/logo.png" alt = "" class = "logo">

                <button class="navbar-toggler" type="button" data-b s-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cartItems(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php cartTotalPrice(); ?>/-</a>
                        </li>
                    </ul>

                    <form class="d-flex" role="search" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class = "navbar-nav me-auto">
                <?php
                    if(!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome Guest</a></li>";
                    } else {
                        echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a></li>";
                    }
                    if(!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'><a class='nav-link' href='user_login.php'>Login</a></li>";
                    } else {
                        echo "<li class='nav-item'><a class='nav-link' href='user_logout.php'>Logout</a></li>";
                    }
                ?>
            </ul>
        </nav>

        <!--third child -->
        <div class = "bg-light py-2">
            <h3 class="text-center">Online Store</h3>
            <p class="text-center">Communication is at the heart of e-commerce and community</p>
        </div>

        <!-- fourth child -->
        <div class="row py-1">

            <div class=""></div>


        </div>

        <!-- include footer file -->
        <?php
            include("../includes/footer.php")
        ?>

    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>

# payment.php
<?php
    /* connecting to the database */
    include('../includes/connect.php');
    include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAIM - Payment</title>

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

        .payment_img{
            width: 90%;
            margin: auto;
            display: block;
        }
    </style>
</head>
<body>
    <div class = "container-fluid p-0">

        <!-- php code to get the user ip address -->
        <?php
            $user_ip=getUserIpAddress();
            $get_user="SELECT * FROM `user_table` WHERE user_ip='$user_ip'";
            $result=mysqli_query($con, $get_user);
            $run_query=mysqli_fetch_array($result);
            $user_id=$run_query['user_id'];
        ?>

        <!-- fourth child -->
        <div class="container mb-3">
            <h2 class="text-center text-info py-1">Payment Options</h2>
            <div class="row d-flex justify-content-center align-items-center my-3">
                <div class="col-md-6">
                    <a href="https://www.paypal.com" target="_blank"><img src="../images/payment.jpg" class="payment_img" alt=""></a>
                </div>
                <div class="col-md-6">
                    <a href="order.php?user_id=<?=$user_id?>"><h2 class="text-center ">Pay Offline</h2></a>
                </div>
            </div>
        </div>

    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>

# profile.php
<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAIM - Welcome <?=$_SESSION['username']?></title>

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

        .profile_img {
            width: 90%;
            margin: auto;
            display: block;
            object-fit: contain;
        }

        .edit_image {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
    </style>
</head>
<body>

    <div class = "container-fluid p-0">

        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">

            <!-- navbar -->
            <div class="container-fluid">
                <img src = "../images/logo.png" alt = "" class = "logo">

                <button class="navbar-toggler" type="button" data-b s-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cartItems(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php cartTotalPrice(); ?>/-</a>
                        </li>
                    </ul>

                    <form class="d-flex" role="search" action="../search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class = "navbar-nav me-auto">
                <?php
                    if(!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome Guest</a></li>";
                    } else {
                        echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a></li>";
                    }
                    if(!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'><a class='nav-link' href='user_login.php'>Login</a></li>";
                    } else {
                        echo "<li class='nav-item'><a class='nav-link' href='user_logout.php'>Logout</a></li>";
                    }
                ?>
            </ul>
        </nav>

        <!--third child -->
        <div class = "bg-light py-2">
            <h3 class="text-center">Online Store</h3>
            <p class="text-center">Communication is at the heart of e-commerce and community</p>
        </div>

        <!-- fourth child -->
        <div class="row">
            <div class="col-md-2">
                <ul class="navbar-nav bg-secondary text-center" style="height: 100vh">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4 class="">Your profile</h4></a>
                    </li>

                    <?php
                        $username=$_SESSION['username'];
                        $user_image="SELECT * FROM `user_table` WHERE user_name='$username'";
                        $user_image=mysqli_query($con, $user_image);
                        $row_image=mysqli_fetch_array($user_image);
                        $user_image=$row_image['user_image'];
                        echo "
                            <li class='nav-item'>
                                <img src='./user_images/$user_image' class='profile_img my-4'>
                            </li>
                        ";
                    ?>

                    <li class="nav-item">
                        <a href="profile.php" class="nav-link text-light">Pending orders</a>
                    </li>
                    <li class="nav-item">
                        <a href="profile.php?edit_account" class="nav-link text-light">Edit Account</a>
                    </li>
                    <li class="nav-item">
                        <a href="profile.php?my_orders" class="nav-link text-light">My orders</a>
                    </li>
                    <li class="nav-item">
                        <a href="profile.php?delete_account" class="nav-link text-light">Delete Account</a>
                    </li>
                    <li class="nav-item">
                        <a href="user_logout.php" class="nav-link text-light">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 text-center">
                <?php
                    get_user_order_details();

                    if(isset($_GET['edit_account'])) {
                        include('edit_account.php');
                    }

                    if(isset($_GET['my_orders'])) {
                        include('user_orders.php');
                    }

                    if(isset($_GET['delete_account'])) {
                        include('delete_account.php');
                    }
                ?>
            </div>
        </div>

        <!-- include footer file -->
        <?php
            include("../includes/footer.php")
        ?>

    </div>


    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>

# user_login.php
<?php
    /* connecting to the database */
    include('../includes/connect.php');
    include('../functions/common_function.php');
    @session_start();

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

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel = "stylesheet" href = "style.css">
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
        <div class="container-fluid my-3">
            <h1 class="text-center">User Login</h1>
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

    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>

# user_logout.php
<?php
    session_start();
    session_unset();
    session_destroy();
    echo "<script>window.open('../index.php', '_self')</script>";
?>

# user_orders.php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAIM - My Orders<?=$_SESSION['username']?></title>

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

        .orders_head th {
            background-color: var(--bs-info);
        }

        .orders_body td {
            background-color: var(--bs-secondary);
            color: var(--bs-light);
        }

    </style>
</head>
<body>

    <?php
        $username=$_SESSION['username'];
        $get_user="SELECT * FROM `user_table` WHERE user_name='$username'";
        $result=mysqli_query($con, $get_user);
        $row_fetch=mysqli_fetch_assoc($result);
        $user_id=$row_fetch['user_id'];
    ?>

    <h3 class="text-success my-4">My Orders</h3>

    <table class="table table-bordered mt-5">
        <thead class="orders_head">
            <tr>
                <th>SL no</th>
                <th>Amount Due</th>
                <th>Total products</th>
                <th>Invoice number</th>
                <th>Date</th>
                <th>Complete/Incomplete</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="orders_body">
            <?php
                $get_order_details="SELECT * FROM `user_orders` WHERE user_id=$user_id";
                $result_orders=mysqli_query($con, $get_order_details);
                $sl_number=1;
                while($row_orders=mysqli_fetch_assoc($result_orders)) {
                    $order_id=$row_orders['order_id'];
                    $amount_due=$row_orders['amount_due'];
                    $total_products=$row_orders['total_products'];
                    $invoice_number=$row_orders['invoice_number'];
                    $order_date=$row_orders['order_date'];
                    $order_status=$row_orders['order_status'];
                    if($order_status=='pending') {
                        $order_status='Incomplete';
                    } else {
                        $order_status='Complete';
                    }
                    echo "
                        <tr>
                            <td>$sl_number</td>
                            <td>$amount_due</td>
                            <td>$total_products</td>
                            <td>$invoice_number</td>
                            <td>$order_date</td>
                            <td>$order_status</td>
                    ";
                    ?>
                    <?php
                    if($order_status=='Complete') {
                        echo "<td>Paid</td>";
                    } else {
                        echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a></td></tr>";
                    }
                    $sl_number++;
                }
            ?>
        </tbody>
    </table>
</body>
</html>

# user_registration.php
<?php

    /* connecting to the database */
    include('../includes/connect.php');
    include_once('../functions/common_function.php');

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
    <title>SAIM - User Registering</title>

    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel = "stylesheet" href = "style.css">
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

        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">

            <!-- navbar -->
            <div class="container-fluid">
                <img src = "../images/logo.png" alt = "" class = "logo">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cartItems(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php cartTotalPrice(); ?>/-</a>
                        </li>
                    </ul>

                    <form class="d-flex" role="search" action="../search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class = "navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_login.php">Login</a>
                </li>
            </ul>
        </nav>

        <!-- third child -->
        <div class = "bg-light py-2">
            <h3 class="text-center">Online Store</h3>
            <p class="text-center">Communication is at the heart of e-commerce and community</p>
        </div>

        <!-- fourth child -->
        <div class="container-fluid my-3">
            <h1 class="text-center">User Registration</h1>
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

        <!-- include footer file -->
        <?php
            include("../includes/footer.php")
        ?>

    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>

# cart.php
<?php

    include('includes/connect.php');
    include_once('functions/common_function.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAIM - Cart</title>

    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel = "stylesheet" href = "style.css">
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

        .cart_img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
    </style>
</head>
<body>

    <div class = "container-fluid p-0">

        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">

            <!-- navbar -->
            <div class="container-fluid">
                <img src = "./images/logo.png" alt = "" class = "logo">

                <button class="navbar-toggler" type="button" data-b s-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./users_area/user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cartItems(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php cartTotalPrice(); ?>/-</a>
                        </li>
                    </ul>

                    <form class="d-flex" role="search" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class = "navbar-nav me-auto">
                <?php
                    if(!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome Guest</a></li>";
                    } else {
                        echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a></li>";
                    }
                    if(!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'><a class='nav-link' href='./users_area/user_login.php'>Login</a></li>";
                    } else {
                        echo "<li class='nav-item'><a class='nav-link' href='./users_area/user_logout.php'>Logout</a></li>";
                    }
                ?>
            </ul>
        </nav>

        <!--third child -->
        <div class = "bg-light" py-2>
            <h3 class="text-center">Online Store</h3>
            <p class="text-center">Communication is at the heart of e-commerce and community</p>
        </div>

        <!-- fourth child -->
        <div class="container">
            <div class="row">
                <form action="" method="post">
                    <table class="table table-bordered text-center">
                        <?php
                            $ip=getUserIpAddress();
                            $total=0;
                            $cart_query="SELECT * FROM `cart_details` WHERE ip_address='$ip'";
                            $result=mysqli_query($con, $cart_query);

                            $result_count=mysqli_num_rows($result);
                            if($result_count>0) {
                                echo "
                                    <thead>
                                        <tr>
                                            <th>Product Title </th>
                                            <th>Product Image</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                            <th>Remove</th>
                                            <th colspan='2'>Operations</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                ";
                                        while($row=mysqli_fetch_array($result)) {
                                            $product_id=$row['product_id'];
                                            $select_products="SELECT * FROM `products` WHERE product_id='$product_id'";
                                            $result_products=mysqli_query($con, $select_products);

                                            while($row_product_price=mysqli_fetch_array($result_products)) {
                                                $product_price=array($row_product_price['product_price']);
                                                $price_table=$row_product_price['product_price'];
                                                $product_title=$row_product_price['product_title'];
                                                $product_image1=$row_product_price['product_image1'];
                                                $product_values=array_sum($product_price);
                                                $total+=$product_values;
                        ?>
                                                <tr>
                                                    <td><?= $product_title ?></td>
                                                    <td><img src="./admin_area/product_images/<?= $product_image1 ?>" alt="" class="cart_img"></td>
                                                    <td><input type="text" name="qty" class="form-input w-50"></td>

                                                    <?php
                                                        $ip=getUserIpAddress();
                                                        if(isset($_POST['update_cart'])) {
                                                            $quantities=$_POST['qty'];
                                                            $update_cart="UPDATE `cart_details` SET quantity=$quantities WHERE ip_address='$ip'";
                                                            $result_products_quantity=mysqli_query($con, $update_cart);
                                                            $total=$total*$quantities;
                                                        }
                                                    ?>

                                                    <td><?= $price_table ?>/-</td>
                                                    <td><input type="checkbox" name="remove_item[]" value="<?= $product_id ?>"></td>
                                                    <td>
                                                        <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">
                                                        <input type="submit" value="Remove Cart" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                            }
                                        else {
                                            echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                                        }
                                        ?>
                                    </tbody>
                    </table>

                    <div class="d-flex mb-3">
                        <?php
                            $ip=getUserIpAddress();
                            $cart_query="SELECT * FROM `cart_details` WHERE ip_address='$ip'";
                            $result=mysqli_query($con, $cart_query);

                            $result_count=mysqli_num_rows($result);
                            if($result_count>0) {
                                echo "
                                    <h4 class='px-3'>Subtotal: <strong class='text-info'>$total/-</strong></h4>
                                    <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
                                    <button class='bg-secondary px-3 py-2 border-0'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>
                                ";
                            } else {
                                echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>";
                            }
                            if(isset($_POST['continue_shopping'])) {
                                echo "<script>window.open('index.php', '_self')</script>";
                            }
                        ?>

                    </div>
                </form>

                <!-- function to remove cart items -->
                <?php

                    function remove_cart_item() {
                        global $con;
                        if(isset($_POST['remove_cart'])) {
                            foreach($_POST['remove_item'] as $remove_id) {
                                echo $remove_id;
                                $delete_query="DELETE FROM `cart_details` WHERE product_id=$remove_id";
                                $run_delete=mysqli_query($con, $delete_query);
                                if($run_delete) {
                                    echo "<script>window.open('cart.php', '_self')</script>";
                                }
                            }
                        }
                    }
                    echo $remove_item_function=remove_cart_item();

                ?>

            </div>
        </div>

        <!-- calling the cart function -->
        <?php

            cart();

        ?>

        <!-- include footer file -->
        <?php
            include("./includes/footer.php")
        ?>

    </div>


    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>

# display_all.php
<?php

    include('includes/connect.php');
    include('functions/common_function.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAIM - Products</title>

    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel = "stylesheet" href = "style.css">
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

    <div class = "container-fluid p-0">

        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">

            <!-- navbar -->
            <div class="container-fluid">
                <img src = "./images/logo.png" alt = "" class = "logo">

                <button class="navbar-toggler" type="button" data-b s-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./users_area/user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cartItems(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php cartTotalPrice(); ?>/-</a>
                        </li>
                    </ul>

                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class = "navbar-nav me-auto">
                <?php
                    if(!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome Guest</a></li>";
                    } else {
                        echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a></li>";
                    }
                    if(!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'><a class='nav-link' href='./users_area/user_login.php'>Login</a></li>";
                    } else {
                        echo "<li class='nav-item'><a class='nav-link' href='./users_area/user_logout.php'>Logout</a></li>";
                    }
                ?>
            </ul>
        </nav>

        <!--third child -->
        <div class = "bg-light py-2">
            <h3 class="text-center">Online Store</h3>
            <p class="text-center">Communication is at the heart of e-commerce and community</p>
        </div>

        <!-- fourth child -->
        <div class="row px-1">

            <!-- products -->
            <div class="col-md-10">
                <div class="row">

                    <!-- fetching products -->
                    <?php

                        getAllProducts();
                        getUniqueCategories();
                        getUniqueBrands();

                    ?>

                </div>
            </div>

            <!-- sidenav -->
            <div class="col-md-2 bg-secondary p-0">

                <!-- brands to be displayed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
                    </li>

                    <?php

                        getBrands();

                    ?>

                </ul>

                <!-- categories to be displayed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
                    </li>

                    <?php

                        getCategories();

                    ?>

                </ul>
            </div>
        </div>

        <!-- include footer file -->
        <?php
            include("./includes/footer.php")
        ?>
    </div>


    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>

# index.php
<?php
    include('includes/connect.php');
    include('functions/common_function.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAIM - Home</title>

    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel = "stylesheet" href = "style.css">
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

    <div class = "container-fluid p-0">

        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">

            <!-- navbar -->
            <div class="container-fluid">
                <img src = "./images/logo.png" alt = "" class = "logo">

                <button class="navbar-toggler" type="button" data-b s-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>

                        <?php
                            if(isset($_SESSION['username'])) {
                                echo "
                                    <li class='nav-item'>
                                        <a class='nav-link' href='./users_area/profile.php'>My Account</a>
                                    </li>
                                ";
                            } else {
                                echo "
                                    <li class='nav-item'>
                                        <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
                                    </li>
                                ";
                            }
                        ?>

                        <li class="nav-item">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cartItems(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php cartTotalPrice(); ?>/-</a>
                        </li>
                    </ul>

                    <form class="d-flex" role="search" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class = "navbar-nav me-auto">
                <?php
                    if(!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome Guest</a></li>";
                    } else {
                        echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a></li>";
                    }
                    if(!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'><a class='nav-link' href='./users_area/user_login.php'>Login</a></li>";
                    } else {
                        echo "<li class='nav-item'><a class='nav-link' href='./users_area/user_logout.php'>Logout</a></li>";
                    }
                ?>
            </ul>
        </nav>

        <!--third child -->
        <div class = "bg-light py-2">
            <h3 class="text-center">Online Store</h3>
            <p class="text-center">Communication is at the heart of e-commerce and community</p>
        </div>

        <!-- fourth child -->
        <div class="row px-1">

            <!-- products -->
            <div class="col-md-10">
                <div class="row">

                    <!-- fetching products -->
                    <?php

                        getProducts();
                        getUniqueCategories();
                        getUniqueBrands();

                    ?>

                </div>
            </div>

            <!-- sidenav -->
            <div class="col-md-2 bg-secondary p-0">

                <!-- brands to be displayed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
                    </li>

                    <?php

                        getBrands();

                    ?>

                </ul>

                <!-- categories to be displayed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
                    </li>

                    <?php

                        getCategories();

                    ?>

                </ul>
            </div>
        </div>

        <!-- calling the cart function -->
        <?php

            cart();

        ?>

        <!-- include footer file -->
        <?php
            include("./includes/footer.php")
        ?>

    </div>


    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>

# product_details.php
<?php

    include('includes/connect.php');
    include('functions/common_function.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAIM - Details</title>

    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel = "stylesheet" href = "style.css">
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

    <div class = "container-fluid p-0">

        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">

            <!-- navbar -->
            <div class="container-fluid">
                <img src = "./images/logo.png" alt = "" class = "logo">

                <button class="navbar-toggler" type="button" data-b s-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./users_area/user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cartItems(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php cartTotalPrice(); ?>/-</a>
                        </li>
                    </ul>

                    <form class="d-flex" role="search" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class = "navbar-nav me-auto">
                <?php
                    if(!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome Guest</a></li>";
                    } else {
                        echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a></li>";
                    }
                    if(!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'><a class='nav-link' href='./users_area/user_login.php'>Login</a></li>";
                    } else {
                        echo "<li class='nav-item'><a class='nav-link' href='./users_area/user_logout.php'>Logout</a></li>";
                    }
                ?>
            </ul>
        </nav>

        <!--third child -->
        <div class = "bg-light py-2">
            <h3 class="text-center">Online Store</h3>
            <p class="text-center">Communication is at the heart of e-commerce and community</p>
        </div>

        <!-- fourth child -->
        <div class="row px-1">

            <!-- products -->
            <div class="col-md-10">
                <div class="row">

                    <!-- fetching products -->
                    <?php

                        viewDetails();
                        getUniqueCategories();
                        getUniqueBrands();

                    ?>

                </div>
            </div>

            <!-- sidenav -->
            <div class="col-md-2 bg-secondary p-0">

                <!-- brands to be displayed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
                    </li>

                    <?php

                        getBrands();

                    ?>

                </ul>

                <!-- categories to be displayed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
                    </li>

                    <?php

                        getCategories();

                    ?>

                </ul>
            </div>
        </div>

        <!-- include footer file -->
        <?php
            include("./includes/footer.php")
        ?>
    </div>


    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>

# search_product.php
<?php

    include('includes/connect.php');
    include('functions/common_function.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAIM - Search</title>

    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel = "stylesheet" href = "style.css">
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

    <div class = "container-fluid p-0">

        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">

            <!-- navbar -->
            <div class="container-fluid">
                <img src = "./images/logo.png" alt = "" class = "logo">

                <button class="navbar-toggler" type="button" data-b s-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./users_area/user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cartItems(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php cartTotalPrice(); ?>/-</a>
                        </li>
                    </ul>

                    <form class="d-flex" role="search" action="" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data"/>
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product"/>
                    </form>
                </div>
            </div>
        </nav>

        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class = "navbar-nav me-auto">
                <?php
                    if(!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome Guest</a></li>";
                    } else {
                        echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a></li>";
                    }
                    if(!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'><a class='nav-link' href='./users_area/user_login.php'>Login</a></li>";
                    } else {
                        echo "<li class='nav-item'><a class='nav-link' href='./users_area/user_logout.php'>Logout</a></li>";
                    }
                ?>
            </ul>
        </nav>

        <!--third child -->
        <div class = "bg-light py-2">
            <h3 class="text-center">Online Store</h3>
            <p class="text-center">Communication is at the heart of e-commerce and community</p>
        </div>

        <!-- fourth child -->
        <div class="row px-1">

            <!-- products -->
            <div class="col-md-10">
                <div class="row">

                    <!-- fetching products -->
                    <?php

                        searchProducts();
                        getUniqueCategories();
                        getUniqueBrands();

                    ?>

                </div>
            </div>

            <!-- sidenav -->
            <div class="col-md-2 bg-secondary p-0">

                <!-- brands to be displayed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
                    </li>

                    <?php

                        getBrands();

                    ?>

                </ul>

                <!-- categories to be displayed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
                    </li>

                    <?php

                        getCategories();

                    ?>

                </ul>
            </div>
        </div>

        <!-- include footer file -->
        <?php
            include("./includes/footer.php")
        ?>
    </div>


    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>

# style.css
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

.logo {
    width:4%;
    height:2%;
}

.card-img-top {
    width: 100%;
    height: 200px;
    object-fit: contain;
}

.admin_image {
    width: 100px;
    object-fit: contain;
}
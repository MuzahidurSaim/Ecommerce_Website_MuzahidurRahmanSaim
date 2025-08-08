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
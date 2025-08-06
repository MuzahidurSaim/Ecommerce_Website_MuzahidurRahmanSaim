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
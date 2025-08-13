<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
    session_start();

    // Redirect if not logged in
    if (!isset($_SESSION['username'])) {
        echo "<script>alert('Please login first');</script>";
        echo "<script>window.open('admin_login.php', '_self');</script>";
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAIM - Welcome <?= htmlspecialchars($_SESSION['username']) ?></title>

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
                    <a href="#"><img src="../images/mango.jpg" alt="Admin Profile" class="admin_image"></a>
                    <p class="text-light text-center"><?= htmlspecialchars($_SESSION['username']) ?></p>
                </div>
                <div class="button text-center">
                    <button><a href="insert_product.php" class="nav-link text-light bg-info m-1 p-2">Insert Products</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-info m-1 p-2">View Products</a></button>
                    <button><a href="index.php?insert_categories" class="nav-link text-light bg-info m-1 p-2">Insert Categories</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-light bg-info m-1 p-2">View Categories</a></button>
                    <button><a href="index.php?insert_brands" class="nav-link text-light bg-info m-1 p-2">Insert Brands</a></button>
                    <button><a href="index.php?view_brands" class="nav-link text-light bg-info m-1 p-2">View Brands</a></button>
                    <button><a href="index.php?all_orders" class="nav-link text-light bg-info m-1 p-2">All Orders</a></button>
                    <button><a href="index.php?all_payments" class="nav-link text-light bg-info m-1 p-2">All Payments</a></button>
                    <button><a href="index.php?all_users" class="nav-link text-light bg-info m-1 p-2">All Users</a></button>
                    <button><a href="index.php?edit_admin" class="nav-link text-light bg-info m-1 p-2">Edit Admin</a></button>
                    <button><a href="index.php?admin_logout" class="nav-link text-light bg-info m-1 p-2">Logout</a></button>
                    <button><a href="index.php?delete_admin" class="nav-link text-light bg-info m-1 p-2">Delete Admin</a></button>
                </div>
            </div>
        </div>

        <!-- fourth child -->
        <div class="container my-3">
            <?php
                $allowed_pages = [
                    'view_products', 'edit_products', 'delete_products',
                    'insert_categories', 'view_categories', 'edit_category', 'delete_category',
                    'insert_brands', 'view_brands', 'edit_brand', 'delete_brand',
                    'all_orders', 'delete_order', 'all_payments', 'delete_payment',
                    'all_users', 'delete_user', 'edit_admin', 'admin_logout', 'delete_admin'
                ];

                foreach ($allowed_pages as $page) {
                    if (isset($_GET[$page])) {
                        include("$page.php");
                        break;
                    }
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
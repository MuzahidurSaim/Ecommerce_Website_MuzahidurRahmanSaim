<?php

    // including database connect file
    include('./includes/connect.php');

    // function for getting products
    function getProducts() {
        global $con;

        $select_query="Select * from `products` order by rand() limit 0, 15";
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
                            <a href='#' class='btn btn-info'>Add to cart</a>
                            <a href='#' class='btn btn-secondary'>View more</a>
                        </div>
                    </div>
                </div>
            ";
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

?>
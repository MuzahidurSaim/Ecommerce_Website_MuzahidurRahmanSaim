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
?>
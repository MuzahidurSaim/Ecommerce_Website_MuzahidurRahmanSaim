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
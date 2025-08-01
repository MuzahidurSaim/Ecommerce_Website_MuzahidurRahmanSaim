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


<form action="" method="post" class="mb-2">
    <div class="input-group mb-2 w-90">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="Catagories" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-2 w-10 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_cat" value="Insert Categories">
    </div>
</form>
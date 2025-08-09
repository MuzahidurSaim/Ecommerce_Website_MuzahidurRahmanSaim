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
                    <td><a href='index.php?edit_products' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                    <td><a href='index.php?delete_products' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>
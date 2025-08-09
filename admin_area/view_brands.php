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
            $select_cat="SELECT * FROM `Brands`";
            $result=mysqli_query($con, $select_cat);
            $number=0;
            while($row=mysqli_fetch_assoc($result)) {
                $brand_id=$row['brand_id'];
                $brand_title=$row['brand_title'];
                $number++;
                ?>
                <tr>
                    <td><?=$number;?></td>
                    <td><?=$brand_title;?></td>
                    <td><a href='index.php?edit_brand=<?=$brand_id;?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                    <td><a href='index.php?delete_brand=<?=$brand_id;?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>
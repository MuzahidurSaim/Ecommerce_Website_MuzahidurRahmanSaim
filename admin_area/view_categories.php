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
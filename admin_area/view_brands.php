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
            $select_cat = "SELECT * FROM `Brands`";
            $result = mysqli_query($con, $select_cat);
            $number = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $brand_id = $row['brand_id'];
                $brand_title = $row['brand_title'];
                $number++;
        ?>
        <tr>
            <td><?= $number; ?></td>
            <td><?= $brand_title; ?></td>
            <td>
                <a href='index.php?edit_brand=<?= $brand_id; ?>' class='text-light'>
                    <i class='fa-solid fa-pen-to-square'></i>
                </a>
            </td>
            <td>
                <a href="#" class="text-light"
                    data-bs-toggle="modal"
                    data-bs-target="#deleteModal<?= $brand_id; ?>"
                    data-href="index.php?delete_brand=<?= $brand_id; ?>"
                    title="Delete brand ID <?= $brand_id; ?>">
                    <i class='fa-solid fa-trash'></i>
                </a>
            </td>
        </tr>

        <!-- Modal for each brand -->
        <div class="modal fade" id="deleteModal<?= $brand_id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $brand_id; ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <h4>Are you sure you want to delete <strong><?= $brand_title; ?></strong>?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <a href='index.php?delete_brand=<?= $brand_id; ?>' class="btn btn-danger text-light text-decoration-none">Yes</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </tbody>
</table>

<?php

    include('../includes/connect.php')

?>


<form action="" method="post" class="mb-2">
    <div class="input-group mb-2 w-90">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="Catagories" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-2 w-10 m-auto">
        <!-- <input type="submit" class="form-control bg-info" name="insert_cat" value="Insert Categories"> -->
        <button class="bg-info p-2 my-3 border-0">Insert Categories</button>
    </div>
</form>
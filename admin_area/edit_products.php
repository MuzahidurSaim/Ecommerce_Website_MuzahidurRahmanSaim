<div class="container my-4">
    <h3 class="text-center text-success py-2">Edit Product</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" name="product_title" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" id="product_description" name="product_description" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" id="product_keywords" name="product_keywords" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_categories" class="form-label">Product Categories</label>
            <select name="product_categories" class="form-select">
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3</option>
                <option value="">4</option>
                <option value="">5</option>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_brands" class="form-label">Product Brands</label>
            <select name="product_brands" class="form-select">
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3</option>
                <option value="">4</option>
                <option value="">5</option>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_image1" class="form-label">Product Image (1)</label>
            <div class="d-flex">
                <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto" required="required">
                <img src="" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_image1" class="form-label">Product Image (2)</label>
            <div class="d-flex">
                <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto" required="required">
                <img src="" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_image1" class="form-label">Product Image (3)</label>
            <div class="d-flex">
                <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto" required="required">
                <img src="" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" name="product_price" class="form-control" required="required">
        </div>
        <div class="w-50 m-auto py-2">
            <input type="submit" id="edit_product" name="edit_product" value="Update product" class="btn btn-info px-3">
        </div>
    </form>
</div>
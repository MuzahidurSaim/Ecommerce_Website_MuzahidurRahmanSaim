# Ecommerce-Website

# part-9
## section-01
    - got to --> http://localhost/phpmyadmin
    - create a new database --> mystore
    - create a new table --> categories
        - create a new column --> category_id [auto increment, primary key, int]
        - creare a new column --> category_title [varchar, 100]
        - save
    - create a new table --> brands
        - create a new column --> brand_id [auto increment, primary key, int]
        - creare a new column --> brand_title [varchar, 100]
        - save
## section-02
    - create a new folder in project root directory --> includes
    - create a new file inside that directory --> connect.php
    - check the connection --> http://localhost/Ecommerce%20Website/includes/connect.php
## section-03
    - go to --> insert_categories.php
    - include to it, the file --> connect.php
    - change the file to not show the connection message everytime --> connect.php

# part-10
## section-01
    - how to insert categories --> insert_categories.php
    - change the --> Insert Categories <-- part
## section-02
    - how to insert distinct values to the database --> insert_categories.php <-- in the php part

# part-11
## section-01
    - how to insert distinct brand values to the database --> insert_brands.php <-- do the same as the part-10

# part-12
## section-01
    - connect the database (connect.php) file at the top of the root index file --> index.php
    - make php changes in "fourth child" -> "side nav" -> "brands to be displyed" -> "Delivery Brands" --> index.php
## section-02
    - do the same for the categories
    - make php changes in "fourth child" -> "side nav" -> "categories to be displyed" -> "Categories" --> index.php

# part-13
## section-01
    - create a new file inside the directory --> admin_area
    - name the file as --> insert_product.php
    - add the page link to the "third child" -> "Insert Products" link --> admin_area/index.php
## section-02
    - edit the file --> admin_area/insert_product.php

# part-14
## section-01
    - connect the database with the file --> admin_area/insert_product.php
## section-02
    - make php changes to show the database's categories --> "categories" <-- go inside it
    - make php changes to show the database's brands --> "brands" <-- go inside it

# part-15
## section-01
    - create a new table named --> products
## section-02
    - create a new column named --> product_id [int, primary key, auto increment]
    - create a new column named --> product_title [varchar 100]
    - create a new column named --> product_description [varchar 255]
    - create a new column named --> product_keywords [varchar 255]
    - create a new column named --> category_id [int]
    - create a new column named --> brand_id [int]
    - create a new column named --> product_image1 [varchar 255]
    - create a new column named --> product_image2 [varchar 255]
    - create a new column named --> product_image3 [varchar 255]
    - create a new column named --> product_price [varchar 100]
    - create a new column named --> product_date [timestamp]
    - create a new column named --> product_status [varchar 100]

# part-16
## section-01
    - go to the file --> admin_area/insert_product.php
    - make php changes at the top to insert values in the database from the "Insert Product" page-->
    - create a new folder inside the directory --> admin_area
    - name the directory as --> product_images

# part-17
## section-01
    - go to the root file --> index.php <-- to show the values in the "home page" from the "database"
    - make php changes in the "fourth child" -> "products" --> fetching products

# part-18
## section-01
    - create common functions to reduce the coding time
    - create a new folder in the root directory named --> functions
    - create a new file inside that directory named --> common_function.php
## section-02
    - modify the php changes in --> functions/common_function.php
    - include this function php file at the top of root --> index.php
    - create functions --> getProducts(), getBrands(), getCategories()

# part-19
## section-01
    - 
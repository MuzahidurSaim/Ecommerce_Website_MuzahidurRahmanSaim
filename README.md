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
    - go to --> functions/common_function.php
    - modify getProducts() --> so that when choosing a brand/category it will only show that brand/category page
    - to do that add two more functions --> getUniqueCategories() and getUniqueBrands() <-- after the getProducts() inside the root index.php file

# part-20
## section-01
    - go to the root --> index.php
    - modify "first child" -> "navbar" --> Home and Products <-- page
## section-02
    - create a new file in the root directory named --> display_all.php
    - create a new file in the "includes" directory --> footer.php
    - write the footer div code
    - include this footer.php file to all the pages's "footer" section
## section-03
    - to show the all products go to the --> display_all.php
    - copy paste the entire code in this file from the root --> index.php
## section-04
    - go to the --> functions/common_function.php
    - create a new function to show all the products without any limits --> getAllProducts()
    - add this function instead of "getProducts()" inside --> display_all.php

# part-21
## section-01
    - go to root --> index.php
    - go to "first child" > "navbar" > "Search"
    - replace the search "button" to --> "input" field
## section-02
    - create a new file in the root directory --> search_product.php
    - copy paste the entire code to it from root --> index.php
    - make php changes to the "fourth child" > "products" > "fetching products" --> replace getProducts() with searchProducts()
## section-03
    - go to the --> functions/common_function.php
    - create a new function same as getProducts() with minor change with the query and if conditionn --> searchProducts()

# part-22
## section-01
    - go to -> "functions/common_function.php" and change all the links for the page --> view more
    - link the "product_details.php" file/page to this --> view more <-- button
## section-02
    - create a new file in the root directory --> product_details.php
    - copy paste the entire code to it from --> index.php
    - remove the "getProducts()" function from --> fetching products <-- section
## section-03
    - above the "fetching products" section create the layout for the --> view more <-- page
    - we'll make it dynamic in the next part

# part-23
## section-01
    - go to the --> functions/common_function.php
    - create a new function --> viewDetails()
    - same as the getProducts() except this is under a new if condition to get the product value and few more changes in the output
    - change the "view more" button to "Go Home" and link it to the page --> index.php
## sectino-02
    - go to the --> product_details.php
    - trasfer the the part from "fourth child" > "products" > "main product's card" and "related images" to the --> viewDetails()

# part-24
## section-01
    - create a new table --> cart_details
    - create a new column --> product_id [int, primary key]
    - create a new collumn --> ip_address [varchar, 255]
    - create a new column --> quantity [int, 100]
## section-02
    - copy the function for getting ip address in php --> from online
    - go to the --> functions/common_function.php
    - create a new function --> getUserIpAddress()
    - paste the function code copied from online
    - we have to get the ip address for "cart" page since, there will be many orders from many users at the same time

# part-25
## section-01
    - go to --> functions/common_function.php
    - create a new function --> cart()
    - change all the "Add to Cart" --> link it to the "add_to_cart" command of the index.php file/page
    - call the function "cart()" anywhere from the --> index.php

# part-26
## section-01
    - go to --> functions/common_function.php
    - create a new function --> cartItems()
    - change the cart number to dynamic > "first child" > "navbar" > "sup" --> calling the "cartItems()" function in "index.php", "product_details.php", "search_product.php", "display_all.php"

# part-27
## section-01
    - add the product price in every function after the <p> tag in the --> functions/common_function.php

# part-28
## section-01
    - go to the --> functions/common_function.php
    - create a new function --> cartTotalPrice()
    - modify the the function to calculate the total price of each user/ip address
    - change the cart total price to dynamic > "first child" > "navbar" > "Total Price" --> calling the "cartTotalPrice()" function in "index.php", "product_details.php", "search_product.php", "display_all.php"

# part-29
## section-01
    - create a new file in the root directory --> cart.php
    - go to "index.php", "product_details.php", "search_product.php", "display_all.php" --> and change the link to this page in the "cartItems()" part
    - copy paste here the entire code from --> index.php
## section-02
    - remove the "total price" and "form" option from --> "cart.php" ~ "first child" ~ "navbar"
    - replace the parts of "fourth child" with the cart page "table" layout inside the --> cart.php

# part-30
## section-01
    - go to the --> cart.php
    - make php changes inside the --> "fourth child" ~ "tbody"

# part-31
## section-01
    - go to --> cart.php
    - create a form inside --> "fourth child" ~ "container" ~ "row"
    - make php changes inside the --> "tbody"

# part-32
## section-01
    - go to the --> cart.php
    - modify the "remove" button option
    - then make php changes for the remove function in the --> cart page
    - also create a new function there --> remove_cart_item() to remove the items

# part-33
# section-01
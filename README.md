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
    -
# E-Commerce Web Application

> ### Muzahidur Rahman Saim

> ##### Database Management System

---
## Table of Contents

1. Introduction
2. Objectives
3. Technologies Used
4. System Overview
5. Project Structure
6. Database Design
7. Key Functional Modules
8. Code Highlights
9. Security Measures
10. Testing and Validation
11. Challenges Faced
12. Future Scope
13. Conclusion

## Introduction

This project is a dynamic e-commerce web application built using PHP, MySQL, Bootstrap, and HTML/CSS. It enables 
users to browse products, manage carts, place orders, and make payments, while administrators can manage inventory, 
users, and transactions.

## Objectives
➢ Develop a modular and scalable e-commerce platform

➢ Implement secure user and admin authentication

➢ Enable dynamic product and category management

➢ Ensure responsive design across devices

➢ Maintain normalized and efficient database schema

## Technologies Used

| Technology | Purpose                                 |
|------------|-----------------------------------------|
| PHP        | Backend logic and server-side scripting |
| MySQL      | Relational database management          |
| Bootstrap  | Responsive UI design                    |
| HTML/CSS   | Frontend structure and styling          |
| JavaScript | Client-side interactivity               |

## System Overview

➢ **User Roles**: Admin and Customer

➢ **Frontend**: HTML, CSS, Bootstrap

➢ **Backend**: PHP with modular includes and functions

➢ **Database**: MySQL with normalized tables

➢ **Security**: Password hashing, session management

## Project Structure

Ecommerce_Website/

├── admin_area/           → Admin dashboard and controls

├── users_area/           → User registration, login, profile

├── functions/             → Common reusable PHP functions

├── includes/              → DB connection and footer

├── cart.php               → Cart logic and display

├── index.php             → Homepage

├── display_all.php       → Product listing

├── product_details.php → Product detail view

├── search_product.php  → Search functionality

├── style.css               → Global styling


## Database Design

| Table Name     | Description                   |
|----------------|-------------------------------|
| admin_table    | Admin credentials and profile |
| user_table     | User credentials and profile  |
| products       | Product details and images    |
| brands         | Brand metadata                |
| categories     | Product categories            |
| cart_details   | Temporary cart items          |
| user_orders    | Finalized orders              |
| orders_pending | Orders awaiting confirmation  |
| user_payments  | Payment records               |

## Key Functional Modules

> Admin Panel

➢ Login/Logout/Registration

➢ Insert/Edit/Delete Products, Brands, Categories

➢ View/Delete Orders, Payments, Users

> User Side

➢ Registration/Login/Profile Management

➢ Product Browsing and Search

➢ Cart Management and Checkout

➢ Order History and Payment Confirmation

## Code Highlights

➢ **Modular Includes**: connect.php, common_function.php,

footer.php

➢ **Reusable Functions**: getProducts(), cartItems(),

cartTotalPrice()

➢ **Secure Auth**: password_hash() and password_verify()

➢ **Dynamic UI**: Bootstrap cards, modals, and responsive tables

➢ **Session Handling**: Role-based access and redirects

## Security Measures

➢ Passwords stored using password_hash()

➢ Login verification with password_verify()

➢ Session-based access control for admin and users

➢ Input validation and SQL query sanitization

## Testing and Validation

➢ Manual testing of all modules

➢ SQL query validation

➢ UI responsiveness across devices

➢ Edge case handling (empty cart, invalid login, duplicate

entries)

## Challenges Faced

➢ Ensuring modularity and reusability in PHP

➢ Handling session timeouts and redirects

➢ Designing a normalized yet flexible schema

➢ Responsive UI across screen sizes and browsers

## Future Scope

➢  Integrate payment gateway (Stripe, PayPal)

➢  Add product reviews and ratings

➢  Implement RESTful API for mobile apps

➢  Enhance security with CSRF tokens and CAPTCHA

➢  Add analytics dashboard for admin

## Conclusion

This project demonstrates a complete e-commerce workflow with robust backend logic, secure authentication, and 
responsive design. It reflects practical application of web development principles and database design, making it 
suitable for real-world deployment and academic evaluation.

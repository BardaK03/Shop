Laravel Sales Management Program
This is a Laravel-based web application designed to manage products, sales, and user interactions. It includes features for both administrators and regular users, with specific actions restricted based on user roles. 

Features
User Roles:

Regular users can add products to their cart, view their sales history, and complete orders.
Admin users can manage products, update stock, and delete items.
Product Management:

CRUD operations for products, including adding, updating stock, and deleting.
Display products in a responsive grid layout.
Cart and Sales:

Users can add products to their cart, complete orders, and view order history.
Automatic stock updates when a sale is completed.
Prevents users from adding out-of-stock products to the cart.

User Authentication:

Utilizes Laravel Breeze for login and registration functionality.
Responsive Design:

Technologies Used
Backend: Laravel 10
Frontend: Tailwind CSS
Authentication: Laravel Breeze
Database: MySQL
Server Requirements: PHP 8.2 or higher, Composer,node.js

Do the following to test the program:
install dependencies:
composer install
npm install

Copy the .env.example file to .env:

cp .env.example .env

Configure the env file with your server cridentials

Run  migrations to set up the database:
php artisan migrate

Compile assets:

npm run dev
Start the development server:


php artisan serve
Open the application in your browser:

http://127.0.0.1:8000

How to Use
Admin Functionalities
Log in as an admin (use the usertype field in the users table to set a user as an admin).
Navigate to the product management page to:
Add new products.
Update stock for existing products.
Delete products no longer needed.
User Functionalities
Register or log in to access the product list.
Add products to the cart and complete orders.
View order history from the "Sales History" page.

Contact
For questions or suggestions, feel free to reach out via GitHub issues or contact me directly.


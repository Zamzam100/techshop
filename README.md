TechShop - E-commerce Login System
A complete PHP-based e-commerce login and signup system with product catalog.

📋 Project Overview
This project implements a full-stack web application with user authentication and an e-commerce product display. Users can create accounts, login with secure password hashing, and browse products on a responsive home page.

✨ Features
User Authentication

Secure user registration with form validation

Login system with session management

Password hashing using PHP password_hash()

Login attempt limiting (3 attempts max)

E-commerce Catalog

Product display with images and prices

Responsive design

Add to cart functionality (UI only)

Security

SQL injection prevention using PDO prepared statements

Session-based authentication

Password confirmation validation

Input sanitization

🛠 Technologies Used
Frontend: HTML5, CSS3, JavaScript

Backend: PHP

Database: MySQL

Server: XAMPP (Apache)

Security: PHP password_hash(), PDO prepared statements

📁 File Structure
text
techshop/
├── config.php          # Database configuration
├── index.html          # Login page
├── login.php           # Login handler
├── signup.html         # Registration page
├── signup.php          # Registration handler
├── home.php            # E-commerce homepage
├── logout.php          # Session destroyer
└── style.css           # Styling
🚀 Installation & Setup
Prerequisites
XAMPP installed on your system

Web browser

Text editor

Step-by-Step Setup
Start XAMPP Services

Open XAMPP Control Panel

Start Apache and MySQL

Create Database

Open browser → http://localhost/phpmyadmin


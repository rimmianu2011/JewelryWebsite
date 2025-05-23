# 💍 Jewelry E-Commerce Website (PHP + MySQL)

A complete e-commerce platform for a jewelry store built with **PHP**, **Javascript** and **MySQL**, supporting dynamic product listings, cart functionality, user authentication, and an admin dashboard.

![PHP](https://img.shields.io/badge/Backend-PHP-blue)
![MySQL](https://img.shields.io/badge/Database-MySQL-orange)
![HTML](https://img.shields.io/badge/Frontend-HTML/CSS-green)

---

## ✨ Features

- ✅ Browse products by category: Bangles, Rings, Earrings, Pendants, Necklaces
- ✅ Filter by metal type (Gold/Silver)
- ✅ User registration & login
- ✅ Add to cart and checkout
- ✅ Admin dashboard to manage:
  - Products (Add/Edit/Delete)
  - User accounts
  - Orders and messages
- ✅ Contact form with database storage

---

## 📁 Project Structure

- `indexJA.php` — Homepage
- `loginJA.php`, `registerJA.php` — User authentication pages
- `cartJA.php`, `checkoutJA.php` — Cart and checkout logic
- Product Listings:
  - `bangles.php`, `rings.php`, `necklaces.php`, `pendants.php`, `ear.php`, `occasions.php`
- Admin Panel:
  - `adminpanel.php` — Admin dashboard
  - `adminindex.php` — Admin login
- `connection.php` — Database connection configuration
- `SQL/` — SQL dump files
  - `admininfo.sql`, `meminfo.sql`, `orders.sql`, etc.
- `images/` — Product and UI images
- `styles/` — CSS stylesheets




---

## 🧪 Setup Instructions

### 1. Import SQL Files

- Use phpMyAdmin to import all `.sql` files into a database named `slit_pro`.

### 2. Configure DB Connection

Edit `connection.php`:

```php
$host = "localhost";
$user = "root";
$password = "";
$db = "slit_pro";
```


### 3. Run the App
Place the files in your web server root (e.g., htdocs for XAMPP)
Start Apache + MySQL
Visit: http://localhost/indexJA.php

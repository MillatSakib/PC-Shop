# PC Shop

A complete PHP & MySQL-based e-commerce web application featuring product management, cart, wishlist, order placement, user authentication, admin dashboard with analytics, and more.

## Features

#### **User-Side Features**
- Browse products by category (Laptop, Mobile, PC, Monitor)
- Modern product cards with wishlist & cart buttons
- Add items to cart with quantity selection
- Add/remove items from wishlist
- Product details page with full info
- Place orders with multiple payment methods
- Manage cart & checkout system
- User login & registration system
- Fully responsive and mobile-friendly UI

---

#### **Admin-Side Features**
- Secure admin login & session management
- Dashboard with analytics & charts:
  - Total pending orders + amount  
  - Total completed orders + amount  
  - Total revenue  
  - Total products  
  - Total users  
  - Total admins  
  - Total messages  
- Product Management:
  - Add new products  
  - Update product details  
  - Delete products  
  - Upload product images  
- User Management:
  - View all users  
  - Make user admin  
  - Delete user accounts  
- Order Management:
  - View all orders  
  - Update payment status  
  - Delete orders  
- Message Management:
  - View customer messages  
  - Delete messages  

---


### Requirements

Before running this project, make sure you have the following installed and configured locally if you want to run it on local machine:

- **XAMPP / WAMP / LAMP** (recommended: PHP 8+)
- **PHP 7.4+** or higher  
- **MySQL 5.7+ / MariaDB**  
- **Apache Server** (for serving PHP files)
- **phpMyAdmin** (optional, for easier database management)
- **Composer** (optional, if you want to extend the project)

---

### Deploy and Run

#### Deployment 

For build and deploy the easiest way to use docker. Using docker the project building process are given below:

- If you run this project on docker for the first time then execute the command below:

```sh
sudo docker compose up -d --build
```

- If you run this project using docker in your server before then execute the command bellow :

```sh
sudo docker compose down
sudo docker rm -f pc-shop-app
sudo docker rm -f pc-shop-db
sudo docker volume rm $(docker volume ls -q)
sudo docker compose down -v
sudo docker compose down --remove-orphans
sudo docker compose build --no-cache
sudo docker compose up -d
```

#### Run

- Database Access: http://your-ip:8082

- Web Project Access: http://your-ip:420

- Admin Email: millatsakib01@gmail.com

- Admin Password: 114477

- User Email: prithu@gmail.com

- User Password: 114477


### Contributing

Pull requests are welcome!
Feel free to improve the UI, add features, or enhance security.

### License

This project is open-source for educational and personal use.
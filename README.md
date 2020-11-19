<h1 align="center">Shoe-store</h1>

## About Shoe-store

Shoe store is a simple little shoe store app displaying a product list and implementing cart functionality, built using Laravel v7.30.0.
<br>It provides the following features:

- Browse shoes in the system.
- Add products to cart.
- Manage products in cart.
- Check out.

The project also covers other basics like database model and migration..

## Installation

Clone the repo:

    git clone https://github.com/ETdvlpr/shoe-store.git

Run composer install from with in the 'shoe-store' directory:

    composer install

## Set up
Make .env file and create database credentials.

    cp .env.example .env
    php artisan key:generate
    php artisan migrate --seed

All done.

## Screenshots

![Home page](/screenshot/home.PNG)
---
![Cart view from home](/screenshot/home_drop_cart.PNG)
---
![Cart](/screenshot/cart.PNG)
---
![Checkout page](/screenshot/checkout.PNG)
---
![Invoice](/screenshot/invoice.PNG)

## License

This app licensed under the [MIT license](https://opensource.org/licenses/MIT).

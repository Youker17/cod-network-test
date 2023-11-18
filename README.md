This project is a test application built with Laravel and blade for cod network. It allows users to manage products and categories through both a web interface and command-line interface (CLI).

## Features

- CRUD operations for products and categories.
- Command-line interface for creating, updating, and deleting products and categories.
- Web interface for managing products with pagination, sorting, and filtering.
- Automated tests to ensure code quality.

## Technologies Used

- Laravel
- blade
- PHP
- MySQL

## Setup Guide

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate --seed

php artisan serve

## CLI COMMANDS EXAMPLES

-php artisan product:create "Product Name" "Product Description" 10.99

-php artisan product:delete 1

-php artisan category:create "Category Name"

-php artisan category:delete 1





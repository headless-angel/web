<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel Web

# Web Application Assignment

## Overview

This project is a web application with custom authentication, a user-friendly dashboard, Excel file upload functionality, database integration, and display of Excel data.

## Requirements

- Custom Authentication
- Dashboard Development
- Excel File Upload
- Database Integration
- Display Excel Data in Dashboard

## Technology Stack

- Backend: Laravel 10
- Frontend: Blade, HTML, CSS, Vanilla JS
- Database: PostgreSQL

## Setup and Execution

1. Clone the repository:
    ```bash
    git clone https://github.com/headless-angel/web.git
    cd webapp
    ```

2. Install dependencies:
    ```bash
    composer install
    npm install
    npm run dev
    ```

3. Configure the environment:
    - Copy `.env.example` to `.env`
    - Update database configuration in `.env`



### How to Configure `.env` and Database

#### Configure `.env`

1. Copy the example environment file to create your own `.env` file:
    ```bash
    cp .env.example .env
    ```

2. Open the `.env` file in a text editor and update the following lines with your database credentials:
    ```env
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

#### Configure PostgreSQL Database

1. Make sure PostgreSQL is installed and running on your system.
2. Create a new PostgreSQL database:
    ```sql
    CREATE DATABASE your_database_name;
    ```
3. Create a new PostgreSQL user (if you don't already have one) and grant privileges to the database:
    ```sql
    CREATE USER your_database_username WITH PASSWORD 'your_database_password';
    GRANT ALL PRIVILEGES ON DATABASE your_database_name TO your_database_username;
    ```

Make sure to replace `your_database_name`, `your_database_username`, and `your_database_password` with your actual database name, username, and password respectively.

That's it! Your Laravel application should now be set up and ready to use.



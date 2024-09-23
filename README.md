# Laravel Project

This is a sample control access list application on Laravel.

## Prerequisites

- PHP >= 8.2
- Composer
- MySQL 8.0
- Laravel 11
- Docker & Docker Compose

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/kmow-heal/acl-laravel-testtask.git
   cd acl-laravel-testtask

2. For start copy file `.env.example` as `.env`. You need change value 

    ```bash
    DB_USERNAME=you_user
    DB_PASSWORD=you_password

    Where `you_user` username which created and `you_password` is password for this user. Olso this password used as root password

3. Start project with Docker:

    ```bash
    cd project_path/acl-laravel-testtask
    docker-compose -d

4. Add some fake information to database:

    ```bash
    docker exec acl-app php artisan migrate:refresh --seed


## Access to resource

Web application ACL listens port 8000 
[ACL example link](http://localhost:8000).

PhpMyAdmin listens port 8080
[phpmyadmin example link](http://localhost:8080).
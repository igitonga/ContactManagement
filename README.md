## Installation
After cloning the repo run the following commands:

- composer install.
- cp .env.example .env.
- php artisan key:generate.
- In .env set DB_DATABASE giving it any name.
- Create the databse in Mysql
- php artisan migrate.
- php artisan serve.

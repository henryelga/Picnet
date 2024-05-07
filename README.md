## Authors 👥<br>
Mila Murphy
Elga Jerusha Henry

## Usage 🛠️<br>
Setting up your development environment on your local machine: <br>
```
git clone git@github.com:henryelga/laravel-socialMedia-clone.git
cp .env.example .env
composer install
php artisan key:generate
php artisan cache:clear && php artisan config:clear
php artisan serve
```

## Before starting 👩‍💻<br>
Create a database <br>
```
mysql
create database laravel-sample-1;
exit;
```

Setup your database credentials in the .env file<br>
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel-sample-1
DB_USERNAME={USERNAME}
DB_PASSWORD={PASSWORD}
```

Migrate the tables
```
php artisan migrate
```

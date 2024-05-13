# Picnet

Picnet is a visually-focused social media platform that allows users to create, share, and discover stunning visual content. Picnet prioritizes multimedia, enabling users to build profiles, upload original artwork, and interact through likes and comments. With a clean interface and an immersive visual experience, Picnet fosters a thriving community centered around the appreciation of creative visual expression.



## Table of Contents
- [About](#about)
- [Picnet Snaps](#picnet-snaps)
- [Authors](#authors-)
- [Technologies Used](#technologies-used)
- [CRUD Functionalities](#crud-functionalities)
- [Validation and Authorization](#validation-and-authorization)
- [Usage](#usage-️)
    - [Setting up your development environment](#setting-up-your-development-environment-on-your-local-machine)
    - [Before Starting](#before-starting-)
    - [Creating a database](#create-a-database)
    - [Configuring the database](#setup-your-database-credentials-in-the-env-file)
    - [Migrating the tables](#migrate-the-tables)

## About

## Picnet Snaps

## Authors 👥
- [Mila Murphy](https://github.com/milamurphy)
- [Elga Jerusha Henry](https://github.com/henryelga)

## Technologies Used 
![XAMPP](https://img.shields.io/badge/Xampp-F37623?style=for-the-badge&logo=xampp&logoColor=white)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white) 
![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E)
![Visual Studio Code](https://img.shields.io/badge/Visual%20Studio%20Code-0078d7.svg?style=for-the-badge&logo=visual-studio-code&logoColor=white)

## CRUD Functionalities

| Functionality | Guests | Users | Admins |
| --- | --- | --- | --- |
| View posts | ✅ | ✅ | ✅ |
| View comments | ✅ | ✅ | ✅ |
| View user profiles | ✅ | ✅ | ✅ |
| Create a new account | ✅ | ✅ | ✅ |
| Create posts | - | ✅ | ✅ |
| Edit posts | - | ✅ | ✅ |
| Delete posts | - | ✅ | ✅ |
| Like and unlike posts | - | ✅ | ✅ |
| Comment on posts | - | ✅ | ✅ |
| Delete their comments | - | ✅ | ✅ |
| View their profile | - | ✅ | ✅ |
| Edit their profile | - | ✅ | ✅ |
| Delete any post | - | - | ✅ |
| Delete any comment | - | - | ✅ |
| Access admin dashboard | - | - | ✅ |
| View user profiles from dashboard | - | - | ✅ |
| Delete users | - | - | ✅ |

## Validation and Authorization
Picnet has strict validation requirements to ensure the safety and integrity of the platform:
- Passwords must be at least 8 characters long
- Passwords are encrypted
- Email and username must be unique
- Usernames are checked against a [Bad Words API](https://rapidapi.com/neutrinoapi/api/bad-word-filter/) to prevent the use of inappropriate content
  
Users must be authenticated to access the full range of features on Picnet. The platform uses a robust authorization system to ensure that only authorized users can perform actions such as creating, editing, and deleting their own content.

## Usage 🛠️<br>
### Setting up your development environment on your local machine
```
git clone git@github.com:henryelga/laravel-socialMedia-clone.git
cp .env.example .env
composer install
php artisan key:generate
php artisan cache:clear && php artisan config:clear
php artisan serve
```

## Before starting 👩‍💻<br>
### Create a database
```
mysql
create database laravel-sample-1;
exit;
```

### Setup your database credentials in the .env file
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel-sample-1
DB_USERNAME={USERNAME}
DB_PASSWORD={PASSWORD}
```

### Migrate the tables
```
php artisan migrate
```

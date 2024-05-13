# Picnet

Picnet is a visually-focused social media platform that allows users to create, share, and discover stunning visual content. Picnet prioritises multimedia, enabling users to build profiles, upload original artwork, and interact through likes and comments. With a clean interface and an immersive visual experience, Picnet fosters a thriving community centered around the appreciation of creative visual expression.



## Table of Contents
- 🔎 [About](#about-)
- 📸 [Picnet Snaps](#picnet-snaps-)
    - [Welcome Screen](#welcome-screen)
    - [Home Feed](#home-feed)
    - [Change Theme](#change-theme)
    - [Create Post](#create-post)
    - [Profile Page](#profile-page)
    - [Edit Profile](#edit-profile)
    - [Edit Post](#edit-post)
    - [Admin Dashboard](#admin-dashboard)
    - [Responsive](#responsive)
- 👥 [Authors](#authors-)
- 🚀 [Technologies Used](#technologies-used-)
- 💾 [CRUD Functionalities](#crud-functionalities-)
- 🤖 [Validation and Authorisation](#validation-and-authorisation-)
- 🛠️ [Usage](#usage-️)
    - [Setting up your development environment](#setting-up-your-development-environment-on-your-local-machine)
- 👩‍💻 [Before Starting](#before-starting-)
    - [Creating a database](#create-a-database)
    - [Configuring the database](#setup-your-database-credentials-in-the-env-file)
    - [Migrating the tables](#migrate-the-tables)

## About 🔎
Picnet is a social media platform that we developed as a way to challenge ourselves and expand our skills in server-side web development. We built Picnet from scratch using PHP, the Laravel framework, HTML, CSS and Javascript. Through the development of this project we had the opportunity to deeply refine our abilities in areas such as database management, API integration, user authentication, form validation, and front-end user experience design. We were able to demonstrate our knowledge of the Model-View-Controller architecture. It was a rewarding journey that allowed us to push the boundaries of our technical knowledge and problem-solving skills.

## Picnet Snaps 📸
### Welcome Screen
<img src="https://i.ibb.co/V3dd5mK/image.png"><br>
### Home Feed
<img src="https://i.ibb.co/j4zNy7c/image.png"><br>
### Change Theme
<img src="https://i.ibb.co/6HxTB2n/image.png"><br>
### Create Post
<img src="https://i.ibb.co/VL3DnWd/image.png"><br>
### Profile Page
<img src="https://github.com/henryelga/laravel-socialMedia-clone/assets/111306604/c61e577b-03bb-45f4-a6cb-999c63ec7254"><br>
### Edit Profile
<img src="https://github.com/henryelga/laravel-socialMedia-clone/assets/111306604/accf9a0e-4754-4563-b6b0-a8576347a2b1"><br>
### Edit Post
<img src="https://github.com/henryelga/laravel-socialMedia-clone/assets/111306604/17f8dd82-e578-4d89-84a5-aadfff599947"><br>
<img src="https://github.com/henryelga/laravel-socialMedia-clone/assets/111306604/47a26c3c-5ee7-4ffd-8bc2-a0e130478a58"><br>
### Admin Dashboard
<img src="https://github.com/henryelga/laravel-socialMedia-clone/assets/111306604/6eac6edd-c69f-4d1f-b0f4-dc072af334ca"><br>
### Responsive
<img src="https://i.ibb.co/LhjcKXf/app.png"><br>


## Authors 👥
- [Mila Murphy](https://github.com/milamurphy)
- [Elga Jerusha Henry](https://github.com/henryelga)

## Technologies Used 🚀
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white) 
![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E)
![XAMPP](https://img.shields.io/badge/Xampp-F37623?style=for-the-badge&logo=xampp&logoColor=white)
![Visual Studio Code](https://img.shields.io/badge/Visual%20Studio%20Code-0078d7.svg?style=for-the-badge&logo=visual-studio-code&logoColor=white)

## CRUD Functionalities 💾

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

## Validation and Authorisation 🤖
Picnet has strict validation requirements to ensure the safety and integrity of the platform:
- Passwords are encrypted
- Passwords must be at least 8 characters long
- Email and username must not already be in use upon account creation and when updating profile
- Usernames are checked against a [Bad Words API](https://rapidapi.com/neutrinoapi/api/bad-word-filter/) to prevent the use of inappropriate content
  
Users must be authenticated to access the full range of features on Picnet. The platform uses a robust authorisation system to ensure that only authorised users can perform actions such as creating, editing, and deleting their own content. Only admins can access the admin dashboard and have the ability to delete any user or their posts and comments.

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

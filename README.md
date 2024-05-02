<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

```
sample-laravel-1
├─ 📁app
│  ├─ 📁Http
│  │  └─ 📁Controllers
│  │     ├─ 📁Auth
│  │     │  └─ 📄LoginController.php
│  │     ├─ 📄Controller.php
│  │     ├─ 📄PostController.php
│  │     └─ 📄ProfileController.php
│  ├─ 📁Models
│  │  ├─ 📄Company.php
│  │  ├─ 📄Post.php
│  │  ├─ 📄Profile.php
│  │  └─ 📄User.php
│  └─ 📁Providers
│     └─ 📄AppServiceProvider.php
├─ 📁bootstrap
│  ├─ 📁cache
│  │  ├─ 📄.gitignore
│  │  ├─ 📄packages.php
│  │  └─ 📄services.php
│  ├─ 📄app.php
│  └─ 📄providers.php
├─ 📁config
│  ├─ 📄app.php
│  ├─ 📄auth.php
│  ├─ 📄cache.php
│  ├─ 📄database.php
│  ├─ 📄filesystems.php
│  ├─ 📄logging.php
│  ├─ 📄mail.php
│  ├─ 📄queue.php
│  ├─ 📄services.php
│  └─ 📄session.php
├─ 📁database
│  ├─ 📁factories
│  │  └─ 📄UserFactory.php
│  ├─ 📁migrations
│  │  ├─ 📄0001_01_01_000001_create_cache_table.php
│  │  ├─ 📄0001_01_01_000002_create_jobs_table.php
│  │  ├─ 📄2024_05_01_172909_create_companies_table.php
│  │  ├─ 📄2024_05_01_173620_users.php
│  │  ├─ 📄2024_05_01_174251_posts.php
│  │  └─ 📄2024_05_01_192413_create_sessions_table.php
│  ├─ 📁seeders
│  │  └─ 📄DatabaseSeeder.php
│  └─ 📄.gitignore
├─ 📁public
│  ├─ 📁css
│  │  └─ 📄style.css
│  ├─ 📁images
│  ├─ 📄.htaccess
│  ├─ 📄favicon.ico
│  ├─ 📄index.php
│  └─ 📄robots.txt
├─ 📁resources
│  ├─ 📁css
│  │  └─ 📄app.css
│  ├─ 📁js
│  │  ├─ 📄app.js
│  │  └─ 📄bootstrap.js
│  └─ 📁views
│     ├─ 📁auth
│     │  └─ 📄login.blade.php
│     ├─ 📁posts
│     │  └─ 📄index.blade.php
│     ├─ 📄profile.blade.php
│     └─ 📄welcome.blade.php
├─ 📁routes
│  ├─ 📄console.php
│  └─ 📄web.php
├─ 📁storage
│  ├─ 📁app
│  │  ├─ 📁public
│  │  │  └─ 📄.gitignore
│  │  └─ 📄.gitignore
│  ├─ 📁framework
│  │  ├─ 📁cache
│  │  │  ├─ 📁data
│  │  │  │  └─ 📄.gitignore
│  │  │  └─ 📄.gitignore
│  │  ├─ 📁sessions
│  │  │  └─ 📄.gitignore
│  │  ├─ 📁testing
│  │  │  └─ 📄.gitignore
│  │  ├─ 📁views
│  │  │  ├─ 📄.gitignore
│  │  │  ├─ 📄052d6e48a91f2ff04257fe331c708e4b.php
│  │  │  ├─ 📄19091e2c422508110fe27a068e7438ef.php
│  │  │  ├─ 📄492fc6facd1eb9b70ecf1030fbe738b2.php
│  │  │  ├─ 📄4cc329cb2494e7a306707f4e79ebbdd5.php
│  │  │  └─ 📄904d788e84d78774ad44d00ba1b5f8a2.php
│  │  └─ 📄.gitignore
│  └─ 📁logs
│     ├─ 📄.gitignore
│     └─ 📄laravel.log
├─ 📁tests
│  ├─ 📁Feature
│  │  └─ 📄ExampleTest.php
│  ├─ 📁Unit
│  │  └─ 📄ExampleTest.php
│  └─ 📄TestCase.php
├─ 📄.editorconfig
├─ 📄.env.example
├─ 📄.gitattributes
├─ 📄.gitignore
├─ 📄artisan
├─ 📄composer.json
├─ 📄composer.lock
├─ 📄package-lock.json
├─ 📄package.json
├─ 📄phpunit.xml
├─ 📄README.md
└─ 📄vite.config.js
```
# 3SKE - DJ Website

Laravel application for DJ portfolio with user management and profiles.

## Setup

1. Clone the repository
2. Install dependencies:
```bash
composer install
npm install
```

3. Configure environment:
```bash
cp .env.example .env
php artisan key:generate
```

4. Run migrations:
```bash
php artisan migrate
```

5. Seed admin user:
```bash
php artisan db:seed --class=AdminSeeder
```

6. Create storage symlink for avatars:
```bash
php artisan storage:link
```

7. Build assets:
```bash
npm run dev
```

## Default Admin

- Email: admin@ehb.be
- Password: Password!321

## Features

- Authentication (Laravel Breeze)
- Role-based access (admin/user)
- Admin user management
- User profiles with avatars
- Public profile pages
- News management with featured posts
- FAQ system with categories
- Events/Shows with posters and ticket links
- Tag system for event categorization
- Contact form with booking requests
- Admin inbox with reply functionality

## Deployment (Dokploy)

### Required Environment Variables

For production deployment on Dokploy, configure these environment variables:

```env
# Application
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com

# Database (if using MySQL/PostgreSQL instead of SQLite)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

# Mail Configuration
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com          # Or your mail provider
MAIL_PORT=587
MAIL_USERNAME=your-email@domain.com
MAIL_PASSWORD=your-app-password   # Use App Password for Gmail
MAIL_FROM_ADDRESS=noreply@your-domain.com
MAIL_FROM_NAME="Your DJ Name"
MAIL_ADMIN_EMAIL=info@your-domain.com  # Where contact form notifications are sent

# Session & Cache (recommended for production)
SESSION_DRIVER=database
CACHE_STORE=database
```

### Post-Deployment Commands

Run these commands after deploying:

```bash
php artisan migrate --force
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Mail Providers

For production, you can use:
- **Gmail**: Free, requires [App Password](https://myaccount.google.com/apppasswords)
- **Resend**: 10,000 emails/month free
- **Mailgun**: 5,000 emails/month free  
- **SendGrid**: 100 emails/day free

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

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

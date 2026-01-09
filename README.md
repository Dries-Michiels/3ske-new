# 3SKE - DJ Website

A modern Laravel application for DJ 3SKE featuring event management, news updates, user profiles with favorites system, FAQ section, and contact management. Built with Laravel 12, Tailwind CSS, and a custom dark theme.

## Features

### Public Features
- **Homepage**: Full-screen slideshow, about section, latest SoundCloud mix embed, and booking CTA
- **Shows**: Browse upcoming and past events with tag filtering
- **News**: Latest updates and announcements
- **FAQ**: Organized frequently asked questions by category
- **Contact**: Contact form with admin notification system

### User Features (Authentication Required)
- **User Registration & Login**: Secure authentication with Laravel Breeze
- **Profile Management**: Custom profile with avatar upload, birthday, and bio
- **Favorites System**: Save upcoming shows and view them on your profile
- **Public Profiles**: Share your profile and favorite shows with others

### Admin Features
- **Dashboard**: Overview of users, events, news, and messages
- **User Management**: View and manage all registered users
- **Event Management**: Create, edit, and publish events with tags
- **News Management**: Publish and manage news articles
- **Tag Management**: Organize events with custom tags
- **Contact Messages**: View and manage contact form submissions
- **FAQ Management**: Organize FAQs by categories

## Tech Stack

- **Backend**: Laravel 12.x, PHP 8.4
- **Frontend**: Blade templates, Tailwind CSS, Alpine.js
- **Database**: SQLite (development) / MySQL (production ready)
- **Build Tools**: Vite 7.x
- **Fonts**: Custom fonts (Gagalin, Agrandir) loaded via Vite
- **Email**: Custom dark theme email templates

## Installation

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js & npm
- SQLite or MySQL

### Setup Steps

1. **Clone the repository**
```bash
git clone <repository-url>
cd 3SKE
```

2. **Install PHP dependencies**
```bash
composer install
```

3. **Install JavaScript dependencies**
```bash
npm install
```

4. **Environment configuration**
```bash
cp .env.example .env
php artisan key:generate
```

5. **Configure database** (if using MySQL, update `.env`)
```env
DB_CONNECTION=sqlite
# Or for MySQL:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=3ske
# DB_USERNAME=root
# DB_PASSWORD=
```

6. **Create SQLite database file** (required for SQLite)
```bash
# On macOS/Linux:
touch database/database.sqlite

# On Windows (PowerShell):
New-Item database/database.sqlite -ItemType File

# Or Windows (Command Prompt):
type nul > database\database.sqlite
```

7. **Run migrations with seed data**
```bash
php artisan migrate:fresh --seed
```

This will create:
- 1 admin user
- 4 regular users
- 9 tags (Techno, House, EDM, etc.)
- 7 events (4 upcoming, 3 past)
- 5 news posts
- 4 FAQ categories with 13 FAQ items

8. **Create storage symlink** (for avatar and event image uploads)
```bash
php artisan storage:link
```

9. **Build frontend assets**
```bash
npm run dev
```
Or for production:
```bash
npm run build
```

10. **Access the application**
- Local: `http://3ske.test` (if using Laravel Herd)
- Or: `php artisan serve` then visit `http://localhost:8000`

## Default Credentials

### Admin Account
- **Email**: admin@ehb.be
- **Password**: Password!321
- **Role**: Admin (full access to admin panel)

### Test User Accounts
All test users have password: `password`
- user1@example.com (Test naam)
- sarah@example.com (Sarah Johnson)
- mike@example.com (Mike Chen)
- emma@example.com (Emma Williams)

## Configuration Notes

### Mail Configuration
The application includes custom dark-themed email templates. To test emails locally:

**Option 1: Log driver (default for development)**
```env
MAIL_MAILER=log
```
Emails will be logged to `storage/logs/laravel.log`

**Option 2: Mailtrap (recommended for testing)**
```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
```

**Option 3: Production SMTP**
Update `.env` with your SMTP provider credentials.

Admin email notifications:
```env
MAIL_FROM_ADDRESS=noreply@3ske.com
MAIL_FROM_NAME="3SKE"
MAIL_ADMIN_EMAIL=admin@ehb.be
```

### Storage & Uploads
- Avatars: `storage/app/public/avatars/`
- Event images: `storage/app/public/events/`
- Max upload size: 2MB for avatars
- Supported formats: JPG, PNG, GIF, WebP

After uploading files, they're accessible via the `/storage` symlink.

## Development

### Running Development Server
```bash
npm run dev
```
This starts Vite dev server with hot module replacement.

### Database Reset
To reset database with fresh seed data:
```bash
php artisan migrate:fresh --seed
```

### Creating Admin Users
Run the admin seeder manually:
```bash
php artisan db:seed --class=AdminSeeder
```

## Project Structure

```
3SKE/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/          # Admin panel controllers
│   │   ├── FavoriteController.php
│   │   ├── UserProfileController.php
│   │   └── ...
│   ├── Models/
│   │   ├── User.php        # User with favorites relationship
│   │   ├── Event.php       # Events with tags
│   │   ├── NewsPost.php    # News articles
│   │   ├── FaqCategory.php
│   │   └── ...
├── database/
│   ├── migrations/         # Database schema
│   └── seeders/           # Demo data seeders
├── resources/
│   ├── css/
│   │   └── app.css        # Tailwind + custom styles
│   ├── fonts/             # Gagalin & Agrandir fonts
│   ├── js/
│   │   ├── app.js
│   │   └── bootstrap.js
│   └── views/
│       ├── layouts/
│       │   ├── public.blade.php  # Main dark theme layout
│       │   └── guest.blade.php   # Auth pages layout
│       ├── home.blade.php        # Homepage with slideshow
│       ├── shows/                # Event listings
│       ├── news/                 # News articles
│       ├── faq/                  # FAQ pages
│       ├── contact/              # Contact form
│       ├── favorites/            # User favorites
│       └── profiles/             # Public user profiles
├── public/
│   └── images/            # Static images (logos, slideshow, about)
└── routes/
    └── web.php           # All application routes
```

## Design & Theming

### Color Scheme
The application uses a custom dark neutral gray theme:
- **Primary Background**: `#171717` (neutral-900)
- **Card Background**: `#262626` (neutral-800)
- **Input/Border**: `#404040` (neutral-700)
- **Text**: White / Light Gray (300-400)
- **Accent**: Red (#ef4444) for favorites

### Typography
- **Headings & Nav**: Gagalin-Regular (custom font)
- **Body Text**: Agrandir-Narrow (custom font)

### Responsive Breakpoints
- Mobile: < 640px
- Tablet: 640px - 1024px
- Desktop: > 1024px

## Routes Overview

### Public Routes
- `/` - Homepage
- `/shows` - Event listings with tag filter
- `/shows/{slug}` - Event detail page
- `/news` - News listing
- `/news/{slug}` - News article detail
- `/faq` - FAQ page with categories
- `/contact` - Contact form
- `/users/{name}` - Public user profile

### Authenticated User Routes
- `/profile` - Edit own profile
- `/favorites` - View favorited shows
- `/events/{event}/favorite` - Toggle favorite (AJAX)

### Admin Routes (requires admin role)
- `/admin/dashboard` - Admin dashboard
- `/admin/users` - User management
- `/admin/events` - Event management
- `/admin/news` - News management
- `/admin/tags` - Tag management
- `/admin/contact-messages` - Contact form submissions
- `/admin/faq` - FAQ management

## Sources & Credits

### Technologies
- [Laravel 12](https://laravel.com) - PHP web framework
- [Tailwind CSS 3](https://tailwindcss.com) - Utility-first CSS framework
- [Alpine.js](https://alpinejs.dev) - Lightweight JavaScript framework
- [Vite 7](https://vitejs.dev) - Frontend build tool

### Fonts
- **Gagalin** - Used for headings and navigation
- **Agrandir** - Used for body text

### Images
- Logo and branding: 3SKE original assets
- Slideshow images: Placeholder images (replace with actual event photos)

### Inspiration
- Design inspired by modern DJ/artist websites
- Dark theme optimized for music and entertainment industry
- Mobile-first responsive design

### Development
- Built as a portfolio project
- Laravel Breeze for authentication scaffolding
- Custom components and styling throughout
- GitHub Copilot - AI assistant for code suggestions and debugging

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

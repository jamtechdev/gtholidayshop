# 🎁 Holiday Gift App

A modern Laravel-based web application for managing holiday gift requests and selections. Users can browse gift categories, select gifts, and submit requests, while administrators can manage categories, gifts, users, and export data.

## ✨ Features

- **User Journey**: Interactive gift selection experience with multiple steps
- **Gift Categories**: Organize gifts by categories (Technology, Merchandise, Donations)
- **User Management**: Admin panel for managing users with import/export functionality
- **Gift Requests**: Track and manage user gift requests
- **Excel Export/Import**: Export gift requests and users data, import users from Excel
- **Admin Dashboard**: Comprehensive admin interface for managing all aspects of the application
- **Modern UI**: Built with Tailwind CSS and Vite for a beautiful, responsive interface

## 🛠️ Tech Stack

- **Backend**: Laravel 12.x
- **Frontend**: Vite, Tailwind CSS 4.x
- **Database**: SQLite (default, can be configured for MySQL/PostgreSQL)
- **PHP**: 8.2+
- **Node.js**: 18+ (for frontend assets)

## 📋 Prerequisites

Before you begin, ensure you have the following installed:

- **PHP 8.2 or higher** with the following extensions:
  - `gd` (required for Excel export functionality)
  - `pdo_sqlite` (for SQLite database)
  - `mbstring`
  - `xml`
  - `curl`
  - `zip`
  - `openssl`
- **Composer** (PHP dependency manager)
- **Node.js 18+** and **npm** (for frontend assets)
- **Git** (for version control)

### Enabling PHP GD Extension

The GD extension is required for Excel export functionality. To enable it:

**Windows (XAMPP):**
1. Open `C:\xampp\php\php.ini`
2. Find the line `;extension=gd` and remove the semicolon: `extension=gd`
3. Restart your web server

**Linux:**
```bash
sudo apt-get install php-gd
sudo systemctl restart php-fpm  # or your PHP service
```

**macOS:**
```bash
brew install php-gd
```

## 🚀 Installation

### Step 1: Clone the Repository

```bash
git clone <repository-url>
cd holiday-gift-app
```

### Step 2: Install PHP Dependencies

```bash
composer install
```

If you encounter GD extension errors, you can temporarily ignore them during installation:
```bash
composer install --ignore-platform-req=ext-gd
```

**Note**: You'll still need to enable the GD extension before running the application.

### Step 3: Install Node Dependencies

```bash
npm install
```

### Step 4: Environment Configuration

Create a `.env` file from the example:

```bash
cp .env.example .env
```

Or on Windows:
```bash
copy .env.example .env
```

Edit the `.env` file and configure the following:

```env
APP_NAME="Holiday Gift App"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

# Database Configuration (SQLite - default)
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite

# Or use MySQL/PostgreSQL
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=holiday_gift_app
# DB_USERNAME=root
# DB_PASSWORD=

# Session Configuration
SESSION_DRIVER=file
SESSION_LIFETIME=120

# Cache Configuration
CACHE_STORE=file

# Queue Configuration
QUEUE_CONNECTION=sync
```

### Step 5: Generate Application Key

```bash
php artisan key:generate
```

### Step 6: Create Database

If using SQLite (default), ensure the database file exists:

```bash
touch database/database.sqlite
```

Or on Windows:
```bash
type nul > database\database.sqlite
```

If using MySQL or PostgreSQL, create the database first:

```sql
CREATE DATABASE holiday_gift_app;
```

### Step 7: Run Migrations

```bash
php artisan migrate
```

### Step 8: (Optional) Seed Database

Seed the database with sample data:

```bash
php artisan db:seed
```

### Step 9: Create Storage Link

Link the storage directory for file uploads:

```bash
php artisan storage:link
```

### Step 10: Build Frontend Assets

For development:
```bash
npm run dev
```

For production:
```bash
npm run build
```

## 🎯 Running the Application

### Development Mode

**Option 1: Using Laravel's built-in server (Recommended for development)**

Terminal 1 - Start Laravel server:
```bash
php artisan serve
```

Terminal 2 - Start Vite dev server (for hot module replacement):
```bash
npm run dev
```

**Option 2: Using the combined dev script**

The project includes a convenient dev script that runs everything:

```bash
composer run dev
```

This will start:
- Laravel development server
- Queue worker
- Laravel Pail (log viewer)
- Vite dev server

### Production Mode

1. Build frontend assets:
```bash
npm run build
```

2. Optimize Laravel:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

3. Start your web server (Apache/Nginx) or use:
```bash
php artisan serve
```

## 📁 Project Structure

```
holiday-gift-app/
├── app/
│   ├── Exports/          # Excel export classes
│   ├── Http/
│   │   ├── Controllers/  # Application controllers
│   │   └── Middleware/   # Custom middleware
│   ├── Imports/          # Excel import classes
│   ├── Models/           # Eloquent models
│   └── Providers/        # Service providers
├── database/
│   ├── migrations/       # Database migrations
│   ├── seeders/          # Database seeders
│   └── database.sqlite   # SQLite database (if used)
├── public/               # Public assets
│   └── images/           # Application images
├── resources/
│   ├── css/              # Stylesheets
│   ├── js/               # JavaScript files
│   └── views/            # Blade templates
│       ├── admin/        # Admin panel views
│       ├── auth/         # Authentication views
│       └── journey/      # User journey views
├── routes/
│   └── web.php           # Web routes
└── storage/              # Storage directory
```

## 🔐 Default Credentials

After seeding the database, you can use these credentials:

**Admin Login:**
- Email: `admin@example.com`
- Password: `password`

**Regular User:**
- Email: `user@example.com`
- Password: `password`

**⚠️ Important**: Change these credentials in production!

## 🎨 Available Routes

### Public Routes
- `/` - User login page
- `/journey` - User gift selection journey
- `/gift-request` - Gift request form

### Admin Routes
- `/admin/login` - Admin login
- `/admin` - Admin dashboard
- `/admin/categories` - Manage categories
- `/admin/gifts` - Manage gifts
- `/admin/users` - Manage users
- `/admin/gift-requests` - View gift requests
- `/admin/users-export` - Export users to Excel
- `/admin/users-import` - Import users from Excel
- `/admin/gift-requests-export` - Export gift requests to Excel

## 🧪 Testing

Run the test suite:

```bash
php artisan test
```

Or using PHPUnit directly:

```bash
vendor/bin/phpunit
```

## 📦 Package Information

### PHP Packages (Composer)
- `laravel/framework` ^12.0 - Laravel framework
- `maatwebsite/excel` ^3.1 - Excel import/export functionality
- `laravel/tinker` ^2.10.1 - Interactive REPL

### Development Dependencies
- `laravel/pint` ^1.13 - Code style fixer
- `laravel/sail` ^1.41 - Docker development environment
- `phpunit/phpunit` ^11.5.3 - Testing framework

### Node Packages (npm)
- `vite` ^6.0.11 - Build tool
- `tailwindcss` ^4.0.0 - CSS framework
- `@tailwindcss/vite` ^4.0.0 - Tailwind Vite plugin
- `laravel-vite-plugin` ^1.2.0 - Laravel Vite integration
- `axios` ^1.7.4 - HTTP client
- `concurrently` ^9.0.1 - Run multiple commands

## 🔧 Common Commands

### Artisan Commands
```bash
# Clear all caches
php artisan optimize:clear

# Run migrations
php artisan migrate

# Rollback migrations
php artisan migrate:rollback

# Create a new migration
php artisan make:migration create_table_name

# Create a new controller
php artisan make:controller ControllerName

# Create a new model
php artisan make:model ModelName

# Run seeders
php artisan db:seed

# Generate application key
php artisan key:generate

# List all routes
php artisan route:list
```

### NPM Commands
```bash
# Install dependencies
npm install

# Run development server
npm run dev

# Build for production
npm run build
```

## 🐛 Troubleshooting

### Issue: GD Extension Error
**Solution**: Enable the GD extension in your `php.ini` file. See [Prerequisites](#enabling-php-gd-extension) section.

### Issue: Permission Denied on Storage
**Solution**: 
```bash
chmod -R 775 storage bootstrap/cache
```

On Windows, ensure the storage directory has write permissions.

### Issue: SQLite Database Not Found
**Solution**: 
```bash
touch database/database.sqlite
php artisan migrate
```

### Issue: Assets Not Loading
**Solution**: 
1. Ensure Vite dev server is running: `npm run dev`
2. Or build assets: `npm run build`
3. Clear view cache: `php artisan view:clear`

### Issue: Route Not Found
**Solution**: 
1. Clear route cache: `php artisan route:clear`
2. Check routes: `php artisan route:list`

## 📝 Development Guidelines

### Code Style
The project uses Laravel Pint for code formatting:

```bash
php artisan pint
```

### Database Migrations
Always create migrations for database changes:

```bash
php artisan make:migration add_column_to_table
```

### Git Workflow
1. Create a feature branch
2. Make your changes
3. Run tests and linting
4. Commit with descriptive messages
5. Push and create a pull request

## 🔒 Security Considerations

- Never commit `.env` file
- Use strong passwords in production
- Enable HTTPS in production
- Keep dependencies updated
- Review and sanitize user inputs
- Use Laravel's built-in CSRF protection

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📞 Support

For support, please open an issue in the repository or contact the development team.

## 🎉 Acknowledgments

- Built with [Laravel](https://laravel.com)
- Styled with [Tailwind CSS](https://tailwindcss.com)
- Excel functionality powered by [Maatwebsite Excel](https://github.com/Maatwebsite/Laravel-Excel)

---

**Made with ❤️ for holiday gift management**
#   g t h o l i d a y s h o p  
 #   g t h o l i d a y s h o p  
 
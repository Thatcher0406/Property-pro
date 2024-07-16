# Property-pro
# Property Pro

A web-based property management system for landlords and tenants.

## Installation

1. Download and install XAMPP from [https://www.apachefriends.org/download.html](https://www.apachefriends.org/download.html)
2. Create a database locally named `property_management` with collation `utf8_general_ci`
3. Download Composer from [https://getcomposer.org/download/](https://getcomposer.org/download/)
4. Pull the Laravel/PHP project from your Git provider
5. Rename the `.env.example` file to `.env` inside your project root and fill in the database information. (On Windows, you may need to use the console to rename the file: `cd your_project_root_directory` and run `mv .env.example .env`)
6. Open the console and navigate to your project root directory
7. Run `composer install` or `php composer.phar install`
8. Run `php artisan key:generate`
9. Run `php artisan migrate`
10. Run `php artisan db:seed` to run seeders, if any
11. Run `php artisan serve`

## Troubleshooting

If your project stops working, follow these steps:

1. Run `composer install`
2. Run `php artisan migrate`


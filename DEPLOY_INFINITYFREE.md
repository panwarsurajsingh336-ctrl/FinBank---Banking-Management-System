# Deploy FinBank to InfinityFree

InfinityFree does not provide SSH, Composer, Git, or an Artisan terminal on its
free hosting. Build the application locally and upload the complete result.

## 1. Prepare the production environment

Copy `.env.production.example` to `.env.production` and replace every
placeholder with the values from InfinityFree's **MySQL Databases** page.

Generate a production application key locally:

```powershell
Copy-Item .env .env.local.backup
Copy-Item .env.production .env -Force
php artisan key:generate
Copy-Item .env .env.production -Force
Move-Item .env.local.backup .env -Force
```

Never commit `.env.production`; it is already excluded by `.gitignore`.

## 2. Install production dependencies

Run this on the local computer before uploading:

```powershell
composer install --no-dev --optimize-autoloader
php artisan optimize:clear
```

The `vendor` directory must be uploaded because Composer cannot run on the
free server.

## 3. Prepare the database

Apply all migrations to the local `finbank` database:

```powershell
php artisan migrate
```

Export `finbank` from local phpMyAdmin as an SQL file. In InfinityFree's
phpMyAdmin, select the database created in its control panel and import that
SQL file. Do not include `CREATE DATABASE` or `USE finbank` statements because
InfinityFree assigns its own database name.

## 4. Arrange the uploaded files

InfinityFree uses `htdocs` as the public web directory and does not allow a
custom document root. Use this structure:

```text
htdocs/
|-- .htaccess                 (from public/.htaccess)
|-- index.php                 (from public/index.php, with paths edited below)
|-- css/                      (from public/css)
|-- favicon.ico
|-- robots.txt
`-- application/
    |-- .env                  (the local .env.production file)
    |-- app/
    |-- bootstrap/
    |-- config/
    |-- resources/
    |-- routes/
    |-- storage/
    `-- vendor/
```

Do not upload `.git`, tests, `node_modules`, the local `.env`, or development
documentation.

In the uploaded `htdocs/index.php`, change the three Laravel paths:

```php
if (file_exists($maintenance = __DIR__.'/application/storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__.'/application/vendor/autoload.php';

$app = require_once __DIR__.'/application/bootstrap/app.php';
```

Protect the private application directory by creating
`htdocs/application/.htaccess` containing:

```apache
Require all denied
```

The web server must be able to write to `application/storage` and
`application/bootstrap/cache`. Use the hosting file manager to set writable
permissions if Laravel reports a permission error.

## 5. Finish

Enable the free SSL certificate in InfinityFree, open the HTTPS site, and test
account creation, login, deposit, withdrawal, transfer, and transaction
history. Keep `APP_DEBUG=false` so credentials and stack traces are never
shown publicly.

# FinBank Demo Guide

FinBank is a Laravel banking-management demonstration. It uses simulated money
and must not be used for real banking or real customer data.

## Start the application locally

Requirements:

- PHP 8.2 or newer
- Composer
- MySQL with a database matching the values in `.env`
- Node.js only when rebuilding Vite-managed assets

From the project directory:

```powershell
composer install
php artisan key:generate
php artisan migrate
php artisan serve
```

Open `http://127.0.0.1:8000`.

Never run `migrate:fresh`, `migrate:reset`, or `db:wipe` against a database that
contains data you need.

## Demo account

The repository does not include a shared universal account number or PIN. This
avoids publishing reusable credentials and works with both new and existing
databases.

To create your own demo account:

1. Open **Open account** in the navigation.
2. Enter fictional demonstration details. Do not use real sensitive data.
3. Choose an opening demo balance and a PIN you can remember.
4. Submit the form and copy the generated account number, such as `FNB101`.
5. Open **Login** and enter that account number and PIN.

If the database already contains test accounts, their original account numbers
and PINs can also be used. Credentials cannot be recovered from the interface;
create a new demo account if the old credentials are unavailable.

## Available features

After login, open the account menu in the navigation to use:

- **Account summary** — view account profile information and transaction history.
- **Balance** — view the current simulated balance.
- **Deposit** — add simulated funds and record a transaction.
- **Withdraw** — remove simulated funds when the balance is sufficient.
- **Transfer funds** — transfer simulated funds to another existing FinBank account.
- **Change PIN** — replace the current PIN after confirming it.
- **Logout** — clear the current application session.

To test transfers, create two demo accounts. Log into the sender account and use
the receiver's generated account number on the transfer screen.

## Public demonstration pages

The Accounts, Cards, Loans, Offers, Digital Banking, Security, and Careers pages
showcase the redesigned user interface. Product benefits, vacancies, and contact
details on these pages are illustrative and are not real financial offers or live
recruitment listings.

## Important limitations

- This project is not a licensed or regulated financial institution.
- Money, balances, cards, loans, rewards, and offers are simulated.
- The contact form is visual only because no contact-message backend exists.
- There is no forgot-PIN or password-reset workflow in the current application.
- Do not enter real PINs, passwords, identity documents, card numbers, or banking data.

## Common troubleshooting

### The page keeps loading

Confirm MySQL is running and that `DB_HOST`, `DB_PORT`, `DB_DATABASE`,
`DB_USERNAME`, and `DB_PASSWORD` in `.env` are correct.

### A table already exists during migration

Do not delete the database. Check migration status with:

```powershell
php artisan migrate:status
```

The database may contain tables created before Laravel recorded the matching
migration. Back up the database and reconcile its migration records carefully.

### Styles do not update

The primary redesign stylesheet is `public/css/style.css`, which does not require
a Vite build. Clear compiled views and refresh the browser:

```powershell
php artisan view:clear
```

## Developer map

- Public routes: `routes/web.php`
- Banking logic: `app/Http/Controllers/First.php`
- Shared page layout: `resources/views/layouts/app.blade.php`
- Navigation and footer: `resources/views/nav.blade.php` and
  `resources/views/partials/footer.blade.php`
- Homepage: `resources/views/home.blade.php`
- Brand styles: `public/css/style.css`
- Logo assets: `public/images/logo/`

No frontend package is required to modify the Blade templates or primary CSS.

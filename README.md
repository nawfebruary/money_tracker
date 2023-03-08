## Requirements:
- Laravel `9`
- Vite  `3`


## Versions:
- Laravel `9` & PHP - `8.x`


## Project Setup
Install Laravel Dependencies -
```console
composer install
```
Install NPM Dependencies -
```console
npm install
```

Create database called - `money_tracker`

Create `.env` file by copying `.env.example` file

Generate Artisan Key (If needed) -
```console
php artisan key:generate
```

Migrate Database with seeder -
```console
php artisan migrate --seed
```

Run Project -
```php
php artisan serve
```
```npm
npm run dev
```


So, You've got the project of Laravel Money Tracker on your http://localhost:8000

## How it works
1. Create User Account
2. Login Account With Crendentials
2. Create Income
     1. Create Custom Category or Use existing Category
3. Create Exepnse
     1. Create Custom Category or Use existing Category



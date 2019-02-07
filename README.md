## John-Shop

Built with [Laravel 5.7](https://laravel.com/docs/5.7)

[Demo Site](https://emkaysports.herokuapp.com/)

## Dependencies

-   PHP (at least 7.1)
-   [Composer](getcomposer.org)
-   [Node.js](https://nodejs.org)
-   yarn
-   MySQL

## Setting up

-   Copy `.env.example` to `.env`
-   Modify values in `.env` if needed

### Then via a command line interface:

-   `composer install`
-   `php artisan key:generate`
-   `npm install`
-   `npm run dev`

Initialize and seed the database:

```php
php artisan migrate --seed
```

Finally, start the project:

```php
php artisan serve
```

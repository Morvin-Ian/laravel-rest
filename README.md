# Laravel REST API with Sanctum

This is an example of a REST API using auth tokens with Laravel Sanctum

## Laravel Sanctum Setup
    1. composer require laravel/sanctum
    2. php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
    3. php artisan migrate
    4. Modify User Model

    use Laravel\Sanctum\HasApiTokens;
 
    class User extends Authenticatable
    {
        use HasApiTokens, HasFactory;
    }


## Usage

Change the *.env.example* to *.env* and add your database info

For SQLite, add
```
DB_CONNECTION=sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
```

Create a _database.sqlite_ file in the _database_ directory

```
# Run the webserver on port 8000
php artisan serve
```

## Routes 

    http://127.0.0.1:8000/api/register
    http://127.0.0.1:8000/api/login


    Requires  Authenitacation (Bearer Authentiction)
    http://127.0.0.1:8000/api/data/
    http://127.0.0.1:8000/api/data/{id}
```
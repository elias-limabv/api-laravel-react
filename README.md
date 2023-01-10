# Laravel REST API with Sanctum and Front end React

This is an example of a REST API using auth tokens with Laravel Sanctum
```
How to Build Laravel Auth and CRUD REST APIs using Laravel Sanctum

Step 1: Download Laravel App
```
composer create-project --prefer-dist laravel/laravel my-app

Step 2: Update Database Credentials
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
##Step 3: Add Laravel Sanctum
composer require laravel/sanctum

#Subsequently, go ahead and publish the Sanctum configuration and migration files using the vendor:
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
```
#Further, add Sanctum’s middleware to your api middleware group within your application’s app/Http/Kernel.php file: 
'api' => [
    \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
    'throttle:api',
    \Illuminate\Routing\Middleware\SubstituteBindings::class,
],
The provided command will create a table for storing the API toke and evoke the database migration.

Step 4: Add Table in Database
```

Step 5: Make Laravel API Resources
Step 6: Build Auth Controllers
Step 7: Register New Routes
Step 8: Test Laravel Auth APIs

# Run the webserver on port 8000
php artisan serve
```
https://remotestack.io/laravel-sanctum-auth-and-crud-rest-api-tutorial/

## Routes

```
# Public

GET   /api/products
GET   /api/products/:id

POST   /api/login
@body: email, password

POST   /api/register
@body: name, email, password, password_confirmation


# Protected

POST   /api/products
@body: nome, descricao, categoria, imagem, preco, material, departamento

PUT   /api/products/:id
@body: ?nome, ?descricao, ?categoria, ?imagem, ?preco,?material, ?departamento

DELETE  /api/products/:id

POST    /api/logout
```

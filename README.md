# cinema-api
REST API to manage films and projections.

## Requirements:
Composer<br>
PHP 8.3<br>
Docker<br>

## Installation:
### 1. Clone into the repository and install dependencies   
```
$ git clone https://github.com/booksey/cinema-api.git
$ cd cinema-api
$ composer install
$ cat .env.example > .env
```

### 2. Start docker containers (laravel, mariadb):
```
$ ./vendor/bin/sail up
```

### 3. Generate application key and database:
### Run these commands inside runnig laravel-1 container
```
$ php artisan key:generate
$ php artisan migrate --seed
```

## PHP code analysis tools
I used these tools for PHP code analysis + testing<br>
### phpcs:
```
$ composer cs-check
```
### phpmd:
```
$ composer phpmd
```
### phpstan:
```
$ composer stan
```
### phpunit
```
$ php artisan test
```

## API Endpoints
### To list all available endpoints:
```
php artisan route:list --path=api
```

After the setup you can use the API at: http://localhost/<br>
Example to get film list from browser: http://localhost/api/films

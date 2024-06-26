<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Installation
* Clone the repo
* Install vendor dependencies: `docker run --rm --interactive --tty --volume $PWD:/app composer install --ignore-platform-reqs --no-scripts`
* In case of missing classes: `docker run --rm --interactive --tty --volume $PWD:/app composer dump-autoload`
* Copy env file: `cp .env.example .env`
* Start container: `vendor/bin/sail up -d`
* Run Migrations and Seeders: `vendor/bin/sail artisan migrate:fresh --seed`
* Publish API: `vendor/bin/sail artisan install:api`

## Frontend
http://localhost/activities

## REST API
To getcorreclty formated JSON response including error messages, you must send `Accept: application/json` request header.

* Index: GET http://localhost/api/activities
* Store: POST http://localhost/api/activities
* Show: GET http://localhost/api/activities/{activity}
* Update: PUT/PATCH http://localhost/api/activities/{activity}
* Destroy: DELETE http://localhost/api/activities/{activity}

## Testing
* Run tests `vendor/bin/sail artisan test`

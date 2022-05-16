#!/bin/bash

composer install

rm -rf ./public/storage
php artisan storage:link

php artisan serve --host=0.0.0.0 --port=8000
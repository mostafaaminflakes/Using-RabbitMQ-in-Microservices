#!/bin/bash

set -e

FILE=/app/vendor/autoload.php
if [ ! -f "$FILE" ]
then
    composer install
    cp .env.example .env
    php artisan project:init
fi

exec php artisan serve --host=0.0.0.0
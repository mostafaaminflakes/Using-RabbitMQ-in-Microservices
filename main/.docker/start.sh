#!/bin/bash

set -e

FILE=/app/vendor/autoload.php
if [ ! -f "$FILE" ]
then
    # exec cat "Initializing... Please wait..." >> /app/console.log 2>&1
    composer install
    cp .env.example .env
    php artisan project:init
fi

# exec echo "Done. Browse server now..."
exec php artisan serve --host=0.0.0.0
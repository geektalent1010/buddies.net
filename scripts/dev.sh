#!/bin/sh

if [ -x "$(command -v docker)" ]; then
    [ -f sail ] && sh sail || sh vendor/bin/sail up -d
else
    composer install && php artisan serve
fi

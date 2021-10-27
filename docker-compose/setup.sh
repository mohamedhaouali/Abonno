#!/bin/sh

CMD='docker-compose exec -T --user=0 app'


$CMD composer install --no-interaction --prefer-dist --optimize-autoloader

$CMD php artisan storage:link || true
$CMD php artisan key:generate

$CMD chmod -R 777 ./
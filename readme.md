IOS Env setting:

brew update

brew install php

brew install mysql

brew install composer

composer global require laravel/valet

Valet introduce see: https://laravel.com/docs/8.x/valet



after install mysql, php and valet, do laravel projects setting:

cd utu-website:

.env  using your mysql username and password

composer install / composer update

npm install

php artisan key:generate

php artisan migrate

php artisan db:seed

valet link( generate a domain end with .test, like utu-website.test )


npm run watch              

npm run prod

php artisan storage:link
php artisan cache:clear
php artisan config:clear

-Instalación de composer
composer install

-Crear archivo .env
cp .env.example .env

-Generación de llave
php artisan key:generate

-Migración 
php artisan migrate:fresh --seed

-Iniciar
php artisan serve

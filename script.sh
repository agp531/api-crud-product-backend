#!/bin/bash

cp .env.example .env

sed -i 's/^DB_CONNECTION=.*/DB_CONNECTION=mysql/' /.env
sed -i 's/^DB_HOST=.*/DB_HOST=mysql/' .env
sed -i 's/^DB_PORT=.*/DB_PORT=3306/' .env
sed -i 's/^DB_DATABASE=.*/DB_DATABASE=crud_products/' .env
sed -i 's/^DB_USERNAME=.*/DB_USERNAME=root/' .env
sed -i 's/^DB_PASSWORD=.*/DB_PASSWORD=root/' .env

docker exec -it WorkSpace /bin/bash -c '

echo "Instalando dependecias..."
composer install

echo "Iniciando migrations..."
php artisan migrate

echo "Seediando as tabelas do banco"
php artisan db:seed

echo "Gerando key para sua aplicação"
php artisan key:generate

echo "Running storage link"
php artisan storage:link

echo "Iniciando permissões do diretório"
chmod -R 775 *

echo "Iniciando permissões de grupos"
chown -R www-data:www-data *
'

echo "DONE"
exit 0;
composer install --optimize-autoloader --no-dev
npm install
npm run build
chmod -R 775 storage bootstrap/cache
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

#!/bin/bash

echo "==== Local Environment Report ===="

# PHP version
echo "PHP Version:"
php -v
echo "-----------------------------"

# Composer version
echo "Composer Version:"
composer -V
echo "-----------------------------"

# Laravel version
echo "Laravel Version:"
php artisan --version
echo "-----------------------------"

# Node & npm versions
echo "Node Version:"
node -v
echo "NPM Version:"
npm -v
echo "-----------------------------"

# Database info from .env (if readable)
if [ -f ".env" ]; then
    echo "Database Configuration:"
    DB_CONNECTION=$(grep DB_CONNECTION .env | cut -d '=' -f2)
    DB_HOST=$(grep DB_HOST .env | cut -d '=' -f2)
    DB_PORT=$(grep DB_PORT .env | cut -d '=' -f2)
    DB_DATABASE=$(grep DB_DATABASE .env | cut -d '=' -f2)
    DB_USERNAME=$(grep DB_USERNAME .env | cut -d '=' -f2)
    DB_PASSWORD=$(grep DB_PASSWORD .env | cut -d '=' -f2)
    echo "DB_CONNECTION: $DB_CONNECTION"
    echo "DB_HOST: $DB_HOST"
    echo "DB_PORT: $DB_PORT"
    echo "DB_DATABASE: $DB_DATABASE"
    echo "DB_USERNAME: $DB_USERNAME"
    echo "DB_PASSWORD: $DB_PASSWORD"
else
    echo ".env file not found, skipping database info"
fi
echo "-----------------------------"

# Composer packages
echo "Installed Composer Packages:"
composer show | awk '{print $1, $2}' | head -n 20
echo "-----------------------------"

# NPM packages
if [ -f "package.json" ]; then
    echo "Installed NPM Packages:"
    npm list --depth=0
else
    echo "No package.json found, skipping npm packages"
fi
echo "-----------------------------"

# File permissions in storage and bootstrap/cache
echo "File Permissions:"
ls -ld storage bootstrap/cache
ls -l storage bootstrap/cache
echo "-----------------------------"

# Laravel environment
echo "Laravel Environment:"
php artisan env
echo "-----------------------------"

# Routes
echo "Registered Routes (summary):"
php artisan route:list --compact
echo "==============================="

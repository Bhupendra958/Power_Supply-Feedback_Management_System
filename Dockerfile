FROM node:22-bookworm-slim AS frontend

WORKDIR /app

# install frontend deps and build from the `frontend/` folder (React + Vite)
COPY frontend/package.json ./
RUN npm install --silent

COPY frontend/ ./
RUN npm run build

# move Vite `dist` to a `public/build` folder so Laravel can read manifest.json
RUN mkdir -p /app/public && mv /app/dist /app/public/build

FROM php:8.2-cli

ENV APP_ENV=production \
    APP_DEBUG=false \
    LOG_CHANNEL=stderr \
    SESSION_DRIVER=file \
    CACHE_STORE=file \
    QUEUE_CONNECTION=sync \
    QUEUE_FAILED_DRIVER=file

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    libzip-dev \
    && docker-php-ext-install zip \
    && rm -rf /var/lib/apt/lists/*

RUN pecl install mongodb-1.21.0 \
    && docker-php-ext-enable mongodb

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --optimize-autoloader

COPY . .
COPY --from=frontend /app/public/build ./public/build

# ensure Laravel can write to storage and bootstrap/cache
RUN mkdir -p storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache || true \
    && chmod -R 775 storage bootstrap/cache || true

RUN composer dump-autoload --optimize \
    && php artisan package:discover --ansi

EXPOSE 10000

CMD ["sh", "-c", "php artisan serve --host=0.0.0.0 --port=${PORT:-10000}"]

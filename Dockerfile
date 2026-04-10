FROM php:8.2-cli

WORKDIR /app

# =========================
# Sistema
# =========================
RUN apt-get update && apt-get install -y \
    git unzip curl zip libpq-dev libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

# =========================
# Node.js (ANTES del build)
# =========================
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# =========================
# Composer
# =========================
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# =========================
# Copiar proyecto
# =========================
COPY . .

# =========================
# PHP deps
# =========================
RUN composer install --no-dev --optimize-autoloader

# =========================
# FRONTEND BUILD s
# =========================
RUN npm install
RUN npm run build

# DEBUG opcional
RUN ls -la public/build

# =========================
# Permisos
# =========================
RUN chmod -R 777 storage bootstrap/cache

EXPOSE 10000

CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=10000
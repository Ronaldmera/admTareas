FROM php:8.2-cli

# =========================
# Directorio de trabajo
# =========================
WORKDIR /app

# =========================
# Dependencias del sistema
# =========================
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpq-dev \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo pdo_pgsql zip

# =========================
# Instalar Node (IMPORTANTE: versión correcta)
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
# Instalar dependencias PHP
# =========================
RUN composer install --no-dev --optimize-autoloader

# =========================
# Instalar dependencias Node + build Vite
# =========================
RUN npm install
RUN npm run build

# =========================
# Permisos Laravel
# =========================
RUN chmod -R 777 storage bootstrap/cache

# =========================
# Puerto Render
# =========================
EXPOSE 10000

# =========================
# Comando de inicio
# =========================
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=10000
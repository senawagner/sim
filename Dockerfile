# Usando uma imagem Alpine do PHP com FPM
FROM php:8.1-fpm-alpine

# Instalar dependências necessárias
RUN apk add --no-cache \
    libpng-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    freetype-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    git \
    curl \
    oniguruma-dev \
    autoconf \
    gcc \
    g++ \
    make

# Configurar e instalar extensões PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Instalar e habilitar a extensão Redis
RUN pecl install redis && docker-php-ext-enable redis

# Configurar variáveis de ambiente para o Composer
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV COMPOSER_HOME=/composer

# Instalar o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Definir o diretório de trabalho
WORKDIR /var/www/html

# Copiar os arquivos do projeto
COPY . .

# Instalar dependências do projeto
RUN composer install --no-interaction

# Dar permissões corretas
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expor a porta 9000 (PHP-FPM)
EXPOSE 9000

# Iniciar o PHP-FPM
CMD ["php-fpm"]

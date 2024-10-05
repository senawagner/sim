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
    git \
    oniguruma-dev \
    autoconf \
    gcc \
    g++ \
    make

# Instalar extensões PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instalar e habilitar a extensão Redis
RUN pecl install redis && docker-php-ext-enable redis

# Instalar o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Definir o diretório de trabalho
WORKDIR /var/www/html

# Copiar os arquivos de configuração do composer
COPY composer.json composer.lock ./

# Instalar dependências do projeto
RUN composer install --no-scripts --no-autoloader

# Copiar os arquivos do projeto
COPY . .

# Gerar o autoloader otimizado
RUN composer dump-autoload --optimize

# Dar permissão de escrita ao diretório storage
RUN chown -R www-data:www-data storage bootstrap/cache

# Expor a porta 9000 (PHP-FPM)
EXPOSE 9000

# Iniciar o PHP-FPM
CMD ["php-fpm"]

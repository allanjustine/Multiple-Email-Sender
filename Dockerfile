FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    npm \
    libzip-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-install pdo pdo_mysql zip gd

WORKDIR /var/www

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY . /var/www

COPY . .

RUN npm install && npm run build

RUN composer install --no-dev --optimize-autoloader

RUN echo "upload_max_filesize=100M" > /usr/local/etc/php/conf.d/uploads.ini && \
    echo "post_max_size=100M" >> /usr/local/etc/php/conf.d/uploads.ini

RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

EXPOSE 1008

CMD ["php-fpm"]

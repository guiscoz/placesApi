FROM php:8.3-fpm

RUN apt-get update \
    && apt-get install -y \
        libpq-dev \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
        zip \
        unzip \
        git \
        curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apk add --no-cache postgresql-client

WORKDIR /var/www/html

COPY . .

RUN composer install

EXPOSE 9000

CMD ["php-fpm"]

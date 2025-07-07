FROM php:8.4.10-alpine3.22

RUN apk update && apk upgrade && apk add git bash

RUN docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- \ 
    --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /backend

COPY . ./

RUN composer install

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0
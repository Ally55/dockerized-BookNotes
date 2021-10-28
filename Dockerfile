FROM php:8.0-alpine

WORKDIR /usr/src/BookNotes

RUN apk update && docker-php-ext-install mysqli pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./ /usr/src/BookNotes/

RUN composer install

CMD ["php", "-S", "0.0.0.0:3000", "-t", "./public"]
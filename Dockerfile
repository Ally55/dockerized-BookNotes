FROM php:8.0-apache

WORKDIR /usr/src/BookNotes

# install dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    vim \
    bash \
    && docker-php-ext-install mysqli pdo pdo_mysql 

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./ /usr/src/BookNotes/

# COPY ./composer.json /usr/src/BookNotes/
# COPY ./compose.lock /usr/src/BookNotes/ 

RUN composer install

COPY docker/web/000-default.conf /etc/apache2/sites-available/000-default.conf

RUN a2ensite 000-default.conf

RUN a2enmod rewrite

#CMD ["php", "-S", "0.0.0.0:3000", "-t", "./public"]
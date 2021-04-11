FROM php:7.3-fpm

WORKDIR "/application"

RUN apt-get update
RUN apt-get install -y libpq-dev
RUN docker-php-ext-install pdo pgsql pdo_pgsql

RUN apt-get install -y git
RUN apt-get install zip unzip
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

CMD ["php-fpm"]
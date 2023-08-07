FROM  php:8.2-fpm

WORKDIR /lara101


RUN apt-get update && apt-get install -y mariadb-server \
nano \
build-essential \
libpng-dev \
libjpeg62-turbo-dev \
libfreetype6-dev \
locales \
zip \
jpegoptim optipng pngquant gifsicle \
vim \
libzip-dev \
unzip \
git \
libonig-dev \
curl


# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
 
# Install extensions for php
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd
 
COPY composer.json composer.lock /lara101/

# Install composer (php package manager)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


RUN composer install --no-interaction --no-scripts --no-progress
 
RUN  chgrp -R www-data lara101/storage lara101/bootstrap/cache &&  chmod -R ug+rwx lara101/storage lara101/bootstrap/cache
 
RUN chown -R www-data:www-data \
        /var/www/html/storage \
        /var/www/html/bootstrap/cache
         
COPY ./app.conf /etc/nginx/conf.d/default.conf


RUN sed -i 's/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/' /etc/php8.2/8.2/fpm/php8.2.ini

RUN apt-get clean
ADD . .   
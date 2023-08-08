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
curl \ 
nginx


# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
 
# Install extensions for php
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd
 
COPY composer.json composer.lock /lara101/

# Install composer (php package manager)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

 
# copy nginx configuration to container
COPY ./app.conf /etc/nginx/sites-enabled/default

# RUN sed -i 's/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/' /etc/php/8.2/fpm/php.ini

RUN apt-get clean

COPY .env.example .env

# shell script to start nginx web server 
COPY script.sh /etc/script.sh

# copy all installed configuration inside image 
ADD . .   


RUN composer install --no-interaction --no-scripts --no-progress
RUN php artisan key:generate
RUN  chgrp -R www-data storage bootstrap/cache &&  chmod -R ug+rwx storage bootstrap/cache
RUN chmod +x /etc/script.sh

CMD ["sh","/etc/script.sh"]



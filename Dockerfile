FROM  php:8.2-fpm

WORKDIR /lara101

# COPY ./app.conf /etc/nginx/conf.d/default.conf

RUN apt-get update && apt-get install -y mariadb-server \
nano \
php8.2-fpm \ 
php8.2-mysql \
php8.2-common \
php8.2-mbstring \
php8.2-xmlrpc \
php8.2-xml \
php8.2-intl \
php8.2-cli \
php8.2-zip \
php8.2-curl \
composer \
unzip \
zip \
nginx

COPY composer.json composer.lock ./

RUN composer install --no-interaction --no-scripts --no-progress
 
RUN  chgrp -R www-data lara101/storage lara101/bootstrap/cache &&  chmod -R ug+rwx lara101/storage lara101/bootstrap/cache
 

RUN sed -i 's/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/' /etc/php8.2/8.2/fpm/php8.2.ini

RUN apt-get clean
ADD . .   
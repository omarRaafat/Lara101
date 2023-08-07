FROM nginx:latest

WORKDIR /lara101

COPY ./app.conf /etc/nginx/conf.d/default.conf

RUN apt-get update && apt-get install -y mariadb-server \
nano \
php-fpm \ 
php-mysql \
php-common \
php-mbstring \
php-xmlrpc \
php-xml \
php-intl \
php-cli \
php-zip \
php-curl \
composer \
unzip \
zip

RUN composer install
RUN  chgrp -R www-data lara101/storage lara101/bootstrap/cache &&  chmod -R ug+rwx lara101/storage lara101/bootstrap/cache
 

RUN sed -i 's/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/' /etc/php/8.2/fpm/php.ini

RUN apt-get clean
ADD . .   
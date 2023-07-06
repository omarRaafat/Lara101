FROM php:8.3.0alpha1-fpm-buster
RUN apt-get update -y &&  apt-get install nginx -y
ADD . /var/www/html

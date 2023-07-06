FROM php:8.3.0alpha1-fpm-buster
RUN apt-get install nginx -y
ADD . /usr/share/nginx/html

FROM php:8.3.0alpha1-fpm-buster
RUN apt-get -y install nginx
ADD . /usr/share/nginx/html

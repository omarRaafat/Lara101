FROM php:8.3.0alpha1-fpm-buster
RUN apt-get update && apt-get -y && apt-get install nginx
ADD . /usr/share/nginx/html

FROM nginx:latest
WORKDIR /job101
COPY ./app.conf /etc/nginx/conf.d/default.conf
RUN apt-get update && apt-get install -y nano
RUN apt-get update &&  apt-get install -y mariadb-server 
RUN apt-get update && apt-get install -y php-fpm \ 
php-mysql \
php-common \
php-mbstring \
php-xmlrpc \
php-xml \
php-intl \
php-cli \
php-zip \
php-curl
RUN sed -i 's/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/' /etc/php/8.2/fpm/php.ini
RUN apt-get install -y composer unzip zip
RUN apt-get clean
ADD . .   

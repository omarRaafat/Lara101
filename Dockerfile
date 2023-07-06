FROM nginx
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
RUN apt-get install -y composer unzip zip
RUN apt-get clean
ADD . .   

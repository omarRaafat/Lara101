FROM nginx
RUN  apt-get update &&  apt-get upgrade -y 
RUN  apt-get install software-properties-common apt-transport-https -y && add-apt-repository ppa:ondrej/php -y
RUN  apt-get install php8.1-fpm php8.1-common php8.1-mysql php8.1-xml php8.1-xmlrpc php8.1-curl php8.1-gd php8.1-imagick php8.1-cli php8.1-dev php8.1-imap php8.1-mbstring php8.1-opcache php8.1-soap php8.1-zip php8.1-intl php8.1-bcmath
ADD . /var/www/html

FROM nginx
WORKDIR /job101
COPY ./app.conf /etc/nginx/conf.d/default.conf
RUN apt-get update && apt-get install -y nano
RUN apt-get update && sudo apt-get install -y mariadb-server 
   && systemctl enable mysql 
   && apt-get install -y php8.1-fpm php8.1-mysql php8.1-common php8.1-mbstring php8.1-xmlrpc php8.1-xml php8.1-intl php8.1-cli php8.1-zip php8.1-curl
   
RUN apt-get clean
ADD . .   

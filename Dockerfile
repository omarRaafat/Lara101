FROM nginx
WORKDIR /job101
COPY ./app.conf /etc/nginx/conf.d/default.conf
RUN apt-get update && apt-get install -y nano
RUN apt-get update && apt-get install -y php apache2 mysql-server php-mysql php-curl php-gd php-xml php-zip php-mbstring
RUN apt-get clean
ADD . .   
